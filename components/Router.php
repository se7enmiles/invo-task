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
	 *
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