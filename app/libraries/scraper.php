<?php


namespace libraries;
 
use Symfony\Component\DomCrawler\Crawler;

class scraper {

	function scrape($target,$body) {

		///(.*) - (.*)<br>
//preg_grep("/(.*) - (.*)<br>/", explode("\n", $input_lines));
 

		$crawler = new Crawler($body);

		foreach ($crawler->filter("#gig_schedule_tab_content") as $domElement) {
			var_dump($domElement);
		}

	}

 
}