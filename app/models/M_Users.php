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

            if ($row->verification_status!=1) {
                return 'NotValidate';
            }
            else if (password_verify($data['password'], $hashed_password)) {
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


        //forgot password
        public function passwordverify($data){
            $this->db->query('SELECT * FROM users WHERE Email= :email');
            $this->db->bind(':email',$data['email']);

            $row=$this->db->single();

            if ($row) {
                $this->db->query('UPDATE users SET pw_reset_otp=:pw_rest_otp WHERE Email=:email');
                $this->db->bind(':email',$data['email']);
                $this->db->bind(':pw_rest_otp',$data['pw_rest_otp']);    
                $this->db->execute();
                return true;
            }
            else {
                return false;
            }

        }

        public function resetpassword($data){
            $this->db->query('SELECT * FROM users WHERE Email=:email AND pw_reset_otp=:pw_reset_otp');
            $this->db->bind(':email',$data['email']);
            $this->db->bind(':pw_reset_otp',$data['reset_code']);


            $row=$this->db->single();

            if ($row) {
                $this->db->query('UPDATE users SET Password=:password WHERE Email=:email');
                $this->db->bind(':password',$data['password']);
                $this->db->bind(':email',$data['email']);
                if ($this->db->execute()) {
                    return true;
                }
                else {
                    return false;
                }
            }
            else {
                echo 'HI';
                return false;
            }
        }
    }

?>