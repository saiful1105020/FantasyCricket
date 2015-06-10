<?php
class Tournament_model extends CI_Model 
{

    public function __construct()
	{
        $this->load->database();
	}
	
	/**
	*	CREATE A PROCEDURE AND COMMENT OUT THE FUNCTION
	*	DON'T FORGET TO REPLACE THE CODES ASSOCIATED WITH IT
	*/
	public function test()
	{
		$sql = 'exec update_player_match_point(1,42,44)';				
		
		$query=$this->db->query($sql); 
		
		//$result=$query->row_array();
		
		return $query->row_array();
	}
	
	public function get_active_tournament()
	{
		$sql = 'SELECT * FROM "tournament" where "is_active"=1';				
		
		$query=$this->db->query($sql); 
		
		//$result=$query->row_array();
		
		return $query;
	}
	
	public function get_active_tournament_name()
	{
		$sql = 'SELECT "tournament_name" FROM "tournament" where "is_active"=1';				
		
		$query=$this->db->query($sql); 
		
		$result=$query->row_array();
		
		return $result['tournament_name'];
	}
	
	public function get_active_tournament_id()
	{
		$sql = 'SELECT "tournament_id" FROM "tournament" where "is_active"=1';				
		
		$query=$this->db->query($sql); 
		
		$result=$query->row_array();
		
		return $result['tournament_id'];
	}
	
	public function update_active_tournament($tournament_id)
	{
		$sql='UPDATE "tournament"
				SET "is_active" = 0
				where "tournament_id" = (Select "tournament_id" FROM "tournament" where "is_active"=1)';
		$query=$this->db->query($sql);

		$sql='UPDATE "tournament"
				SET "is_active" = 1
				where "tournament_id" = ?';
		$query=$this->db->query($sql, $tournament_id);

	}
	
	public function get_tournament_name($tournament_id)
	{
		$sql = 'SELECT "tournament_name" FROM "tournament" where "tournament_id"=?';				
		$query=$this->db->query($sql,$tournament_id); 
		$result=$query->row_array();
		
		return $result['tournament_name'];
	}
	
	public function get_tournament_info($tournament_id)
	{
		$sql = 'SELECT * FROM "tournament" where "tournament_id"=?';				
		$query=$this->db->query($sql,$tournament_id); 
		return $result=$query->row_array();
	}
	
	public function get_phase_info($tournament_id)
	{
		$sql = 'SELECT * FROM "phase" where "tournament_id"=?';				
		$query=$this->db->query($sql,$tournament_id); 
		return $result=$query->result_array();
	}
	
	public function get_upcoming_match($tournament_id)
	{
		$sql = 'SELECT * FROM "match" 
				WHERE "tournament_id"='.$tournament_id.' AND "is_started"=0 AND ("start_time"-CURRENT_TIMESTAMP) = 
				(	
					SELECT MIN("start_time"-CURRENT_TIMESTAMP)
					FROM "match" 
					WHERE ("start_time" > CURRENT_TIMESTAMP AND "is_started"=0 AND "tournament_id"='.$tournament_id.')
				)';				
		
		$query=$this->db->query($sql); 
		
		//$result=$query->row_array();
		//print_r($result);
		
		return $query;
	}
	
	public function get_upcoming_phase($tournament_id)
	{
		$sql = 'SELECT * FROM "phase" 
				WHERE "tournament_id"='.$tournament_id.' AND "is_started"=0 AND ("start_time"-CURRENT_TIMESTAMP) = 
				(	
					SELECT MIN("start_time"-CURRENT_TIMESTAMP)
					FROM "phase" 
					WHERE ("start_time" > CURRENT_TIMESTAMP AND "is_started"=0 AND "tournament_id"='.$tournament_id.')
				)';				
		
		$query=$this->db->query($sql); 
		
		//$result=$query->row_array();
		
		return $query;
	}
	
	public function get_previous_match()
	{
		$sql = 'SELECT * FROM "match" 
				WHERE "tournament_id"=current_tournament() AND "is_started"=1 AND (CURRENT_TIMESTAMP-"start_time") = 
				(	
					SELECT MIN(CURRENT_TIMESTAMP-"start_time")
					FROM "match" 
					WHERE ("start_time" < CURRENT_TIMESTAMP AND "is_started"=1 AND "tournament_id"= current_tournament())
				)';				
		
		$query=$this->db->query($sql); 
			
		return $query;
	}
	
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
	
	public function view_tournament()
	{
		$sql = 'SELECT * FROM "tournament"';		
		return $query=$this->db->query($sql);
	}
	
