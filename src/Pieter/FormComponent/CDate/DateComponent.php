<?php

namespace Pieter\FormComponent\CDate;
use Illuminate\Html\FormBuilder;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Html\HtmlBuilder as Html;
use Illuminate\Session\Store as Session;

class DateComponent extends FormBuilder
{

	public function __construct(Html $html, UrlGenerator $url, $csrfToken)
	{
		parent::__construct($html, $url, $csrfToken);
	}

	public function custom_year($name, $range = array(), $selected = null, $options = array())
	{
		$output = array();
		if(is_array($range)) {

			$from = $range[0];
			$to = $range[1];

		} else {

			$from = 1950;
			$to = (int)date('Y');

		}

		for ($x = $from; $x < (int)$to; ++$x) {

	    	$output[$x] = $x;

    	}

	    return $this->select($name, $output, $selected, $options);

	}

} 