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
              
                $rows = $this->db->exec("SELECT * from schedules where `event_date` = '{$event_date}' order by `event_date` ASC");
   
              
                    if(count($rows) > 0){

                            foreach($rows as $row){

                                if( $row['event_gig'] != $gig ){
                                    $this->db->exec("UPDATE schedules set event_gig = :gig, date_updated = now() where id = :id",
                                     array(   
                                         ':gig'             => $gig, 
                                         ':id'              => $row['id']  
                                         )
                                    );
                                }

                            }
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