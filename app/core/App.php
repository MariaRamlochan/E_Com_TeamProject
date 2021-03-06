<?php
namespace app\core;

class App{
	private $controller = 'app\\controllers\\Main'; 
	private $method = 'index';
	private $params = [];

	public function __construct(){
		$url = $this->parseURL();

		if(isset($url[0])){ 
			if(file_exists('app/controllers/' . $url[0] . '.php')){
				$this->controller = 'app\\controllers\\' . $url[0];
			}
			unset($url[0]);
		}

		$this->controller = new $this->controller;

		if(isset($url[1])){
			if(method_exists($this->controller, $url[1])){
				$this->method = $url[1];
			}
			
			unset($url[1]);
		}

		$this->params = $url ? array_values($url) : [];

		call_user_func_array(array($this->controller, $this->method), $this->params);
	}

	public function parseURL(){
		if(isset($_GET['url'])){
			return explode('/', filter_var(rtrim($_GET['url'], '/'),FILTER_SANITIZE_URL));
		}
	}
	
}