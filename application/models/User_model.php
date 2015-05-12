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
}

?>