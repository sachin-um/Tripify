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
            $this->db->query('INSERT INTO users(Email,Password,Name) VALUES(:email,:password,:name)');
            $this->db->bind(':email',$data['email']);
            $this->db->bind(':password',$data['password']);
            $this->db->bind(':name',$data['name']);

            if ($this->db->execute()) {
                return true;
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