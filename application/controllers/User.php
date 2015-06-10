<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	 	 
	 public function __construct()
     {
          parent::__construct();

         if(isset($_SESSION["user_id"]))
		{
			$this->load->view('user_home');
		}
		else
		{
			$this->load->view('templates/header2');
		}
		  
		$this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('html');
		$this->load->library('form_validation');
		$this->load->model('user_model');
		$this->load->model('team_model');
		$this->load->model('player_model');
		$this->load->model('tournament_model');
     }
	 
	public function index()
	{
		$query=$this->tournament_model->get_active_tournament();
		if($query->num_rows()==0)
		{
			//$this->load->view('templates/header2');
			echo 'No Active Tournament.';
		}
		else
		{
				
			$var=$this->user_model->exist_tournament_user($_SESSION['user_id']);
			
			if($var===0)
			{
				redirect('user/createTeam','refresh');
			}
			else
			{
				redirect('user/view_team','refresh');
			}
			//redirect('user/view_team','refresh');
		}
		
	}
	
	public function view_team()
	{
		$data = array(
               'login_error' => false,
			   'registration_success' => false
			);
			
		//$data['user_team'] :: LOAD USER TEAM
		//echo $_SESSION['user_id'];
		$user_team=$this->user_model->get_user_match_team($_SESSION['user_id']);
		if($user_team==NULL)
		{
			echo 'No Previous Team';
		}
		else
		{
			//print_r($user_team);
			$data['user_team']=array();
			
			$data['m_point']=$this->user_model->get_user_match_point($_SESSION['user_id']);
			$data['o_point']=$this->user_model->get_user_overall_point($_SESSION['user_id']);
			
			$data['team_name']=$this->user_model->user_team_name($_SESSION['user_id']);
			//echo '<br>';
			
			foreach($user_team['team_players'] as $u)
			{
				$info=array();
				$info['player_id']=$u['player_id'];
				//echo '<br>';
				$result=$this->player_model->get_player_info($info['player_id']);
				//print_r($result);
				$info['name']=$result['name'];
				$tmp=$this->player_model->team_name($result['team_id']);
				$info['team_name']=$tmp['team_name'];
				$info['player_cat']=$result['player_cat'];
				$tmp=$this->player_model->get_player_last_match_point($info['player_id']);
				$info['point']=$tmp['PT'];
				
				array_push($data['user_team'],$info);
			}
			$data['captain_id']=$user_team['captain'];
			$result=$this->player_model->get_player_info($data['captain_id']);
			$data['captain_name']=$result['name'];
			/*
			foreach($data['user_team'] as $u)
			{
				print_r($u);
			}
			*/
			$this->load->view('user_home',$data);
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

	public function createTeam()
	{
		$match=$this->tournament_model->get_upcoming_match()->row_array();
		$match_id=$match['match_id'];
		if($match_id==NULL)
		{
			echo 'Transfer Window is closed';
			echo '<br>';
			echo 'Please try again later';
		}
		else
		{
			
			$q=$this->tournament_model->get_active_tournament_teams();
			$data['teams']=$q->result_array();

			if(isset($_POST['team_id'])) $team['team_id']=$_POST['team_id'];
			else $team['team_id'] ='';
			
			$team['tournament_id']=$this->tournament_model->get_active_tournament_id();
			
			if(isset($_POST['cat'])) $team['player_cat']=$_POST['cat'];
			else $team['player_cat']='';
			
			//echo $team['player_cat'];
			//$data['user_team']=array();
			if(!isset($_SESSION['user_team']))$_SESSION['user_team']=array();
			
			$data['players']=$this->team_model->get_tournament_players($team)->result_array();

			//print_r($result);
			$data['points']=array();
			foreach ($data['players'] as $k) {
				$temp=$this->team_model->player_overall_point($k['PLAYER_ID']);
				array_push($data['points'], $temp);
			}
			/*
			foreach($_SESSION['user_team'] as $u)
			{
				print_r($u);
			}
			*/
			$this->load->view('createTeam',$data);

		}
	}

	public function createTeam_proc()
	{
		$user_team=$_SESSION['user_team'];
		
		//Check Conditions
		
		$count=0;
		$value=0;
		foreach($user_team as $u)
		{
			$count++;
			$value+=$u['price'];
		}
		
		echo $count;
		echo '<br>';
		echo $value;
		echo '<br>';
		
		if($count!=11)
		{
			echo '11 Players Needed';
			redirect('user/createTeam','refresh');
		}
		
		else if($value>10000)
		{
			echo 'Team Value Exceded';
			redirect('user/createTeam','refresh');
		}
		
		else
		{
			//PROCESS TEAMS
			
			$captain_id=$_POST['captain'];
			
			$match=$this->tournament_model->get_upcoming_match()->row_array();
			$match_id=$match['match_id'];
			
			$user_id=$_SESSION['user_id'];
			$team_name=$_POST['team_name'];
			
			$val=$this->user_model->create_user_match_team($user_id, $match_id,$captain_id,$user_team,$team_name);
			//INSERT INTO DATABASE
			
			//UNSET USER TEAM SESSION
			unset($_SESSION['user_team']);
			
		}
		
		/*
		*/
	}
	
	public function add_user_team_player()
	{
		$newPlayer=array('player_id'=>$this->input->post('player_id'),'player_name'=>$this->input->post('name'),
		'player_cat'=>$this->input->post('cat'),'price'=>$this->input->post('price'),'total_points'=>$this->input->post('points'));
		
		$key = array_search($newPlayer, $_SESSION['user_team']); 
		
		if($key===FALSE) array_push($_SESSION['user_team'],$newPlayer);
		
		redirect('user/createTeam','refresh');
	}
	
	public function remove_user_team_player()
	{
		$newPlayer=array('player_id'=>$this->input->post('player_id'),'player_name'=>$this->input->post('name'),
		'player_cat'=>$this->input->post('cat'),'price'=>$this->input->post('price'),'total_points'=>$this->input->post('points'));
		
		$key = array_search($newPlayer, $_SESSION['user_team']); 
		unset($_SESSION['user_team'][$key]);
		
		redirect('user/createTeam','refresh');
	}
	
	public function editProfile()
	{
	
	}
	
	public function changeTeam()
	{
	
	}
	
	public function changeCaptain()
	{
	
	}
	public function topPlayers()
	{
		$current_t=$this->tournament_model->get_active_tournament_id();
		if($current_t==NULL)
		{
			echo 'No Player Record Found';
		}
		else
		{
			$data['top']=$this->player_model->top_players();
			$this->load->view('top_players',$data);
		}

	}
	
	public function schedules()
	{
		$query= $this->user_model->get_fixture();		
		
		if($query->num_rows()==0)
		{
			echo "No Fixture Available for this tournament";	//Load No Fixture View
		}
		
		//echo $query->num_rows().'<br/>';
		$data['fixture']=$query->result_array();
		
		/*
		foreach($data['fixture'] as $row)
		{
			print_r($row);				//Load View Fixture  with $data
			echo '<br/>';
		}
		*/
		
		$this->load->view('schedule',$data);
	}
	
	public function results()
	{
		
		//echo "Result Test";
		
		$query= $this->tournament_model->get_result();		
		
		if($query->num_rows()==0)
		{
			echo "No Result Found for this tournament";	//Load No Fixture View
		}
		$data['result']=$query->result_array();
		 /*foreach ($data['result']=$query->result_array() as $row)
		 {
		 	print_r($row);				//Load View Fixture  with $data
		 	echo '<br/>';
		 }*/

		$this->load->view('results',$data);
		//echo "Result Test";
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
	
	public function test()
	{
		echo $this->user_model->get_user_match_point($_SESSION['user_id']);
		echo '<br>';
		echo $this->user_model->get_user_overall_point($_SESSION['user_id']);
		echo '<br>';
	}
	
}