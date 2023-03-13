<?php
    class M_Taxi_Bookings{
        private $db;

        public function __construct()
        {
            $this->db=new Database();
        }




        

        public function viewall(){
            $this->db->query('SELECT * FROM taxi_bookings');
            $posts=$this->db->resultSet();

            return $posts;
        }

        //view bookings with filter
        public function viewbookings($usertype,$userid){
            $this->db->query('SELECT * FROM taxi_reservation');
            $bookings=$this->db->resultSet();
            $filteredbookings=filterBookings($bookings,$usertype,$userid);
            foreach ($filteredbookings as $booking) {
                $vehicle=$this->getVehicleById($booking->Vehicles_VehicleID);
                $number=$vehicle->vehicle_number;
                $name=$vehicle->driver_name;
                $booking->driver_name=$name;
                $booking->vehicle_number=$number;
            }
            return $filteredbookings;
        }

        public function cancelBooking($id)
        {
            $this->db->query('UPDATE `taxi_reservation` SET status="Canceled" WHERE ReservationID=:booking_id');
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


        public function getVehicleById($id){
            $this->db->query('SELECT * FROM vehicles WHERE VehicleID=:id');
            $this->db->bind(':id',$id);

            $row=$this->db->single();

            return $row;
        }

        public function getTaxiBookingbyId($id){
            $this->db->query('SELECT * FROM taxi_reservation WHERE ReservationID=:id');
            $this->db->bind(':id',$id);

            $row=$this->db->single();
            $vehicle=$this->getVehicleById($row->Vehicles_VehicleID);
            $number=$vehicle->vehicle_number;
            $name=$vehicle->driver_name;
            $row->driver_name=$name;
            $row->vehicle_number=$number;
            return $row;
        }

        
    }

?>