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
        $this->db->bind(':location',$data['trip_location']);
        if ($this->db->execute()) {
            return $this->db->getLastId();
        }
        else {
            return false;
        }
    }

    public function yourtrips()
    {
        $this->db->query('SELECT * FROM tour_plans WHERE TravelerID=:travelerid');
        $this->db->bind(':travelerid',$_SESSION['user_id']);
        $trips=$this->db->resultSet();

        return $trips;
        
    }

    public function addToTripPlan($bookingid,$type,$tripid)
    {
        $this->db->query('INSERT INTO trip_'.$type.'_bookings(trip_id,booking_id) VALUES(:trip_id,:booking_id)');
        $this->db->bind(':trip_id',$tripid);
        $this->db->bind(':booking_id',$bookingid);

        
        if($this->db->execute()==="duplicate") {
            return "duplicate";
        }
        elseif ($this->db->execute()) {
            return true;
        }
        else {
            return false;
        }
    }

    public function removeFromTripPlan($tripid,$bookingid,$type)
    {
        $this->db->query('DELETE FROM trip_'.$type.'_bookings WHERE trip_id:trip_id AND booking_id=:booking_id');
        $this->db->bind(':trip_id',$tripid);
        $this->db->bind(':booking_id',$bookingid);

        if ($this->db->execute()) {
            return true;
        }
        else {
            return false;
        }
    }


    public function viewTripPlan($id)
    {
        $this->db->query('SELECT * FROM tour_plans WHERE TourPlanID=:tripid');
        $this->db->bind(':tripid',$id);
        $row=$this->db->single();
        
        $this->db->query('SELECT * FROM trip_guide_bookings WHERE trip_id=:tripid');
        $this->db->bind(':tripid',$row->TourPlanID);
        $trips=$this->db->resultSet();
        $row->trip_guide_bookings=$trips;

        $this->db->query('SELECT * FROM trip_hotel_bookings WHERE trip_id=:tripid');
        $this->db->bind(':tripid',$row->TourPlanID);
        $trips=$this->db->resultSet();
        $row->trip_hotel_bookings=$trips;

        $this->db->query('SELECT * FROM trip_taxi_bookings WHERE trip_id=:tripid');
        $this->db->bind(':tripid',$row->TourPlanID);
        $trips=$this->db->resultSet();
        $row->trip_taxi_bookings=$trips;
        return $row;
    }
}



?>