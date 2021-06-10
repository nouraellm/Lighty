<?php

namespace App;

class Request
{

	protected $query;
	protected $input;
	protected $server;

	public function __construct()
	{
		$this->query = $_GET;
		$this->input = $_POST;
		$this->server = $_SERVER;
	}

	public function get($key = null, $default = null)
	{
		if (!$key) return $this->query;
		return $this->query[$key] ?? $default;
	}

	public function post($key = null, $default = null)
	{
		if (!$key) return $this->input;
		return $this->input[$key] ?? $default;
	}

	public function server($key = null, $default = null)
	{
		if (!$key) return $this->server;
		return $this->server[$key] ?? $default;
	}

	public function method(): string
	{
		return $this->server('REQUEST_METHOD', 'GET');
	}
}