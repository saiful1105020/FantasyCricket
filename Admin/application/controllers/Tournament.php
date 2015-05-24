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
		$this->load->model('player_model');
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
	
	/*
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
	*/
	
	public function createTournament()
	{
		
		$query=$this->tournament_model->view_tournament();

		$data['tournaments']=$query->result_array();

		$this->load->view('createTournament',$data);
		//echo 'Create Tournament Here';
		//Load Create Tournament View
	}
	
	public function createTournament_proc()
	{
		$t_data['tournament_id']='';
		$t_data['tournament_name']=trim($this->input->post('tournament_name'));
		$t_data['start_date']=$_POST['start_year'].'-'.$_POST['start_month'].'-'.$_POST['start_day'];
		$t_data['end_date']=$_POST['end_year'].'-'.$_POST['end_month'].'-'.$_POST['end_day'];
		$t_data['is_active']='';
		$t_data['icon']='';				//Get the link of the image icon
		$t_data['is_complete']='';
		
		$data['success']=$this->tournament_model->create_tournament($t_data);
		
		$this->load->view('status_createTournament',$data);
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
		$query=$this->tournament_model->get_all_tournaments();
		$data['tournaments']=$query->result_array();
		$data['step']=0;
		$this->load->view('updateTournamentTeams',$data);
	}

	public function updateTournamentTeam_1()
	{
		$tournament_id = $_POST['tournament_id'];
		$data['tournament_name']=$this->tournament_model->get_tournament_name($tournament_id);

		$data['step']=1;
		
		
		$query=$this->team_model->get_all_teams();

		$data['teams']=$query->result_array();
		
		$userdata=array('tournament_id'=>$tournament_id,'teams'=>$data['teams']);
		$this->session->set_userdata($userdata);
		
		$this->load->view('updateTournamentTeams',$data);
	}

	public function updateTournamentTeam_2()
	{
		$teams=$_SESSION['teams'];
		$tournament_id = $_SESSION['tournament_id'];
		
		foreach ($teams as $tm)
		{
			$tid=$tm['team_id'];
			
			if(isset($_POST[$tid]))
			{
				$this->tournament_model->add_tournament_team($tournament_id,$tid);
			}
			else
			{
				$this->tournament_model->delete_tournament_team($tournament_id,$tid);
			}
		}
		
		unset($_SESSION['tournament_id'],$_SESSION['teams']);
		
		redirect('team/create_team_success','refresh');
	}
	
	public function activeTournament()
	{
		$query=$this->tournament_model->view_tournament();

		$data['tournaments']=$query->result_array();

		$this->load->view('activeTournament',$data);
		//echo 'Select Active Tournament Here';
	}

	public function activeTournament_proc()
	{
		
		$t_id = $_POST['tournament'];
		$this->tournament_model->update_active_tournament($t_id);


		//echo 'Select Active Tournament Here';
	}
}