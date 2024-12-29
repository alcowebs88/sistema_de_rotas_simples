<?php 
namespace App\Helpers;

class Uri{
	public static function uri($type){
		return parse_url($_SERVER['REQUEST_URI'])[$type];
	}
}

 ?>