<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model("login_model", "lm");
	}

	public function index()
	{
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			$login = $this->lm->postLogin($_POST);
			// Bdebug::bdie($login);
			if($login->Status !== 400)
			{
				if($login->Data->user->role == 1)
				{
					redirect(base_url()."users/home?userId=".$login->Data->user->id, "refresh");
				}
				elseif($login->Data->user->role == 0)
				{
					redirect(base_url()."admin/home?userId=".$login->Data->user->id, "refresh");
				}
			}
		}
		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');
	}

	public function reset()
	{
		$this->load->view('header');
		$this->load->view('reset');
		$this->load->view('footer');
	}
}
