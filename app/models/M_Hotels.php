<?php
class M_Hotels{
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
        $this->db->query('INSERT INTO hotels(HotelID,Name,Address,contact_number,reg_number) VALUES(:hotel_id,:property_name,:property_address,:contact_number,:reg_number)');
        $this->db->bind(':property_name',$data['property_name']);
        $this->db->bind(':property_address',$data['property_address']);
        $this->db->bind(':contact_number',$data['contact_number']);
        $this->db->bind(':reg_number',$data['reg_number']);
        $this->db->bind(':hotel_id',$data['hotel_id']);

        if ($this->db->execute()) {
            $this->db->query('DELETE FROM traveler WHERE TravelerID=:travelerid');
            $this->db->bind(':travelerid',$data['hotel_id']);
            $updatetraveler=$this->db->execute();

            $this->db->query('UPDATE users SET UserType="Hotel" WHERE UserID=:hotel_id');
            $this->db->bind(':hotel_id',$data['hotel_id']);
            $userupdate=$this->db->execute();
            if ($updatetraveler && $userupdate) {

                return true;
            }
            else {
                return false;
            }
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
