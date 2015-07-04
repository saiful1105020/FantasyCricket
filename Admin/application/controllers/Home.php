<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	 
	 public function __construct()		//DONE
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
	 
	public function index()		//DONE
	{
		if(isset($_SESSION["admin_id"]))
		{
			redirect('/admin', 'refresh');
		}
		else
		{
			
			$data = array(
               'login_error' => false
			);
			$this->load->view('admin-login',$data);
		}
	}
	
	public function login()		//DONE
	{
		
		$data = array('admin_id'=>trim($_POST['admin_id']),'password'=>md5($_POST["password"]));
		
		$query= $this->admin_model->get_loginInfo($data);
		
		if($query->num_rows()==1)
		{
			$loginInfo=$query->row_array();
			
			$_SESSION["admin_id"]=$loginInfo['admin_id'];		// Change user_id to admin_id
			
			//Load User Admin Page
			redirect('/admin', 'refresh');
		}
		else
		{
			$data = array(
               'login_error' => true
			);
			$this->load->view('admin-login',$data);
		}
		
	}
}
