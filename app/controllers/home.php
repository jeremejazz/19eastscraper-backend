<?php

namespace controllers;
 
 

class home extends controller{
	function index(\Base $f3, $params) {
 
		$f3->set('title','test');
	 	$f3->set('view', 'home.htm');
	}
 
}