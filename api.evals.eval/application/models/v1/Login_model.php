<?php

class Login_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("v1/LoginTable_model", "ltm");
	}

	function test($params)
	{
		return $this->bcrypt->hash_password($params["password"]);
	}

	function postLogin($params)
	{
		try
		{
			Bvalidate::validate($params,"username,password");
			$userDetails = $this->ltm->getUserForLogin($params["username"]);

			$checkPassword = $this->bcrypt->check_password($params["password"], $userDetails["password"]);

			if(!$checkPassword)
				{ throw new Exception("Username / password is incorrect", LOGIN_FORBIDDEN); }

			$successUserDetails = $this->ltm->getId($userDetails["id"]);

			return $this->bresponse->setMessage("SUCCESS")
			->setStatus(OK)
			->addData("alert", "Welcome!")
			->addData("user", $successUserDetails)
			->getResponse();
		}
		catch(Exception $x)
		{
			return $this->bresponse->setMessage("FAILED")
			->addData("alert", $x->getMessage())
			->addData("code", $x->getCode())
			->addData("error", true)
			->setStatus(BAD_REQUEST)
			->getResponse();
		}
	}

	function postReset($params)
	{
		try
		{
			Bvalidate::validate($params,"email");
			$userDetails = $this->ltm->getUserByEmail($params["email"]);


			$newPass = $this->ltm->generateRandomString();
			$mail = new PHPMailer;
			$mail->isSMTP();
			$mail->Host = 'smtp.gmail.com';
			$mail->SMTPAuth = true;  
			$mail->Username = 'oscar@smartwave.ph';
			$mail->Password = 'SecondPassword';
			$mail->SMTPSecure = 'ssl';
			$mail->Port = 465;
			$mail->SetFrom("eval@appventure.co");
			$mail->Subject = "Eval - New Pass";
			$mail->Body = "You new Password ".$newPass;
			$mail->AddAddress("oscar@smartwave.ph");

			


			if(!$mail->Send()) {
				$this->bresponse->addData("Email not sent");
			} else {
				$this->bresponse->addData("Email sent");
			}

			$hashed = $this->bcrypt->hash_password($newPass);

			$successUserDetails = $this->ltm->changePasswordByEmail($params["email"], $hashed);

			return $this->bresponse->setMessage("SUCCESS")
			->setStatus(OK)
			->addData("user", $successUserDetails)
			->getResponse();
		}
		catch(Exception $x)
		{
			return $this->bresponse->setMessage("FAILED")
			->addData("alert", $x->getMessage())
			->addData("code", $x->getCode())
			->addData("error", true)
			->setStatus(BAD_REQUEST)
			->getResponse();
		}
	}

}
