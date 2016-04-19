<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'libraries/REST_Controller.php';

class Uploads extends REST_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("v1/uploads_model", "um");
	}

	public function postAddImage_post()
	{
		$image = $this->um->postAddImage($this->post());
		$this->response($image);
	}

}
