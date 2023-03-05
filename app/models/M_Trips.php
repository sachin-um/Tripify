<?php

class M_Trips{
    private $db;


    public function __construct()
    {
        $this->db=new Database();
    }


    public function createAtrip($data)
    {
        $this->db->query('INSERT INTO tour_plans(TravelerID,trip_name,start_date,end_date,location) VALUES(:TravelerID,:trip_name,:start_date,:end_date,:location)');
        $this->db->bind(':TravelerID',$data['traveler_id']);
        $this->db->bind(':trip_name',$data['trip_name']);
        $this->db->bind(':start_date',$data['start_date']);
        $this->db->bind(':end_date',$data['end_date']);

        if ($this->db->execute()) {
            return true;
        }
        else {
            return false;
        }
    }
}



?>