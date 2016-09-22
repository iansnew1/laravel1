<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends FormRequest
{
	public function all()
	{
		return array_merge(parent::all(), $this->route()->parameters());
	}
}
