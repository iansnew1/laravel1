<?php

namespace App\Http\Model;

use App\Mappers\UserMapper;

class ShowAlphaNumericModel extends UserAbstractModel
{

	public function get($alphaNumericId)
	{
		$member = $this->mapper->findByAlphaNumericId($alphaNumericId);

		return $this->getUserAsArray($member);
	}
}
