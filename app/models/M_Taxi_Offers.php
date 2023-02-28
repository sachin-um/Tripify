<?php
    class M_Taxi_Offers{
        private $db;

        public function __construct()
        {
            $this->db=new Database();
        }




        //add taxi request

        public function addguideoffer($data){
            $this->db->query('INSERT INTO guide_offers(GuideID,RequestsID,HourlyRate,AdditionalDetails,PaymentMethod) VALUES(:guide_id,:requestid,:charges,:additional_info,:payment_option)');
            $this->db->bind(':charges',$data['charges']);
            $this->db->bind(':payment_option',$data['payment-option']);
            $this->db->bind(':additional_info',$data['additional-info']);
            $this->db->bind(':guide_id',$data['guide_id']);
            $this->db->bind(':requestid',$data['requestid']);

            
            if ($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        //edit taxi request
        public function edittaxirequest($data){
            $this->db->query('INSERT INTO taxi_request(Date,StartingTime,Description,TravelerID,PickupLocation,Destination,p_latitude,p_longitude,d_latitude,d_longitude) VALUES(:date,:time,:description,:travelerid,:pickuplocation,:destination,:p_latitude,:p_longitude,:d_latitude,:d_longitude)');
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
            $this->db->query('SELECT * FROM taxi_offers');
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

        // public function getVehicleByNumber($number){
        //     $this->db->query('SELECT * FROM vehicles WHERE vehicleNumber=:number');
        //     $this->db->bind(':vehicleNumber',$number);

        //     $row=$this->db->single();

        //     return $row;
        // }


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


        
    }

?>