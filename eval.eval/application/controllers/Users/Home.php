<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
}
