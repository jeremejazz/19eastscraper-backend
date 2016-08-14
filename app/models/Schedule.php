<?php 

namespace models;

class Schedule {
    private $db;
    public function __construct(\DB\SQL $db) {
        
        $this->db = $db;
    }

    public function saveSchedule(array $schedules){
         
        foreach($schedules as $item) {
            //$this->db->exec();
            $date = $item['date'];
            

            foreach($item['schedules'] as $schedule){
                $gig = $schedule['gig'];
                $event_date = $date . '-' . str_pad($schedule['day'],2,0,STR_PAD_LEFT);
 
                //check if date exists
              
                $rows = $this->db->exec("SELECT * from schedules where `event_date` = '{$event_date}'");
                     // echo 'count: ' . count($rows);    
              
                    if(count($rows) > 0){

                        //TODO: update if event_gig different 
                        
                    }else{ 
                        //else if false, insert new items
 
                       $this->db->exec("INSERT into schedules (event_date, event_gig, date_updated) values(?, ? , now())", array( $event_date, $gig ));
  
                    }

                          
            }
        }
    }

    public function getSchedules(){
        
    }
}