<?php

namespace App\Http\Requests;
use App\Http\Validators\MemberIdValidator;


class ShowMemberRequest extends RestRequestAbstract
{
	private $memberIdValidator;

	public function __construct(MemberIdValidator $memberIdValidator)
	{
		$this->memberIdValidator = $memberIdValidator;

		parent::__construct();
	}

	public function rules()
	{
		return array_merge(
			$this->memberIdValidator->getRules()
		);
	}

	public function messages()
	{
		return array_merge(
			$this->memberIdValidator->getMessages()
		);
	}
}
