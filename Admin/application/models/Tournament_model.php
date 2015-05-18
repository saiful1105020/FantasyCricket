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

}