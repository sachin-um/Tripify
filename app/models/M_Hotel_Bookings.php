<?php
    class M_Hotel_Bookings{
        private $db;

        public function __construct()
        {
            $this->db=new Database();
        }        

        

        //Add hotel booking
        public function addHotelBooking($data){   
            $roomTypes = implode(",",$_SESSION['roomIDs']);

            $this->db->query('INSERT INTO hotel_bookings(hotel_id,TravelerID,roomTypes,payment,paymentmethod,payment_status,
            checkin_date,checkout_date)
            VALUES(:hotelID,:travelerID,:roomTypes,:payment,:paymentmethod,:payment_status,:check_in,:check_out)' );

            $this->db->bind(':hotelID',$data['hotelID']);
            $this->db->bind(':travelerID',$data['travelerID']);
            $this->db->bind(':roomTypes',$roomTypes);
            $this->db->bind(':payment',$data['payment']);
            $this->db->bind(':paymentmethod',$data['paymentMethod']);

            if($data['paymentMethod']=="Online"){
                $this->db->bind(':payment_status',"Paid");
            }else{
                $this->db->bind(':payment_status',"Yet to pay");
            }            
            $this->db->bind(':check_in', $data['checkin']);
            $this->db->bind(':check_out', $data['checkout']);
            

            $roomIDs = $_SESSION['roomIDs'];    
            
            if($this->db->execute()){
                // $this->db->query('SELECT booking_id from hotel_bookings where TravelerID=:travelerID 
                // and hotel_id=:hotelID and checkin_date=:check_in and checkout_date=:check_out');

                // $this->db->bind(':hotelID',$data['hotelID']);
                // $this->db->bind(':travelerID',$data['travelerID']);
                // $this->db->bind(':check_in', $data['checkin']);
                // $this->db->bind(':check_out', $data['checkout']);

                // $bookingID = $this->db->single();

                // //[125450,1,12345,2]
                // for($i=0;$i<=2;$i=$i+2){
                //     $this->db->query('INSERT INTO hotel_roomIDs(bookingID,roomTypeID,noofrooms)
                //     VALUES(:bookingID,:roomTypeID,:noofrooms)');

                //     $this->db->bind(':bookingID',$bookingID);
                //     $this->db->bind(':roomTypeID',$bookingID+1);
                //     $this->db->bind(':noofrooms',2);                  

                //     // $this->db->bind(':roomTypeID',$roomIDs[$i]);
                //     // $this->db->bind(':noofrooms',intval($roomIDs[$i+1]));                  
    
                //     $status = $this->db->execute();
                //     if(!$status){
                //         return false;
                //     }
                // }
                return true;
            }else{
                return false;
            }

            
            
            // for($i=0;$i<count($roomIDs);$i=$i+2){
                
            //     $this->db->query('INSERT INTO hotel_roomIDs(bookingID,roomTypeID,noofrooms)
            //     VALUES(:bookingID,:room32TypeID,:noofrooms)');

            //     $this->db->bind(':bookingID',$data['bookingID']);
            //     $this->db->bind(':roomTypeID',$roomIDs[$i]);
            //     $this->db->bind(':noofrooms',intval($roomIDs[$i+1]));

            //     $status = $this->db->execute();
            // }    
                      

                 

            
        }


        //view bookings with filter
        public function viewbookings($userid){
            $this->db->query('SELECT * FROM hotel_bookings where TravelerID=:userID');
            $this->db->bind(':userID',$userid);

            $bookings=$this->db->resultSet();

            // $filteredbookings=filterBookings($bookings,$usertype,$userid);
            // foreach ($filteredbookings as $booking) {
            //     $hotel=$this->getHotelById($booking->hotel_id);
            //     $booking->hotel=$hotel;
            // }
            return $bookings;
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

        public function getHotelIDandName($id){
            $this->db->query('SELECT HotelID,Name FROM hotels WHERE HotelID=:id');
            $this->db->bind(':id',$id);

            $row=$this->db->single();
            return $row;

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

            $this->db->query("SELECT roomTypes FROM hotel_bookings WHERE hotel_id = :hotelID
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
