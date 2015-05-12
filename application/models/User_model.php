<?php
class User_model extends CI_Model 
{

    public function __construct()
	{
        $this->load->database();
	}
		
	public function get_loginInfo($data)
	{
		$query = $this->db->get_where('userInfo', array('email' => $data['email'],'password' => $data['password']));
		return $query;
	}

	/**
	*	If user e-mail already exists, return 1
	*	Otherwise, return 0
	*/
	public function exist_user($email)
	{
		$query = $this->db->get_where('userInfo', array('email' => $email));
		if($query->num_rows()>0) return 1;
		else return 0;
	}

	public function register($data)
	{
		$query = $this->db->insert('userInfo',$data);
	}
}

?>