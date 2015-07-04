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
	
	public function get_upcoming_phase($tournament_id)		//DONE
	{
		$sql = 'SELECT * FROM `phase` 
				WHERE `tournament_id`='.$tournament_id.' AND `is_started`=0 AND (`start_time`-CURRENT_TIMESTAMP) = 
				(	
					SELECT MIN(`start_time`-CURRENT_TIMESTAMP)
					FROM `phase` 
					WHERE (`start_time` > CURRENT_TIMESTAMP AND `is_started`=0 AND `tournament_id`='.$tournament_id.')
				)';				
		
		$query=$this->db->query($sql); 
		
		
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
	
	/**
	*	RETURN TRUE IF PLAYER EXISTS IN CURRENT TOURNAMENT
	*	FALSE OTHERWISE
	*/
	
	public function player_exists($player_id)	//done
	{
		$result = $this->get_active_tournament()->row_array();
		$cur_tournament_id = $result['tournament_id'];
		
		$sql = 	'SELECT COUNT(*) FROM `player_tournament` where `player_id` = ? AND `tournament_id` = ?';
				
		$query=$this->db->query($sql,array($player_id,$cur_tournament_id)); 
		
		$rs = $query->row_array();
		
		if($rs['COUNT(*)']==0) return 0;
		else return 1;
	}
	
	public function add_tournament_player($player_id)	//done
	{
		if($this->player_exists($player_id)==0)
		{
			$result = $this->get_active_tournament()->row_array();
			$cur_tournament_id = $result['tournament_id'];
			
			$data=array(
				'player_tournament_id'=>'',
				'player_id'=> $player_id,
				'tournament_id'=> $cur_tournament_id
			);
			$sql = 	'INSERT INTO `player_tournament` VALUES (?,?,?)';		
			$query=$this->db->query($sql,$data);
		}		
	}
	
	public function delete_tournament_player($player_id)	//done
	{
		if($this->player_exists($player_id)==1)
		{
			$result = $this->get_active_tournament()->row_array();
			$cur_tournament_id = $result['tournament_id'];
			
			$sql = 	'DELETE FROM `player_tournament` WHERE `player_id`=? AND `tournament_id`=?';		
			$query=$this->db->query($sql,array($player_id,$cur_tournament_id));
		}
	}
	
	public function view_tournaments()	//done
	{
		$sql = 'SELECT * FROM `tournament`';		
		return $query=$this->db->query($sql);
	}
	
	public function create_tournament($data)	//done
	{
		$sql = 'INSERT INTO `tournament` VALUES(?,?,DATE(?),DATE(?),?,?,?)';		
		return $query=$this->db->query($sql,$data); 
	}
	
	public function get_all_tournaments()	//done
	{
		$sql = 	'SELECT * from `tournament` ORDER BY `tournament_name`';
				
		$query=$this->db->query($sql); 
		
		return $query;
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
	
	public function add_tournament_team($tournament_id,$team_id)	//done
	{
		if($this->team_exists_tournament($tournament_id,$team_id)==0)
		{
			$data=array(
				'team_tournament_id'=>'',
				'team_id'=> $team_id,
				'tournament_id'=> $tournament_id
			);
			$sql = 	'INSERT INTO `team_tournament` VALUES (?,?,?)';		
			$query=$this->db->query($sql,$data);
		}		
	}
	
	public function delete_tournament_team($tournament_id,$team_id)	//done
	{
		if($this->team_exists_tournament($tournament_id,$team_id)==1)
		{
			$sql = 	'DELETE FROM `team_tournament` WHERE `team_id`=? AND `tournament_id`=?';		
			$query=$this->db->query($sql,array($team_id,$tournament_id));
		}
	}
	
	public function update_active_tournament($tournament_id)	//done
	{
		$current_tournament=$this->get_active_tournament_id();
		$sql='UPDATE `tournament`
				SET `is_active` = 0
				where `tournament_id` = (?)';
		$query=$this->db->query($sql,array($current_tournament));

		$sql='UPDATE `tournament`
				SET `is_active` = 1
				where `tournament_id` = ?';
		$query=$this->db->query($sql, $tournament_id);

	}
	
	
	public function add_tournament_phase($phase_data)	//done
	{
		$sql = 'INSERT INTO `phase` VALUES(?,?,STR_TO_DATE(?,\'%Y-%m-%d %H:%i:%s\'),STR_TO_DATE(?,\'%Y-%m-%d %H:%i:%s\'),?,?,?,?)';
		return $this->db->query($sql,$phase_data);
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
	
	public function update_tournament_phase($phase_data)	//done
	{
		$sql = 'UPDATE `phase` SET `phase_name` = ?,
		`start_time` = STR_TO_DATE(?,\'%Y-%m-%d %H:%i:%s\'),
		`finish_time` = STR_TO_DATE(?,\'%Y-%m-%d %H:%i:%s\'),
		`free_transfers` = ? 
		WHERE `phase_id` = ?';
		
		return $this->db->query($sql,array($phase_data['phase_name'],$phase_data['start_time'],$phase_data['finish_time'],$phase_data['free_transfers'],$phase_data['phase_id']));
	}
	
	public function get_active_tournament_name()	//done
	{
		$sql = 'SELECT `tournament_name` FROM `tournament` where `is_active`=1';				
		
		$query=$this->db->query($sql); 
		
		$result=$query->row_array();
		
		return $result['tournament_name'];
	}
	
	public function get_previous_match()		//processing
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
	
	/**Unprocessed*/
	
	
	
	/**
	public function get_previous_match_id()
	{
		$sql = 'SELECT "match_id" FROM "match" 
				WHERE "tournament_id"=current_tournament() AND "is_started"=1 AND (CURRENT_TIMESTAMP-"start_time") = 
				(	
					SELECT MIN(CURRENT_TIMESTAMP-"start_time")
					FROM "match" 
					WHERE ("start_time" < CURRENT_TIMESTAMP AND "is_started"=1 AND "tournament_id"= current_tournament())
				)';				
		
		$query=$this->db->query($sql); 
			
		return $query->row_array();
	}
	
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