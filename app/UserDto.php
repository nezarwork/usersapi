<?php

namespace App;

class UserDto
{
	protected $req;

	public function __construct($req)
	{
		$this->req = $req;
	}

	public function getName()
	{
		return $this->req->get('name');
	}

	public function getEmail()
	{
		return $this->req->get('email');
	}

	public function getPassword()
	{
		return $this->req->get('password');
	}


}