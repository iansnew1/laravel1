<?php

namespace App\Http\Model;

use App\Mappers\UserMapper;

class GuestHandler extends UpdateUserHelper
{
	private $mapper;
	private $searchUserId;

	public function __construct(UserMapper $mapper, array $fieldsToUpdate, $searchUserId)
	{
		parent::__construct($fieldsToUpdate);
		$this->mapper         = $mapper;
		$this->searchUserId   = $searchUserId;
	}

	public function handleGuest()
	{
		$update = 0;

		if ($this->isUpgradeGuestToFreeMember() || $this->isUpgradeGuestToPremiumMember() || $this->isNotUpgradeGuest())
		{
			$update = $this->mapper->update($this->searchUserId , $this->getFieldsToUpdate());
		}

		return $update;
	}

	private function isUpgradeGuestToFreeMember()
	{
		return (
			$this->containsUserType() &&
			$this->containsMemberId() &&
			$this->containsAlphaNumericId() &&
			$this->containsUserTypeFreeMember()
		);
	}

	public function isUpgradeGuestToPremiumMember()
	{
		$containsIds = (
			$this->containsMemberId() &&
			$this->containsAccountId() &&
			$this->containsAlphaNumericId()
		);

		return (
			$this->containsUserType() &&
			$this->containsUserTypePremiumMember() &&
			$containsIds
		);
	}

	public function isNotUpgradeGuest()
	{
		$doesNotContainId = (
			!$this->containsMemberId() &&
			!$this->containsUserType() &&
			!$this->containsAlphaNumericId() &&
			!$this->containsAccountId()
		);

		return (
		(
			$this->containsUserIp() ||
			$this->containsUserLanguage()
		) &&
			$doesNotContainId
		);
	}
}
