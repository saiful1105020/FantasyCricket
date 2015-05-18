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
		
	}
	
	public function updateMatchInfo()
	{
		
	}
	
	public function deleteMatch()
	{
		
	}
	
	public function updateMatchStat()
	{
		
	}
}