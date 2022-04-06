<?php
require_once 'config/parameters.php';
function autoload($classname){
	include 'controllers/' . $classname . '.php';
}

spl_autoload_register('autoload');