<?php

namespace App\Http\Validators;

class MemberIdValidator
{
	public function getRules()
	{
		return array(
			'member' => 'integer',
		);
	}

	public function getMessages()
	{
		return array(
			'member.integer' => 'The member must be a integer.',
		);
	}
}
