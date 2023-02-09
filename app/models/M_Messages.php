<?php

class M_Messages{
    private $db;

    public function __construct(){
        $this->db=new Database();
    }

    //contact admin
    public function contactus($data){
        $this->db->query('INSERT INTO message(Email,Message,Name) VALUES(:email,:message,:name)');
        $this->db->bind(':email',$data['email']);
        $this->db->bind(':message',$data['message']);
        $this->db->bind(':name',$data['name']);


        if ($this->db->execute()) {
            
            return true;
        }
        else {
            return false;
        }
    }


    //get all messages
    public function viewall()
        {
            $this->db->query('SELECT * FROM message');
            $users=$this->db->resultSet();
            
            
            return $users;
            
        }
}

?>
