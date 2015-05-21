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
	
	public function get_active_tournament()
	{
		$sql = 'SELECT * FROM "tournament" where "is_active"=1';				
		
		$query=$this->db->query($sql); 
		
		//$result=$query->row_array();
		
		return $query;
	}
	
	public function get_upcoming_match($tournament_id)
	{
		$sql = 'SELECT * FROM "match" 
				WHERE "tournament_id"=? AND "is_started"=0 AND ("start_time"-CURRENT_TIMESTAMP) = 
				(	
					SELECT MIN("start_time"-CURRENT_TIMESTAMP)
					FROM "match" 
					WHERE ("start_time" > CURRENT_TIMESTAMP)
				)';				
		
		$query=$this->db->query($sql,$tournament_id); 
		
		//$result=$query->row_array();
		
		return $query;
	}
	
	public function get_upcoming_phase($tournament_id)
	{
		$sql = 'SELECT * FROM "phase" 
				WHERE "tournament_id"=? AND "is_started"=0 AND ("start_time"-CURRENT_TIMESTAMP) = 
				(	
					SELECT MIN("start_time"-CURRENT_TIMESTAMP)
					FROM "phase" 
					WHERE ("start_time" > CURRENT_TIMESTAMP)
				)';				
		
		$query=$this->db->query($sql,$tournament_id); 
		
		//$result=$query->row_array();
		
		return $query;
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
		$sql = 'INSERT INTO "tournament" VALUES(?,?,?,?,?,?,?)';		
		return $query=$this->db->query($sql,$data); 
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

}