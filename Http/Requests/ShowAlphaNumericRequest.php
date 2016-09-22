<?php

namespace App\Http\Requests;
use App\Http\Validators\AlphaNumericIdValidator;


class ShowAlphaNumericRequest extends RestRequestAbstract
{
	private $alphaNumericIdValidator;

	public function __construct(AlphaNumericIdValidator $alphaNumericIdValidator)
	{
		$this->alphaNumericIdValidator = $alphaNumericIdValidator;

		parent::__construct();
	}

	public function rules()
	{
		return array_merge(
			$this->alphaNumericIdValidator->getRules()
		);
	}

	public function messages()
	{
		return array_merge(
			$this->alphaNumericIdValidator->getMessages()
		);
	}
}
