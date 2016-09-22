<?php

namespace App\Http\Model;

use App\Mappers\UserMapper;

class FreeMemberHandler extends UpdateUserHelper
{
	private $mapper;
	private $searchUserId;

	public function __construct(UserMapper $mapper, array $fieldsToUpdate, $searchUserId)
	{
		parent::__construct($fieldsToUpdate);
		$this->mapper         = $mapper;
		$this->searchUserId   = $searchUserId;
	}

	public function handleFreeMember()
	{
		$update = 0;

		if ($this->isUpgradeFreeMemberToPremiumMember() || $this->isNotUpgradeFreeMember())
		{
			$update = $this->mapper->update($this->searchUserId, $this->getFieldsToUpdate());
		}

		if ($this->isDownGradeToGuest())
		{
			$this->deleteMemberId();
			$this->deleteAlphaNumericId();

			$update = $this->mapper->update($this->searchUserId, $this->getFieldsToUpdate());
		}

		return $update;
	}

	public function isUpgradeFreeMemberToPremiumMember()
	{
		return (
			$this->containsUserType() &&
			$this->containsAccountId() &&
			$this->containsUserTypePremiumMember()
		);
	}

	public function isDownGradeToGuest()
	{

		$notContainsIds = (
			!$this->containsMemberId() &&
			!$this->containsAlphaNumericId() &&
			!$this->containsAccountId()
		);

		return (
			$this->containsUserType() &&
			$notContainsIds &&
			$this->containsUserTypeGuest()
		);
	}

	public function isNotUpgradeFreeMember()
	{
		$hasUserRequirements = (
			$this->containsUserIp() ||
			$this->containsUserLanguage() ||
			$this->containsMemberId() ||
			$this->containsAlphaNumericId()
		);

		return (
			$hasUserRequirements
		&&
			!$this->containsUserType() &&
			!$this->containsAccountId()
		);
	}
}
