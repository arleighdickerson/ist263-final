<?php
class AjaxController extends Controller {
	protected final function invokeAction($name, $args) {
		try {
			$refl = new ReflectionClass ( ucfirst ( $name ) );
			$method = $refl->getMethod ( "find" );
			$models = $method->invokeArgs ( null, [ 
					'filter' => $args 
			] );
			$this->renderAjax ( $models );
		} catch ( Exception $e ) {
			$this->notFound ( $e );
		}
	}
	protected function renderAjax($models) {
		$view = new View ( [ 
				'models' => array_map ( function ($model) {
					return $model->flatten ();
				}, $models ) 
		] );
		$view->renderPartial ( "ajax" );
	}
}
