<?php
class Team_model extends CI_Model 
{

    public function __construct()
	{
        $this->load->database();
	}
	
	public function get_team_name($team_id)
	{
		$sql = 'SELECT "team_name" FROM "team" where "team_id"=?';				
		$query=$this->db->query($sql,$team_id); 
		$result=$query->row_array();
		
		return $result['team_name'];
	}

	public function create_team($data)
	{
		$sql = 'INSERT INTO "team" VALUES(?,?,?)';		
		return $this->db->query($sql,$data); 
	}
	
	public function get_team_id($team_name)
	{
		$sql = 'SELECT "team_id" FROM "team" where "team_name"=?';				
		$query=$this->db->query($sql,$team_name);

		$result=$query->row_array();
		
		return $result['team_id'];
	}
	
	public function get_all_teams()
	{
		$sql = 	'SELECT * from "team" ORDER BY "team_name"';
				
		$query=$this->db->query($sql); 
		
		return $query;
	}
	
	public function get_team_players($team_id)
	{
		$sql = 	'SELECT * from "player" where "team_id"=? ORDER BY "player_cat" ASC, "name" ASC';			
		$query=$this->db->query($sql,$team_id); 
		return $query;
	}

}
?>