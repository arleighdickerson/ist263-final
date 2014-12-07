<?php
/**
 * @author Arleigh Dickerson
 * 
 * A model loaded from a flat file data source.
 *
 */
abstract class Model extends ArrayObject {
	use magic;
	function __construct($params = []) {
		parent::__construct ( $params );
	}
	public static function find($filter = []) {
		return array_filter ( static::load ( strtolower ( static::class ) ), function ($model) use($filter) {
			return $model->matches ( $filter );
		} );
	}
	public static function findOne($id) {
		foreach ( static::find ( [ 
				'id' => $id 
		] ) as $model ) {
			return $model;
		}
	}
	protected function matches($filter) {
		foreach ( $filter as $key => $value ) {
			if ($this [$key] != $value) {
				return false;
			}
		}
		return true;
	}
	protected static function fileName() {
		return "db/" . strtolower ( static::class ) . ".json";
	}
	protected static function load() {
		$refl = new ReflectionClass ( static::class );
		$models = array_map ( function ($array) use($refl) {
			return $refl->newInstanceArgs ( [ 
					'params' => $array 
			] );
		}, json_decode ( file_get_contents ( static::fileName (), (static::class) ), true ) );
		foreach ( $models as $key => $value ) {
			$value->id = $key;
		}
		return $models;
	}
}
