<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AutoUpdates extends CI_Controller {

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
	*	Auto Update Player Match Point Table 
	*
	*	Time: Start of every match
	*/
	
	/**
	*	Update User Match Points
	*
	*	Time: End of every match
	*/
	
	/**
	*	Update User Phase Points
	*
	*	Time: End of every phase
	*/
	
	/**
	*	Update User InterPhase Points
	*
	*	Time: End of every inter-phase
	*/
	
	/**
	*	Update User Overall Points
	*
	*	End of every match
	*/
}
