<?php

namespace Pieter\FormComponent\Facades;

use Illuminate\Support\Facades\Facade;

class CDate extends Facade
{

	protected static function getFacadeAccessor() 
	{ 
		return 'cdate'; 
	}

}