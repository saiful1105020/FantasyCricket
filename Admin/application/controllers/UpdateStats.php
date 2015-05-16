q<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UpdateStats extends CI_Controller {

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
	 
	 //private $loginFlag;		//$loginFlag = false show "Login Failed" in the view
	 
	 
	 public function __construct()
     {
          parent::__construct();
		  
		  //Load Necessary Libraries and helpers
          $this->load->library('session');
          $this->load->helper('form');
          $this->load->helper('url');
          $this->load->helper('html');
		  $this->load->library('form_validation');
		  $this->load->model('user_model');
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
				echo "Show Update Stats Page";
			}
			else
			{
				$this->load->view('templates/header');
				
				$data = array(
				   'login_error' => false,
				   'registration_success' => false
				);
				
				$this->load->view('home',$data);
			}
		}
	}
	
	/**
	*Update Player Match Point Table
	*/
	
	/**
	*Update Match Summary
	*/
	
	/**
	*Update User Match Points
	*/
	
	/**
	*Update User Phase Points
	*/
	
	/**
	*Update User InterPhase Points
	*/
	
	/**
	*Update User Overall Points
	*/
}
