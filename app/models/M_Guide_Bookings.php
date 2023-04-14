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


        
    }

?>