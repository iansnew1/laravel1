<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class RestRequestAbstract extends FormRequest
{
	const TABLE_FIELDS = [
		'search_user_id',
		'user_type',
		'user_ip',
		'user_language',
		'member_id',
		'alphanumeric_id',
		'account_id'
	];

	public function all()
	{
		return array_merge(parent::all(), $this->route()->parameters());
	}

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	public function getFieldsToUpdate()
	{
		$fieldsToUpdate = [];

		foreach (static::TABLE_FIELDS as $tableField)
		{
			if (!empty($this->input($tableField)))
			{
				$fieldsToUpdate[$tableField] = $this->input($tableField);
			}
		}
		return $fieldsToUpdate;
	}
}
