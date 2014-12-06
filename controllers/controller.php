<?php
abstract class Controller {
	const DEFAULT_CONTROLLER_NAME = "front";
	const DEFAULT_ACTION_NAME = "default";
	protected $title = "";
	protected function notFound() {
		$this->title = "404'd";
		$this->render ( "notfound" );
	}
	protected function actionNames() {
		$refl = new ReflectionClass ( get_class ( $this ) );
		$methods = $refl->getMethods ( ReflectionMethod::IS_PUBLIC );
		$methods = array_filter ( $methods, function ($method) {
			return substr ( $method->getName (), 0, 6 ) === "action";
		} );
		$names = array_map ( function ($method) {
			return substr ( 6, $method->getName () );
		}, $methods );
		
		return $names;
	}
	protected final function render($name, $params = []) {
		$root = new View ( [ 
				'title' => $this->title,
				'template' => [ 
						"name" => $name,
						"params" => $params 
				] 
		] );
		$root->renderPartial ( "root" );
	}
	protected final function invokeAction($name, $args) {
		try {
			$method = new ReflectionMethod ( get_class ( $this ), "action" . ucfirst ( $name ) );
			return $method->invokeArgs ( $this, $args );
		} catch ( Exception $e ) {
			$this->notFound ();
		}
	}
	public static function run() {
		$controller = self::resolveControllerName ();
		$action = self::resolveActionName ();
		
		$refl = new ReflectionClass ( ucfirst ( $controller ) . "Controller" );
		$controller = $refl->newInstanceWithoutConstructor ();
		
		$args = $_GET;
		if (isset ( $args ["r"] )) {
			unset ( $args ["r"] );
		}
		$controller->invokeAction ( $action, $args );
	}
	private static function resolveControllerName() {
		return @explode ( "/", $_GET ["r"] )[0] ?  : self::DEFAULT_CONTROLLER_NAME;
	}
	private static function resolveActionName() {
		return @explode ( "/", $_GET ["r"] )[1] ?  : self::DEFAULT_ACTION_NAME;
	}
	protected function resolvePost($keys) {
		$res = [ ];
		foreach ( $keys as $key ) {
			if (isset ( $_POST [$key] )) {
				$res [$key] = $_POST [$key];
			} else {
				return null;
			}
		}
		return $res;
	}
}
