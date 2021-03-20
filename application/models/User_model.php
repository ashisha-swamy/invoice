<?php
class User_model extends CI_Model
{
	public function login_check($username,$password)
	{
		
		$this->db->select('id,username,password');
		$array=array('username'=>$username,'password'=>$password);
		$this->db->where($array);
		$query=$this->db->get('user');
		$res=$query->result();
		if(!empty($res))
		{
			
			$this->session->user_id=$res[0]->id;
			$this->session->user_name=$res[0]->username;
			//echo $this->session->userdata('user_id');exit;
		return true;
		}
		else
		{
			return false;
		}
	}
	


}
?>