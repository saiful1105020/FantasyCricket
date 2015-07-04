<?php
/**
	LAST MODIFIED : 29-06-2015 04:02 PM
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	  
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
		
		
		$this->load->view('templates/header');
     }
	 
	/**
	*	ADMIN HOME PAGE
	*/
	
	public function index()			//DONE
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
			
			$query= $this->match_model->get_upcoming_match($tournament_id);
			
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
			
			$this->load->view('admin_home',$data);
		}
		
	}
	
	public function logout()	//DONE
	{
		//Stop Session
		$this->session->sess_destroy();
		
		//Redirect To Homepage
		redirect('/home', 'refresh');
	}
	
	public function schedules()	//DONE
	{
		$query= $this->tournament_model->get_fixture();		
		
		if($query->num_rows()==0)
		{
			echo "No Fixture Available for this tournament";	//Load No Fixture View
		}
		
		$data['fixture']=$query->result_array();
		
		$this->load->view('schedule',$data);
	}
	
	public function results()	//DONE
	{
		$query= $this->tournament_model->get_result();		
		
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
	
	public function start_phase_action($phase_id)	//DONE
	{
		$query= $this->admin_model->start_phase($phase_id);
		$data['success']=1;
		$this->load->view('success_status',$data);
		
		/* ASSIGN FREE TRANSFER FOR EACH USER
		*/
	}
	
	public function start_match_action($match_id)
	{
		echo $match_id;
		$query= $this->admin_model->start_match($match_id);
		$data['success']=1;
		$this->load->view('success_status',$data);
	}
	
}