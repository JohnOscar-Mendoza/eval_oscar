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

	function postLimit($params)
	{
		$curl = new Curl();
		$curl->post(APIURL."v1/limits/postChange", $params);
		$response = $curl->response;

		return $response;
	}

	function postResetPassword($params)
	{
		$curl = new Curl();
		$curl->post(APIURL."v1/login/postReset", $params);
		$response = $curl->response;

		return $response;
	}

	function postPageLimit()
	{

	}

	function postUpdateAdImages($post)
	{
		$image1x1 = new CurlFile($_FILES['image1x1']['tmp_name'], $_FILES['image1x1']['type'], $_FILES['image1x1']['name']);
		$image2x2 = new CurlFile($_FILES['image2x2']['tmp_name'], $_FILES['image2x2']['type'], $_FILES['image2x2']['name']);
		$image3x3 = new CurlFile($_FILES['image3x3']['tmp_name'], $_FILES['image3x3']['type'], $_FILES['image3x3']['name']);
		$image4x4 = new CurlFile($_FILES['image4x4']['tmp_name'], $_FILES['image4x4']['type'], $_FILES['image4x4']['name']);

		$post = [
		'userId' => $post["userId"],
		'image1x1'=> $image1x1,
		'image2x2'=> $image2x2,
		'image3x3'=> $image3x3,
		'image4x4'=> $image4x4,
		];

		$curl = new Curl();
		// $curl->setHeader("Content-Type","multipart/form-data");
		$curl->post(APIURL."/v1/uploads/postAddImage", $post);
		$curl->close();

		$responseDecode = $curl->response;
		return $responseDecode;
	}

}