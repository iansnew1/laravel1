<?php

namespace App\Http\Model;

class StoreUserModel extends UserAbstractModel
{
	public function store(array $fieldsToUpdate)
	{
		return $this->mapper->store($fieldsToUpdate);
	}
}
