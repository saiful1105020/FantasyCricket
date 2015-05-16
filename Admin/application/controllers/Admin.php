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
		  
		  $this->load->model('admin_model');
     }
	 
	public function index()
	{
		if(isset($_SESSION["user_id"]))
		{
			echo "Please Log out from your user account. ";
		}
		else
		{
			if(isset($_SESSION["admin_id"]))
			{
				echo "Show Admin Home Page";
				//Load Homepage View
			}
			else	//Admin is not logged in as a user && Admin session is not set
			{
				$this->load->view('templates/header');
				
				$data = array(
				   'login_error' => false
				);
				
				$this->load->view('home',$data);
			}
		}
	}
	
	public function logout()
	{
		//Stop Session
		$this->session->sess_destroy();
		
		//Redirect To Homepage
		redirect('/home', 'refresh');
	}
	
	/**
	*Update Match Table
	*/
	public function addMatch()
	{
		
	}
	
	public function changeMatchTime()
	{
		
	}
	
	public function deleteMatch()
	{
	
	}
	
	
	/**
	*Update Tournament Table
	*/
	
	public function addTournament()
	{
	
	}
	
	public function deleteTournament()
	{
	
	}
	public function changeTournamentName()
	{
	
	}
	
	/**
	*Update Team Table
	*/
	public function addTeam()
	{
	
	}
	
	public function deleteTeam()
	{
	
	}
	public function changeTeamName()
	{
	
	}
	
	/**
	*Update Player Table
	*/
	public function addPlayer()
	{
	
	}
	
	public function deletePlayer()
	{
	
	}
	
	public function changePlayerName()
	{
	
	}
	
	/**
	* Update Phase Table
	*/
	public function addPhase()
	{
	
	}
	
	public function deletePhase()
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
	
	public function changeInterPhaseInterval()
	{
	
	}
}