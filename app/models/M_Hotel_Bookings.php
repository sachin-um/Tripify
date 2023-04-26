<?php
    class M_Hotel_Bookings{
        private $db;

        public function __construct()
        {
            $this->db=new Database();
        }        

        

        //Add hotel booking
        public function addHotelBooking($data){
            $array = unserialize($data['roomIDs']);

            print_r($array);
            echo $data['noofrooms'];
            for($i=0; $i<$data['noofrooms']; $i++){               
                
                $thisroom = array_shift($array); // Get the first value and remove it from the array
                $this->db->query('INSERT INTO hotel_bookings(hotel_id,TravelerID,roomID,roomTypeID,
                paymentDue,check_in,check_out)
                VALUES(:hotelID,:travelerID,:roomID,:roomTypeID,:paymentDue,:check_in,:check_out)' );

                $this->db->bind(':hotelID',$data['hotelID']);
                $this->db->bind(':travelerID',$data['travelerID']);
                $this->db->bind(':roomID',$thisroom);
                $this->db->bind(':roomTypeID',$data['roomTypeID']);
                $this->db->bind(':paymentDue',$data['paymentDue']);
                $this->db->bind(':check_in',$data['check_in']);
                $this->db->bind(':check_out',$data['check_out']);

                $this->db->execute();                

            }
            return true;
            
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
            $this->db->query('UPDATE `hotel_bookings` SET status="Canceled" WHERE booking_id=:booking_id');
            $this->db->bind(':booking_id',$id);
        //     if ($this->db->execute()) {
        //         return true;
        //     }
        //     else {
        //         return false;
        //     }
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

        public function RoomAvailabilityRecords($hotelID){
            $this->db->query("SELECT * FROM hotel_bookings WHERE hotel_id = :hotelID
            AND (checkin_date BETWEEN :checkin AND :checkout
                 OR checkout_date BETWEEN :checkin AND :checkout)");

            $this->db->bind(':hotelID',$hotelID);
            $this->db->bind(':checkin',$_SESSION['checkin']);
            $this->db->bind(':checkout',$_SESSION['checkout']);

            $availability=$this->db->resultSet();
            
            return $availability;
        }

        public function bookingTheRoom(){

        }
        
    }

?>
