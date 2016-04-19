<?php
class UploadsTable_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function getId($id)
	{
		$query = $this->db->select("id, uploadedBy, image1x1, image2x2, image3x3, image4x4")
		->from("Images")
		->where("id", $id)
		->get();
		$count = count($result = $query->result_array());
		if($count <= 0)
			{ throw new Exception("No Record found", NO_RECORD_FOUND); }

		return $result[0];
	}
	
	function addImage($params)
	{
		$query = $this->db
		->set("image1x1", $params["image1x1"])
		->set("image2x2", $params["image2x2"])
		->set("image3x3", $params["image3x3"])
		->set("image4x4", $params["image4x4"])
		->set("uploadedBy", $params["uploadedBy"])
		->insert("Images");

		
		$lastId = $this->db->insert_id();

		return $this->getId($lastId);
	}
}