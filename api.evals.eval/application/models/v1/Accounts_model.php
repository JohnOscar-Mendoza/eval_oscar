<?php
class Accounts_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("v1/AccountsTable_model", "atm");
	}

	function getAccountById($params)
	{
		try
		{
			Bvalidate::validate($params,"acctId");

			$acct = $this->atm->getAccountById($params["acctId"]);

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

	function getAllAccounts()
	{
		try
		{

			$acct = $this->atm->getAllAccounts();

			return $this->bresponse->setMessage("SUCCESS")
			->setStatus(OK)
			->addData("alert", "Welcome!")
			->addData("user", $acct)
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

	function postCreate($params)
	{
		try
		{
			Bvalidate::validate($params, "name,description");
			Bvalidate::validate($_FILES, "image");

			$tmp = $_FILES["image"]["tmp_name"];
			$fileName = str_replace(" ", "_", microtime(true)."_1x1_".$_FILES["image"]["name"]);

			if(!is_dir("./acc_images/"))
			{
				mkdir("./acc_images/", 777);
			}

			$displayable = base_url()."acc_images/".urlencode($fileName);
			$saveImage["imagePath"] = $displayable;
			$saveImage["name"] = $params["name"];
			$saveImage["description"] = $params["description"];

			move_uploaded_file($tmp, './acc_images/'.$fileName);

			$accts = $this->atm->postCreate($saveImage);

			return $this->bresponse->setMessage("SUCCESS")
			->setStatus(OK)
			->addData("alert", "Welcome!")
			->addData("user", $accts)
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
