<?php
class Tournament_model extends CI_Model 
{

    public function __construct()	//done
	{
        $this->load->database();
	}
	
	public function get_active_tournament()		//DONE
	{
		$sql = 'SELECT * FROM `tournament` where `is_active`=1';				
		$query=$this->db->query($sql); 
		return $query;
	}
	
	public function get_active_tournament_id()		//Done
	{
		$sql = 'SELECT `tournament_id` FROM `tournament` where `is_active`=1';				
		$result=$this->db->query($sql)->row_array(); 
		return $result['tournament_id'];
	}
	
	public function get_active_tournament_teams()	//DONE
	{
	
		$result = $this->get_active_tournament()->row_array();
		$tournament_id = $result['tournament_id'];
		
		$sql = 	'SELECT * from `team` where `team_id` IN
					(
					SELECT `team_id` FROM `team_tournament` where `tournament_id`=?
					)';
				
		$query=$this->db->query($sql,$tournament_id); 
		
		return $query;
	}
	
	public function get_tournament_players($team)	//DONE
	{
		if($team['team_id']==="" && $team['player_cat']==="")
		{
			$sql = 'select P.name as Player_name, P.player_id as Player_id, P.player_cat as Category, P.price as Price
					from player P, player_tournament PT
					where P.player_id = PT.player_id and PT.tournament_id=?';
			
			$query = $this->db->query($sql,array($team['tournament_id']));
		}
		else if($team['team_id']==="")
		{
			$sql = 'select P.name as Player_name, P.player_id as Player_id, P.player_cat as Category, P.price as Price
					from player P, player_tournament PT
					where P.player_id = PT.player_id and PT.tournament_id=? and P.player_cat=?';
			
			$query = $this->db->query($sql,array($team['tournament_id'],$team['player_cat']));
		}
		else if($team['player_cat']==="")
		{
			$sql = 'select P.name as Player_name, P.player_id as Player_id, P.player_cat as Category, P.price as Price
					from player P, player_tournament PT
					where P.player_id = PT.player_id and P.team_id=? and PT.tournament_id=?';
					
			$query = $this->db->query($sql,array($team['team_id'],$team['tournament_id']));
		}
		else
		{
			$sql = 'select P.name as Player_name, P.player_id as Player_id, P.player_cat as Category, P.price as Price
					from player P, player_tournament PT
					where P.player_id = PT.player_id and P.team_id=? and PT.tournament_id=? and P.player_cat=?';
					
			$query = $this->db->query($sql,array($team['team_id'],$team['tournament_id'],$team['player_cat']));
		}
		return $query;
	}
	
	public function get_fixture($tournament_id=0)		//DONE
	{
		if($tournament_id==0)
		{
			$tournament_id=$this->get_active_tournament_id();
		}
		
		
		$sql = 'SELECT M.`match_id` as match_id,M.`start_time` as Time,M.`team1_id` as home_team_id,
				T1.`team_name` as home_team_name,M.`team2_id` as away_team_id,T2.`team_name` as away_team_name 
				from `match` M, `team` T1, `team` T2 
				WHERE T1.`team_id`=M.`team1_id` AND T2.`team_id`=M.`team2_id` AND M.`tournament_id`=?
				ORDER BY M.`start_time`';
				
		$query=$this->db->query($sql, array($tournament_id)); 
		return $query;
	}
	
	public function get_result($tournament_id=0)	//DONE
	{
		if($tournament_id==0)
		{
			$tournament_id=$this->get_active_tournament_id();
		}
		
		$sql = 'SELECT M.`start_time` as Time, T1.`team_name` as `Home Team`,
				M.`team1_total_runs` AS RUNS,M.`team1_wickets` AS Wickets,
				Floor((M.`team1_balls`)/6) AS Overs, MOD(M.`team1_balls`,6) AS Balls,
				T2.`team_name` as `Away Team`,
				M.`team2_total_runs` AS RUNS2,M.`team2_wickets` AS Wickets2,
				Floor((M.`team2_balls`)/6) AS Overs2, MOD(M.`team2_balls`,6) AS Balls2
				from `match` M, `team` T1, `team` T2 
				WHERE T1.`team_id`=M.`team1_id` AND T2.`team_id`=M.`team2_id` AND M.`tournament_id`=? AND M.`start_time`<CURRENT_TIMESTAMP
				ORDER BY M.`start_time` DESC';
				
		$query=$this->db->query($sql,array($tournament_id)); 
		
		return $query;
	}
	
