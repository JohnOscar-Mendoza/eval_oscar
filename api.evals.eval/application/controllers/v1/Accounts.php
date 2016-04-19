<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'libraries/REST_Controller.php';

class Accounts extends REST_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("v1/accounts_model", "am");
	}

	public function get_get()
	{
		$acct = $this->am->getAccountById($this->get());
		$this->response($acct, OK);
	}

	public function getAll_get()
	{
		$accts = $this->am->getAllAccounts();
		$this->response($accts, OK);
	}

	public function postCreate_post()
	{
		$acct = $this->am->postCreate($this->post());
		$this->response($acct);
	}
}
