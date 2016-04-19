<?php
class Ads_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("v1/AdsTable_model", "atm");
	}

	function test($params)
	{
		return $this->bcrypt->hash_password($params["password"]);
	}

	function getRandom()
	{
		try
		{
			$rand = $this->atm->getRandomId();

			return $this->bresponse->setMessage("SUCCESS")
			->setStatus(OK)
			->addData("alert", "Welcome!")
			->addData("user", $rand)
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
