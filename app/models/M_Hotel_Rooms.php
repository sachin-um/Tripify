<?php
class M_Hotel_Rooms{
    private $db;

    public function __construct()
    {
        $this->db=new Database();
    }

       
    //Add a hotel room type, their room IDs and their bed types under a hotel
    public function addaroom($data){
        $this->db->query('INSERT INTO hotel_rooms(RoomTypeID,HotelID,RoomTypeName,NoofGuests,NoofBeds,RoomSize,PricePerNight,no_of_rooms)
         VALUES(:RoomtypeID,:HotelID,:RoomTypeName,:NoofGuests,:NoofBeds,:RoomSize,:PricePerNight,:NoOfRooms)');
        $this->db->bind(':RoomtypeID',$data['RoomTypeID']);
        $this->db->bind(':HotelID',$data['hotelid']);
        $this->db->bind(':RoomTypeName',$data['RoomName']);
        $this->db->bind(':NoofGuests',$data['NoofGuests']);
        $this->db->bind(':NoofBeds',$data['NoofBeds']);        
        $this->db->bind(':RoomSize',$data['RoomSize']);
        $this->db->bind(':PricePerNight',$data['PricePerNight']);
        $this->db->bind(':NoOfRooms',$data['NoOfRooms']);

        //Update the room types table
        if ($this->db->execute()) {
            //check and update the beds table
            if(!empty($data['TwinBed'])){
                $this->db->query('INSERT INTO hotel_roomnbed(roomID,bedType,noofbeds)VALUES
                (:roomID, :bedType, :noofbeds)');
                $this->db->bind(':roomID',$data['RoomTypeID']);
                $this->db->bind(':bedType',"Twin bed");
                $this->db->bind(':noofbeds',$data['TwinBed']);
                $this->db->execute();
            }
            
            if(!empty($data['DoubleBed'])){
                $this->db->query('INSERT INTO hotel_roomnbed(roomID,bedType,noofbeds)VALUES
                (:roomID, :bedType, :noofbeds)');
                $this->db->bind(':roomID',$data['RoomTypeID']);
                $this->db->bind(':bedType',"Double bed");
                $this->db->bind(':noofbeds',$data['DoubleBed']);
                $this->db->execute();
            }
            
            if(!empty($data['QueenBed'])){
                $this->db->query('INSERT INTO hotel_roomnbed(roomID,bedType,noofbeds)VALUES
                (:roomID, :bedType, :noofbeds)');
                $this->db->bind(':roomID',$data['RoomTypeID']);
                $this->db->bind(':bedType',"Queen bed");
                $this->db->bind(':noofbeds',$data['QueenBed']);
                $this->db->execute();
            }
            
            if(!empty($data['KingBed'])){
                $this->db->query('INSERT INTO hotel_roomnbed(roomID,bedType,noofbeds)VALUES
                (:roomID, :bedType, :noofbeds)');
                $this->db->bind(':roomID',$data['RoomTypeID']);
                $this->db->bind(':bedType',"King bed");
                $this->db->bind(':noofbeds',$data['KingBed']);
                $this->db->execute();
            }
            
            if(!empty($data['BunkBed'])){
                $this->db->query('INSERT INTO hotel_roomnbed(roomID,bedType,noofbeds)VALUES
                (:roomID, :bedType, :noofbeds)');
                $this->db->bind(':roomID',$data['RoomTypeID']);
                $this->db->bind(':bedType',"Bunk bed");
                $this->db->bind(':noofbeds',$data['BunkBed']);
                $this->db->execute();
            }
    
            //Assign individual roomIDs
            for ($x=0;$x<$data['NoOfRooms'];$x++){
                $this->db->query('INSERT INTO hotel_roomIDs(roomNo, roomTypeID, hotelID)
                VALUES(:roomNo, :roomTypeID, :hotelID)');
                $roomNo = $data['hotelid'].rand(100000,999999);
                $this->db->bind(':roomNo',$roomNo);
                $this->db->bind(':roomTypeID',$data['RoomTypeID']);
                $this->db->bind(':hotelID',$data['hotelid']);
                // $this->db->bind(':A',$x+1); 

                if (!$this->db->execute()) {
                    echo "Something went wrong";
                }
            }
            return true;
           
        }
        else {
            return false;
        }
    }

    //Get all hotel room types in a specific hotel
    public function viewAllRooms($hotelID){
        $this->db->query('SELECT * FROM hotel_rooms WHERE HotelID=:id');
        $this->db->bind(':id',$hotelID);

        $roomset=$this->db->resultSet();

        return $roomset;
    }

    

    //Get all room IDs for a room type
    public function getRoomIDs($roomTypeID){
        $this->db->query('SELECT * FROM hotel_roomIDs WHERE roomTypeID=:roomTypeID');
        $this->db->bind(':roomTypeID',$roomTypeID);
        $roomIDset = $this->db->resultSet();

        return $roomIDset;
    }

    public function viewAllBedsInThisRoom($roomID){
        $this->db->query('SELECT * FROM hotel_roomnbeds WHERE roomID=:roomID');
        $this->db->bind(':roomID',$roomID);
        $bedset=$this->db->resultSet();

        return $bedset;
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
