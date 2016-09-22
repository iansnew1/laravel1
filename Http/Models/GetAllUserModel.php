<?php

namespace App\Http\Model;

class GetAllUserModel extends UserAbstractModel
{
	public function all()
	{
		$users = $this->mapper->all();

		return $this->getUsersAsArray($users);
	}
}
