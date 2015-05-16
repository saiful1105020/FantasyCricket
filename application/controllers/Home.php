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
		  $this->load->model('user_model');
     }
	 
	public function index()
	{
		if(isset($_SESSION["user_id"]))
		{
			//Comment The 'echo's 
			//Redirect To Homepage
			
			//echo 'Already Logged In. </br>';
			//echo 'Welcome :D </br>'.$_SESSION['user_name'].'</br>';
			
			redirect('/user', 'refresh');
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
	
	public function login()
	{
		
		$data = array('email'=>trim($_POST['email']),'password'=>md5($_POST["password"]));
		
		$query= $this->user_model->get_loginInfo($data);
		
		if($query->num_rows()==1)
		{
			$loginInfo=$query->row_array();
			
			$_SESSION["user_id"]=$loginInfo['user_id'];
			$_SESSION["user_name"]=$loginInfo['user_name'];
			
			
            //echo 'Success </br>';
			//echo 'Welcome :D </br>'.$_SESSION['user_name'].'</br>';
			//Load User Home Page
			redirect('/user', 'refresh');
		}
		else
		{
			$data = array(
               'login_error' => true,
			   'registration_success' => false
			);
			$this->load->view('templates/header');
			
			$this->load->view('home',$data);
			
		}
	}
	
	public function register()
	{
		if(isset($_SESSION["user_id"]))
		{
			//Comment The 'echo's 
			//Redirect To Homepage
			echo 'Already Logged In. </br>';
			echo 'Welcome :D </br>'.$_SESSION['user_name'].'</br>';
		}
		else
		{
			$data=array(
				'password_match_error' => false,
				'already_exist_error'=> false
			);
			$this->load->view('templates/header');
			$this->load->view('registration',$data);
		}

	}
	
	/**
	*	Add An Admin
	*	Predefined
	public function register_admin()
	{
		$data['admin_id'] ="Admin";
		$data['password'] =md5("admin");
		
		$this->user_model->register_admin($data);
		
		echo "Admin Added";
				
	}
	*/
	
	public function register_proc()
	{
			$pass=md5($this->input->post('password'));
			$conpass=md5($this->input->post('confirm_password'));

			if($pass!=$conpass)
			{
				$data=array(
				'password_match_error' => true,
				'already_exist_error'=> false
				);
				$this->load->view('templates/header');
				$this->load->view('registration',$data);
				//echo 'Password and confirm_password Not Matched';
			}
			
			else
			{
				$data['user_id'] ='';

				$data['user_name'] =trim($this->input->post('user_name'));
				$data['email'] =trim($this->input->post('email'));
				$data['password'] =$pass;
				
				if(isset($_POST['birthday']) && !empty($_POST['birthday'])) $data['birthday'] =$this->input->post('birthday');
				else $data['birthday'] ='';

				if(isset($_POST['country']) && !empty($_POST['country'])) $data['country'] =$this->input->post('country');
				else $data['country'] ='';


				$exists= $this->user_model->exist_user($data['email']);

				if($exists==1)
				{
					$data=array(
					'password_match_error' => false,
					'already_exist_error'=> true
					);
					$this->load->view('templates/header');
					$this->load->view('registration',$data);
					
					//echo '</br> User Already Exists';
				}
				else
				{
					$this->user_model->register($data);
					$data = array(
					   'login_error' => false,
					   'registration_success' => true
					);
					$this->load->view('templates/header');
					
					$this->load->view('home',$data);
					
					//echo '</br> Registered Successfully';
				}
				
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
