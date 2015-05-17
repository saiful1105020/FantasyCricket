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
			//Redirect to Admin Home Page
			redirect('/admin', 'refresh');
		}
		else
		{
			
			$this->load->view('templates/header');
			
			$data = array(
               'login_error' => false
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
			
			//Load User Admin Page
			redirect('/admin', 'refresh');
		}
		else
		{
			$data = array(
               'login_error' => true
			);
			$this->load->view('templates/header');
			
			$this->load->view('home',$data);
			
		}
		
	}
	
	public function schedules()
	{
		$query= $this->admin_model->get_fixture();		
		
		if($query->num_rows()==0)
		{
			echo "No Fixture Available for this tournament";	//Load No Fixture View
		}
		
		$data= $query->row_array();
		
		print_r($data);				//Load View Fixture  with $data
	}
	
	public function results()
	{
		//echo "Result Test";
		
		$query= $this->admin_model->get_result();		
		
		if($query->num_rows()==0)
		{
			echo "No Result Found for this tournament";	//Load No Fixture View
		}
		
		$data= $query->row_array();
		
		print_r($data);				//Load View Fixture  with $data
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
