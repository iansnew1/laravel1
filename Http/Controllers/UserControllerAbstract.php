<?php

namespace App\Http\Controllers;

use App\Http\Response\JsonView\SuccessJsonView;

class UserControllerAbstract extends Controller
{

	protected function getSuccessJsonView($data)
	{
		return new SuccessJsonView($data);
	}
}
