<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accounts extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("users/accounts_model", "am");
		$this->load->model("users/home_model", "hm");
	}

	public function index()
	{
		
		$toShow["ads"] = $this->hm->getImage();
		$toShow["accounts"] = $this->am->getAllAccounts();

		$this->load->view('header');
		$this->load->view('navigation');
		$this->load->view('user/home', $toShow);
		$this->load->view('footer');
	}

	public function add()
	{
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			$acct = $this->am->postCreate(array_merge($_POST, $_FILES));
			Bdebug::bdie($acct);
		}
		$this->load->view('header');
		$this->load->view('navigation');
		$this->load->view('user/add_account');
		$this->load->view('footer');	
	}
}