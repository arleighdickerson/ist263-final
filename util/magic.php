<?php
trait magic {
	public function __get($key) {
		return @$this [$key] ?  : null;
	}
	public function __set($key, $value) {
		$this [$key] = $value;
	}
	
	public function __isset($key){
		return isset($this[$key]);
	}
}
