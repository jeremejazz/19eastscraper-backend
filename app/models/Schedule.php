<?php 

namespace models;

class Schedule {
    private $db;
    public function __construct(\DB\SQL $db) {
        
        $this->db = $db;
    }


}