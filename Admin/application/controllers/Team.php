<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller {
		  
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
		//$data['active_page']='team';
		
		$this->load->view('templates/header');
    }
	
	
	public function index()
	{
		redirect('team/createTeam');
	}
	
	/**
	*	USE CASE:: CREATE A TEAM
	*/
	
	public function createTeam()
	{
		if(isset($_POST['players']) && isset($_POST['team_name']))
		{
			$data['players']=$this->input->post('players');
			$data['team_name']=$this->input->post('team_name');

			$teamInfo = array(
			        'players'  => $data['players'],
			        'team_name'=>$data['team_name']
			);

			$this->session->set_userdata($teamInfo);

			$team_data['team_id']='';
			$team_data['team_name']=$data['team_name'];
			$team_data['jersy_image']='';

			if(!$this->team_model->create_team($team_data))
			{
					redirect('team/create_team_failure','refresh');
			}
			else $this->load->view('admin_addTeam',$data);
		}

		else
		{
			$data['players']=0;
			$data['team_name']='';

			$this->load->view('admin_addTeam',$data);	
		}
		//echo 'create test';
	}
	
	public function createTeam_proc()
	{
		$team = $_SESSION['team_name'];
		$team_id=$this->team_model->get_team_id($team);

		$count=$_SESSION['players'];
		for($i=1;$i<=$count;$i++)
		{
			$name = 'name'.$i;
			$cat = 'cat'.$i;
			$price = 'price'.$i;

			$player_data['player_id']='';
			$player_data['price']=$this->input->post($price);
			$player_data['player_cat']=$this->input->post($cat);
			$player_data['name']=$this->input->post($name);
			$player_data['team_id']=$team_id;
			$player_data['image']='';

			if(!$this->player_model->add_player($player_data))
			{
				redirect('team/create_team_failure','refresh');
			}
		}

		unset(
				$_SESSION['team_name'],
				$_SESSION['players']
			);

		redirect('team/create_team_success','refresh');

	}

	public function create_team_failure()
	{
		$data['success']=false;
		$this->load->view('status_createTeam',$data);		
	}

	public function create_team_success()
	{
		$data['success']=true;
		$this->load->view('status_createTeam',$data);		
	}

	/**
	*	USE CASE:: CHANGE TEAM INFO
	*/
	
	public function changeTeamInfo()
	{
	
	}
	
	/**
	*	USE CASE:: ADD NEW PLAYER
	*/
	
	public function addPlayer()
	{
		//Select any of the existing Teams
		//$result=$this->tournament_model->get_active_tournament()->row_array();
		//$tournament_id=$result['tournament_id'];
		$query=$this->team_model->get_all_teams();

		$data['teams']=$query->result_array();
		$data['step']=0;
		$this->load->view('addPlayer',$data);
	}
	
	public function addPlayer_1()
	{
		$team_id = $_POST['team_id'];
		$data['team_name']=$this->team_model->get_team_name($team_id);

		$data['step']=1;
		
		$userdata=array('team_id'=>$team_id);
		$this->session->set_userdata($userdata);
		
		$query=$this->team_model->get_team_players($team_id);

		$data['players']=$query->result_array();
		$this->load->view('addPlayer',$data);
		
		/*
		foreach ($data['players'] as $pl)
		{
			echo $pl['name'].'<br/>';
		}
		*/
	}
	
	public function addPlayer_2()
	{
		$player_data['player_id']='';
		$player_data['price']=$this->input->post('price');
		$player_data['player_cat']=$this->input->post('player_cat');
		$player_data['name']=$this->input->post('player_name');
		$player_data['team_id']=$_SESSION['team_id'];
		$player_data['image']='';

		unset($_SESSION['team_id']);
		if(!$this->player_model->add_player($player_data))
		{
			redirect('team/add_player_failure','refresh');
		}
		else redirect('team/add_player_success','refresh');
	}
	
	
	public function add_player_failure()
	{
		$data['success']=false;
		$this->load->view('status_addPlayer',$data);		
	}

	public function add_player_success()
	{
		$data['success']=true;
		$this->load->view('status_addPlayer',$data);		
	}

	/**
	*	USE CASE:: CHANGE PLAYER INFO
	*/
	
	public function changePlayerInfo()
	{
	
	}
	
	/**
	*	USE CASE:: UPDATE TEAM SHEET
	*/
	
	public function updateTeamSheet()
	{
		$tid=$this->tournament_model->get_active_tournament_id();
		if($tid==NULL)
		{
			echo 'No Active Tournament';
		}
		else
		{
			$query=$this->tournament_model->get_active_tournament_teams();
			$data['teams']=$query->result_array();
			$data['step']=0;
			$this->load->view('updateTeamSheet',$data);
			//echo 'updateTeamSheet';
		}
	}

	public function updateTeamSheet_1()
	{
		$team_id = $_POST['team_id'];
		$data['team_name']=$this->team_model->get_team_name($team_id);

		$data['step']=1;
		
		
		$query=$this->team_model->get_team_players($team_id);

		$data['players']=$query->result_array();
		
		$userdata=array('team_id'=>$team_id,'players'=>$data['players']);
		$this->session->set_userdata($userdata);
		
		$this->load->view('updateTeamSheet',$data);
	}

	public function updateTeamSheet_2()
	{
		$players=$_SESSION['players'];
		
		foreach ($players as $pl)
		{
			$pid=$pl['player_id'];
			
			if(isset($_POST[$pid]))
			{
				$this->tournament_model->add_tournament_player($pid);
			}
			else
			{
				$this->tournament_model->delete_tournament_player($pid);
			}
		}
		
		unset($_SESSION['team_id'],$_SESSION['players']);
		
		redirect('team/add_player_success','refresh');
	}
	
}