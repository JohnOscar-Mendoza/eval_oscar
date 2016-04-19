<?php
use \Curl\Curl;

class Home_model extends CI_Model
{

	function  __construct()
	{

	}

	function getImage()
	{
		$curl = new Curl();
		$curl->get(APIURL."v1/ads/get");
		$response = $curl->response;

		return $response;
		// Bdebug::bdie($curl);
	}

}