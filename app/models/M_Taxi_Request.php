<?php
    class M_Taxi_Request{
        private $db;

        public function __construct()
        {
            $this->db=new Database();
        }




        //add taxi request

        public function addtaxirequest($data){
            $this->db->query('INSERT INTO taxi_request(Date,StartingTime,Description,TravelerID,PickupLocation,Destination,p_latitude,p_longitude,d_latitude,d_longitude,passengers,vehicle_type,distance,duration) VALUES(:date,:time,:description,:travelerid,:pickuplocation,:destination,:p_latitude,:p_longitude,:d_latitude,:d_longitude,:passengers,:vehicle_type,:distance,:duration)');
            $this->db->bind(':vehicle_type',$data['vehicle_type']);
            $this->db->bind(':passengers',$data['passengers']);
            $this->db->bind(':date',$data['date']);
            $this->db->bind(':time',$data['time']);
            $this->db->bind(':description',$data['description']);
            $this->db->bind(':travelerid',$data['travelerid']);
            $this->db->bind(':pickuplocation',$data['pickuplocation']);
            $this->db->bind(':destination',$data['destination']);
            $this->db->bind(':p_latitude', $data['p-latitude']);
            $this->db->bind(':p_longitude', $data['p-longitude']);
            $this->db->bind(':d_latitude', $data['d-latitude']);
            $this->db->bind(':d_longitude', $data['d-longitude']);
            $this->db->bind(':distance',$data['distance']);
            $this->db->bind(':duration',$data['duration']);

            

            if ($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        //edit taxi request
        public function edittaxirequest($data){
            $this->db->query('UPDATE taxi_request set Date=:date,StartingTime=:time,Description=:description,TravelerID=:travelerid,PickupLocation=:pickuplocation,Destination=:destination,p_latitude=:p_latitude,p_longitude=:p_longitude,d_latitude=:d_latitude,d_longitude=:d_longitude,passengers=:passengers,vehicle_type=:vehicle_type WHERE RequestID=:request_id');
            $this->db->bind(':vehicle_type',$data['vehicle_type']);
            $this->db->bind(':passengers',$data['passengers']);
            $this->db->bind(':date',$data['date']);
            $this->db->bind(':time',$data['time']);
            $this->db->bind(':description',$data['description']);
            $this->db->bind(':travelerid',$data['travelerid']);
            $this->db->bind(':pickuplocation',$data['pickuplocation']);
            $this->db->bind(':destination',$data['destination']);
            $this->db->bind(':p_latitude',$data['p-latitude']);
            $this->db->bind(':p_longitude',$data['p-longitude']);
            $this->db->bind(':d_latitude',$data['d-latitude']);
            $this->db->bind(':distance',$data['distance']);
            $this->db->bind(':duration',$data['duration']);
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
            $this->db->query('SELECT * FROM v_taxi_request');
            $posts=$this->db->resultSet();

            return $posts;
        }

        //delete taxi request
        public function deletetaxirequest($id){
            //$this->db->query('DELETE from taxi_request WHERE RequestID=:request_id');
            $this->db->query('DELETE FROM `taxi_request` WHERE RequestID=:request_id');
            $this->db->bind(':request_id',$id);

            

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


        
    }

?>