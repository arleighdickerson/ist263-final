<?php
/**
 * Bootstraps the app
 */
require_once 'util/functions.php';
require_once 'util/magic.php';
require_once 'views/view.php';
require_once 'controllers/controller.php';
require_once 'controllers/front.php';
require_once 'models/model.php';
require_once 'models/location.php';
require_once 'models/item.php';
require_once 'models/inventory.php';
(new FrontController ())->run ();
