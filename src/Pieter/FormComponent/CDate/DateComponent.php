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

	public function cDate($name, $value = '', $range = array(), $selected = null, $options = array())
	{

		$date = array();
		for($d=1; $d <= 31; ++$d) {
			$date[$d] = $d;
		}

		$month = array();
		for($m=1; $m <= 12; ++$m) {
			$month[$m] = date_format(date_create("2013-$m-01"), 'M');
		}

		$date = $this->select($name, $date, $selected, $options);
		$month = $this->select($name, $month, $selected, $options);

		return $date . '-' . $month . '-' . $this->custom_year($name, $range['year'], $selected, $options);

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