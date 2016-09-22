<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Http\Validators\SearchUserIdValidator;

class DestroyUserRequest extends RestRequestAbstract
{
	private $searchUserIdValidator;

	public function __construct(SearchUserIdValidator $searchUserIdValidator)
	{
		$this->searchUserIdValidator = $searchUserIdValidator;

		parent::__construct();
	}

	public function rules()
	{
		return array_merge(
			$this->searchUserIdValidator->getRules()
		);
	}

	public function messages()
	{
		return array_merge(
			$this->searchUserIdValidator->getMessages()
		);
	}
}
