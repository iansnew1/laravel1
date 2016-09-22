<?php

namespace App\Http\Response\JsonView;

use App\Http\Model\ModelInterface;
use Illuminate\Http\JsonResponse;

abstract class JsonViewAbstract extends JsonResponse
{
	abstract protected function getFormattedContent($data);

	public function __construct($data)
	{
		parent::__construct($this->getFormattedContent($data));
	}
}
