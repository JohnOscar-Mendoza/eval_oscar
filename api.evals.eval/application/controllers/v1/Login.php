<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'libraries/REST_Controller.php';

class Login extends REST_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("v1/login_model", "lm");
	}

	public function index_get()
	{
		$test = $this->lm->test($this->get());
		$this->response($test);
	}

	public function postLogin_post()
	{
		$login = $this->lm->postLogin($this->post());
		$this->response($login);
	}

	public function postReset_post()
	{
		$reset = $this->lm->postReset($this->post());
		$this->response($reset, OK);
	}
}
