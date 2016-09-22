<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetAllUserRequest;
use App\Http\Requests\ShowUserRequest;
use App\Http\Model\GetAllUserModel;
use App\Http\Model\ShowUserModel;
use App\Http\Requests\StoreUserRequest;
use App\Http\Model\StoreUserModel;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Model\UpdateUserModel;
use App\Http\Requests\DestroyUserRequest;
use App\Http\Model\DestroyUserModel;

class UserController extends UserControllerAbstract
{
	public function index(GetAllUserRequest $request, GetAllUserModel $model)
	{
		return $this->getSuccessJsonView($model->all());
	}

	public function show(ShowUserRequest $request, ShowUserModel $model, $searchUserId)
	{
		return $this->getSuccessJsonView($model->get($searchUserId));
	}

	public function store(StoreUserRequest $request, StoreUserModel $model)
	{
		return $this->getSuccessJsonView($model->store($request->getFieldsToUpdate()));
	}

	public function destroy(DestroyUserRequest $request, DestroyUserModel $model, $searchUserId)
	{
		return $this->getSuccessJsonView($model->destroy($searchUserId));
	}

	public function update(UpdateUserRequest $request, UpdateUserModel $model, $searchUserId)
	{
		return $this->getSuccessJsonView($model->update($searchUserId, $request->getFieldsToUpdate()));
	}
}
