<?php

class M_Admins{
    private $db;

    public function __construct(){
        $this->db=new Database();
    }


    //register

    public function register($data){
        $this->db->query('INSERT INTO users(Email,Password,Name,otp,ContactNo) VALUES(:email,:password,:name,:otp,:contactno)');
        $this->db->bind(':email',$data['email']);
        $this->db->bind(':password',$data['password']);
        $this->db->bind(':name',$data['name']);
        $this->db->bind(':otp',$data['otp']);
        $this->db->bind(':contactno',$data['contactno']);


        if ($this->db->execute()) {
            $this->db->query('SELECT * FROM users WHERE Email= :email');
            $this->db->bind(':email',$data['email']);
            // $this->db->query('SELECT * FROM users');

            $row=$this->db->single();

            $this->db->query('INSERT INTO admins(AdminID,AssignedArea,nic) VALUES(:adminid,:assignedarea,:nic)');
            $this->db->bind(':assignedarea',$data['assigned-area']);
            $this->db->bind(':nic',$data['nic']);
            $this->db->bind(':adminid',$row->UserID);
            
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


    public function getAllAdminDetails()
    {
        $this->db->query('SELECT * from admins WHERE AdminID!=1');
        $admins=$this->db->resultSet();
        foreach ($admins as $admin) {
            $details=$this->getUserDetails($admin->AdminID);
            $admin->details=$details;
        }

        return $admins;

    }


    public function getUserDetails($userID)
    {
        $this->db->query('SELECT * FROM users WHERE UserID= :userid');
        $this->db->bind(':userid',$userID);
        $row=$this->db->single();

        return $row;
    }

    public function resetpassword($data){
        $this->db->query('SELECT * FROM users WHERE Email=:email AND otp=:otp');
        $this->db->bind(':email',$data['email']);
        $this->db->bind(':otp',$data['otp']);


        $row=$this->db->single();

        if ($row) {
            $this->db->query('UPDATE users SET Password=:password WHERE Email=:email');
            $this->db->bind(':password',$data['password']);
            $this->db->bind(':email',$data['email']);
            if ($this->db->execute()) {
                $this->db->query('UPDATE users SET otp=NULL WHERE Email=:email');
                $this->db->bind(':email',$data['email']);
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
        else {
            return false;
        }
    }

}



?>