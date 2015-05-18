<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tournament extends CI_Controller {

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
		
		//$data['active_page']='tournament';
		
		$this->load->view('templates/header');
		//echo 'Tournament Test';
     }
	 
	/**
	*	ADMIN HOME PAGE
	*/
	public function index()
	{
		echo 'Tournament Test';
	}
	
	
	/**
	*Update Tournament Table
	*/
	public function viewTournament()
	{
		$query=$this->tournament_model->view_tournament();
		if($query->num_rows()==0)
		{
			//Load Message
			echo 'No Tournament Exist';
		}
		$data=$query->row_array();
		print_r($data);
		//Load View
	}
	
	public function createTournament()
	{
		echo 'Create Tournament Here';
		//Load Create Tournament View
	}
	
	public function createTournament_proc()
	{
		$data['tournament_id']='';
		$data['tournament_name']=trim($this->input->post('tournament_name'));
		$data['start_date']=$this->input->post('start_date');
		$data['end_date']=$this->input->post('end_date');
		$data['is_active']=$this->input->post('is_active');
		$data['icon']=$this->input->post('icon');				//Get the link of the image icon
		$data['is_complete']=$this->input->post('is_complete');
		
		$success=$this->admin_model->create_tournament($data);
		
		if($success) echo 'Success';	//Reload createTournament view with success message
		else echo 'Failed';				//Reload createTournament view with failure message
	}
	
	public function deleteTournament()
	{
		//Load View
	}
	
	public function deleteTournament_proc()
	{
		//Delete Entries From all 4 tournament related tables.
		//Using a trigger can be cute
	}
	
	public function editTournamentInfo()
	{
		//Load View
	}
	
	public function editTournamentInfo_proc()
	{
		//Update Tournament Table
	}
	
	public function addTournamentTeam()
	{
		
	}
	
	public function deleteTournamentTeam()
	{
		
	}
	
	public function updateTournamentTeam()
	{
		echo 'Update: Test';
	}
	
	public function addTournamentTeam_proc()
	{
		
	}
	
	public function activeTournament()
	{
		echo 'Select Active Tournament Here';
	}
}