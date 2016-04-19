<?php
class Wplib
{
	private $DB;

	function __construct($DB)
	{
		$this->DB = $DB["DB"];
	}

	function updateUserMeta($userId, $metaKey, $metaValue)
	{
		$query = $this->DB
		->set("meta_value", $metaValue)
		->where("meta_key", $metaKey)
		->where("user_id", $userId)
		->update("wp_usermeta");

		return;
	}

	function insertUserMeta($userId, $metaKey, $metaValue)
	{
		$query = $this->DB
		->set("meta_key", $metaKey)
		->set("meta_value", $metaValue)
		->set("user_id", $userId)
		->insert("wp_usermeta");

		return;
	}

	function getValueOfaProductKey($array, $key)
	{
		foreach($array as $arr)
		{
			if(in_array($key, $arr))
			{
				return $arr["meta_value"];
			}
		}

		return "";
	}

	function getMetaValue($array, $key)
	{
		foreach($array as $arr)
		{
			if(in_array($key, $arr))
			{
				return $arr["meta_value"];
			}
		}

		return "";
	}
	function checkIfMetaExists($array, $key)
	{
		foreach($array as $arr)
		{
			if(in_array($key, $arr))
			{
				return true;
			}
		}

		return false;
	}
}

?>