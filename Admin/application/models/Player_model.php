<?php
class Player_model extends CI_Model 
{

    public function __construct()
	{
        $this->load->database();
	}
	
	public function add_player($data)
	{
		$sql = 'INSERT INTO "player" VALUES(?,?,?,?,?,?)';		
		return $this->db->query($sql,$data); 
	}

}
?>