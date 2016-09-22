<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShowMemberRequest;
use App\Http\Model\ShowMemberModel;

class MemberController extends UserControllerAbstract
{
	public function show(ShowMemberRequest $request, ShowMemberModel $model, $memberId)
	{
		return $this->getSuccessJsonView($model->get($memberId));
	}
}
