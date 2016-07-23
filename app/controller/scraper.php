<?php


namespace Controller;
 
use Symfony\Component\DomCrawler\Crawler;

class scraper {
	function bar(\Base $f3, $params) {

		///(.*) - (.*)<br>
//preg_grep("/(.*) - (.*)<br>/", explode("\n", $input_lines));
	 
$web = \Web::instance();
$test = $web->request('http://localhost/19east/2.html');
 
$crawler = new Crawler($test['body']);
 
foreach ($crawler->filter("#gig_schedule_tab_content") as $domElement) {
    var_dump($domElement);
}

	}

 
}