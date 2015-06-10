<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Phase extends CI_Controller {
 
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
		
		//$data['active_page']='phase';
		/**
		*	OTHER OPTIONS:
		*	->tournament
		*	->phase
		*	->match
		*	->schedule
		*	->result
		*/
		
		$this->load->view('templates/header');
     }
	 
	public function index()
	{
		echo 'Test Phase';
	}
	
	/**
	* Update Phase Table
	*/
	
	
	public function addPhases()
	{
	
		if(isset($_POST['phases']) && isset($_POST['tournament_name']))
		{
			$data['phases']=$this->input->post('phases');
			$data['tournament_id']=$this->input->post('tournament_name');
			$data['tournament_name']=$this->tournament_model->get_tournament_name($data['tournament_id']);

			
			$tournamentInfo = array(
			        'phases'  => $data['phases'],
					'tournament_id'=>$data['tournament_id'],
			        'tournament_name'=>$data['tournament_name']
			);

			$this->session->set_userdata($tournamentInfo);
			
			$this->load->view('admin_addPhase',$data);
		}

		else
		{
			$data['phases']=0;
			$data['tournament_name']='';
			
			$query=$this->tournament_model->view_tournament();
			$data['tournaments']=$query->result_array();

			$this->load->view('admin_addPhase',$data);	
		}
		
		//echo 'Add Phases Test';
	}
	
	public function addPhases_proc()
	{
		$tournament_id=$_SESSION['tournament_id'];
		$count=$_SESSION['phases'];
		
		for($i=1;$i<=$count;$i++)
		{
			$name = 'name'.$i;
			
			$ft="ft".$i;
			
			$start_day="start_day".$i;
			$start_month="start_month".$i;
			$start_year="start_year".$i;
			$start_hour="start_hour".$i;
			$start_min="start_min".$i;
		
			$end_day="end_day".$i;
			$end_month="end_month".$i;
			$end_year="end_year".$i;
			$end_hour="end_hour".$i;
			$end_min="end_min".$i;

			$phase_data['phase_id']='';
			$phase_data['phase_name']=$this->input->post($name);
			
			$start_day=$this->input->post($start_day);
			$start_month=$this->input->post($start_month);
			$start_year=$this->input->post($start_year);
			$start_hour=$this->input->post($start_hour);
			$start_min=$this->input->post($start_min);
			$phase_data['start_time']=$start_year.'-'.$start_month.'-'.$start_day.' '.$start_hour.':'.$start_min.':'.'00';
		
			$end_day=$this->input->post($end_day);
			$end_month=$this->input->post($end_month);
			$end_year=$this->input->post($end_year);
			$end_hour=$this->input->post($end_hour);
			$end_min=$this->input->post($end_min);
			$phase_data['finish_time']=$end_year.'-'.$end_month.'-'.$end_day.' '.$end_hour.':'.$end_min.':'.'00';
			
			$phase_data['free_transfers']=$this->input->post($ft);
			$phase_data['tournament_id']=$tournament_id;
			$phase_data['is_started']='';
			$phase_data['is_complete']='';
						
			if(!$this->tournament_model->add_tournament_phase($phase_data))
			{
				redirect('team/create_team_failure','refresh');			//CREATE PHASE FAILURE
			}
		}

		unset(
				$_SESSION['tournament_id'],
				$_SESSION['tournament_name'],
				$_SESSION['phases']
			);

		redirect('team/create_team_success','refresh');					//CREATE PHASE SUCCESS
	}
	
	public function deletePhase()
	{
	
	}
	
	public function deletePhase_proc()
	{
	
	}
	public function updatePhases()
	{
		$query=$this->tournament_model->view_tournament();
		$data['tournaments']=$query->result_array();
		$data['step']=0;
		$this->load->view('updatePhase',$data);
	}
	
	public function updatePhases_proc()
	{
			$data['tournament_id']=$this->input->post('tournament_id');
			$result=$this->tournament_model->get_tournament_info($data['tournament_id']);
			//$data['tournament_name']=$this->tournament_model->get_tournament_name($data['tournament_id']);
			$data['tournament_name']=$result['tournament_name'];
			$data['start_date']=$result['start_date'];
			$data['end_date']=$result['end_date'];
			$data['match']='';
			$data['step']=1;
			$data['phases']=$this->tournament_model->get_phase_info($data['tournament_id']);

			
			$tournamentInfo = array(
			        'tournament_id'=>$data['tournament_id'],
			        'tournament_name'=>$data['tournament_name']
			);
			

			$this->session->set_userdata($tournamentInfo);
			
			$this->load->view('updatePhase',$data);
	}
	
	public function updatePhases_proc2()
	{
		$tournament_id=$_SESSION['tournament_id'];
		$phases=$this->tournament_model->get_phase_info($tournament_id);
		
		$i=0;
		foreach($phases as $p)
		{
			$i++;
			$name = 'name'.$i;
			
			$ft="ft".$i;
			
			$start_day="start_day".$i;
			$start_month="start_month".$i;
			$start_year="start_year".$i;
			$start_hour="start_hour".$i;
			$start_min="start_min".$i;
			$start_am_pm="start_am_pm".$i;
		
			$end_day="end_day".$i;
			$end_month="end_month".$i;
			$end_year="end_year".$i;
			$end_hour="end_hour".$i;
			$end_min="end_min".$i;
			$end_am_pm="end_am_pm".$i;

			$phase_data['phase_id']=$p['phase_id'];
			$phase_data['phase_name']=$this->input->post($name);
			
			$day=$this->input->post($start_day);
			$month=$this->input->post($start_month);
			$year=$this->input->post($start_year);
			$hour=$this->input->post($start_hour);
			$min=$this->input->post($start_min);
			$am_pm=$this->input->post($start_am_pm);
			$phase_data['start_time']=$year.'-'.$month.'-'.$day.' '.$hour.':'.$min.':'.'00'.' '.$am_pm;
			
			echo "<br>";
		
			$end_day=$this->input->post($end_day);
			$end_month=$this->input->post($end_month);
			$end_year=$this->input->post($end_year);
			$end_hour=$this->input->post($end_hour);
			$end_min=$this->input->post($end_min);
			$end_am_pm = $this->input->post($end_am_pm);
			echo $phase_data['finish_time']=$end_year.'-'.$end_month.'-'.$end_day.' '.$end_hour.':'.$end_min.':'.'00'.' '.$end_am_pm;
			
			$phase_data['free_transfers']=$this->input->post($ft);
			$phase_data['tournament_id']=$tournament_id;
			$phase_data['is_started']='';
			$phase_data['is_complete']='';
			
			if(!$this->tournament_model->update_tournament_phase($phase_data))
			{
				redirect('team/create_team_failure','refresh');			//CREATE PHASE FAILURE
			}
		}

		unset(
				$_SESSION['tournament_id'],
				$_SESSION['tournament_name']
			);

		redirect('team/create_team_success','refresh');					//CREATE PHASE SUCCESS
	}
	
	public function changePhaseInterval()
	{
	
	}
	
	public function test_pl_sql()
	{
		print_r ($this->tournament_model->test());
	}
	
	/**
	* Update Inter-Phase Table
	*/
	public function addInterPhase()
	{
	
	}
	
	public function deleteInterPhase()
	{
	
	}
	
	public function updateInterPhase()
	{
		echo 'Inter.. Test';
	}
}