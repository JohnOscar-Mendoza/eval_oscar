<?php
class LoginTable_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function getId($id)
	{
		$query = $this->db->select("id, username, email, role")
		->from("Users")
		->where("id", $id)
		->get();
		$count = count($result = $query->result_array());
		if($count <= 0)
			{ throw new Exception("No User found", NO_RECORD_FOUND); }

		return $result[0];
	}
	
	function getUserForLogin($username)
	{
		$query = $this->db->select("id, username, email, password")
		->from("Users")
		->where("username", $username)
		->get();

		$count = count($result = $query->result_array());
		if($count <= 0)
			{ throw new Exception("Username / password is incorrect", LOGIN_FORBIDDEN); }

		return $result[0];
	}

	function getUserByEmail($email)
	{
		$query = $this->db->select("id, username, email, role")
		->from("Users")
		->where("email", $email)
		->get();
		$count = count($result = $query->result_array());
		if($count <= 0)
			{ throw new Exception("No User found", NO_RECORD_FOUND); }

		return $result[0];		
	}

	function changePasswordByEmail($email, $newPassword)
	{
		$query = $this->db
		->set("password", $newPassword)
		->where("email", $email)
		->update("Users");

		return $this->getUserByEmail($email);
	}

	function generateRandomString()
	{
		return uniqid();
	}
}