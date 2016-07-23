<?php 
// composer autoloader for required packages and dependencies
require_once('vendor/autoload.php');

/** @var \Base $f3 */
$f3 = \Base::instance();
// F3 autoloader for application business code
$f3->set('AUTOLOAD', 'app/');
$f3->config('config/config.ini');
require_once('config/routes.php');
 

$f3->run(); 