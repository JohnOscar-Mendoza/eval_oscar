<?php
class AccountsTable_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function getAccountById($id)
	{
		$query = $this->db->select("id, name, description, imagePath")
		->from("Accounts")
		->where("id", $id)
		->get();
		$count = count($result = $query->result_array());
		if($count <= 0)
			{ throw new Exception("No Record found", NO_RECORD_FOUND); }

		return $result[0];
	}

	function getAllAccounts()
	{
		$query = $this->db->select("id, name, description, imagePath")
		->from("Accounts")
		->get();

		$count = count($result = $query->result_array());
		if($count <= 0)
			{ throw new Exception("No Record found", NO_RECORD_FOUND); }

		return $result;
	}
	
	function postCreate($params)
	{
		$query = $this->db
		->set("name", $params["name"])
		->set("description", $params["description"])
		->set("imagePath", $params["imagePath"])
		->insert("Accounts");

		$lastId = $this->db->insert_id();

		return $this->getAccountById($lastId);
	}
}