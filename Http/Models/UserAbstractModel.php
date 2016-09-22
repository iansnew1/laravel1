<?php

namespace App\Http\Model;

use App\Domain\FreeMember;
use App\Domain\PremiumMember;
use App\Mappers\UserMapper;
use App\Domain\UserAbstract;

abstract class UserAbstractModel
{
	const SEARCH_USER_ID  = 'search_user_id';
	const USER_TYPE       = 'user_type';
	const USER_IP         = 'user_ip';
	const USER_LANGUAGE   = 'user_language';
	const MEMBER_ID       = 'member_id';
	const ALPHANUMERIC_ID = 'alphanumeric_id';
	const ACCOUNT_ID      = 'account_id';

	public function __construct(UserMapper $mapper)
	{
		$this->mapper = $mapper;
	}

	public function getUsersAsArray(array $users)
	{
		$results = [];

		foreach ($users as $user)
		{
			$results[] = $this->getUserAsArray($user);
		}

		return $results;
	}

	protected function getUserAsArray(UserAbstract $userAbstract)
	{
		$userData = $this->getBasicUserDataAsArray($userAbstract);

		if ($userAbstract instanceof FreeMember)
		{
			$userData[static::MEMBER_ID]       = $userAbstract->getMemberId();
			$userData[static::ALPHANUMERIC_ID] = $userAbstract->getAlphaNumericId();
		}

		if ($userAbstract instanceof PremiumMember)
		{
			$userData[static::MEMBER_ID]       = $userAbstract->getMemberId();
			$userData[static::ALPHANUMERIC_ID] = $userAbstract->getAlphaNumericId();
			$userData[static::ACCOUNT_ID]      = $userAbstract->getAccountId();
		}

		return $userData;
	}

	private function getBasicUserDataAsArray(UserAbstract $userAbstract)
	{
		return [
			static::SEARCH_USER_ID => $userAbstract->getSearchUserId(),
			static::USER_TYPE      => $userAbstract->getUserType(),
			static::USER_IP        => $userAbstract->getUserIp(),
			static::USER_LANGUAGE  => $userAbstract->getUserLanguage()
		];
	}
}
