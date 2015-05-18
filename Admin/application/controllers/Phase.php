<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Phase extends CI_Controller {
 
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
		
		//$data['active_page']='phase';
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
	 
	public function index()
	{
		echo 'Test Phase';
	}
	
	/**
	* Update Phase Table
	*/
	
	
	public function addPhases()
	{
		echo 'Add Phases Test';
	}
	
	public function addPhases_proc()
	{
		echo 'Add Phases Test';
	}
	
	public function deletePhase()
	{
	
	}
	
	public function deletePhase_proc()
	{
	
	}
	public function updatePhases()
	{
		echo 'Update Phases Test';
	}
	
	public function updatePhases_proc()
	{
	
	}
	
	public function changePhaseInterval()
	{
	
	}
	
	/**
	* Update Inter-Phase Table
	*/
	public function addInterPhase()
	{
	
	}
	
	public function deleteInterPhase()
	{
	
	}
	
	public function updateInterPhase()
	{
		echo 'Inter.. Test';
	}
}