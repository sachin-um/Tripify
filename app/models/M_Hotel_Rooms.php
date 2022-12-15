<?php
class M_Hotel_Rooms{
    private $db;

    public function __construct()
    {
        $this->db=new Database();
    }

    

    public function addaroom($data){
        $this->db->query('INSERT INTO room(NoofBeds,RoomType,NoofGuests,RoomSize,PricePerNight,HotelID) VALUES(:NoofBeds,:RoomType,:NoofGuests,:RoomSize,:PricePerNight,:HotelID)');
        $this->db->bind(':NoofBeds',$data['NoofBeds']);
        $this->db->bind(':RoomType',$data['RoomType']);
        $this->db->bind(':NoofGuests',$data['NoofGuests']);
        $this->db->bind(':RoomSize',$data['RoomSize']);
        $this->db->bind(':PricePerNight',$data['PricePerNight']);
        $this->db->bind(':HotelID',$data['hotelid']);

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

    public function viewall(){
        $this->db->query('SELECT * FROM room');
        $posts=$this->db->resultSet();

        return $posts;
    }

    

}

?>
