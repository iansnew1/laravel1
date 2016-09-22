<?php

namespace App\Http\Model;

use App\Mappers\UserMapper;

abstract class UpdateUserHelper
{
	const SEARCH_USER_ID  = 'search_user_id';
	const USER_TYPE       = 'user_type';
	const USER_IP         = 'user_ip';
	const USER_LANGUAGE   = 'user_language';
	const MEMBER_ID       = 'member_id';
	const ALPHANUMERIC_ID = 'alphanumeric_id';
	const ACCOUNT_ID      = 'account_id';
	const GUEST           = 'guest';
	const FREE_MEMBER     = 'free';
	const PREMIUM_MEMBER  = 'premium';

	private $fieldsToUpdate;

	public function __construct( array $fieldsToUpdate)
	{
		$this->fieldsToUpdate = $fieldsToUpdate;
	}

	public function getFieldsToUpdate()
	{
		return $this->fieldsToUpdate;
	}

	protected function containsUserIp()
	{
		return  array_key_exists(static::USER_IP, $this->fieldsToUpdate);
	}

	protected function containsUserLanguage()
	{
		return  array_key_exists(static::USER_LANGUAGE, $this->fieldsToUpdate);
	}

	protected function containsUserType()
	{
		return  array_key_exists(static::USER_TYPE, $this->fieldsToUpdate);
	}

	protected function containsMemberId()
	{
		return array_key_exists(static::MEMBER_ID, $this->fieldsToUpdate);
	}

	protected function containsAlphaNumericId()
	{
		return array_key_exists(static::ALPHANUMERIC_ID, $this->fieldsToUpdate);
	}

	protected function containsAccountId()
	{
		return array_key_exists(static::ACCOUNT_ID, $this->fieldsToUpdate);
	}

	protected function containsUserTypeGuest()
	{
		return $this->fieldsToUpdate[static::USER_TYPE] === static::GUEST;
	}

	protected function containsUserTypeFreeMember()
	{
		return $this->fieldsToUpdate[static::USER_TYPE] === static::FREE_MEMBER;
	}

	protected function containsUserTypePremiumMember()
	{
		return $this->fieldsToUpdate[static::USER_TYPE] === static::PREMIUM_MEMBER;
	}

	protected function deleteMemberId()
	{
		$this->fieldsToUpdate[static::MEMBER_ID] = null;
	}

	protected function deleteAccountId()
	{
		$this->fieldsToUpdate[static::ACCOUNT_ID] = null;
	}

	protected function deleteAlphaNumericId()
	{
		$this->fieldsToUpdate[static::ALPHANUMERIC_ID] = null;
	}
}
