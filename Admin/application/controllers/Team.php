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
		
		//$data['active_page']='team';
		
		$this->load->view('templates/header');
     }
	
	
	public function index()
	{
		
	}
	
	public function createTeam()
	{
		echo 'create test';
	}
	
	public function changeTeamInfo()
	{
	
	}
	
	/**
	*Update Player Table
	*/
	
	public function addPlayer()
	{
		echo 'Add Player Test';
	}
	
	public function changePlayerInfo()
	{
	
	}
	
	public function updateTeamSheet()
	{
		echo 'updateTeamSheet';
	}
}