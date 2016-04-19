<?php
class LimitsTable_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function getLimit()
	{
		$query = $this->db->select("limits")
		->from("TimeLimit")
		->limit(1)
		->get();

		$count = count($result = $query->result_array());
		if($count <= 0)
			{ throw new Exception("No limit set", NO_RECORD_FOUND); }

		return $result[0];
	}
	

	function updateLimit($params)
	{
		$ifLimit = $this->db->select("limits")
		->from("TimeLimit")
		->limit(1)
		->get();

		$count = count($ifLimit->result_array());

		if($count > 0)
		{
			$query = $this->db
			->set("limits", $params["limit"])
			->update("TimeLimit");

			return $this->getLimit();
		}
		else
		{
			$query = $this->db
			->set("limits", $params["limit"])
			->insert("TimeLimit");

			return $this->getLimit();
		}

		
	}
}