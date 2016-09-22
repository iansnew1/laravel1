<?php

namespace App\Http\Model;

use App\Domain\UserAbstract;

class DestroyUserModel extends UserAbstractModel
{
	public function destroy($searchUserId)
	{
		return $this->mapper->delete($searchUserId);
	}
}
