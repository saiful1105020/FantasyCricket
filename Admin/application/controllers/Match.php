<?php
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
		echo 'Match Test';
	}
	
	/**
	*Update Match Table
	*/
	
	public function createMatch()
	{
		$data['step']=0;
		
		$query=$this->tournament_model->get_active_tournament_teams();

		$data['teams']=$query->result_array();
		$data['tournament_name']=$this->tournament_model->get_active_tournament_name();
		$data['sameTeam']=false;
		
		$this->load->view('createNewMatch',$data);
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
		$query= $this->admin_model->get_fixture();		
		
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
	
	
	public function updateMatchStat()
	{
		
	}
}