<?php
    class M_Taxi_Offers{
        private $db;

        public function __construct()
        {
            $this->db=new Database();
        }




        


        //reject taxi offer
        public function rejectTaxiOffer($id)
        {
            $this->db->query('UPDATE taxi_offers set status="Rejected"');
            if ($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }
        public function viewall(){
            $this->db->query('SELECT * FROM taxi_offers WHERE status="Pending"');
            $offers=$this->db->resultSet();
            foreach($offers as $offer){
                $vehicle=$this->getVehicleById($offer->VehicleID);
                $owner=$this->getUserDetails($offer->OwnerID);
                $offer->vehicle=$vehicle;
                // $driver=$this->getDriverDetails($offer->vehicle->);
                $offer->owner=$owner;
            }
            return $offers;
        }

        public function getUserDetails($userID)
        {
            $this->db->query('SELECT * FROM taxiowner WHERE OwnerID= :userid');
            $this->db->bind(':userid',$userID);
            $row=$this->db->single();

            return $row;
        }

        // public function getDriverDetails($userID)
        // {
        //     $this->db->query('SELECT * FROM taxi_drivers WHERE TaxiDriverID= :userid');
        //     $this->db->bind(':userid',$userID);
        //     $row=$this->db->single();
        //     return $row;
        // }


        public function getVehicleById($id){
            $this->db->query('SELECT * FROM vehicles WHERE VehicleID=:id');
            $this->db->bind(':id',$id);

            $row=$this->db->single();

            return $row;
        }


        public function getOfferById($id)
        {
            $this->db->query('SELECT * FROM taxi_offers WHERE request_id=:id');
            $this->db->bind(':id',$id);

            $row=$this->db->single();

            return $row;
        }


        
    }

?>