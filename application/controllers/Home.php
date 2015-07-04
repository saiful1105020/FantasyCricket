<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	 
	 public function __construct() 
     {
          parent::__construct();
		  
		  //1. Load Necessary Libraries and helpers
          
		  $this->load->library('session');
          $this->load->helper('form');
          $this->load->helper('url');
          $this->load->helper('html');
		  $this->load->library('form_validation');
		  
		  //2. Load Models
		  $this->load->model('user_model');
		  
		  //3. Load Template
		  $this->load->view('templates/header');
     }
	 
	public function index()	
	{
		if(isset($_SESSION["user_id"]))
		{			
			redirect('/user', 'refresh');
		}
		else
		{
			
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
			
			redirect('/user', 'refresh');
		}
		else
		{
			$data = array(
               'login_error' => true,
			   'registration_success' => false
			);
			$this->load->view('home',$data);
		}
	}
	
	public function register()	
	{
		if(isset($_SESSION["user_id"]))
		{
			redirect('/user', 'refresh');
		}
		else
		{
			$data=array(
				'password_match_error' => false,
				'already_exist_error'=> false
			);
			$this->load->view('registration',$data);
		}
	}
	
	
	public function register_proc()					//NEED TO SOLVE SOME DESIGN ISSUE(VIEW)
	{
			$pass=md5($this->input->post('password'));
			$conpass=md5($this->input->post('confirm_password'));

			if($pass!=$conpass)
			{
				$data=array(
				'password_match_error' => true,
				'already_exist_error'=> false
				);
				$this->load->view('registration',$data);
			}
			
			else
			{
				$data['user_id'] ='';

				$data['user_name'] =trim($this->input->post('user_name'));
				$data['email'] =trim($this->input->post('email'));
				$data['password'] =$pass;
				
				if(isset($_POST['day'])&&isset($_POST['month'])&&isset($_POST['year']))
				{
					$day=$_POST['day'];
					$month=$_POST['month'];
					$year=$_POST['year'];
					$data['birthday']=$year.'-'.$month.'-'.$day;
				}
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
					$this->load->view('registration',$data);					
				}
				else
				{
					$this->user_model->register($data);
					$data = array(
					   'login_error' => false,
					   'registration_success' => true
					);
					
					$this->load->view('home',$data);	
				}
			}
			
	}
	
	public function schedules()		//LATER
	{
		echo "Schedule Test";
	}
	
	public function results()		//LATER
	{
		echo "Result Test";
	}
	
	public function pointTable()	//LATER
	{
		echo "pointTable Test";
	}
	
	public function howToPlay()		//LATER
	{
		echo "howToPlay Test";
	}
	
	public function rules()			//LATER
	{
		echo "Rules Test";
	}
	
	public function scoring()		//LATER
	{
		echo "scorings Test";
	}
	
}
