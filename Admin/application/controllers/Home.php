<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		  
		  //Load Admin Model
		  $this->load->model('admin_model');
     }
	 
	public function index()
	{
		if(isset($_SESSION["admin_id"]))
		{
			//Comment The 'echo's 
			//Redirect To Homepage
			
			echo 'Already Logged In. </br>';
			echo 'Welcome :D </br>'.$_SESSION['admin_id'].'</br>';
		}
		else
		{
			
			$this->load->view('templates/header');
			
			$data = array(
               'login_error' => false
			   //'registration_success' => false
			);
			
			$this->load->view('home',$data);
		}
	}
	
	public function login()
	{
		
		$data = array('admin_id'=>trim($_POST['admin_id']),'password'=>md5($_POST["password"]));
		
		$query= $this->admin_model->get_loginInfo($data);
		
		if($query->num_rows()==1)
		{
			$loginInfo=$query->row_array();
			
			$_SESSION["admin_id"]=$loginInfo['admin_id'];		// Change user_id to admin_id
			//$_SESSION["admin_name"]=$loginInfo['user_name'];	// Change user_name to admin_name
			
			
            //echo 'Success </br>';
			//echo 'Welcome :D </br>'.$_SESSION['user_name'].'</br>';
			//Load User Home Page
			redirect('/admin', 'refresh');
		}
		else
		{
			$data = array(
               'login_error' => true
			   //'registration_success' => false
			);
			$this->load->view('templates/header');
			
			$this->load->view('home',$data);
			
		}
		
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
