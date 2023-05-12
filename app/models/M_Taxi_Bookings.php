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
                $booking->vehicle=$vehicle;
            }
            return $filteredbookings;
        }

        public function getBookingByID($id){
            $this->db->query('SELECT * FROM taxi_reservation WHERE 	ReservationID=:id');
            $this->db->bind(':id',$id);

            $row=$this->db->single();

            return $row;
            
        }

        

        public function confrimBooking($id)
        {
            $this->db->query('UPDATE `taxi_reservation` SET status="Confirmed" WHERE ReservationID=:booking_id');
            $this->db->bind(':booking_id',$id);

            

            if ($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        public function CompleteTaxiBooking($id)
        {
            $this->db->query('UPDATE `taxi_reservation` SET status="Completed" WHERE ReservationID=:booking_id');
            $this->db->bind(':booking_id',$id);

            

            if ($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        public function cancelBooking($id)
        {
            $this->db->query('UPDATE `taxi_reservation` SET status="Cancelled" WHERE ReservationID=:booking_id');
            $this->db->bind(':booking_id',$id);

            

            if ($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        public function TaxiBookingPaymentUpdate($data)
        {
            $this->db->query('UPDATE `taxi_reservation` SET PaymentStatus="Paid" WHERE ReservationID=:bookingid');
            $this->db->bind(':bookingid',$data['bookingid']);

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
            $this->db->query('SELECT vehicles.*,taxi_drivers.Name FROM vehicles JOIN taxi_drivers ON vehicles.driverID = taxi_drivers.TaxiDriverID WHERE vehicles.VehicleID=:id');
            $this->db->bind(':id',$id);

            $row=$this->db->single();

            return $row;
        }

        public function getTaxiBookingbyId($id){
            $this->db->query('SELECT * FROM taxi_reservation WHERE ReservationID=:id');
            $this->db->bind(':id',$id);

            $row=$this->db->single();
            $vehicle=$this->getVehicleById($row->Vehicles_VehicleID);
            $row->vehicle=$vehicle;
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
                  WHERE Vehicles_VehicleID = :vehicle_id AND status <> :status AND (booking_date=:new_start_date OR est_end_date=:new_start_date )
                  AND (
                    ((:new_start <= CONCAT(booking_date, \' \', booking_time) ) AND :new_end<=CONCAT(est_end_date, \' \', est_end_time)  )
                    OR (CONCAT(booking_date, \' \', booking_time) <= :new_start  AND :new_start <=CONCAT(est_end_date, \' \', est_end_time) ) 
                    OR (CONCAT(booking_date, \' \', booking_time) < :new_start  AND :new_start <=CONCAT(est_end_date, \' \', est_end_time) )
                    )');


            $this->db->bind(':vehicle_id', $vehicleID);
            $this->db->bind(':new_start', $bookingdatetime);
            $this->db->bind(':new_end', $est_datetime);
            $this->db->bind(':new_start_date', $bookingDate);
            $this->db->bind(':new_end_date', $New_end_date);
            $this->db->bind(':status', "Cancelled");

            $this->db->execute();

            $result = $this->db->single();
            $conflicting_bookings = $result->conflicting_bookings;

            if($conflicting_bookings>0){
                return true;
            }else{
                return false;
            }


        }

        public function checkEditBookingDate($vehicleID,$bookingID,$bookingDate,$bookingTime,$est){
            $date = $bookingDate;
            $time = $bookingTime;
            $bookingdatetime = date('Y-m-d H:i:s', strtotime("$date $time"));

            $est_datetime = date('Y-m-d H:i:s', strtotime("$bookingdatetime +$est"));
            $New_end_date = date('Y-m-d', strtotime($est_datetime));


            $this->db->query('SELECT COUNT(*) AS conflicting_bookings 
                  FROM taxi_reservation 
                  WHERE Vehicles_VehicleID = :vehicle_id AND status <> :status AND (booking_date=:new_start_date OR est_end_date=:new_start_date )
                  AND (
                    ((:new_start <= CONCAT(booking_date, \' \', booking_time) ) AND :new_end<=CONCAT(est_end_date, \' \', est_end_time)  )
                    OR (CONCAT(booking_date, \' \', booking_time) <= :new_start  AND :new_start <CONCAT(est_end_date, \' \', est_end_time) ) 
                    OR (CONCAT(booking_date, \' \', booking_time) < :new_start  AND :new_start <=CONCAT(est_end_date, \' \', est_end_time) )
                    ) AND ReservationID <> :bookingID
                    ');


            $this->db->bind(':vehicle_id', $vehicleID);
            $this->db->bind(':new_start', $bookingdatetime);
            $this->db->bind(':new_end', $est_datetime);
            $this->db->bind(':new_start_date', $bookingDate);
            $this->db->bind(':new_end_date', $New_end_date);
            $this->db->bind(':status', "Cancelled");
            $this->db->bind(':bookingID', $bookingID);

            $this->db->execute();

            $result = $this->db->single();
            $conflicting_bookings = $result->conflicting_bookings;

            if($conflicting_bookings>0){
                return true;
            }else{
                return false;
            }
        }

      
        // public function checkDriverAvailable($vehicleID,$bookingDate,$est){
        //     $this->db->query('SELECT SUM(TIME_TO_SEC(estTime)) AS total_work_hours FROM taxi_reservation WHERE booking_date=:bookingDate AND Vehicles_VehicleID=:Vehicles_VehicleID ');
        //     $this->db->bind(':bookingDate', $bookingDate);
        //     $this->db->bind(':Vehicles_VehicleID', $vehicleID);

        //     $result = $this->db->single();

        //     $total_work_hours = $result->total_work_hours/3600;


        //     $time_str = $est;
        //     $datetime = new DateTime($time_str, new DateTimeZone('Asia/Colombo'));
        //     $seconds = $datetime->format('U') - strtotime('today');
        //     $total_est =$seconds/3600;


        //     if (($total_work_hours + $total_est) > 14) {
        //         return true;
        //     }else{
        //         return false;
        //     }

        // }


        public function insertTaxiBooking($data){
            $this->db->query('INSERT INTO `taxi_reservation`(`TravelerID`,`TaxiOwnerID`, `Vehicles_VehicleID`, `Price`,  `booking_date`, `booking_time`, `est_end_date`, `est_end_time`, `pickup_location`, `destination`, `distance`, `estTime`,`p_latitude`,`p_longitude`,`d_latitude`,`d_longitude`,`PaymentMethod`,`passengers`,`Days`)
                                                         VALUES(:TravelerID,:TaxiOwnerID,:Vehicles_VehicleID,:Price,:booking_date,:booking_time,:est_end_date,:est_end_time,:pickup_location,:destination,:distance,:estTime,:p_latitude,:p_longitude,:d_latitude,:d_longitude,:PaymentMethod,:passengers,:Days)');                                            
            $this->db->bind(':TravelerID',$data['travelerID']);
            $this->db->bind(':TaxiOwnerID',$data['TaxiOwnerID']);
            $this->db->bind(':Vehicles_VehicleID',$data['vehicleID']);
            $this->db->bind(':Price',$data['total']);
            $this->db->bind(':booking_date',$data['s_date']);
            $this->db->bind(':booking_time',$data['s_time']);
            $this->db->bind(':est_end_date',$data['e_date']);
            $this->db->bind(':est_end_time',$data['e_time']);
            $this->db->bind(':pickup_location',$data['pickupL']);
            $this->db->bind(':destination',$data['dropL']);
            $this->db->bind(':Days',$data['days']);

            $this->db->bind(':PaymentMethod',$data['payment_option']);
            $this->db->bind(':passengers',$data['passengers']);

            
            $this->db->bind(':p_latitude',$data['p_latitude']);
            $this->db->bind(':p_longitude',$data['p_longitude']);
            $this->db->bind(':d_latitude',$data['d_latitude']);
            $this->db->bind(':d_longitude',$data['d_longitude']);

            $this->db->bind(':distance',$data['distance']);
            $this->db->bind(':estTime',$data['extime']);
            $this->db->bind(':id',$id);

    
            if ($this->db->execute()) {
                
                return true;
            }
            else {

                return false;
            }
        }

        public function EditTaxiBooking($data,$id){
            $this->db->query('UPDATE taxi_reservation SET TravelerID=:TravelerID,TaxiOwnerID=:TaxiOwnerID, Vehicles_VehicleID=:Vehicles_VehicleID, Price=:Price,  booking_date=:booking_date, booking_time=:booking_time, est_end_date=:est_end_date, est_end_time=:est_end_time, pickup_location=:pickup_location, destination=:destination, distance=:distance , estTime=:estTime,p_latitude=:p_latitude,p_longitude=:p_longitude,d_latitude=:d_latitude,d_longitude=:d_longitude,PaymentMethod=:PaymentMethod,passengers=:passengers WHERE ReservationID=:id');
    
            $this->db->bind(':TravelerID',$data['travelerID']);
            $this->db->bind(':TaxiOwnerID',$data['TaxiOwnerID']);
            $this->db->bind(':Vehicles_VehicleID',$data['vehicleID']);
            $this->db->bind(':Price',$data['total']);
            $this->db->bind(':booking_date',$data['s_date']);
            $this->db->bind(':booking_time',$data['s_time']);
            $this->db->bind(':est_end_date',$data['e_date']);
            $this->db->bind(':est_end_time',$data['e_time']);
            $this->db->bind(':pickup_location',$data['pickupL']);
            $this->db->bind(':destination',$data['dropL']);

            $this->db->bind(':PaymentMethod',$data['payment_option']);
            $this->db->bind(':passengers',$data['passengers']);

            
            $this->db->bind(':p_latitude',$data['p_latitude']);
            $this->db->bind(':p_longitude',$data['p_longitude']);
            $this->db->bind(':d_latitude',$data['d_latitude']);
            $this->db->bind(':d_longitude',$data['d_longitude']);

            $this->db->bind(':distance',$data['distance']);
            $this->db->bind(':estTime',$data['extime']);
            $this->db->bind(':id',$id);

    
            if ($this->db->execute()) {
                
                return true;
            }
            else {

                return false;
            }
        }

        public function acceptTaxiOffer($data)
        {
            $this->db->query('INSERT INTO `taxi_reservation`(`TravelerID`,`TaxiOwnerID`, `Vehicles_VehicleID`, `Price`,  `booking_date`, `booking_time`, `est_end_date`, `est_end_time`, `pickup_location`, `destination`, `distance`, `estTime`,`p_latitude`,`p_longitude`,`d_latitude`,`d_longitude`,`PaymentMethod`,`passengers`)
                                                        VALUES(:TravelerID,:TaxiOwnerID,:Vehicles_VehicleID,:Price,:booking_date,:booking_time,:est_end_date,:est_end_time,:pickup_location,:destination,:distance,:estTime,:p_latitude,:p_longitude,:d_latitude,:d_longitude,:PaymentMethod,:passengers)');
            $this->db->bind(':TravelerID',$data['request']->traveler_id);
            $this->db->bind(':Vehicles_VehicleID',$data['offer']->VehicleID);
            $this->db->bind(':Price',$data['price']);
            $this->db->bind(':booking_date',$data['request']->date);
            $this->db->bind(':booking_time',$data['request']->time);
            $this->db->bind(':est_end_date',$data['e_date']);
            $this->db->bind(':est_end_time',$data['e_time']);
            $this->db->bind(':pickup_location',$data['request']->pickup_location);
            $this->db->bind(':destination',$data['request']->destination);
            $this->db->bind(':distance',$data['request']->distance);
            $this->db->bind(':estTime',$data['request']->duration);

            $this->db->bind(':TaxiOwnerID',$data['offer']->OwnerID);	
            $this->db->bind(':PaymentMethod',$data['offer']->PaymentMethod);
            $this->db->bind(':passengers',$data['request']->passengers);
            

            $this->db->bind(':p_latitude',$data['request']->p_latitude);
            $this->db->bind(':p_longitude',$data['request']->p_longitude);
            $this->db->bind(':d_latitude',$data['request']->d_latitude);
            $this->db->bind(':d_longitude',$data['request']->d_longitude);

    
            if ($this->db->execute()) {
                // $this->db->query('UPDATE taxi_offers SET status="Accepted" WHERE OfferID=:OfferID');
                // $this->db->bind(':OfferID',$data['offer']->OfferID);
                // $offerUpdate = $this->db->execute();
                // if($offerUpdate){
                return true;
            }else{
                    return false;
            }
                
            // }
            // else {
            //     return false;
            // }
        }
        
        
    }

?>