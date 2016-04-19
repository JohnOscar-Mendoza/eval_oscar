<?php
class AdsTable_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function getRandomId()
	{
		$query = $this->db->select("id, image1x1, image2x2, image3x3, image4x4, uploadedBy")
		->from("Images")
		->order_by("RAND()")
		->limit(1)
		->get();

		$count = count($result = $query->result_array());
		if($count <= 0)
			{ throw new Exception("No image found", NO_RECORD_FOUND); }

		return $result[0];
	}
	
}