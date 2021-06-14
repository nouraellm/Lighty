<?php

namespace Tests;

use App\Request;
use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{

	/** @test */
	public function can_detect_get_params()
	{
		$_GET['randomKey'] = 'randomValue';
		$request = new Request();
		$this->assertEquals($request->get('randomKey'), 'randomValue');
		unset($_GET['randomKey']);
	}

	/** @test */
	public function returns_null_or_default_when_get_key_not_found()
	{
		$request = new Request();
		$this->assertNull($request->get('randomKey'));
		$this->assertEquals($request->get('randomKey', 'default'), 'default');
	}

	/** @test */
	public function can_detect_post_params()
	{
		$_POST['randomKey'] = 'randomValue';
		$request = new Request();
		$this->assertEquals($request->post('randomKey'), 'randomValue');
		unset($_POST['randomKey']);
	}

	/** @test */
	public function returns_null_or_default_when_post_key_not_found()
	{
		$request = new Request();
		$this->assertNull($request->post('randomKey'));
		$this->assertEquals($request->post('randomKey', 'default'), 'default');
	}
}