<?php

class Uploads_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("v1/UploadsTable_model", "utm");
		$this->load->model("v1/LoginTable_model", "ltm");
	}

	function test($params)
	{
		return $this->bcrypt->hash_password($params["password"]);
	}

	function postAddImage($params)
	{
		try
		{
			Bvalidate::validate($params,"userId");
			Bvalidate::validate($_FILES,"image1x1,image2x2,image3x3,image4x4");

			$user = $this->ltm->getId($params["userId"]);
			// Bdebug::bdie(array_merge($params, $_FILES));
			$tmp["1x1"] = $_FILES["image1x1"]["tmp_name"];
			$tmp["2x2"] = $_FILES["image2x2"]["tmp_name"];
			$tmp["3x3"] = $_FILES["image3x3"]["tmp_name"];
			$tmp["4x4"] = $_FILES["image4x4"]["tmp_name"];

			// $ext = pathinfo($_FILES["image"]["tmp_name"], PATHINFO_EXTENSION);
			$fileName["1x1"] = str_replace(" ", "_", microtime(true)."_1x1_".$_FILES["image1x1"]["name"]);
			$fileName["2x2"] = str_replace(" ", "_", microtime(true)."_2x2_".$_FILES["image2x2"]["name"]);
			$fileName["3x3"] = str_replace(" ", "_", microtime(true)."_3x3_".$_FILES["image3x3"]["name"]);
			$fileName["4x4"] = str_replace(" ", "_", microtime(true)."_4x4_".$_FILES["image4x4"]["name"]);

			if(!is_dir("./images/"))
			{
				mkdir("./images/");
			}

			$displayable = base_url()."images/".urlencode($fileName["1x1"]);
			$saveImage["image1x1"] = $displayable;
			move_uploaded_file($tmp["1x1"], './images/'.$fileName["1x1"]);

			$displayable = base_url()."images/".urlencode($fileName["2x2"]);
			$saveImage["image2x2"] = $displayable;
			move_uploaded_file($tmp["2x2"], './images/'.$fileName["2x2"]);

			$displayable = base_url()."images/".urlencode($fileName["3x3"]);
			$saveImage["image3x3"] = $displayable;
			move_uploaded_file($tmp["3x3"], './images/'.$fileName["3x3"]);

			$displayable = base_url()."images/".urlencode($fileName["4x4"]);
			$saveImage["image4x4"] = $displayable;
			move_uploaded_file($tmp["4x4"], './images/'.$fileName["4x4"]);

			$saveImage["uploadedBy"] = $params["userId"];

			
			
			$image = $this->utm->addImage($saveImage);
			
			return $this->bresponse->setMessage("SUCCESS")
			->setStatus(OK)
			->addData("alert", "Welcome!")
			->addData("user", $image)
			->getResponse();
		}
		catch(Exception $x)
		{
			return $this->bresponse->setMessage("FAILED")
			->addData("alert", $x->getMessage())
			->addData("code", $x->getCode())
			->addData("error", true)
			->setStatus("Status", BAD_REQUEST)
			->getResponse();
		}
	}

}
