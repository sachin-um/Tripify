<?php
class M_Taxi{
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
        $this->db->query('INSERT INTO taxiowner(OwnerID,NoOfVehicles,owner_name,nic_no,company_name,contact_number,address) VALUES(:owner_id,:noOfVehicle,:owner_name,:NIC_no,:company_name,:contact_number,:address)');
        $this->db->bind(':owner_name',$data['owner_name']);
        $this->db->bind(':NIC_no',$data['NIC_no']);
        $this->db->bind(':company_name',$data['company_name']);
        $this->db->bind(':contact_number',$data['contact_number']);
        $this->db->bind(':address',$data['address']);
        $this->db->bind(':noOfVehicle',$data['noOfVehicle']);
        $this->db->bind(':owner_id',$data['owner_id']);

        if ($this->db->execute()) {
            // $this->db->query('SELECT * FROM users WHERE Email= :email');
            // $this->db->bind(':email',$data['email']);
            // // $this->db->query('SELECT * FROM users');

            // $row=$this->db->single();

            // $this->db->query('INSERT INTO traveler(TravelerID) VALUES(:travelerid)');
            // $this->db->bind(':travelerid',$row->UserID);
            
            // if ($this->db->execute()) {

            //     return true;
            // }
            // else {
            //     return false;
            // }
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
