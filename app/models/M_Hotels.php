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

    public function getUserDetails($userID){
        $this->db->query('SELECT * FROM users WHERE UserID= :userID');
        $this->db->bind(':userID',$userID);

        $row=$this->db->single();
        
        return $row;
    }

    public function findUserDetails(){
        $this->db->query('SELECT * FROM hotels WHERE HotelID= :hotelid');
        $this->db->bind(':hotelid',$_SESSION['user_id']);

        $row=$this->db->single();
 
        return  $row; 
    }

    public function findHotelNumber($reg_number){
        $this->db->query('SELECT * FROM hotels WHERE reg_number= :reg_number');
        $this->db->bind(':reg_number',$reg_number);

        $row=$this->db->single();

        if ($this->db->rowCount()>0) {
            return true;
        }
        else{
            return false;
        }
    }

    //register

    public function viewAllHotels(){
        $this->db->query('SELECT * FROM hotels');
        $hotelset=$this->db->resultSet();

        return $hotelset;
    }
  
    public function getProfileInfo($hotelID){
        $this->db->query('SELECT * FROM hotels where HotelID= :hotelID');
        $this->db->bind(':hotelID',$hotelID);
        $hotelrecord1=$this->db->single();

        return $hotelrecord1;
    }


    public function searchForHotels($data){
        $this->db->query('SELECT * FROM hotels where Line1= :destination OR Line2= :destination OR District= :destination');
        $this->db->bind(':destination',$data['destination']);
        $hotelrecords=$this->db->resultSet();

        return $hotelrecords;
    }

    public function register($data){
        // foreach($data['facilities'] as $facility){
        //     $this->db->query('SELECT * from hotelfacilities where FacilityName=:facilityName');
        //     $this->db->bind(':facilityName',$facility);
        //     $facilitySelected=$this->db->single();

        //     $this->db->query('INSERT INTO hotelfacility_table(hotelID,facilityID) VALUES(:HotelID,:facilityID)');
        //     $this->db->bind(':HotelID',$data['hotel_id']);
        //     $this->db->bind(':facilityID',$facilitySelected->FacilityID);
        // }
        

        $this->db->query('INSERT INTO hotels(HotelID,Name,Description,Line1,Line2,District,Category,contact_number,Pets,
        Check_in,Check_out,reg_number) VALUES(:HotelID,:name,:Description,:line1,:line2,:district,:property_category,:contact_number,:pets,
        :check_in,:check_out,:reg_number)');
        $this->db->bind(':HotelID',$data['hotel_id']);
        $this->db->bind(':name',$data['name']);
        $this->db->bind(':Description',$data['description']);
        $this->db->bind(':line1',$data['line1']);
        $this->db->bind(':line2',$data['line2']);
        $this->db->bind(':district',$data['district']);
        $this->db->bind(':property_category',$data['property_category']);
        $this->db->bind(':contact_number',$data['contact_number']);
        $this->db->bind(':pets',$data['pets']);
        // $this->db->bind(':children',$data['children']);
        $this->db->bind(':check_in',$data['check_in']);
        $this->db->bind(':check_out',$data['check_out']);
        $this->db->bind(':reg_number',$data['hotel_reg_number']);

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

    public function getHotelById($id){
        $this->db->query('SELECT * FROM hotels WHERE HotelID=:id');
        $this->db->bind(':id',$id);

        $row=$this->db->single();

        return $row;
    }

    public function addFacilities($data){
        $this->db->query('UPDATE hotels set Facilities=:facilities where HotelID=:hotelID');
        $this->db->bind(':facilities',$data['facilities']);
        $this->db->bind(':hotelID',$data['hotelID']);
        $result = $this->db->execute();

        return $result;
    }

    public function getFacilities($data){
        $this->db->query('SELECT Facilities from hotels where HotelID=:hotelID');
        $this->db->bind(':hotelID',$data['hotelID']);

        $result = $this->db->single();
        return $result;
    }



    public function facilityDetails(){
        $this->db->query('SELECT * FROM hotel_facilities');
        $allfacilities=$this->db->resultSet();

        header("Content-Type: image/png");
        return $allfacilities;
    }

    public function insertingImages($hotelID, $imagename){
        $this->db->query('INSERT INTO hotel_photos(hotelID, imgName) values (:hotelID, :imagename)');
        $this->db->bind(':hotelID',$hotelID);
        $this->db->bind(':imagename',$imagename);
        $result = $this->db->execute();
        return $result;
    }

    public function getImages($hotelID){
        $this->db->query('SELECT imgName FROM hotel_photos where hotelID=:hotelID');
        $this->db->bind(':hotelID',$hotelID);

        $images=$this->db->resultSet();
        
        // $imgNameArray = array();
        // if(mysqli_num_rows($images)>0){
        //     while($fetch = mysqli_fetch_assoc($images)){
        //         $imgNameArray[] = $fetch['imgName'];
                
        //     }

        return $images;
        

    }

    public function findReviews($hotelID){
        $this->db->query('SELECT * FROM hotel_reviews where HotelID=:hotelID');
        $this->db->bind(':hotelID',$hotelID);

        $reviews=$this->db->resultSet();
        return $reviews;

    }
}

?>
