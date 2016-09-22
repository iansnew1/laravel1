<?php

namespace App\Http\Validators;

class AlphaNumericIdValidator
{
	public function getRules()
	{
		return array(
			'alphaNumeric' => 'string',
		);
	}

	public function getMessages()
	{
		return array(
			'alphaNumeric.string' => 'The alphaNumeric must be a string.',
		);
	}
}
