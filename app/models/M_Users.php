<?php
    class M_Users{
        private $db;

        public function __construct()
        {
            $this->db=new Database();
        }


        public function findUserByEmail($email){
            $this->db->query('SELECT * FROM users WHERE Email= :email');
            $this->db->bind(':email',$email);

            $row=$this->db->single();

            if ($this->db->rowCount()>0) {
                return true;
            }
            else{
                return false;
            }
        }


        //register

        public function register($data){
            $this->db->query('INSERT INTO users(Email,Password,Name,otp) VALUES(:email,:password,:name,:otp)');
            $this->db->bind(':email',$data['email']);
            $this->db->bind(':password',$data['password']);
            $this->db->bind(':name',$data['name']);
            $this->db->bind(':otp',$data['otp']);


            if ($this->db->execute()) {
                $this->db->query('SELECT * FROM users WHERE Email= :email');
                $this->db->bind(':email',$data['email']);
                // $this->db->query('SELECT * FROM users');
    
                $row=$this->db->single();

                $this->db->query('INSERT INTO traveler(TravelerID) VALUES(:travelerid)');
                $this->db->bind(':travelerid',$row->UserID);
                
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


        //login
        public function login($data){

            $this->db->query('SELECT * FROM users WHERE Email= :email');
            $this->db->bind(':email',$data['email']);
            // $this->db->query('SELECT * FROM users');

            $row=$this->db->single();

            $hashed_password=$row->Password;

            if ($row->UserType !='Traveler') {
                return 'TypeError';
            }
            elseif ($row->verification_status!=1) {
                return 'NotValidate';
            }
            if (password_verify($data['password'], $hashed_password)) {
                return $row;
            }
            else {
                return false;
            }
            
            // $this->db->bind(':password',$data['password']);

            // $row=$this->db->single();

            // if ($this->db->rowCount()==1) {
            //     return true;
            // }
            // else {
            //     return false;
            // }
        }

        //email verification

        public function emailverify($data){
            $this->db->query('SELECT * FROM users WHERE Email= :email');
            $this->db->bind(':email',$data['email']);

            $row=$this->db->single();

            $dbotp=$row->otp;

            if($dbotp==$data['code']){
                $this->db->query('UPDATE users SET verification_status=1 WHERE Email= :email');
                $this->db->bind(':email',$data['email']);
                $this->db->execute();
                return true;
            }
            else
            {
                return false;
            }

        }
    }

?>