<?php
use \Curl\Curl;

class Login_model extends CI_Model
{

	function  __construct()
	{
		parent::__construct();
	}

	function postLogin($post)
	{
		$curl = new Curl();
		$curl->post(APIURL."v1/login/postLogin", $post);
		$response = $curl->response;

		return $response;
		// Bdebug::bdie($curl);
	}

	function postReset($post)
	{
		
	}

}