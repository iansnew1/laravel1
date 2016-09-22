<?php

namespace App\Http\Model;

use App\Domain\FreeMember;
use App\Domain\Guest;
use App\Domain\PremiumMember;

class UpdateUserModel extends UserAbstractModel
{
	public function update($searchUserId, array $fieldsToUpdate)
	{
		$userToUpdate = $this->mapper->findBySearchId($searchUserId);

		if ($userToUpdate instanceof FreeMember)
		{
			$freeMemberHandler = new FreeMemberHandler($this->mapper, $fieldsToUpdate, $searchUserId);

			return $freeMemberHandler->handleFreeMember();
		}
		elseif ($userToUpdate instanceof PremiumMember)
		{
			$premiumMemberHandler = new PremiumMemberHandler($this->mapper, $fieldsToUpdate, $searchUserId);

			return $premiumMemberHandler->handlePremiumMember();
		}
		else
		{
			$guestHandler = new GuestHandler($this->mapper, $fieldsToUpdate, $searchUserId);

			return $guestHandler->handleGuest();
		}
	}
}
