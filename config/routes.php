<?php


$f3->route('GET /', 'controllers\Home->index');
$f3->route('GET|POST /@controller', 'controllers\@controller->index');
$f3->route('GET|POST /@controller/@action', 'controllers\@controller->@action');

$f3->route('GET /api/schedules/data/json', 'controllers\api\schedules->getJSON');