	public function view_tournaments()	//done
	{
		$sql = 'SELECT * FROM `tournament`';		
		return $query=$this->db->query($sql);
	}
	
	public function get_tournament_name($tournament_id)	//done
	{
		$sql = 'SELECT `tournament_name` FROM `tournament` where `tournament_id`=?';				
		$query=$this->db->query($sql,$tournament_id); 
		$result=$query->row_array();
		
		return $result['tournament_name'];
	}
	
	public function team_exists_tournament($tournament_id,$team_id)	//done
	{
		
		$sql = 	'SELECT COUNT(*) FROM `team_tournament` where `team_id` = ? AND `tournament_id` = ?';
				
		$query=$this->db->query($sql,array($team_id,$tournament_id)); 
		
		$rs = $query->row_array();
		
		if($rs['COUNT(*)']==0) return 0;
		else return 1;
	}
	
	public function get_tournament_info($tournament_id)	//done
	{
		$sql = 'SELECT * FROM `tournament` where `tournament_id`=?';				
		$query=$this->db->query($sql,$tournament_id); 
		return $result=$query->row_array();
	}
	
	public function get_phase_info($tournament_id)	//done
	{
		$sql = 'SELECT * FROM `phase` where `tournament_id`=?';				
		$query=$this->db->query($sql,$tournament_id); 
		return $result=$query->result_array();
	}
	
	public function get_active_tournament_name()	//done
	{
		$sql = 'SELECT `tournament_name` FROM `tournament` where `is_active`=1';				
		
		$query=$this->db->query($sql); 
		
		$result=$query->row_array();
		
		return $result['tournament_name'];
	}
	
	public function get_previous_match()		//done
	{
		$cur_tour=$this->get_active_tournament_id();
		
		$sql = 'SELECT * FROM `match` 
				WHERE `tournament_id`=? AND `is_started`=1 AND (CURRENT_TIMESTAMP-`start_time`) = 
				(	
					SELECT MIN(CURRENT_TIMESTAMP-`start_time`)
					FROM `match` 
					WHERE (`start_time` < CURRENT_TIMESTAMP AND `is_started`=1 AND `tournament_id`= ?)
				)';				
		
		$query=$this->db->query($sql,array($cur_tour,$cur_tour)); 
			
		return $query;
	}
	
	public function get_previous_match_id()
	{
		$sql = 'SELECT match_id FROM `match` 
				WHERE tournament_id=current_tournament() AND is_started=1 AND (CURRENT_TIMESTAMP-start_time) = 
				(	
					SELECT MIN(CURRENT_TIMESTAMP-start_time)
					FROM `match` 
					WHERE (start_time < CURRENT_TIMESTAMP AND is_started=1 AND tournament_id= current_tournament())
				)';				
		
		$query=$this->db->query($sql); 
			
		return $query->row_array();
	}
	
	/**Unprocessed*/
	
	
	
	/**
	
	
	public function get_last_completed_phase($tournament_id)
	{
		$sql = 	'SELECT * FROM "phase" 
				WHERE "tournament_id"=1 AND "is_complete"=0 AND (CURRENT_TIMESTAMP-"finish_time") = 
				(	
					SELECT MIN(CURRENT_TIMESTAMP-"finish_time")
					FROM "phase" 
					WHERE (CURRENT_TIMESTAMP> "finish_time")
				)';
				
		$query=$this->db->query($sql,$tournament_id); 
		
		//$result=$query->row_array();
		
		return $query;
	}
	
	public function get_tournament_teams($tournament_id)
	{
		$sql = 	'SELECT "team_id" from "team_tournament" where "tournament_id"=?';			
		$query=$this->db->query($sql,$tournament_id); 
		return $query;
	}
	
	
	//add_tournament_team($tid);
	
	public function team_exists($team_id)
	{
		$result = $this->get_active_tournament()->row_array();
		$cur_tournament_id = $result['tournament_id'];
		
		$sql = 	'SELECT "COUNT"(*) FROM "team_tournament" where "team_id" = ? AND "tournament_id" = ?';
				
		$query=$this->db->query($sql,array($team_id,$cur_tournament_id)); 
		
		$rs = $query->row_array();
		
		if($rs['"COUNT"(*)']==0) return 0;
		else return 1;
	}
	
	
	
	
	*/
	

}