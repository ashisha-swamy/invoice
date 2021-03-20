<?php
class LoginController extends CI_Controller
{
	public function index()
	{
		$this->load->view('login');
	}
	public function user_login()
	{
		$this->load->model('User_model');
		$username=$this->input->post('username');
		$password=$this->input->post('pwd');
			if($this->User_model->login_check($username,$password))
			{

				$this->load->view('product_listing');
			}
			else
			{
				echo "Incorrect username or password";
				$this->load->view('login');
			}

	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		$this->load->view('login');
	}
}


?>