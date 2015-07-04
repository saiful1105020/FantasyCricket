<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	 	 
	 public function __construct()		//DONE
     {
        parent::__construct();
		
		$this->load->library('session');
		$this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('html');
		$this->load->library('form_validation');

        if(isset($_SESSION["user_id"]))
		{
			$this->load->view('templates/header2');
			
			$this->load->model('user_model');
			$this->load->model('tournament_model');
			$this->load->model('match_model');
			$this->load->model('team_model');
			$this->load->model('player_model');
			
			//Load Other Models If Required
		}
		else
		{
			redirect('/home', 'refresh');
		}
		  
     }
	 
	public function index()			//DONE
	{
		$query=$this->tournament_model->get_active_tournament();
		if($query->num_rows()==0)
		{
			echo 'No Active Tournament.';
		}
		else
		{	
			$var=$this->user_model->exist_tournament_user($_SESSION['user_id']);
			
			if($var===0)
			{
				//echo 'Create Team';
				redirect('user/createTeam','refresh');
			}
			else
			{
				//echo 'View Team';
				redirect('user/view_team','refresh');
			}
			
		}
		
	}
	
	public function logout()
	{
		//Stop Session
		$this->session->sess_destroy();
		
		//Redirect To Homepage
		redirect('/home', 'refresh');
	}
	
	public function createTeam()		//Load Data
	{
		if(isset($_POST['team_id'])) $team['team_id']=$_POST['team_id'];
		else $team['team_id'] ='';
				
		if(isset($_POST['cat'])) $team['player_cat']=$_POST['cat'];
		else $team['player_cat']='';
			
		if(!isset($_SESSION['user_team']))$_SESSION['user_team']=array();
		
		$team['tournament_id']=$this->tournament_model->get_active_tournament_id();
		
		$match=$this->match_model->get_upcoming_match()->row_array();
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

			$data['players']=$this->tournament_model->get_tournament_players($team)->result_array();

			$data['points']=array();
			foreach ($data['players'] as $k) {
				$temp=$this->player_model->player_overall_point($k['Player_id']);
				array_push($data['points'], $temp);
			}
		}
		
		$_SESSION['players_data']=$data;
		
		redirect('user/createTeam_1','refresh');	
	}
	public function createTeam_1()		//Load View
	{
		if(isset($_SESSION['players_data']))
		{
			$data=$_SESSION['players_data'];
		}
		else
		{
			echo 'Sorry! Something went wrong. <br/> Please Try Later';
		}
		$this->load->view('createTeam',$data);
	}
	
	public function createTeam_proc()		//RUNNING
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
		//ADD MORE CONDITIONS ...
		
		else
		{
			//PROCESS TEAMS
			$captain_id=$_POST['captain'];
			
			$match=$this->match_model->get_upcoming_match()->row_array();
			$match_id=$match['match_id'];
			
			$user_id=$_SESSION['user_id'];
			$team_name=$_POST['team_name'];
			
			$val=$this->user_model->create_user_match_team($user_id, $match_id,$captain_id,$user_team,$team_name);
			
			//UNSET USER TEAM SESSION
			unset($_SESSION['user_team']);
			unset($_SESSION['players_data']);
			
		}
	}
	
	public function view_team()			//done
	{
		$data = array(
               'login_error' => false,
			   'registration_success' => false
			);
			
		$user_team=$this->user_model->get_current_user_match_team($_SESSION['user_id']);
		
		//if current match is not found, then transfer window is closed. 
		//Just Show the old team, because it will be replicated after the transfer window re-opens
		if($user_team==NULL)
		{
			$user_team=$this->user_model->get_user_match_team($_SESSION['user_id']);
		}
			
		$data['user_team']=array();
			
		$data['m_point']=$this->user_model->get_user_match_point($_SESSION['user_id']);		//Needs To Be Deleted From this and view
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
				$tmp=$this->team_model->get_team_name($result['team_id']);
				$info['team_name']=$tmp;
				$info['player_cat']=$result['player_cat'];
				$tmp=$this->player_model->player_overall_point($info['player_id']);
				$info['point']=$tmp;
				
				array_push($data['user_team'],$info);
			}
			$data['captain_id']=$user_team['captain'];
			$result=$this->player_model->get_player_info($data['captain_id']);
			$data['captain_name']=$result['name'];
			
			$this->load->view('user_home',$data);			//View Needs Modification
		
	}
	
	public function view_points()			//done
	{
		$data = array(
               'login_error' => false,
			   'registration_success' => false
			);
			
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
				$tmp=$this->team_model->get_team_name($result['team_id']);
				$info['team_name']=$tmp;
				$info['player_cat']=$result['player_cat'];
				$tmp=$this->player_model->get_player_last_match_point($info['player_id']);
				$info['point']=$tmp;
				
				array_push($data['user_team'],$info);
			}
			$data['captain_id']=$user_team['captain'];
			$result=$this->player_model->get_player_info($data['captain_id']);
			$data['captain_name']=$result['name'];
			
			$this->load->view('view_points',$data);
		}
	}
	
	public function add_user_team_player()		//done
	{
		$newPlayer=array('player_id'=>$this->input->post('player_id'),'player_name'=>$this->input->post('name'),
		'player_cat'=>$this->input->post('cat'),'price'=>$this->input->post('price'),'total_points'=>$this->input->post('points'));
		
		$key = array_search($newPlayer, $_SESSION['user_team']); 
		
		if($key===FALSE) array_push($_SESSION['user_team'],$newPlayer);
		
		redirect('user/createTeam_1','refresh');
	}
	
	public function remove_user_team_player()	//done
	{
		$newPlayer=array('player_id'=>$this->input->post('player_id'),'player_name'=>$this->input->post('name'),
		'player_cat'=>$this->input->post('cat'),'price'=>$this->input->post('price'),'total_points'=>$this->input->post('points'));
		
		$key = array_search($newPlayer, $_SESSION['user_team']); 
		unset($_SESSION['user_team'][$key]);
		
		redirect('user/createTeam_1','refresh');
	}
	
	public function topPlayers()				//done
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
	
	public function schedules()				//done
	{
		$query= $this->tournament_model->get_fixture();		
		
		if($query->num_rows()==0)
		{
			echo "No Fixture Available for this tournament";	//Load No Fixture View
		}
		$data['fixture']=$query->result_array();
		
		$this->load->view('schedule',$data);
	}
	
	public function results()		//LATER
	{
		$query= $this->tournament_model->get_result();		
		
		if($query->num_rows()==0)
		{
			echo "No Result Found for this tournament";	//Load No Fixture View
		}
		$data['result']=$query->result_array();

		$this->load->view('results',$data);
	}
	
	/**
		UNPROCESSED
	*/
	
	
	public function changePassword()		//LATER
	{
		
	}

	public function editProfile()				//LATER
	{
	
	}
	
	public function changeTeam()				//LATER
	{
	
	}
	
	public function changeCaptain()				//LATER
	{
	
	}


	public function pointTable()		//LATER
	{
		echo "pointTable Test";
	}
	
	public function howToPlay()		//LATER
	{
		echo "howToPlay Test";
	}
	
	public function rules()		//LATER
	{
		echo "Rules Test";
	}
	
	public function scoring()		//LATER
	{
		echo "scorings Test";
	}
		
}