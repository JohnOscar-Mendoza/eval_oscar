<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'libraries/REST_Controller.php';

class Ads extends REST_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("v1/ads_model", "am");
	}

	public function get_get()
	{
		$image = $this->am->getRandom();
		$this->response($image, OK);
	}

	public function postLogin_post()
	{
		$login = $this->lm->postLogin($this->post());
		$this->response($login);
	}
}
