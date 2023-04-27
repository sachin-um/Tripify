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
            $this->db->query('UPDATE taxi_offers set status="Rejected" WHERE OfferID=:id');
            $this->db->bind(':id',$id);
            if ($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        //accept offer
        public function acceptTaxiOffer($id){
            $this->db->query('UPDATE taxi_offers set status="Accepted" WHERE OfferID=:id');
            $this->db->bind(':id',$id);
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
                $driver=$this->getDriverDetails($vehicle->driverID);
                $owner=$this->getUserDetails($offer->OwnerID);
                $request=$this->getTaxiRequestById($offer->request_id);
                $offer->vehicle=$vehicle;
                $offer->driver=$driver;
                $offer->owner=$owner;
                $offer->request=$request;
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

        public function getDriverDetails($userID)
        {
            $this->db->query('SELECT * FROM taxi_drivers WHERE TaxiDriverID= :userid');
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



        public function makeTaxiOffer($data){

           // $vehicle = getVehicleByNumber($data['vehicleNumber']);
           
            $this->db->query('INSERT INTO taxi_offers(OwnerID,VehicleID,PaymentMethod,PricePerKm,RequestID,additional_details) VALUES(:OwnerID,:VehicleID,:PaymentMethod,:PricePerKm,:RequestID,:additional_details)');
           $this->db->bind(':VehicleID',$data['VehicleID']);
            $this->db->bind(':PaymentMethod',$data['PaymentMethod']);
            $this->db->bind(':PricePerKm',$data['PricePerKm']);
            $this->db->bind(':RequestID',$data['request_id']);
            $this->db->bind(':OwnerID',$data['OwnerID']);
            $this->db->bind(':additional_details',$data['additional_details']);
            

            

            if ($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        public function getTaxiRequestById($id){
            $this->db->query('SELECT * FROM v_taxi_request WHERE request_id=:request_id');
            $this->db->bind(':request_id',$id);

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