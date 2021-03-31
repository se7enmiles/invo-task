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
		foreach ($this->routes as $pattern=>$path){
			if(preg_match("~$pattern~", $uri)){

				$route = preg_replace("~$pattern~", $path,$uri);

				$segments = explode('/', $route);

				$controllerName = ucfirst(array_shift($segments).'Controller');
				$actionName = 'action'.ucfirst(array_shift($segments));

				$controllerFile = ROOT.'/controllers/'.$controllerName.'.php';

				if(file_exists($controllerFile)){
					include_once ($controllerFile);
				} else {
					header('Location: /error');
					return true;
				}

				if (method_exists($controllerName, $actionName)) {
					// Method does exist
				} else {
					header('Location: /error');
					return true;
				}

				$parameters = $segments;
				$controllerObject = new $controllerName;
				$result = call_user_func_array(array($controllerObject,$actionName), $parameters);

				if ($result != null){
					break;
				}
			}
		}
	}
}