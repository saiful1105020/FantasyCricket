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
	
	public function create_player_match_points($player_id, $match_id)
	{
		$sql= 'INSERT INTO "player_match_point" VALUES(\'\',?,?,0,0,0,0,0,0,0,0,0,0,0,0,0)';
		return $this->db->query($sql,array($player_id,$match_id));
	}
	
	public function update_match_points($data)
	{
		//$sql='select UPDATE_PLAYER_POINT(CURRENT_TOURNAMENT(), ?, ?) as PT from dual';
		//$tmp=$this->db->query($sql,array($data['player_id'],$data['match_id']))->row_array();
		//$points=$tmp['PT'];
		
		$sql='UPDATE "player_match_point" SET "runs_scored"=? , "balls_played"=? ,"fours"=? , "sixes"=? 
					,"wickets_taken"=?, "balls_bowled"=?, "runs_conceded"=?,"maiden_overs"=?
					,"catches"=?,"stumpings"=?,"run_outs"=?  WHERE "player_id"=? AND "match_id"=?';
		$this->db->query($sql,$data);
		
		$sql='select UPDATE_PLAYER_POINT(CURRENT_TOURNAMENT(), ?, ?) as PT from dual';
		$tmp=$this->db->query($sql,array($data['player_id'],$data['match_id']))->row_array();
		$points=$tmp['PT'];
		
		$sql='UPDATE "player_match_point" SET "total_points"=?  WHERE "player_id"=? AND "match_id"=?';
		$this->db->query($sql,array($points,$data['player_id'],$data['match_id']));
	}
	
	public function create_user_match_team($user_id, $match_id)
	{
		//GET PREVIOUS MATCH ID
		$query = $this->tournament_model->get_previous_match();
		$result=$query->row_array();
		$prev_match_id = $result['match_id'];
		
		//GET PREVIOUS USER MATCH TEAM
		$sql='SELECT * FROM "user_match_team" WHERE "user_id"=? AND "match_id"=?';
		$query=$this->db->query($sql,array($user_id,$prev_match_id));
		$result=$query->row_array();
		
		//GET PREVIOUS CAPTAIN ID
		$prev_captain=$result['captain_id'];
		
		//SET NEW CAPTAIN := OLD CAPTAIN		
		$new_captain=$prev_captain;
		
		
		//GET PREVIOUS MATCH TEAM ID
		$prev_match_team_id=$result['user_match_team_id'];
		
		//GET ALL PREVIOUS USER_MATCH_TEAM_PLAYERS
		$sql='SELECT "player_id" FROM "user_match_team_player" WHERE "user_match_team_id"=?';
		$query=$this->db->query($sql,array($prev_match_team_id));
		$team_players=$query->result_array();
		
		//CREATE USER_MATCH_TEAM
		$sql='INSERT into "user_match_team" VALUES(\'\',?,?,?,0)';
		$query=$this->db->query($sql,array($user_id,$match_id,$new_captain));
		
		
		//GET NEW MATCH TEAM ID
		$sql='SELECT * FROM "user_match_team" WHERE "user_id"=? AND "match_id"=?';
		$query=$this->db->query($sql,array($user_id,$match_id));
		$result=$query->row_array();
		$new_match_team_id=$result['user_match_team_id'];
		
		//SET ALL PLAYERS DATA
		//SET NEW MATCH_TEAM_PLAYERS := ALL PREVIOUS USER_MATCH_TEAM_PLAYERS	
		foreach($team_players as $r)
		{
			$sql='INSERT into "user_match_team_player" VALUES(\'\',?,?)';
			$query=$this->db->query($sql,array($new_match_team_id,$r['player_id']));
			//print_r($r);
		}
		echo '<br>';
		//RETURN TRUE
	}

}
?>