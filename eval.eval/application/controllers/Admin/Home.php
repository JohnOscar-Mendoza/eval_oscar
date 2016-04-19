<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("admin/home_model", "hm");
	}

	public function index()
	{
		$this->load->view('header');
		// $this->load->view('navigation');
		$this->load->view('admin/home');
		$this->load->view('footer');
	}

	function limits()
	{
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			$limits = $this->hm->postLimit($_POST);
			

			redirect(base_url()."admin/home?userId=".$_POST["userId"]);
		}
		else
		{
			redirect(base_url()."admin/home?userId=".$_POST["userId"]);
		}
	}

	function reset()
	{
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			$limits = $this->hm->postResetPassword($_POST);

			redirect(base_url()."admin/home?userId=".$_POST["userId"]);
		}
		else
		{
			redirect(base_url()."admin/home?userId=".$_POST["userId"]);
		}	
	}

	function upload()
	{
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			$uploads = $this->hm->postUpdateAdImages($_POST);

			redirect(base_url()."admin/home?userId=".$_POST["userId"]);
		}
		else
		{
			redirect(base_url()."admin/home?userId=".$_POST["userId"]);
		}		
	}
}
