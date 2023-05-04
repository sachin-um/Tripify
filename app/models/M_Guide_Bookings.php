<?php
    class M_Guide_Bookings{
        private $db;

        public function __construct()
        {
            $this->db=new Database();
        }



        //view bookings with filter
        public function viewbookings($usertype,$userid){
            $this->db->query('SELECT * FROM guide_bookings');
            $bookings=$this->db->resultSet();
            $filteredbookings=filterBookings($bookings,$usertype,$userid);
            if ($usertype='Traveler') {
                foreach ($filteredbookings as $booking) {
                    $guide=$this->getGuideById($booking->Guides_GuideID);
                    $booking->guide=$guide;
                }
            }
            elseif ($usertype='Guide') {
                foreach ($filteredbookings as $booking) {
                    $traveler=$this->getUserDetails($booking->TravelerID);
                    $traveler_name=$traveler->Name;
                    $booking->traveler_name=$traveler_name;
                    echo $traveler->Name;
                    
                }
            }
            return $filteredbookings;
        }

        public function cancelBooking($id)
        {
            $this->db->query('UPDATE `guide_bookings` SET status="Canceled" WHERE BoookingID=:booking_id');
            $this->db->bind(':booking_id',$id);

            

            if ($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        



        public function getUserDetails($userID)
        {
            $this->db->query('SELECT * FROM users WHERE UserID= :userid');
            $this->db->bind(':userid',$userID);
            $row=$this->db->single();

            return $row;
        }
        public function getGuideLangs($userID)
        {
            $this->db->query('SELECT * FROM guide_languages WHERE guide_id= :userid');
            $this->db->bind(':userid',$userID);
            $row=$this->db->resultSet();

            return $row;
        }


        public function getGuideById($id){
            $this->db->query('SELECT * FROM guides WHERE GuideID=:id');
            $this->db->bind(':id',$id);

            $row=$this->db->single();

            return $row;
        }


        public function getGudieBookingbyId($id){
            $this->db->query('SELECT * FROM guide_bookings WHERE BookingID=:id');
            $this->db->bind(':id',$id);

            $row=$this->db->single();
            $guide=$this->getGuideById($row->Guides_GuideID);
            $guide_name=$guide->Name;
            $row->guide_name=$guide_name;

            return $row;
        }


        public function searchAvailableSlots($data){
            $this->db->query('SELECT * FROM guide_bookings WHERE 
            StartDate=:startdate AND EndDate=:enddate');
            $this->db->bind(':startdate',$data['startdate']);
            $this->db->bind(':enddate',$data['enddate']);
            $result=$this->db->resultSet();
            $date = $bookingDate;
            $time = $bookingTime;
            $bookingdatetime = date('Y-m-d H:i:s', strtotime("$date $time"));
        
            $est_datetime = date('Y-m-d H:i:s', strtotime("$bookingdatetime +$est"));
            $New_end_date = date('Y-m-d', strtotime($est_datetime));
            

            $this->db->query('SELECT COUNT(*) AS conflicting_bookings 
                  FROM guide_bookings
                  WHERE Guides_GuideID = :vehicle_id AND (booking_date=:new_start_date OR est_end_date=:new_start_date )
                  AND (
                    ((:new_start <= CONCAT(booking_date, \' \', booking_time) ) AND :new_end<=CONCAT(est_end_date, \' \', est_end_time)  )
                    OR (CONCAT(booking_date, \' \', booking_time) <= :new_start  AND :new_start <CONCAT(est_end_date, \' \', est_end_time) ) 
                    OR (CONCAT(booking_date, \' \', booking_time) < :new_start  AND :new_start <=CONCAT(est_end_date, \' \', est_end_time) )
                    )');


                        
            $this->db->bind(':vehicle_id', $vehicleID);
            $this->db->bind(':new_start', $bookingdatetime);
            $this->db->bind(':new_end', $est_datetime);
            $this->db->bind(':new_start_date', $bookingDate);
            $this->db->bind(':new_end_date', $New_end_date);

            $this->db->execute();

            $result = $this->db->single();
            $conflicting_bookings = $result->conflicting_bookings;

            if($conflicting_bookings>0){
                return true;
            }else{
                return false;
            }


            return $result;




        }


        
    }

?>