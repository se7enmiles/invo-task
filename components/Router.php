<?php


class Router {
	/**
	 * @var array containing routes
	 */
	private $routes;

	/**
	 * Router constructor.
	 */
	public function __construct() {
		$routesPath = ROOT.'/config/routes.php';
		$this->routes = include ($routesPath);
	}

	/**
	 * Request string trim and return
	 * @return string
	 */
	private function getUri(){
		if (!empty($_SERVER['REQUEST_URI'])){
			return trim($_SERVER['REQUEST_URI'], '/');
		}
	}

	/**
	 * analyzing request, generates controller name, action name
	 * includes controller class and runs the action with parameters (id required)
	 * single universal interface for all methods
	 */
	public function run(){
		$uri = $this->getUri();
		$i = 0;
		foreach ($this->routes as $pattern=>$path){

			if(preg_match("~$pattern~", $uri)){
				$i++;
				$route = preg_replace("~$pattern~", $path, $uri);

				$segments = explode('/', $route);

				$controllerName = ucfirst(array_shift($segments).'Controller');
				$actionName = 'action'.ucfirst(array_shift($segments));
				$controllerFile = ROOT.'/controllers/'.$controllerName.'.php';

				$parameters = $segments;

				if(file_exists($controllerFile)) {
					include_once( $controllerFile );
				}
				if(!method_exists($controllerName, $actionName)){
					header('Location: /views/user/404.php');
				}
				$controllerObject = new $controllerName;
				$result = call_user_func_array(array($controllerObject,$actionName), $parameters);
				if ($result != null){
					break;
				}
			}
		}
		if ($i == 0){
			header("Location: /views/user/404.php");
		}
	}
}