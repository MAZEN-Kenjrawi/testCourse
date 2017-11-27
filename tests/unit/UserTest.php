<?php

class UserTest extends \PHPUnit_Framework_TestCase
{

	public function testThatWeCanGetTheFirstName()
	{
		$user = new App\Models\User();
		$user->setFirstName('Mazen');

		$this->assertEquals('Mazen', $user->getFirstName());
	}

	public function testThatWeCanGetTheLastName()
	{
		$user = new App\Models\User();
		$user->setLastName('Kenjrawi');

		$this->assertEquals('Kenjrawi', $user->getLastName());
	}

	public function testThatWeCanGetTheFullName()
	{
		$user = new App\Models\User();
		$user->setFirstName('Mazen');
		$user->setLastName('Kenjrawi');

		$this->assertEquals('Mazen Kenjrawi', $user->getFullName());
	}

	public function testThatWeCanGetTheFullNameTrimmed()
	{
		$user = new App\Models\User();
		$user->setFirstName(' Mazen   ');
		$user->setLastName(' Kenjrawi ');

		$this->assertEquals('Mazen', $user->getFirstName());
		$this->assertEquals('Kenjrawi', $user->getLastName());

		$this->assertEquals('Mazen Kenjrawi', $user->getFullName());
	}

	public function testThatWeCanSetGetEmailAddress()
	{
		$user = new App\Models\User;

		$user->setEmail('mazen270@hotmail.com');

		$this->assertEquals('mazen270@hotmail.com', $user->getEmail());
	}

	public function testEmailVariablesContainsCorrectValues()
	{
		$user = new App\Models\User;

		$user->setFirstName(' Mazen   ');
		$user->setLastName(' Kenjrawi ');
		$user->setEmail('mazen270@hotmail.com');

		$this->assertEquals('Mazen', $user->getFirstName());
		$this->assertEquals('Kenjrawi', $user->getLastName());
		$this->assertEquals('Mazen Kenjrawi', $user->getFullName());
		$this->assertEquals('mazen270@hotmail.com', $user->getEmail());

		$emailVariables = $user->getEmailVariables();

		$this->assertArrayHasKey('full_name', $emailVariables);
		$this->assertArrayHasKey('email', $emailVariables);

		$this->assertEquals('Mazen Kenjrawi', $emailVariables['full_name']);
		$this->assertEquals('mazen270@hotmail.com', $emailVariables['email']);
	}
}	