<?php

namespace controllers\api; 
/*This class serves the API. Should be accessed by external client*/

class schedules extends \controllers\controller{
    
    function getCurrentSchedules(){
        header('Content-Type: application/json');
        $start = date('Y-m-1');   //ahh can't fint an SQL get current month for now
        $res = $this->db->exec("SELECT * from schedules where event_date >= ? ", array($start));
        echo json_encode($res);
    }

}