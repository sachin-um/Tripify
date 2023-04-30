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
        $this->db->query('INSERT INTO taxiowner(OwnerID,profileImg,NoOfVehicles,owner_name,nic_no,company_name,contact_number,address,services) VALUES(:owner_id,:profileImg,:noOfVehicle,:owner_name,:NIC_no,:company_name,:contact_number,:address,:services)');
        $this->db->bind(':owner_name',$data['owner_name']);
        $this->db->bind(':NIC_no',$data['NIC_no']);
        $this->db->bind(':profileImg',$data['profile_image_name']);
        $this->db->bind(':company_name',$data['company_name']);
        $this->db->bind(':contact_number',$data['contact_number']);
        $this->db->bind(':address',$data['address']);
        $this->db->bind(':noOfVehicle',$data['noOfVehicle']);
        $this->db->bind(':services',$data['services']);
        $this->db->bind(':owner_id',$data['owner_id']);

        if ($this->db->execute()) {
            $this->db->query('DELETE FROM traveler WHERE TravelerID=:travelerid');
            $this->db->bind(':travelerid',$data['owner_id']);
            $updatetraveler=$this->db->execute();

            $this->db->query('UPDATE users SET UserType="Taxi",verification_status=2 WHERE UserID=:taxiid');
            $this->db->bind(':taxiid',$data['owner_id']);
            $userupdate=$this->db->execute();
            if ($updatetraveler && $userupdate) {

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

    public function getOwnerByID($id){
        $this->db->query('SELECT * FROM taxiowner WHERE OwnerID=:ID');
        $this->db->bind(':ID',$id);

        $row = $this->db->single();
        return $row;
    }

    public function viewall(){
        $this->db->query('SELECT * FROM taxiowner');
        $owners=$this->db->resultSet();

        return $owners;
    }

    public function editOwnerInfo($data){
        $this->db->query('UPDATE taxiowner SET owner_name=:owner_name,profileImg=:profileImg, company_name=:company_name, contact_number=:contact_number, address=:address, services=:services  WHERE OwnerID=:OwnerID');
        $this->db->bind(':owner_name',$data['name']);
        // $this->db->bind('nic_no',$data['nic']);
        $this->db->bind(':profileImg',$data['profile_image_name']);
        $this->db->bind(':company_name',$data['company_name']);
        $this->db->bind(':contact_number',$data['contact_number']);
        $this->db->bind(':address',$data['address']);
        $this->db->bind(':services',$data['services']);
        $this->db->bind(':OwnerID',$data['OwnerID']);
        // die($data['OwnerID']);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }


    // public function viewbookings(){
    //     $this->db->query('SELECT * FROM taxi_reservation');
    //     $bookings=$this->db->resultSet();
    //     return $bookings;
    // }

    // public function getVehicleAndDriversbyID($id){
    //     $this->db->query('SELECT vehicles.vehicle_number, taxi_drivers.Name
    //         FROM vehicles
    //         JOIN taxi_drivers ON vehicles.driverID = taxi_drivers.TaxiDriverID
    //         WHERE vehicles.VehicleID=:VehicleID');
    //     $this->db->bind(':VehicleID',$id);
    //     $row = $this->db->single();
    //     return $row;
    // }


    // public function viewBookingsByID($id){
    //     $this->db->query('SELECT * FROM taxi_reservation WHERE ReservationID=:ReservationID');
    //     $this->db->bind(':ReservationID',$id);
    //     $bookings=$this->db->single();
    //     return $bookings;
    // }

    // public function confrimBooking($id)
    //     {
    //         $this->db->query('UPDATE `taxi_reservation` SET status="Confirmed" WHERE ReservationID=:booking_id');
    //         $this->db->bind(':booking_id',$id);

            

    //         if ($this->db->execute()) {
    //             return true;
    //         }
    //         else {
    //             return false;
    //         }
    //     }


    //     public function cancelBooking($id)
    //     {
    //         $this->db->query('UPDATE `taxi_reservation` SET status="Canceled" WHERE ReservationID=:booking_id');
    //         $this->db->bind(':booking_id',$id);

    //         if ($this->db->execute()) {
    //             return true;
    //         }
    //         else {
    //             return false;
    //         }
    //     }


    
}

?>
