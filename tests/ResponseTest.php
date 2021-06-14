<?php

namespace Tests;

use App\Response;
use PHPUnit\Framework\TestCase;

class ResponseTest extends TestCase
{

	/** @test */
	public function send_text_response()
	{
		$response = new Response('test');
		$output = $response->respond();
		$this->assertEquals($output, 'test');
	}

	/** @test */
	public function send_array_as_response()
	{
		$response = new Response([1, 2, 3]);
		$output = $response->respond();
		$this->assertEquals($output, json_encode([1, 2, 3], JSON_PRETTY_PRINT));
	}

	/** @test */
	public function can_resend_response_object()
	{
		$firstResponse = new Response('first response');
		$secondResponse = new Response($firstResponse);
		$this->assertEquals($firstResponse->respond(), $secondResponse->respond());
	}
}