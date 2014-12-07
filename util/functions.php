<?php

namespace util;

const ENTRY_FILE = "/index.php";
function routeUrl($route = null) {
	return ENTRY_FILE . ($route == null ? "" : "?r=" . $route);
}
function actionUrl($controller, $action, $params = []) {
	return ENTRY_FILE . "?r=" . $controller . "/" . $action . (empty ( $params ) ? "" : "&" . http_build_query ( $params ));
}
function redirect($url, $permanent = false) {
	header ( 'Location: ' . $url, true, $permanent ? 301 : 302 );
	exit ();
}
