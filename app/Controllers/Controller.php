<?php 
namespace App\Controllers;

use League\Plates\Engine;
abstract class Controller{
	public function view($view,$data = []){
		$path = dirname(__FILE__,2).DIRECTORY_SEPARATOR.'Views';
		

		$templates = new Engine($path);
		echo $templates->render($view,$data);
	}
}


 ?>