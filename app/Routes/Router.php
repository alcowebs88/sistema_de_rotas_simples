<?php 
namespace App\Routes;

//use App\Controllers\HomeController;
use App\Helpers\Request;
use App\Helpers\Uri;
class Router{
		const path = 'App\\Controllers';
	private function load($controller,$method){
	
		if(!class_exists(self::path.'\\'.$controller)){
			throw new \Exception("o controller {$controller} não existe");
			
		}
		if(!method_exists(self::path.'\\'.$controller,$method)){
			throw new \Exception("o metodo {$method} não existe");
		}

		$c = self::path.'\\'.$controller;
		$class = new $c;
		$class->$method();

	}

	public static function router(){
		return [
			"get"=>[
				"/"=>function(){
					self::load("HomeController","index");
				},

				"/contact"=>function(){
					self::load("ContactController","index");
				}
			]
		];
	}
	public function execute(){
		try {
			$router = self::router();
			$request = Request::get();
			$uri = Uri::uri('path');
			if(!isset($router[$request])){
				throw new Exception('error');
			}
			if(!array_key_exists('/contact',$router[$request])){
				throw new Exception('error');
			}
			$routers = $router[$request][$uri];
			if(!is_callable($routers)){
				throw new Exception('rota inexistente');
			}
			$routers();

		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
}



 ?>