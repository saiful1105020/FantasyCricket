<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	  
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
		
		//$data['active_page']='home';
		/**
		*	OTHER OPTIONS:
		*	->tournament
		*	->phase
		*	->match
		*	->schedule
		*	->result
		*/
		
		$this->load->view('templates/header');
     }
	 
	/**
	*	ADMIN HOME PAGE
	*/
	public function index()
	{
		/**	Get Current Tournament Name		
		*	$data['tournament_name'];
		*/
		
		$query= $this->tournament_model->get_active_tournament();
		
		if($query->num_rows()==0)
		{
			echo 'No Active Tournament';
		}
		else
		{
			$result=$query->row_array();
			$data['tournament_name']=$result['tournament_name'];	//Current Tournament Name
			
			$tournament_id=$result['tournament_id'];				//Current Tournament ID
			
			/**
			*	Get Upcoming Match Which has not been initiated by admin	
			*	$data['home_team'], $data['away_team']
			*	After initiation, all tables that requires a match instance are created
			*/
			
			$query= $this->tournament_model->get_upcoming_match($tournament_id);
			
			if($query->num_rows()==0)
			{
				$data['home_team']='';				//Home Team ID -> Get Team Name Using Team Model
				$data['away_team']='';				//Away Team ID -> Get Team Name Using Team Model
				$data['match_id']='';
			}
			else
			{
				$result=$query->row_array();
				$data['home_team']=$this->team_model->get_team_name($result['team1_id']);				//Home Team ID -> Get Team Name Using Team Model
				$data['away_team']=$this->team_model->get_team_name($result['team2_id']);				//Away Team ID -> Get Team Name Using Team Model
				$data['match_id']=$result['match_id'];
			}
			
			/**
			*	Get Recent 2 Phases Which Are Either Not Started Or Not Finished
			*	$data['phases'] = array($phase1,$phase2);
			*/
			
			$query= $this->tournament_model->get_upcoming_phase($tournament_id);
			
			if($query->num_rows()==0)
			{
				$data['upcoming_phase']='';
				$data['phase_id']='';
			}
			else
			{
				$result=$query->row_array();
				$data['upcoming_phase']=$result['phase_name'];
				$data['phase_id']=$result['phase_id'];
			}
			
			/**
			*
			*/
			/*
			$query= $this->tournament_model->get_last_completed_phase($tournament_id);
			
			if($query->num_rows()==0)
			{
				$data['completed_phase']='';
			}
			else
			{
				$result=$query->row_array();
				$data['completed_phase']=$result['phase_name'];											
			}
			*/
			
			$this->load->view('admin_home',$data);
		}
		
	}
	
	public function logout()
	{
		//Stop Session
		$this->session->sess_destroy();
		
		//Redirect To Homepage
		redirect('/home', 'refresh');
	}
	
	public function schedules()
	{
		$query= $this->admin_model->get_fixture();		
		
		if($query->num_rows()==0)
		{
			echo "No Fixture Available for this tournament";	//Load No Fixture View
		}
		
		//echo $query->num_rows().'<br/>';
		$data['fixture']=$query->result_array();
		
		/*
		foreach($data['fixture'] as $row)
		{
			print_r($row);				//Load View Fixture  with $data
			echo '<br/>';
		}
		*/
		
		$this->load->view('schedule',$data);
	}
	
	public function results()
	{
		//echo "Result Test";
		
		$query= $this->admin_model->get_result();		
		
		if($query->num_rows()==0)
		{
			echo "No Result Found for this tournament";	//Load No Fixture View
		}
		
		foreach ($data=$query->result_array() as $row)
		{
			print_r($row);				//Load View Fixture  with $data
			echo '<br/>';
		}
	}
	
	public function start_phase_action($phase_id)
	{
		$query= $this->admin_model->start_phase($phase_id);
		$data['success']=1;
		$this->load->view('success_status',$data);
	}
	
	public function start_match_action($match_id)
	{
		echo $match_id;
		$query= $this->admin_model->start_match($match_id);
		//$query = $this->match_model->create_player_match_points(43, 4);
		$data['success']=1;
		$this->load->view('success_status',$data);
	}
	
	public function test($param)
	{
		$this->team_model->get_tournament_team_players($paramm);
	}
	
}