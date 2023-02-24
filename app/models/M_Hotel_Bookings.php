<?php
    class M_Hotel_Bookings{
        private $db;

        public function __construct()
        {
            $this->db=new Database();
        }




        //add taxi request

        public function addtaxirequest($data){
            $this->db->query('INSERT INTO taxi_request(Date,StartingTime,Description,TravelerID,PickupLocation,Destination,p_latitude,p_longitude,d_latitude,d_longitude,Caption) 
            VALUES(:date,:time,:description,:travelerid,:pickuplocation,:destination,:p_latitude,:p_longitude,:d_latitude,:d_longitude,:caption)');
            $this->db->bind(':caption',$data['caption']);
            $this->db->bind(':date',$data['date']);
            $this->db->bind(':time',$data['time']);
            $this->db->bind(':description',$data['description']);
            $this->db->bind(':travelerid',$data['travelerid']);
            $this->db->bind(':pickuplocation',$data['pickuplocation']);
            $this->db->bind(':destination',$data['destination']);
            $this->db->bind(':p_latitude',$data['p-latitude']);
            $this->db->bind(':p_longitude',$data['p-longitude']);
            $this->db->bind(':d_latitude',$data['d-latitude']);
            $this->db->bind(':d_longitude',$data['d-longitude']);

            

            if ($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        //edit taxi request
        public function edittaxirequest($data){
            $this->db->query('UPDATE taxi_request set Date=:date,StartingTime=:time,Description=:description,TravelerID=:travelerid,PickupLocation=:pickuplocation,Destination=:destination,p_latitude=:p_latitude,p_longitude=:p_longitude,d_latitude=:d_latitude,d_longitude=:d_longitude,Caption=:caption WHERE RequestID=:request_id');
            $this->db->bind(':caption',$data['caption']);
            $this->db->bind(':date',$data['date']);
            $this->db->bind(':time',$data['time']);
            $this->db->bind(':description',$data['description']);
            $this->db->bind(':travelerid',$data['travelerid']);
            $this->db->bind(':pickuplocation',$data['pickuplocation']);
            $this->db->bind(':destination',$data['destination']);
            $this->db->bind(':p_latitude',$data['p-latitude']);
            $this->db->bind(':p_longitude',$data['p-longitude']);
            $this->db->bind(':d_latitude',$data['d-latitude']);
            $this->db->bind(':d_longitude',$data['d-longitude']);
            $this->db->bind(':request_id',$data['request_id']);

            

            if ($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        public function viewall(){
            $this->db->query('SELECT * FROM v_taxi_request');
            $posts=$this->db->resultSet();

            return $posts;
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

        //delete taxi request
        public function deletetaxirequest($id){
            $this->db->query('DELETE from taxi_request WHERE RequestID=:request_id');
            $this->db->bind(':request_id',$data['request_id']);

            

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


        
    }

?>