<?php

namespace App;

class Response
{

	protected $body;
	protected $status = 200;
	protected $headers = [];
	protected $httpProtocol = 'HTTP/1.1';

	public function __construct($body = '')
	{
		$this->body = $body;
	}

	public function redirect($url, $status = 301): Response
	{
		return $this
			->status($status)
			->header('Location', $url);
	}

	public function header($key, $value): Response
	{
		$this->headers[$key] = $value;
		return $this;
	}

	public function status($code): Response
	{
		$this->status = $code;
		return $this;
	}

	public function __toString(): string
	{
		return $this->respond();
	}

	public function respond(): string
	{
		if ($this->body instanceof $this) {
			return $this->body->respond();
		}

		if (is_array($this->body)) $this->toJson();

		$this->sendHeaders();
		return $this->body;
	}

	public function toJson()
	{
		$this->header('Content-Type', 'application/json');
		$this->body = json_encode($this->body, JSON_PRETTY_PRINT);
	}

	protected function sendHeaders()
	{
		if (headers_sent()) return;

		header("$this->httpProtocol $this->status");

		if (!isset($this->headers['Content-Type'])) {
			$this->header('Content-Type', 'text/html');
		}

		foreach ($this->headers as $key => $value) {
			header("$key: $value");
		}
	}
}