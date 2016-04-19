<?php
use \Curl\Curl;

class Accounts_model extends CI_Model
{

	function  __construct()
	{

	}
	function postCreate($postData)
	{
		$cfile = new CurlFile($_FILES['image']['tmp_name'], $_FILES['image']['type'], $_FILES['image']['name']);

		$post = [
		'description'=> $postData['description'],
		'name' => $postData['name'],
		'image'=> $cfile
		];

		$curl = new Curl();
		// $curl->setHeader("Content-Type","multipart/form-data");
		$curl->post(APIURL."/v1/accounts/postCreate", $post);
		$curl->close();

		$responseDecode = $curl->response;
		return $responseDecode;
	}

	function getAccount()
	{
		$curl = new Curl();
		$curl->post(APIURL."v1/ads/get");
		$response = $curl->response;

		return $response;
		// Bdebug::bdie($curl);
	}

	function getAllAccounts()
	{
		$curl = new Curl();
		$curl->get(APIURL."v1/accounts/getAll");
		$response = $curl->response;

		return $response;
	}

}