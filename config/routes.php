<?php


$f3->route('GET /', 'controller\Home->index');
$f3->route('GET|POST /@controller', 'controller\@controller->index');
$f3->route('GET|POST /@controller/@action', 'controller\@controller->@action');