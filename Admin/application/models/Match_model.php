<?php
class Match_model extends CI_Model 
{

    public function __construct()
	{
        $this->load->database();
	}
	
	public function create_match($data)
	{
		$sql = 'INSERT INTO "match" VALUES(\'\',TO_DATE(?,\'YYYY-MM-DD HH24:MI:SS\'),?,?,\'\',?,\'\',\'\',\'\',\'\',\'\',\'\',0,0)';		
		return $this->db->query($sql,$data); 
	}
	
	public function get_match_info($match_id)
	{
		$sql = 'SELECT M."start_time" as "Time",M."team1_id" as "home_team_id",
				T1."team_name" as "home_team_name",M."team2_id" as "away_team_id",T2."team_name" as "away_team_name" 
				from "match" M, "team" T1, "team" T2 
				WHERE T1."team_id"=M."team1_id" AND T2."team_id"=M."team2_id" AND M."match_id"=?
				ORDER BY M."start_time"';
				
		return $this->db->query($sql,$match_id);
	}
	
	public function update_match($data)
	{
		$sql = 'UPDATE "match" SET "start_time" = TO_DATE(?,\'YYYY-MM-DD HH24:MI:SS\')
				WHERE "match_id"='.$data["match_id"].'';		
		return $this->db->query($sql,$data["start_time"]); 
	}

}
?>