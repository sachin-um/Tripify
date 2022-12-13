<?php
    class M_Guide_Offers{
        private $db;

        public function __construct()
        {
            $this->db=new Database();
        }




        //add taxi request

        public function addguideoffer($data){
            $this->db->query('INSERT INTO guide_offers(GuideID,RequestsID,HourlyRate,AdditionalDetails,PaymentMethod) VALUES(:guide_id,:requestid,:charges,:additional-info,:payment-option)');
            $this->db->bind(':charges',$data['charges']);
            $this->db->bind(':payment-option',$data['payment-option']);
            $this->db->bind(':additional-info',$data['additional-info']);
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
            $this->db->query('SELECT * FROM guide_offers');
            $offers=$this->db->resultSet();

            return $offers;
        }


        
    }

?>