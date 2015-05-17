<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
			$this->load->view('user_home');
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
	
	public function logout()
	{
		//Stop Session
		$this->session->sess_destroy();
		
		//Redirect To Homepage
		redirect('/home', 'refresh');
	}
	
	public function changePassword()
	{
		
	}
	
	public function editProfile()
	{
	
	}
	
	public function viewTeam()
	{
	
	}
	
	public function changeTeam()
	{
	
	}
	
	public function changeCaptain()
	{
	
	}
	
	public function schedules()
	{
		echo "Schedule Test";
	}
	
	public function results()
	{
		echo "Result Test";
	}
	
	public function pointTable()
	{
		echo "pointTable Test";
	}
	
	public function howToPlay()
	{
		echo "howToPlay Test";
	}
	
	public function rules()
	{
		echo "Rules Test";
	}
	
	public function scoring()
	{
		echo "scorings Test";
	}
	
}