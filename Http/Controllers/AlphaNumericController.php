<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShowAlphaNumericRequest;
use App\Http\Model\ShowAlphaNumericModel;

class AlphaNumericController extends UserControllerAbstract
{
	public function show(ShowAlphaNumericRequest $request, ShowAlphaNumericModel $model, $alphaNumericId)
	{
		return $this->getSuccessJsonView($model->get($alphaNumericId));
	}
}
