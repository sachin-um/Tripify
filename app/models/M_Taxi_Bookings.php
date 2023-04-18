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

            return $row;
        }

        public function getTaxiOwnerbyID($id){
            $this->db->query('SELECT * FROM taxiowner WHERE OwnerID=:id');
            $this->db->bind(':id',$id);

            $row=$this->db->single();

            return $row;
        }

        public function getVehicleAndDriversbyID($id){
            $this->db->query('SELECT vehicles.*,taxi_drivers.* FROM vehicles JOIN taxi_drivers ON vehicles.driverID = taxi_drivers.TaxiDriverID WHERE vehicles.VehicleID=:VehicleID');
            $this->db->bind(':VehicleID',$id);
            $details=$this->db->single();
            return $details;
        }


        
        public function checkBookingDate($vehicleID, $bookingDate, $bookingTime, $est) {

            $date = $bookingDate;
            $time = $bookingTime;
            $bookingdatetime = date('Y-m-d H:i:s', strtotime("$date $time"));
        
            $est_datetime = date('Y-m-d H:i:s', strtotime("$bookingdatetime +$est"));
            $New_end_date = date('Y-m-d', strtotime($est_datetime));
            

            $this->db->query('SELECT COUNT(*) AS conflicting_bookings 
                  FROM taxi_reservation 
                  WHERE Vehicles_VehicleID = :vehicle_id AND (booking_date=:new_start_date OR est_end_date=:new_start_date )
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


        }

      
        
        
        

        public function checkDriverAvailable($vehicleID,$bookingDate,$bookingTime,$est){
            $this->db->query('SELECT SUM(SEC_TO_TIME(estTime)) AS total_work_hours FROM taxi_reservation WHERE booking_date=:bookingDate AND Vehicles_VehicleID=:Vehicles_VehicleID' );
            $this->db->bind(':bookingDate', $bookingDate);
            $this->db->bind(':Vehicles_VehicleID', $vehicleID);

            $result = $this->db->single();
            $total_work_hours = $result->total_work_hours/36000;
            // echo $est.'-->';
            
            preg_match('/((\d+) hours )?((\d+) mins)?/', $est, $matches);
            $hours = intval($matches[2] ?? 0);
            $mins = intval($matches[4] ?? 0);
            $total_est = $hours + $mins / 60;
            // echo $total_work_hours + $total_est;
            if (($total_work_hours + $total_est) > 9) {
                return true;
            }else{
                return false;
            }

        
        }


        public function insertTaxiBooking($data){
            $this->db->query('INSERT INTO `taxi_reservation`(`TravelerID`, `Vehicles_VehicleID`, `Price`,  `booking_date`, `booking_time`, `est_end_date`, `est_end_time`, `pickup_location`, `destination`, `distance`, `estTime`)
                                                         VALUES(:TravelerID,:Vehicles_VehicleID,:Price,:booking_date,:booking_time,:est_end_date,:est_end_time,:pickup_location,:destination,:distance,:estTime)');
            $this->db->bind(':TravelerID',$data['travelerID']);
            $this->db->bind(':Vehicles_VehicleID',$data['vehicleID']);
            $this->db->bind(':Price',$data['total']);
            $this->db->bind(':booking_date',$data['s_date']);
            $this->db->bind(':booking_time',$data['s_time']);
            $this->db->bind(':est_end_date',$data['e_date']);
            $this->db->bind(':est_end_time',$data['e_time']);
            $this->db->bind(':pickup_location',$data['pickupL']);
            $this->db->bind(':destination',$data['dropL']);
            $this->db->bind(':distance',$data['distance']);
            $this->db->bind(':estTime',$data['extime']);

    
            if ($this->db->execute()) {
                
                return true;
            }
            else {
                return false;
            }
        }
        



        
    }

?>