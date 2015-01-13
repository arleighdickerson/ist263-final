<?php

/**
 * SERVE THIS ONE
 * 
 */
require_once ("util/bootstrap.php");
if(count($_GET) == 0){
    header( 'Location: index.php?r=front/home');
}

Controller::run ();
