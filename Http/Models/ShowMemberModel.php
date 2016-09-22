<?php
/**
 * Created by PhpStorm.
 * User: azretmissirov
 * Date: 3/28/16
 * Time: 6:05 PM
 */

namespace App\Http\Model;

use App\Mappers\UserMapper;

class ShowMemberModel extends UserAbstractModel
{

	public function get($memberId)
	{
		$member = $this->mapper->findByMemberId($memberId);

		return $this->getUserAsArray($member);
	}
}
