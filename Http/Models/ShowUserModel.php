<?php
/**
 * Created by PhpStorm.
 * User: azretmissirov
 * Date: 3/28/16
 * Time: 6:05 PM
 */

namespace App\Http\Model;


class ShowUserModel extends UserAbstractModel
{
	public function get($searchId)
	{
		$user = $this->mapper->findBySearchId($searchId);

		return $this->getUserAsArray($user);
	}
}
