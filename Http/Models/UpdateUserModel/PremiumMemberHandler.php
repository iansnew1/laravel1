<?php

namespace App\Http\Model;

use App\Mappers\UserMapper;

class PremiumMemberHandler extends UpdateUserHelper
{
	private $mapper;
	private $searchUserId;

	public function __construct(UserMapper $mapper, array $fieldsToUpdate, $searchUserId)
	{
		parent::__construct($fieldsToUpdate);
		$this->mapper         = $mapper;
		$this->searchUserId   = $searchUserId;
	}

	public function handlePremiumMember()
	{
		$update = 0;

		if ($this->isNotUpgradePremiumMember())
		{
			$update =  $this->mapper->update($this->searchUserId, $this->getFieldsToUpdate());
		}

		if ($this->isDownGradeToGuest())
		{
			$this->deleteMemberId();
			$this->deleteAlphaNumericId();
			$this->deleteAccountId();

			$update = $this->mapper->update($this->searchUserId, $this->getFieldsToUpdate());
		}

		if ($this->isDownGradeToFreeMember())
		{
			$this->deleteAccountId();

			$update = $this->mapper->update($this->searchUserId, $this->getFieldsToUpdate());
		}

		return $update;
	}

	private function isDownGradeToGuest()
	{
		$containsUserTypeAndTypeGuest = ($this->containsUserType() && $this->containsUserTypeGuest());

		$notContainsMemberIdAlphaIdAccountId = (
			!$this->containsMemberId() &&
			!$this->containsAlphaNumericId() &&
			!$this->containsAccountId()
		);

		return (
			$containsUserTypeAndTypeGuest && $notContainsMemberIdAlphaIdAccountId
		);
	}

	private function isNotUpgradePremiumMember()
	{
		$userIpAndLanguage = ($this->containsUserIp() || $this->containsUserLanguage());

		return (
			$userIpAndLanguage ||
			$this->containsMemberId() ||
			$this->containsAlphaNumericId() ||
			$this->containsAccountId()
		);
	}

	private function isDownGradeToFreeMember()
	{
		return (
			$this->containsUserType() &&
			!$this->containsAccountId() &&
			$this->containsUserTypeFreeMember()
		);
	}
}
