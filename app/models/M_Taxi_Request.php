<?php
    class M_Taxi_Request{
        private $db;

        public function __construct()
        {
            $this->db=new Database();
        }




        //register

        public function addtaxirequest($data){
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