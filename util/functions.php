<?php

namespace util;

function url($controller, $action, $params = []) {
	return "?r=" . $controller . "/" . $action . (empty ( $params ) ? "" : "&" . http_build_query ( $params ));
}
