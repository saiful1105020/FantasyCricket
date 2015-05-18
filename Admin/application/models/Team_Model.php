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
}
?>