<?php
    class M_Taxi_Request{
        private $db;

        public function __construct()
        {
            $this->db=new Database();
        }




        //register

        public function addtaxirequest($data){
            $this->db->query('INSERT INTO taxi_request(Date,StartingTime,Description,TravelerID,PickupLocation,Destination) VALUES(:date,:time,:description,:travelerid,:pickuplocation,:destination)');
            $this->db->bind(':date',$data['date']);
            $this->db->bind(':time',$data['time']);
            $this->db->bind(':description',$data['description']);
            $this->db->bind(':travelerid',$data['travelerid']);
            $this->db->bind(':pickuplocation',$data['pickuplocation']);
            $this->db->bind(':destination',$data['destination']);

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


        //login
        public function login($data){

            $this->db->query('SELECT * FROM users WHERE Email= :email');
            $this->db->bind(':email',$data['email']);
            // $this->db->query('SELECT * FROM users');

            $row=$this->db->single();

            $hashed_password=$row->Password;

            if (password_verify($data['password'], $hashed_password)) {
                return $row;
            }
            else {
                return false;
            }
            
            $this->db->bind(':password',$data['password']);

            $row=$this->db->single();

            if ($this->db->rowCount()==1) {
                return true;
            }
            else {
                return false;
            }
        }
    }

?>