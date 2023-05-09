<?php
class M_Hotel_Rooms{
    private $db;

    public function __construct()
    {
        $this->db=new Database();
    }

       
    //Add a hotel room type, their room IDs and their bed types under a hotel
    public function addaroom($data){
        $this->db->query('INSERT INTO hotel_rooms(RoomTypeID,HotelID,RoomTypeName,NoofGuests,NoofBeds,RoomSize,PricePerNight,no_of_rooms,facilities)
         VALUES(:RoomtypeID,:HotelID,:RoomTypeName,:NoofGuests,:NoofBeds,:RoomSize,:PricePerNight,:NoOfRooms,:facilities)');
        $this->db->bind(':RoomtypeID',$data['RoomTypeID']);
        $this->db->bind(':HotelID',$data['hotelid']);
        $this->db->bind(':RoomTypeName',$data['RoomName']);
        $this->db->bind(':NoofGuests',$data['NoofGuests']);
        $this->db->bind(':NoofBeds',$data['NoofBeds']);        
        $this->db->bind(':RoomSize',$data['RoomSize']);
        $this->db->bind(':PricePerNight',$data['PricePerNight']);
        $this->db->bind(':NoOfRooms',$data['NoOfRooms']);
        $this->db->bind(':facilities',$data['facilities']);

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

    public function insertingImages($roomID, $imagename){
        $this->db->query('INSERT INTO hotel_roomPhotos(roomTypeID,hotelID,imgName) values (:roomID, :hotelID, :imagename)');
        $this->db->bind(':roomID',$roomID);
        $this->db->bind(':hotelID',$_SESSION['user_id']);
        $this->db->bind(':imagename',$imagename);
        $result = $this->db->execute();
        return $result;
    }

    public function getImages($roomID){
        $this->db->query('SELECT imgName FROM hotel_roomPhotos where roomTypeID=:roomID');
        $this->db->bind(':roomID',$roomID);

        $images=$this->db->resultSet();
        
        // $imgNameArray = array();
        // if(mysqli_num_rows($images)>0){
        //     while($fetch = mysqli_fetch_assoc($images)){
        //         $imgNameArray[] = $fetch['imgName'];
                
        //     }

        return $images;
        

    }

    public function getBookingID(){
        $this->db->query('SELECT booking_id FROM 
        hotel_bookings ORDER BY booking_id DESC LIMIT 1');

        $bookingID=$this->db->single();

        return $bookingID;
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

    //View just one room
    public function viewWantedRoom($roomTypeID){
        $this->db->query('SELECT * FROM hotel_rooms WHERE RoomTypeID=:id');
        $this->db->bind(':id',$roomTypeID);

        $wantedHotelRoom=$this->db->single();

        return $wantedHotelRoom;
    }

    public function getHotelBeds($roomTypeID){
        $this->db->query('SELECT * FROM hotel_roomnbed WHERE roomID=:id');
        $this->db->bind(':id',$roomTypeID);


    }

    //View all the rooms
    public function viewAllIndividualRooms($roomTypeID){
        $this->db->query('SELECT * FROM hotelrooms WHERE RoomTypeID=:id');
        $this->db->bind(':id',$roomTypeID);

        $individualRoomSet = $this->db->resultSet();

        return $individualRoomSet;
    }

    public function getBeds($roomTypeID){
        $this->db->query('SELECT * from hotel_roomnbed where roomID=:roomID');
        $this->db->bind(':roomID',$roomTypeID);

        $beds = $this->db->resultSet();

        return $beds;
    }

    public function getAllBedsforAllRooms(){
        $this->db->query('SELECT * from hotel_roomnbed');

        $beds = $this->db->resultSet();

        return $beds;
    }

    public function editRoom($data){
        $this->db->query('UPDATE hotel_rooms set roomSize=:size,Price=:price, 
        NoofGuests=:noofguests,NoofRooms=:noofrooms WHERE RoomTypeID=:id');

        $this->db->bind(':size',$data['size']);
        $this->db->bind(':price',$data['price']);
        $this->db->bind(':noofguests',$data['guests']);
        $this->db->bind(':noofrooms',$data['noofrooms']);
        $this->db->bind(':id',$data['id']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

}
