<?php
    class M_Hotel_Bookings{
        private $db;

        public function __construct()
        {
            $this->db=new Database();
        }




        

        

        //Add hotel booking
        public function addHotelBooking(){
            $this->db->query('INSERT INTO hotel_bookings(hotel_id,TravelerID,roomID,roomTypeID,
            payment,paymentmethod,booking_start_date,booking_end_date)
            VALUES(:hoteID,:travelerID,:roomID,:roomTypeID,:payment,:paymentMethod,:booking_start,:booking_end)' );
            $this->db->bind(':hoteID',$data['caption']);
            $this->db->bind(':travelerID',$data['caption']);
            $this->db->bind(':roomID',$data['caption']);
            $this->db->bind(':roomTypeID',$data['caption']);
            $this->db->bind(':payment',$data['caption']);
            $this->db->bind(':paymentMethod',$data['caption']);
            $this->db->bind(':booking_start',$data['caption']);
            $this->db->bind(':booking_end',$data['caption']);

            if ($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }


        //view bookings with filter
        public function viewbookings($usertype,$userid){
            $this->db->query('SELECT * FROM hotel_bookings');
            $bookings=$this->db->resultSet();
            $filteredbookings=filterBookings($bookings,$usertype,$userid);
            foreach ($filteredbookings as $booking) {
                $hotel=$this->getHotelById($booking->hotel_id);
                $hotel_name=$hotel->Name;
                $booking->hotel_id=$hotel_name;
            }
            return $filteredbookings;
        }


        public function cancelBooking($id)
        {
            $this->db->query('DELETE FROM `hotel_bookings` WHERE booking_id=:booking_id');
            $this->db->bind(':booking_id',$id);

            

            if ($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }


        public function getHotelById($id){
            $this->db->query('SELECT * FROM hotels WHERE HotelID=:id');
            $this->db->bind(':id',$id);

            $row=$this->db->single();

            return $row;
        }

        public function getUserDetails($userID)
        {
            $this->db->query('SELECT * FROM users WHERE UserID= :userid');
            $this->db->bind(':userid',$userID);
            $row=$this->db->single();

            return $row;
        }

        public function getTaxiById($id){
            $this->db->query('SELECT * FROM taxiowner WHERE OwnerID=:id');
            $this->db->bind(':id',$id);

            $row=$this->db->single();

            return $row;
        }

        public function getGuideById($id){
            $this->db->query('SELECT * FROM guides WHERE GuideID=:id');
            $this->db->bind(':id',$id);

            $row=$this->db->single();

            return $row;
        }


        public function getHotelBookingbyId($id){
            $this->db->query('SELECT * FROM hotel_bookings WHERE booking_id=:id');
            $this->db->bind(':id',$id);

            $row=$this->db->single();

            return $row;
        }


        
    }

?>
