<?php
class M_Taxi_Vehicle{
        private $db;

        public function __construct()
        {
            $this->db=new Database();
        }

        public function addtaxivehicle($data){
            $this->db->query('INSERT INTO vehicles(OwnerID,Model,VehicleType,YearOfProduction,driver_name,vehicle_number,area,no_of_seats,price_per_km) VALUES(:OwnerID,:Model,:VehicleType,:YearOfProduction,:driver_name,:vehicle_number,:area,:no_of_seats,:price_per_km)');
            $this->db->bind(':OwnerID',$data['owner']);
            $this->db->bind(':Model',$data['model']);
            $this->db->bind(':VehicleType',$data['vehicleType']);
            $this->db->bind(':YearOfProduction',$data['yearofProduction']);
            $this->db->bind(':driver_name',$data['driver']);
            $this->db->bind(':vehicle_number',$data['vehicleNumber']);
            $this->db->bind(':area',$data['area']);
            $this->db->bind(':no_of_seats',$data['noOfSeats']);
            $this->db->bind(':price_per_km',$data['price_per_km']);
            
    
            if ($this->db->execute()) {
                
                return true;
            }
            else {
                return false;
            }
        }


        public function viewall(){
            $this->db->query('SELECT * FROM vehicles');
            $vehicles=$this->db->resultSet();

            return $vehicles;
        }

}

?>