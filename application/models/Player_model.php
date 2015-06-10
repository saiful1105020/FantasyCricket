<?php
class Player_model extends CI_Model 
{

    public function __construct()
	{
        $this->load->database();
		$this->load->model('tournament_model');
		$this->load->model('team_model');
	}
	
	public function add_player($data)
	{
		$sql = 'INSERT INTO "player" VALUES(?,?,?,?,?,?)';		
		return $this->db->query($sql,$data); 
	}
	
	public function get_player_info($player_id)
	{
		$sql='SELECT * FROM "player" WHERE "player_id"=?';
		return $this->db->query($sql,$player_id)->row_array();
	}
	
	public function player_info($player_id)
	{
		$sql = 'SELECT * from "player"
				where "player_id"=?';
		return $this->db->query($sql,$player_id)->row_array();
	}
	
	public function team_name($team_id)
	{
		$sql='SELECT * FROM "team" WHERE "team_id"=?';
		return $this->db->query($sql,$team_id)->row_array();
	}
	
	public function get_player_match_point($player_id,$match_id)
	{
		$sql='SELECT update_player_point(current_tournament(),$player_id,$match_id) as point';
		return $this->db->query($sql,array($player_id,$match_id))->row_array();
	}
	
	public function get_player_last_match_point($player_id)
	{
		$match_id=$this->tournament_model->get_previous_match_id();
		$sql='SELECT update_player_point(current_tournament(),?,?) as PT from dual';
		return $this->db->query($sql,array($player_id,$match_id))->row_array();
	}
	
	public function top_players()
	{
		$current_t=$this->tournament_model->get_active_tournament_id();
		if($current_t==NULL)
		{
			echo 'No Player Record Found';
		}
		else
		{
			$sql = 'SELECT p."player_id" from "player_tournament" p
				where p."tournament_id"=?';

			$result = $this->db->query($sql,$current_t)->result_array();
			$info = array();
			$i = 0;
			foreach ($result as $r) {
				$temp = $this->player_info($r['player_id']);
				$inf['name']=$temp['name'];
				$inf['cat']=$temp['player_cat'];
				$inf['price']=$temp['price'];
				$inf['team_id']=$temp['team_id'];
				$t=$this->team_model->get_team_name($inf['team_id']);
				$inf['team_name']=$t;
				$inf['player_id']=$temp['player_id'];
				$sql = 'select "get_player_overall_point"(CURRENT_TOURNAMENT(), ?) as Point from dual';
				$q = $this->db->query($sql,$r['player_id'])->row_array();
				$inf['point']=$q['POINT'];
				$info[$i]=$inf;
				//print_r($info[$i]);
				$i++;
			}

			$price = array();
			foreach ($info as $key => $row)
			{
				$price[$key] = $row['point'];
			}
			array_multisort($price, SORT_DESC, $info);
			// foreach ($info as $key => $r)
			// {
			//     print_r($r);
			// }
			return $info;


		}
		
	}

}
?>