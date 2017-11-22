<?php

namespace App\Models;

class User
{
	private $First_name;

	public function setFirstName($firstName)
	{
		$this->first_name = $firstName;
	}

	public function getFirstName()
	{
		return $this->first_name;
	}
}