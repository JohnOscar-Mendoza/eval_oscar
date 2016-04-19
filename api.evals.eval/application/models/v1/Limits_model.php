<?php
class Limits_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("v1/LimitsTable_model", "ltm");
	}

	function getCurrentLimit()
	{
		try
		{
			$limit = $this->ltm->getLimit();

			return $this->bresponse->setMessage("SUCCESS")
			->setStatus(OK)
			->addData("alert", "Welcome!")
			->addData("user", $limit)
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

	function postChange($params)
	{
		try
		{
			Bvalidate::validate($params, "limit");
			$limit = $this->ltm->updateLimit($params);

			return $this->bresponse->setMessage("SUCCESS")
			->setStatus(OK)
			->addData("alert", "Welcome!")
			->addData("user", $limit)
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
