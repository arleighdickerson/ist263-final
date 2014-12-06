<?php
class View extends ArrayObject {
	use magic;
	function __construct($params = []) {
		parent::__construct ( $params );
	}
	
	public function renderPartial($templateName) {
		$template = "views/" . $templateName . ".php";
		if (file_exists ( $template )) {
			include $template;
		} else {
			throw new Exception ( "template " . $template . " not found" );
		}
	}
}
