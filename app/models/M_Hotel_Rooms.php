<?php
class M_Hotel_Rooms{
    private $db;

    public function __construct()
    {
        $this->db=new Database();
    }

       

    public function addaroom($data){
        $this->db->query('INSERT INTO hotelroomtypes(RoomTypeID,NoofBeds,RoomTypeName,NoofGuests,RoomSize,PricePerNight,HotelID,no_of_rooms)
         VALUES(:RoomtypeID,:NoofBeds,:RoomType,:NoofGuests,:RoomSize,:PricePerNight,:HotelID,:NoOfRooms)');
        $this->db->bind(':RoomtypeID',$data['RoomTypeID']);
        $this->db->bind(':NoofBeds',$data['NoofBeds']);
        $this->db->bind(':NoofBeds',$data['NoofBeds']);
        $this->db->bind(':RoomType',$data['RoomType']);
        $this->db->bind(':NoofGuests',$data['NoofGuests']);
        $this->db->bind(':RoomSize',$data['RoomSize']);
        $this->db->bind(':PricePerNight',$data['PricePerNight']);
        $this->db->bind(':NoOfRooms',$data['NoOfRooms']);
        $this->db->bind(':HotelID',$data['hotelid']);

    
        echo 'test1';
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
            // $temproomnumber = 100;
                
                for ($x=0;$x<$data['NoOfRooms'];$x++){
                    $this->db->query('INSERT INTO hotelrooms(RoomTypeID,bookingStatus)
                    VALUES(:RoomtypeID,"Not Booked")');
                    $this->db->bind(':RoomtypeID',$data['RoomTypeID']);
                    // $this->db->bind(':A',$x+1); 

                    if (!$this->db->execute()) {
                        return false;
                    }
                }
                return true;
           
        }
        else {
            return false;
        }
    }

    public function viewAllRooms($hotelID){
        $this->db->query('SELECT * FROM hotelroomtypes WHERE HotelID=:id');
        $this->db->bind(':id',$hotelID);

        $roomset=$this->db->resultSet();

        return $roomset;
    }

    public function viewWantedRoom($roomTypeID){
        $this->db->query('SELECT * FROM hotelroomtypes WHERE RoomTypeID=:id');
        $this->db->bind(':id',$roomTypeID);

        $wantedHotelRoom=$this->db->single();

        return $wantedHotelRoom;
    }

    public function viewAllIndividualRooms($roomTypeID){
        $this->db->query('SELECT * FROM hotelrooms WHERE RoomTypeID=:id');
        $this->db->bind(':id',$roomTypeID);

        $individualRoomSet = $this->db->resultSet();

        return $individualRoomSet;
    }

}
