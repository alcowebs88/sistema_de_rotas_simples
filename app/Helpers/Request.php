<?php 
namespace App\Helpers;

class Request{
	public static function get(){
		return strtolower($_SERVER['REQUEST_METHOD']);
	}
}


 ?>