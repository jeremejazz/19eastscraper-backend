<?php 
// composer autoloader for required packages and dependencies
require_once('vendor/autoload.php');

/** @var \Base $f3 */
$f3 = \Base::instance();
// F3 autoloader for application business code
$f3->set('AUTOLOAD', 'app/');

//load all route files
$files = glob('app/routes/*.php');
foreach ($files as $file) {
    require($file);   
}

$f3->run();