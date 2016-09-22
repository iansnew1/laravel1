<?php

namespace App\Http\Validators;

class SearchUserIdValidator
{
	public function getRules()
	{
		return array(
			'users' => 'string',
		);
	}

	public function getMessages()
	{
		return array(
			'users.string' => 'The searchUserId must be a string.',
		);
	}
}
