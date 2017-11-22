<?php

class UserTest extends \PHPUnit_Framework_TestCase
{

	public function testThatWeCanGetTheFirstName()
	{
		$user = new App\Models\User();
		$user->setFirstName('Mazen');

		$this->assertEquals('Mazen', $user->getFirstName());
	}
}	