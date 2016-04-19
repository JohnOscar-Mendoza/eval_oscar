<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'libraries/REST_Controller.php';

class Limits extends REST_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("v1/limits_model", "lm");
	}

	public function index_get()
	{
		$limit = $this->lm->getCurrentLimit();
		$this->response($limit);
	}

	public function get_get()
	{
		$limit = $this->lm->getCurrentLimit();
		$this->response($limit);
	}

	public function postChange_post()
	{
		$limit = $this->lm->postChange($this->post());
		$this->response($limit);
	}
}
