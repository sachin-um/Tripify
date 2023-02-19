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
            foreach ($filteredbookings as $booking) {
                $guide=$this->getGuideById($booking->Guides_GuideID);
                $guide_name=$guide->Name;
                $booking->guide_name=$guide_name;
            }
            return $filteredbookings;
        }

        public function cancelBooking($id)
        {
            $this->db->query('DELETE FROM `guide_bookings` WHERE BoookingID=:booking_id');
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

            return $row;
        }


        
    }

?>