<?php
/**
	A TASK DEPENDS ON FUNCTIONS ---- PENDING (Naved)
*/

class Match_model extends CI_Model 
{

    public function __construct()	//DONE
	{
        $this->load->database();
	}
	
	public function get_upcoming_match()			//NOTE :: IMPLEMENTATION OF THIS FUNCTION IS DIFFERENT FOR ADMIN AND USER
	{
		//is_started must be 1 for user_end
		$sql = 'SELECT * FROM `match` 
				WHERE tournament_id=current_tournament() AND is_started=1 AND (start_time-CURRENT_TIMESTAMP) = 
				(	
					SELECT MIN(start_time-CURRENT_TIMESTAMP)
					FROM `match` 
					WHERE (start_time > CURRENT_TIMESTAMP AND is_started=1 AND tournament_id=current_tournament())
				)';				
		
		$query=$this->db->query($sql); 
		
		return $query;
	}
	
	public function get_match_info($match_id)	//done
	{
		$sql = 'SELECT M.`start_time` as Time,M.`team1_id` as home_team_id,
				T1.`team_name` as home_team_name,M.`team2_id` as away_team_id,T2.`team_name` as away_team_name 
				from `match` M, `team` T1, `team` T2 
				WHERE T1.`team_id`=M.`team1_id` AND T2.`team_id`=M.`team2_id` AND M.`match_id`=?
				ORDER BY M.`start_time`';
				
		return $this->db->query($sql,$match_id);
	}
	

}
?>