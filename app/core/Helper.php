<?php
namespace app\core;

class Helper {

	public static function ConvertDatetime($datetime){
		$date = new DateTime($datetime, new DateTimezone("UTC"));
		$tz = new DateTimeZone(date_default_timezone_get());
		$date = setTimeZone($tz);
		return $date->format('Y-m-d H:i:sP e');
	}

}