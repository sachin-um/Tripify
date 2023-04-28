<?php
    class M_Hotel_Bookings{
        private $db;

        public function __construct()
        {
            $this->db=new Database();
        }        

        

        //Add hotel booking
        public function addHotelBooking($data){             
                
            $this->db->query('INSERT INTO hotel_bookings(hotel_id,TravelerID,roomIDs,payment,
                paymentmethod,checkin_date,checkout_date)
                VALUES(:hotelID,:travelerID,:roomIDs,:payment,:paymentmethod,:check_in,:check_out)' );

                $this->db->bind(':hotelID',$data['hotelID']);
                $this->db->bind(':travelerID',$data['travelerID']);
                $this->db->bind(':roomIDs',$data['roomIDs']);
                $this->db->bind(':payment',$data['payment']);
                $this->db->bind(':paymentmethod',"Online");
                $this->db->bind(':check_in',$data['checkin']);
                $this->db->bind(':check_out',$data['checkout']);

                $status=$this->db->execute();              

            return $status;
            
        }


        //view bookings with filter
        public function viewbookings($usertype,$userid){
            $this->db->query('SELECT * FROM hotel_bookings');
            $bookings=$this->db->resultSet();
            $filteredbookings=filterBookings($bookings,$usertype,$userid);
            foreach ($filteredbookings as $booking) {
                $hotel=$this->getHotelById($booking->hotel_id);
                $booking->hotel=$hotel;
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
            $hotel=$this->getHotelById($row->hotel_id);
            $hotel_name=$hotel->Name;
            $row->hotel_id=$hotel_name;
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
        
    }

?>
