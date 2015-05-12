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
	 
	 public function __construct()
     {
          parent::__construct();
          $this->load->library('session');
          $this->load->helper('form');
          $this->load->helper('url');
          $this->load->helper('html');
		  $this->load->library('form_validation');
          
		  //$this->load->database();
     }
	 
	public function index()
	{
		if(isset($_SESSION["user_id"]))
		{
			//Redirect To Homepage
			echo 'Already Logged In. </br>';
			echo 'Welcome :D </br>'.$_SESSION['user_name'].'</br>';
			//Load Success Page
		}
		else
		{
			$this->load->view('home');
			//Form Validation Required
		}
	}
	
	public function login()
	{
		$this->load->model('user_model');
		
		$data = array('email'=>trim($_POST['email']),'password'=>md5($_POST["password"]));
		
		$query= $this->user_model->get_loginInfo($data);
		
		if($query->num_rows()==1)
		{
			$loginInfo=$query->row_array();
			
			$_SESSION["user_id"]=$loginInfo['user_id'];
			$_SESSION["user_name"]=$loginInfo['user_name'];
			
			
            //header("Location:home.php");
			echo 'Success </br>';
			echo 'Welcome :D </br>'.$_SESSION['user_name'].'</br>';
			//Load Success Page
			
		}
		else
		{
			echo 'Failue';
			//Load Failure Message
			
		}
	}
	
	public function register()
	{
		echo "Register Test";
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