	public function create_tournament($data)
	{
		$sql = 'INSERT INTO "tournament" VALUES(?,?,TO_DATE(?,\'YYYY-MM-DD\'),TO_DATE(?,\'YYYY-MM-DD\'),?,?,?)';		
		return $query=$this->db->query($sql,$data); 
	}
	
	public function get_tournament_teams($tournament_id)
	{
		$sql = 	'SELECT "team_id" from "team_tournament" where "tournament_id"=?';			
		$query=$this->db->query($sql,$tournament_id); 
		return $query;
	}
	
	public function get_active_tournament_teams()
	{
	
		$result = $this->get_active_tournament()->row_array();
		$tournament_id = $result['tournament_id'];
		
		$sql = 	'SELECT * from "team" where "team_id" IN
					(
					SELECT "team_id" FROM "team_tournament" where "tournament_id"=?
					)';
				
		$query=$this->db->query($sql,$tournament_id); 
		
		return $query;
	}
	
	public function get_all_tournaments()
	{
		$sql = 	'SELECT * from "tournament" ORDER BY "tournament_name"';
				
		$query=$this->db->query($sql); 
		
		return $query;
	}
	
	/**
	*	RETURN TRUE IF EXISTS
	*	FALSE OTHERWISE
	*/
	
	public function player_exists($player_id)
	{
		$result = $this->get_active_tournament()->row_array();
		$cur_tournament_id = $result['tournament_id'];
		
		$sql = 	'SELECT "COUNT"(*) FROM "player_tournament" where "player_id" = ? AND "tournament_id" = ?';
				
		$query=$this->db->query($sql,array($player_id,$cur_tournament_id)); 
		
		$rs = $query->row_array();
		
		if($rs['"COUNT"(*)']==0) return 0;
		else return 1;
	}
	
	public function add_tournament_player($player_id)
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
			$sql = 	'INSERT INTO "player_tournament" VALUES (?,?,?)';		
			$query=$this->db->query($sql,$data);
		}		
	}
	
	public function delete_tournament_player($player_id)
	{
		if($this->player_exists($player_id)==1)
		{
			$result = $this->get_active_tournament()->row_array();
			$cur_tournament_id = $result['tournament_id'];
			
			$sql = 	'DELETE FROM "player_tournament" WHERE "player_id"=? AND "tournament_id"=?';		
			$query=$this->db->query($sql,array($player_id,$cur_tournament_id));
		}
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
	
	public function team_exists_tournament($tournament_id,$team_id)
	{
		
		$sql = 	'SELECT "COUNT"(*) FROM "team_tournament" where "team_id" = ? AND "tournament_id" = ?';
				
		$query=$this->db->query($sql,array($team_id,$tournament_id)); 
		
		$rs = $query->row_array();
		
		if($rs['"COUNT"(*)']==0) return 0;
		else return 1;
	}
	
	public function add_tournament_team($tournament_id,$team_id)
	{
		if($this->team_exists_tournament($tournament_id,$team_id)==0)
		{
			$data=array(
				'team_tournament_id'=>'',
				'team_id'=> $team_id,
				'tournament_id'=> $tournament_id
			);
			$sql = 	'INSERT INTO "team_tournament" VALUES (?,?,?)';		
			$query=$this->db->query($sql,$data);
		}		
	}
	
	public function delete_tournament_team($tournament_id,$team_id)
	{
		if($this->team_exists_tournament($tournament_id,$team_id)==1)
		{
			$sql = 	'DELETE FROM "team_tournament" WHERE "team_id"=? AND "tournament_id"=?';		
			$query=$this->db->query($sql,array($team_id,$tournament_id));
		}
	}
	
	public function add_tournament_phase($phase_data)
	{
		$sql = 'INSERT INTO "phase" VALUES(?,?,TO_DATE(?,\'YYYY-MM-DD HH24:MI:SS\'),TO_DATE(?,\'YYYY-MM-DD HH24:MI:SS\'),?,?,?,?)';
		return $this->db->query($sql,$phase_data);
	}
	
	
	public function update_tournament_phase($phase_data)
	{
		$sql = 'UPDATE "phase" SET "phase_name" = ?,
		"start_time" = TO_DATE(?,\'YY-MON-DD HH12:MI:SS AM\'),
		"finish_time" = TO_DATE(?,\'YY-MON-DD HH12:MI:SS AM\'),
		"free_transfers" = ? 
		WHERE "phase_id" = ?';
		
		return $this->db->query($sql,array($phase_data['phase_name'],$phase_data['start_time'],$phase_data['finish_time'],$phase_data['free_transfers'],$phase_data['phase_id']));
	}
}