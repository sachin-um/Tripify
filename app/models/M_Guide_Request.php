<?php
    class M_Guide_Request{
        private $db;

        public function __construct()
        {
            $this->db=new Database();
        }

        public function addtaxirequest($data){
            $this->db->query('INSERT INTO guide requests(Location,Date,Time,TravelerID,language,Description) VALUES(:area,:date,:time,:travelerid,:language,:additional-details)');
            $this->db->bind(':area',$data['area']);
            $this->db->bind(':date',$data['date']);
            $this->db->bind(':time',$data['time']);
            $this->db->bind(':travelerid',$data['travelerid']);
            $this->db->bind(':language',$data['language']);
            $this->db->bind(':additional-details',$data['additional-details']);

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
        

        
    }

?>