<?php
class Admin_model extends CI_Model 
{
	
    public function __construct()	//DONE
	{
        $this->load->database();
		$this->load->model('match_model');
		$this->load->model('tournament_model');
	}
		
	public function get_loginInfo($data)	//DONE
	{
		$query = $this->db->get_where('admin', array('admin_id' => $data['admin_id'],'password' => $data['password']));
		return $query;
	}
	
	
	public function start_phase($phase_id)
	{
		$sql='UPDATE `phase` SET `is_started`=1 WHERE `phase_id`=?';
		return $query=$this->db->query($sql,$phase_id);
	}
	
	public function start_match($match_id)		//DONE, HIGH PROBABILITY OF ERROR
	{
		$cur_tour= $this->tournament_model->get_active_tournament_id();
		
		$sql='UPDATE `match` SET `is_started`=1 WHERE `match_id`=?';
		$query=$this->db->query($sql,$match_id);
		
		//Create player_match_point_entries --Done
		$sql='SELECT `player_id` FROM `player_tournament` WHERE `tournament_id`=?';
		$result=$this->db->query($sql,$cur_tour)->result_array();
		
		foreach($result as $r)
		{
			$val=$this->match_model->create_player_match_points($r['player_id'], $match_id);
		}
		
		
		//GET ALL TOURNAMENT USERS
		$sql='SELECT `user_id` FROM `user_tournament` WHERE `tournament_id`=?';
		$users=$this->db->query($sql,$cur_tour)->result_array();
		
		//FOR EACH USER CALL create_user_match_team($user_id, $match_id)
		foreach($users as $u)
		{
			//echo '<br>'.$u['user_id'].'<br>';
			$val = $this->match_model->create_user_match_team($u['user_id'], $match_id);
		}
		return true;
	}
	
	
	
}

?>