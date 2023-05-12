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
                    $traveler=$this->getUserDetails($booking->TravelerID);
                    $traveler_name=$traveler->Name;
                    $booking->traveler_name=$traveler_name;
                    $booking->guide=$guide;
                }
            }
            elseif ($usertype='Guide') {
                foreach ($filteredbookings as $booking) {
                    $traveler=$this->getUserDetails($booking->TravelerID);
                    $traveler_name=$traveler->Name;
                    $booking->traveler_name=$traveler_name;
                    // echo $traveler->Name;
                    
                }
            }
            return $filteredbookings;
        }

        public function getTravelerbyID($id){
            $this->db->query('SELECT * FROM users WHERE UserID=:id');
            $this->db->bind(':id',$id);

            $bookings=$this->db->resultSet();
            return $bookings;
        }

        public function cancelBooking($id)
        {
            $this->db->query('UPDATE `guide_bookings` SET status="Cancelled" WHERE BookingID=:booking_id');
            $this->db->bind(':booking_id',$id);

            

            if ($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        public function insertGuideBooking($data){
            $this->db->query('INSERT INTO `guide_bookings`(`TravelerID`, `Guides_GuideID`,  `StartDate`, `EndDate`, `Location`, `payment`, `PaymentMethod`) 
                                                    VALUES (:TravelerID,:GuideID,:StartDate,:EndDate,:Location,:payment,:PaymentMethod)');
            $this->db->bind(':TravelerID',$data['TravelerID']);
            $this->db->bind(':GuideID',$data['GuideID']);
            $this->db->bind(':StartDate',$data['StartDate']);
            $this->db->bind(':EndDate',$data['EndDate']);
            $this->db->bind(':PaymentMethod',$data['PaymentMethod']);
            $this->db->bind(':Location',$data['Location']);
            $this->db->bind(':payment',$data['payment']);
            

            if ($this->db->execute()) {
                
                return true;
            }
            else {

                return false;
            }
        }

        public function confrimBooking($id)
        {
            $this->db->query('UPDATE `guide_bookings` SET status="Confirmed" WHERE BookingID=:booking_id');
            $this->db->bind(':booking_id',$id);

            

            if ($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        public function GuideBookingPaymentUpdate($data)
        {
            $this->db->query('UPDATE guide_bookings SET PaymentStatus="Paid" WHERE BookingID=:bookingid');
            $this->db->bind(':bookingid',$data['bookingid']);

            if ($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }


        

        public function CompletedGuideBooking($id)
        {
            $this->db->query('UPDATE `guide_bookings` SET status="Completed" WHERE BookingID=:booking_id');
            $this->db->bind(':booking_id',$id);

            if ($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }
        public function getPaymentDetails(){
            $this->db->query("SELECT `TravelerID`,'BookingID','payment','PaymentStatus' FROM guide_bookings WHERE Guides_GuideID=:id AND PaymentStatus ='Paid'");
            $this->db->bind(':id',$_SESSION['user_id']);

            $bookings=$this->db->resultSet();
            return $bookings;
        }

        



        public function getUserDetails($userID)
        {
            $this->db->query('SELECT * FROM users WHERE UserID= :userid');
            $this->db->bind(':userid',$userID);
            $row=$this->db->single();

            return $row;
        }
        public function getGuideLangs($userID)
        {
            $this->db->query('SELECT * FROM guide_languages WHERE guide_id= :userid');
            $this->db->bind(':userid',$userID);
            $row=$this->db->resultSet();

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


        public function checkGuideAvailable($GuideID,$bookingDate,$bookingEndDate) {
            $this->db->query('SELECT COUNT(*) AS conflicting_bookings 
                  FROM guide_bookings 
                  WHERE Guides_GuideID = :GuideID 
                  AND status <> :status
                  AND (
                    (StartDate<=:new_end AND :new_end<=EndDate)
                    OR (StartDate <= :new_start  AND :new_start <= EndDate )
                    )');

        
            $this->db->bind(':GuideID', $GuideID);
            $this->db->bind(':new_start', $bookingDate);
            $this->db->bind(':new_end', $bookingEndDate);
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


        
    }

?>