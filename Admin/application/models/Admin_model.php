<?php
class Admin_model extends CI_Model 
{

    public function __construct()
	{
        $this->load->database();
		$this->load->model('match_model');
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
	
	public function start_phase($phase_id)
	{
		$sql='UPDATE "phase" SET "is_started"=1 WHERE "phase_id"=?';
		return $query=$this->db->query($sql,$phase_id);
	}
	
	//Done ; Beta Tested
	public function start_match($match_id)
	{
		$sql='UPDATE "match" SET "is_started"=1 WHERE "match_id"=?';
		$query=$this->db->query($sql,$match_id);
		
		//Create player_match_point_entries --Done
		$sql='SELECT "player_id" FROM "player_tournament" WHERE "tournament_id"=current_tournament()';
		$result=$this->db->query($sql,$match_id)->result_array();
		
		foreach($result as $r)
		{
			$val=$this->match_model->create_player_match_points($r['player_id'], $match_id);
		}
		
		
		//GET ALL TOURNAMENT USERS
		$sql='SELECT "user_id" FROM "user_tournament" WHERE "tournament_id"=CURRENT_TOURNAMENT()';
		$users=$this->db->query($sql)->result_array();
		
		//FOR EACH USER CALL create_user_match_team($user_id, $match_id)
		foreach($users as $u)
		{
			//echo '<br>'.$u['user_id'].'<br>';
			$val = $this->match_model->create_user_match_team($u['user_id'], $match_id);
		}
		return true;
	}
	
	//NEAMUL::UPDATE_MATCH_STAT FUNCTION
	//update_match_summary($match_id);
	
	
	/**
	*	THIS FUNCTION WILL ONLY BE CALLED FROM UPDATE_MATCH_POINT
	*	NO EXTERNAL USE
	*/
	
	public function update_motm_point($match_id)
	{
		//GET MOTM_ID FROM MATCH
		$sql='SELECT "motm_id" FROM "match" WHERE "match_id"=?';
		$query=$this->db->query($sql,$match_id)->row_array();
		$motm_id=$query['motm_id'];
		
		//GET MOTM_BONUS_PONT FROM CONSTANTS TABLE
		$sql='select MOTM_BONUS_POINT from "constants" WHERE TOURNAMENT_ID=CURRENT_TOURNAMENT()';
		$query=$this->db->query($sql)->row_array();
		echo $motm_bonus=$query['MOTM_BONUS_POINT'];
		
		//SET MOTM_BONUS_PONT FOR THE PLAYER IN PLAYER_MATCH_POINT TABLE
		$sql='UPDATE "player_match_point" SET "motm_bonus"=? WHERE "player_id"=? AND "match_id"=?';
		$query=$this->db->query($sql,array($motm_bonus,$motm_id,$match_id));
	}
	
	/**
	*	THIS FUNCTION WILL ONLY BE CALLED FROM UPDATE_MATCH_POINT
	*	NO EXTERNAL USE
	*/
	
	/*
	public function update_player_match_point($player_id,$match_id)
	{
		$sql='SELECT UPDATE_PLAYER_POINT(CURRENT_TOURNAMENT(), ?, ?) FROM DUAL';
		$query=$this->db->query($sql,array($player_id,$match_id));
		$sql='';
		
	}
	*/
	
	public function update_match_summary($match_id)
	{
		//GET HOME TEAM ID, AWAY TEAM ID
		$sql='SELECT * from "match" WHERE "tournament_id"=CURRENT_TOURNAMENT() AND "match_id"=?';
		$query=$this->db->query($sql,$match_id);
		$match=$query->row_array();
		
		$home_team_id=$match['team1_id'];
		//echo '<br>';
		$away_team_id=$match['team2_id'];
		
		//GET ALL HOME AND AWAY TEAM PLAYERS IN THE TOURNAMENT
		$sql='SELECT P."player_id" FROM "player" P, "player_tournament" T
									WHERE P."team_id"=? 
									AND P."player_id"=T."player_id" 
									AND T."tournament_id"=CURRENT_TOURNAMENT()';
		$query=$this->db->query($sql,$home_team_id);
		$home_players=$query->result_array();
		
		$sql='SELECT P."player_id" FROM "player" P, "player_tournament" T
									WHERE P."team_id"=? 
									AND P."player_id"=T."player_id" 
									AND T."tournament_id"=CURRENT_TOURNAMENT()';
		$query=$this->db->query($sql,$away_team_id);
		$away_players=$query->result_array();
		
									
		//SAVE HOME TEAM SUMMARY
		$home_runs=0;
		$home_balls=0;
		$home_wickets=0;
		
		foreach($away_players as $p)
		{
			$sql='SELECT * from "player_match_point" where "player_id"=? and "match_id"=?';
			$query=$this->db->query($sql,array($p['player_id'],$match_id));
			$temp=$query->row_array();
			$home_runs+=$temp['runs_conceded'];
			$home_balls+=$temp['balls_bowled'];
			$home_wickets+=$temp['wickets_taken']+$temp['stumpings']+$temp['run_outs'];
			//print_r($temp);
			//echo '<br>';
		}
		
		//SAVE AWAY TEAM SUMMARY
		$away_runs=0;
		$away_balls=0;
		$away_wickets=0;
		
		foreach($home_players as $p)
		{
			$sql='SELECT * from "player_match_point" where "player_id"=? and "match_id"=?';
			$query=$this->db->query($sql,array($p['player_id'],$match_id));
			$temp2=$query->row_array();
			$away_runs+=$temp2['runs_conceded'];
			$away_balls+=$temp2['balls_bowled'];
			$away_wickets+=$temp2['wickets_taken'];
			//print_r($temp);
			//echo '<br>';
		}
		//echo $away_runs;
		//echo $home_runs;
		//UPDATE RECORDS
		$sql='UPDATE "match" SET "team1_total_runs"=?,
			 "team1_balls"=?, "team1_wickets"=?, "team2_total_runs"=?,
			 "team2_balls"=?,"team2_wickets"=? WHERE "match_id"=?';
		$query=$this->db->query($sql,array($home_runs,$home_balls,$home_wickets,$away_runs,$away_balls,$away_wickets,$match_id));
	}
	
}

?>