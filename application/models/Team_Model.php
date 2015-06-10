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

	//function updated
	public function get_tournament_team_players($team)
	{
		$sql = 'select P."name" as Player_name, P."player_id" as Player_id, P."player_cat" as Category, P."price" as Price
				from "player" P, "player_tournament" PT
				where P."player_id" = PT."player_id" and P."team_id"=? and PT."tournament_id"=?';
		$query = $this->db->query($sql,$team);
		return $query;

	}
	
	public function get_tournament_players($team)
	{
		if($team['team_id']==="" && $team['player_cat']==="")
		{
						$sql = 'select P."name" as Player_name, P."player_id" as Player_id, P."player_cat" as Category, P."price" as Price
					from "player" P, "player_tournament" PT
					where P."player_id" = PT."player_id" and PT."tournament_id"=?';
			$query = $this->db->query($sql,array($team['tournament_id']));
		}
		else if($team['team_id']==="")
		{
						$sql = 'select P."name" as Player_name, P."player_id" as Player_id, P."player_cat" as Category, P."price" as Price
					from "player" P, "player_tournament" PT
					where P."player_id" = PT."player_id" and PT."tournament_id"=? and P."player_cat"=?';
			$query = $this->db->query($sql,array($team['tournament_id'],$team['player_cat']));
		}
		else if($team['player_cat']==="")
		{
			$sql = 'select P."name" as Player_name, P."player_id" as Player_id, P."player_cat" as Category, P."price" as Price
					from "player" P, "player_tournament" PT
					where P."player_id" = PT."player_id" and P."team_id"=? and PT."tournament_id"=?';
			$query = $this->db->query($sql,array($team['team_id'],$team['tournament_id']));
		}
		else
		{
			$sql = 'select P."name" as Player_name, P."player_id" as Player_id, P."player_cat" as Category, P."price" as Price
					from "player" P, "player_tournament" PT
					where P."player_id" = PT."player_id" and P."team_id"=? and PT."tournament_id"=? and P."player_cat"=?';
			$query = $this->db->query($sql,array($team['team_id'],$team['tournament_id'],$team['player_cat']));
		}
		return $query;
		//and P."player_cat"=?
		//,$team['player_cat']
	}

	public function player_overall_point($player_id)
	{
		$sql = 'SELECT "get_player_overall_point"(CURRENT_TOURNAMENT(), ?) as TP from dual';

		$query = $this->db->query($sql,$player_id)->row_array();
		return $query['TP'];

	}


}
?>