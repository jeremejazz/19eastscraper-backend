<?php


namespace controllers;

use Symfony\Component\DomCrawler\Crawler;
use \Models\Schedule;
/*CLI events*/
 
class process extends controller{
	
	function fetchData(\Base $f3, $params) {
 
		$web = \Web::instance();
		$data = $web->request($f3->get('TARGET'));
		$schedules = new \models\Schedule($this->db);
		$crawler = new Crawler($data['body']);
		$processed_data = []; 
			/*
				[
					date: ''
					schedules: []
				],				
			*/
		$nodeValues = $crawler
				 	->filter("#gig_schedule_tab_content > div.content")
				 	->each(function (Crawler $node, $i) {
				 		$sched = array();
				 		$schedules = array();
				 		preg_match_all("/(.*) - (.*)/", $node->text(), $sched);

				 		foreach($sched as $key1 => $sched_item){
				 			if ($key1 > 0){

				 				$keyName = 'day';
				 				if($key1 == 2){

				 					$keyName = 'gig';
				 				}

					 			foreach ($sched_item as $key2 => $item) {
					 				$schedules [$key2][$keyName] = $item;
					 			}
				 			}
				 		}
		    			return array(
		    					'date' => date('Y-m', strtotime($node->filter('h2')->text())),
		    					'schedules' => $schedules,
		    					'raw' => $node->html()
		    				);
					});;
					
			 $schedule = new Schedule($this->db);
			 $schedule->saveSchedule($nodeValues);
	}

 
}