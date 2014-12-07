<?php
class Controller {
	const ACTION_NAME_PREFIX = "action";
	const DEFAULT_TITLE = "";
	protected $title = self::DEFAULT_TITLE;
	protected $description = '';
	protected $keywords = [ 
			'Gas Station',
			'West Virginia',
			'Convenience Store' 
	];
	protected $author = 'Arleigh Dickerson';
	protected function notFound(Exception $e = null) {
		$this->title = "Ooops";
		$params = $e == null ? [ ] : [ 
				'message' => $e->getMessage (),
				'code' => $e->getCode () 
		];
		$this->render ( "notfound", $params );
	}
	protected function actionNames() {
		$refl = new ReflectionClass ( get_class ( $this ) );
		$methods = $refl->getMethods ( ReflectionMethod::IS_PUBLIC );
		$methods = array_filter ( $methods, function ($method) {
			return substr ( $method->getName (), 0, 6 ) === self::ACTION_NAME_PREFIX;
		} );
		$names = array_map ( function ($method) {
			return substr ( 6, $method->getName () );
		}, $methods );
		
		return $names;
	}
	protected function render($name, $params = []) {
		$root = new View ( [ 
				'title' => $this->title,
				'description' => $this->description,
				'author' => $this->author,
				'keywords' => $this->keywords,
				'template' => [ 
						"name" => $name,
						"params" => $params 
				] 
		] );
		$root->renderPartial ( "root" );
	}
	protected function invokeAction($name, $args) {
		$method = new ReflectionMethod ( get_class ( $this ), self::ACTION_NAME_PREFIX . ucfirst ( $name ) );
		return $method->invokeArgs ( $this, $args );
	}
	public static function run() {
		try {
			$controller = self::resolveControllerName ();
			$action = self::resolveActionName ();
			$refl = new ReflectionClass ( ucfirst ( $controller ) . "Controller" );
			$controller = $refl->newInstanceWithoutConstructor ();
			$args = $_GET;
			if (isset ( $args ["r"] )) {
				unset ( $args ["r"] );
			}
			$controller->invokeAction ( $action, $args );
		} catch ( Exception $e ) {
			$controller = new Controller ();
			$controller->notFound ( $e );
		}
	}
	private static function resolveControllerName() {
		return @explode ( "/", $_GET ["r"] )[0] ?  : null;
	}
	private static function resolveActionName() {
		return @explode ( "/", $_GET ["r"] )[1] ?  : null;
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
