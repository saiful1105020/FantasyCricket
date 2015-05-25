<?php
class Admin_model extends CI_Model 
{

    public function __construct()
	{
        $this->load->database();
	}
		
	public function get_loginInfo($data)
	{
		$query = $this->db->get_where('admin', array('admin_id' => $data['admin_id'],'password' => $data['password']));
		return $query;
	}
	
	/**
	*	CREATE A PROCEDURE AND COMMENT OUT THE FUNCTION
	*	DON'T FORGET TO REPLACE THE CODES ASSOCIATED WITH IT
	*/
	
	public function get_active_tournament()
	{
		$sql = 'SELECT "tournament_id" FROM "tournament" where "is_active"=1';				
		$query=$this->db->query($sql); 
		
		$result=$query->row_array();
		
		//echo $result['tournament_id'].'....</br>';
		
		return $result['tournament_id'];
	}
	
	public function get_fixture($tournament_id=0)
	{
		if($tournament_id==0)
		{
			$tournament_id=$this->get_active_tournament();
		}
		
		/**
		$sql = 'SELECT * FROM "match" WHERE "tournament_id" = ?';
		$query=$this->db->query($sql, array($tournament_id)); 
		return $query->row_array();
		*/
		
		$sql = 'SELECT M."match_id" as "match_id",M."start_time" as "Time",M."team1_id" as "home_team_id",
				T1."team_name" as "home_team_name",M."team2_id" as "away_team_id",T2."team_name" as "away_team_name" 
				from "match" M, "team" T1, "team" T2 
				WHERE T1."team_id"=M."team1_id" AND T2."team_id"=M."team2_id" AND M."tournament_id"=?
				ORDER BY M."start_time"';
				
		$query=$this->db->query($sql, array($tournament_id)); 
		return $query;
	}

	public function get_result($tournament_id=0)
	{
		if($tournament_id==0)
		{
			$tournament_id=$this->get_active_tournament();
		}
		
		$sql = 'SELECT M."start_time" as Time, T1."team_name" as "Home Team",
				M."team1_total_runs" AS "RUNS",M."team1_wickets" AS "Wickets",
				Floor((M."team1_balls")/6) AS "Overs", MOD(M."team1_balls",6) AS "Balls",
				T2."team_name" as "Away Team",
				M."team2_total_runs" AS "RUNS2",M."team2_wickets" AS "Wickets2",
				Floor((M."team2_balls")/6) AS "Overs2", MOD(M."team2_balls",6) AS "Balls2"
				from "match" M, "team" T1, "team" T2 
				WHERE T1."team_id"=M."team1_id" AND T2."team_id"=M."team2_id" AND M."tournament_id"=? AND M."start_time"<CURRENT_TIMESTAMP
				ORDER BY M."start_time" DESC';
				
		$query=$this->db->query($sql,array($tournament_id)); 
		
		return $query;
	}
}

?>