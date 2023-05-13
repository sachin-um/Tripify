<?php
    class M_Guide_Offers{
        private $db;

        public function __construct()
        {
            $this->db=new Database();
        }




        //add taxi request

        public function addguideoffer($data){
            $this->db->query('INSERT INTO guide_offers(GuideID,RequestID,HourlyRate,AdditionalDetails,PaymentMethod) 
            VALUES(:guide_id,:requestid,:charges,:additional_info,:payment_option)');
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

        //reject guide offer
        public function rejectGuideOffer($id)
        {
            $this->db->query('UPDATE guide_offers set status="Rejected" WHERE OfferID=:id');
            $this->db->bind(':id',$id);
            if ($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        //accept offer
        public function acceptGuideOffer($id,$rid){
            $this->db->query('UPDATE guide_offers set status="Accepted" WHERE OfferID=:id');
            $this->db->bind(':id',$id);
            if ($this->db->execute()) {
                $this->db->query('UPDATE guide_request set status="Completed" WHERE RequestsID=:rid');
                $this->db->bind(':rid',$rid);
                if ($this->db->execute()) {
                    return true;
                }
                else {
                    return false;
                }
            }
            else {
                return false;
            }
        }


        public function getGuideOfferId($offerid){
            $this->db->query('SELECT * FROM guide_offers WHERE OfferID=:offerid');
            $this->db->bind(':offerid',$offerid);

            $row=$this->db->single();

            return $row;
        }

        

        public function viewall(){
            $this->db->query('SELECT * FROM v_guide_offers WHERE status="Pending"');
            $offers=$this->db->resultSet();

            return $offers;
        }


        
    }

?>