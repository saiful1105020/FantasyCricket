<?php
/**
	LAST UPDATED: 30-06-2015 04:32 pm
	STATUS: REPLICATION COMPLETE
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Match extends CI_Controller {
	  
	 public function __construct()
     {
          parent::__construct();
		  
		  //Load Necessary Libraries and helpers
          $this->load->library('session');
          $this->load->helper('form');
          $this->load->helper('url');
          $this->load->helper('html');
		  $this->load->library('form_validation');
		  
		if(isset($_SESSION["user_id"]))
		{
			die("Please Log out from your user account. ");
		}
		else
		{
			if(!isset($_SESSION["admin_id"]))
			{
				redirect('/home', 'refresh');
			}
		}
		  
		$this->load->model('admin_model');
		$this->load->model('tournament_model');
		$this->load->model('team_model');
		$this->load->model('match_model');
		
		//$data['active_page']='match';
		$this->load->view('templates/header');
		
    }
	 
	
	public function index()
	{
		//echo 'Match Test';
	}
	
	/**
	*Update Match Table
	*/
	
	public function createMatch()
	{
		
		$tid=$this->tournament_model->get_active_tournament_id();
		if($tid==NULL)
		{
			echo 'No Active Tournament';
		}
		else
		{
			$data['step']=0;
			
			$query=$this->tournament_model->get_active_tournament_teams();

			$data['teams']=$query->result_array();
			$data['tournament_name']=$this->tournament_model->get_active_tournament_name();
			$data['sameTeam']=false;
			
			$this->load->view('createNewMatch',$data);
		}
	}
	
	public function createMatch_proc()
	{
		if(!(isset($_POST['start_year']) && ($_POST['start_month']) && ($_POST['start_day']) && ($_POST['start_hour']) && ($_POST['start_min'])))
		{
			redirect('match/createMatch','refresh');
		}
		
		$t_data['start_time']=$_POST['start_year'].'-'.$_POST['start_month'].'-'.$_POST['start_day'].' '.$_POST['start_hour'].':'.$_POST['start_min'].':'.'00';
		
		$t_data['team1_id']=$_POST['home_team_id'];
		$t_data['team2_id']=$_POST['away_team_id'];
		
		$result = $this->tournament_model->get_active_tournament()->row_array();
		$t_data['tournament_id'] = $result['tournament_id'];
		
		if($t_data['team1_id']==$t_data['team2_id'])
		{
			$query=$this->tournament_model->get_active_tournament_teams();

			$data['teams']=$query->result_array();
			$data['tournament_name']=$this->tournament_model->get_active_tournament_name();
			$data['sameTeam']=true;
		
			$this->load->view('createNewMatch',$data);
		}
		else
		{
			$data['success']=$this->match_model->create_match($t_data);
		
			$this->load->view('status_createTournament',$data);
		}
	}
	
	public function updateMatchInfo()
	{
		$query= $this->tournament_model->get_fixture();		
		
		if($query->num_rows()==0)
		{
			echo "No Match Available for this tournament";
		}
		else
		{
			$data['matches']=$query->result_array();
			$data['step']=0;
			$this->load->view('updateMatch',$data);
		}
	}
	
	public function updateMatchInfo_1()
	{
		$match_id = $_POST['match_id'];
		//Load Match Updater Form
		$data['step']=1;
		$data['match']=$this->match_model->get_match_info($match_id)->row_array();
		$data['tournament_name']=$this->tournament_model->get_active_tournament_name();
		$_SESSION['match_id']=$match_id;
		$this->load->view('updateMatch',$data);
	}
	
	public function updateMatchInfo_proc()
	{
		$t_data['start_time']=$_POST['start_year'].'-'.$_POST['start_month'].'-'.$_POST['start_day'].' '.$_POST['start_hour'].':'.$_POST['start_min'].':'.'00';
		
		$t_data['match_id']=$_SESSION['match_id'];
		
		$data['success']=$this->match_model->update_match($t_data);
		unset($_SESSION['match_id']);
		$this->load->view('status_createTournament',$data);
	}
	
	
	public function updateMatchStat()		//STEP -01 : SELECT MATCH
	{
		$query= $this->tournament_model->get_fixture();		
		
		if($query->num_rows()==0)
		{
			echo "No Match Available for this tournament";
		}
		else
		{
			$data['matches']=$query->result_array();
			$data['step']=0;
			$this->load->view('updateMatchStats',$data);
		}
	}
	
	public function updateMatchStat_1()		//STEP -02 : UPDATE HOME TEAM STATS FORM
	{
		$match_id = $_POST['match_id'];
		//Load Match Updater Form
		$data['step']=1;

		$match=$this->match_model->get_match_info($match_id)->row_array();
		$team['team_id']=$match['home_team_id'];

		//$team['team2_id']=$data['away_team_id'];
		$team['tournament_id']=$this->tournament_model->get_active_tournament_id();
		$_SESSION['match_id']=$match_id;

		$data['team_name']=$match['home_team_name'];
		$data['result']=$this->team_model->get_tournament_team_players($team)->result_array();


		$this->load->view('updateMatchStats',$data);
		
		
	}


	public function updateMatchStat_2()		//STEP-03 : UPDATE AWAY TEAM STATS FORM
	{
		$match_id = $_SESSION['match_id'];
		//Load Match Updater Form
		$data['step']=2;

		$match=$this->match_model->get_match_info($match_id)->row_array();
		$team['team_id']=$match['away_team_id'];

		//$team['team2_id']=$data['away_team_id'];
		$team['tournament_id']=$this->tournament_model->get_active_tournament_id();
		
		
		$data['team_name']=$match['away_team_name'];
		$data['result']=$this->team_model->get_tournament_team_players($team)->result_array();


		$this->load->view('updateMatchStats',$data);
		
		
	}

	public function updateMatchStat_proc($num)		//UPDATE STATS IN DATABASE
	{		
		$i=$_SESSION['noPlayers'];
		$match_id = $_SESSION['match_id'];
		for($count=1;$count<=$i;$count++)
		{
				$score_var="runs_score".$count;
		      	$balls_play_var="balls_played".$count;
		      	$fours_var="fours".$count;
		      	$sixes_var="sixes".$count;
		      	$Wickets_var="wickets".$count;
		      	$balls_bowl_var="balls_bowled".$count;
		      	$runs_con_var="runs_conceded".$count;
		      	$maiden_var="maiden".$count;
		      	$catch_var="catches".$count;
		      	$stump_var="stumping".$count;
		      	$runout_var="run_out".$count;
		      	$id_var="player_id".$count;	
			
			$this->input->post($id_var)."<br>";
			//UPDATE
			$data['runs_scored']=$this->input->post($score_var);
			$data['balls_played']=$this->input->post($balls_play_var);
			$data['fours']=$this->input->post($fours_var);
			$data['sixes']=$this->input->post($sixes_var);	
			$data['wickets_taken']=$this->input->post($Wickets_var);
			$data['balls_bowled']=$this->input->post($balls_bowl_var);
			$data['runs_conceded']=$this->input->post($runs_con_var);
			$data['maiden_overs']=$this->input->post($maiden_var);
			$data['catches']=$this->input->post($catch_var);
			$data['stumpings']=$this->input->post($stump_var);
			$data['run_outs']=$this->input->post($runout_var);

			$data['player_id']=$this->input->post($id_var);
			$data['match_id']=$match_id;
			
			$this->match_model->update_match_points($data);
			
		}

		if($num==0)
		{
			redirect('match/updateMatchStat_2','refresh');
		}
		else if($num==1)
		{
			$this->match_model->update_match_summary($match_id);
			//$this->admin_model->update_motm_point($match_id)			//INSERT MOTM IN FORM AND UPDATE HIS POINT ----->> Remaining Task
			unset(
				$_SESSION['match_id'],
				$_SESSION['noPlayers']
			);
			echo "Done";
		}
		
	}
}