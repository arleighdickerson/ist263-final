<?php
/**
 * @author Arleigh Dickerson
 * 
 * A model loaded from a flat file data source implementing JsonSerializable so 
 * we can send it over the wire on ajax calls.
 *
 */
abstract class Model extends ArrayObject implements JsonSerializable {
	use magic;
	function __construct($params = []) {
		parent::__construct ( $params );
	}
	public function jsonSerialize() {
		return ( array ) $this;
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
		return null;
	}
	protected function matches($filter) {
		foreach ( $filter as $key => $value ) {
			if ($this [$key] != $value) {
				return false;
			}
		}
		return true;
	}
	protected static function fileName($type) {
		return "db/" . strtolower ( $type ) . ".txt";
	}
	protected static function load($type) {
		$refl = new ReflectionClass ( static::class );
		return array_map ( function ($array) use($refl) {
			return $refl->newInstanceArgs ( [ 
					'params' => $array 
			] );
		}, json_decode ( file_get_contents ( static::fileName ( $type ) ), true ) );
	}
}
