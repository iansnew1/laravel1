<?php

namespace App\Http\Response\JsonView;

use App\Http\Response\JsonView\JsonViewAbstract;

class SuccessJsonView extends JsonViewAbstract
{
	protected function getFormattedContent($data)
	{
		return [
			'success' => true,
			'data'    => $data
		];
	}
}
