<?php
class User_model extends CI_Model 
{

    public function __construct()
	{
        $this->load->database();
	}
	
	/** CONVERT: FARABI **/
	public function get_loginInfo($data)
	{
		$query = $this->db->get_where('userInfo', array('email' => $data['email'],'password' => $data['password']));
		return $query;
	}

	/**
	*	If user e-mail already exists, return 1
	*	Otherwise, return 0
	*/
	
	/** CONVERT: FARABI **/
	public function exist_user($email)
	{
		$query = $this->db->get_where('userInfo', array('email' => $email));
		if($query->num_rows()>0) return 1;
		else return 0;
	}

	/** CONVERT: FARABI **/
	public function register($data)
	{
		$query = $this->db->insert('userInfo',$data);
	}

	/** CONVERT: FARABI **/
	public function exist_tournament_user($user_id)
	{
		$tournament_id=$this->tournament_model->get_active_tournament_id();
		$sql='SELECT * FROM "user_tournament" WHERE "tournament_id"=? and "user_id"=?';
		$query=$this->db->query($sql,array($tournament_id,$user_id));
		if($query->num_rows()===0)
		{
			//echo 'OK';
			return 0;
		}
		else
		{
			//echo 'Team Exists';
			return 1;
		}
	}
	
	/** CONVERT: FARABI **/
	public function user_team_name($user_id)
	{
		$tournament_id=$this->tournament_model->get_active_tournament_id();
		$sql='SELECT * FROM "user_tournament" WHERE "tournament_id"=? and "user_id"=?';
		$query=$this->db->query($sql,array($tournament_id,$user_id))->row_array();
		return $query['user_team_name'];
	}
	
	/** CONVERT: FARABI **/
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
	
	/** CONVERT: FARABI **/
	public function get_upcoming_match()
	{
		$sql = 'SELECT * FROM "match" 
				WHERE "tournament_id"=current_tournament() AND "is_started"=1 AND ("start_time"-CURRENT_TIMESTAMP) = 
				(	
					SELECT MIN("start_time"-CURRENT_TIMESTAMP)
					FROM "match" 
					WHERE ("start_time" > CURRENT_TIMESTAMP AND "is_started"=0 AND "tournament_id"=current_tournament())
				)';				
		
		$query=$this->db->query($sql); 
		
		//$result=$query->row_array();
		//print_r($result);
		
		return $query;
	}
	
	
	
	
	/** CONVERT: FARABI **/
	public function get_user_match_team($user_id)
	{
		//GET PREVIOUS MATCH ID
		$query = $this->tournament_model->get_previous_match();
		$result=$query->row_array();
		$prev_match_id = $result['match_id'];
		
		//GET PREVIOUS USER MATCH TEAM
		$sql='SELECT * FROM "user_match_team" WHERE "user_id"=? AND "match_id"=?';
		$query=$this->db->query($sql,array($user_id,$prev_match_id));
		
		if($query->num_rows()==0) return NULL;
		
		$result=$query->row_array();
		
		//GET PREVIOUS CAPTAIN ID
		$data['captain']=$result['captain_id'];
		
		//GET PREVIOUS MATCH TEAM ID
		$prev_match_team_id=$result['user_match_team_id'];
		
		//GET ALL PREVIOUS USER_MATCH_TEAM_PLAYERS
		$sql='SELECT "player_id" FROM "user_match_team_player" WHERE "user_match_team_id"=?';
		$query=$this->db->query($sql,array($prev_match_team_id));
		$data['team_players']=$query->result_array();
		return $data;
	}
	
	/** CONVERT: FARABI **/
	public function get_active_tournament()
	{
		$sql = 'SELECT "tournament_id" FROM "tournament" where "is_active"=1';				
		$query=$this->db->query($sql); 
		
		$result=$query->row_array();
		
		//echo $result['tournament_id'].'....</br>';
		
		return $result['tournament_id'];
	}
	
	/** CONVERT: FARABI **/
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

	/** CONVERT: FARABI **/
		
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
	
	/** CONVERT: LATER **/
	public function get_user_overall_point($user_id)
	{
		$sql='SELECT get_user_overall_point(?) as TP from dual';
		$result=$this->db->query($sql,$user_id)->row_array();
		if($result['TP']=='') $result['TP']=0;
		return $result['TP'];
	}
	
	/** CONVERT: LATER **/
	public function get_user_match_point($user_id)
	{
		$user_id;
		$m=$this->get_previous_match()->row_array();
		$match_id=$m['match_id'];
		$sql='SELECT get_user_match_point(?,?) as TP from dual';
		$result=$this->db->query($sql,array($user_id,$match_id))->row_array();
		if($result['TP']=='') $result['TP']=0;
		return $result['TP'];
	}
	
}

?>