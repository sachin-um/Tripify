<?php
class M_Taxi_Vehicle{
        private $db;

        public function __construct()
        {
            $this->db=new Database();
        }

        public function addtaxivehicle($data){
            $vehicle_image_names = $data['vehicle_image_names'];

            // convert the array of image names to a comma-separated string
            $Vehicle_Images_str = implode(",", $vehicle_image_names);

            $this->db->query('INSERT INTO vehicles(OwnerID,Vehicle_Images,Model,VehicleType,color,YearOfProduction,driverID,vehicle_number,area,no_of_seats,price_per_km,AC,media,wifi) VALUES(:OwnerID,:Vehicle_Images,:Model,:VehicleType,:color,:YearOfProduction,:driverID,:vehicle_number,:area,:no_of_seats,:price_per_km,:AC,:media,:wifi)');
            $this->db->bind(':OwnerID',$data['owner']);
            $this->db->bind(':Vehicle_Images',$Vehicle_Images_str);
            $this->db->bind(':Model',$data['model']);
            $this->db->bind(':VehicleType',$data['vehicleType']);
            $this->db->bind(':color',$data['color']);
            $this->db->bind(':YearOfProduction',$data['yearofProduction']);
            $this->db->bind(':driverID',$data['driver']);
            $this->db->bind(':vehicle_number',$data['vehicleNumber']);
            $this->db->bind(':area',$data['area']);
            $this->db->bind(':no_of_seats',$data['noOfSeats']);
            $this->db->bind(':price_per_km',$data['price_per_km']);
            $this->db->bind(':AC',$data['AC']);
            $this->db->bind(':media',$data['media']);
            $this->db->bind(':wifi',$data['wifi']);
            
    
            if ($this->db->execute()) {
                
                return true;
            }
            else {
                return false;
            }
        }


        public function viewall($id){
            $this->db->query('SELECT vehicles.*,taxi_drivers.Name FROM vehicles JOIN taxi_drivers ON vehicles.driverID = taxi_drivers.TaxiDriverID  WHERE vehicles.OwnerID=:OwnerID');
            $this->db->bind(':OwnerID',$id);
            $vehicles=$this->db->resultSet();
            return $vehicles;
        }

        public function getVehicleByID($id){
            $this->db->query('SELECT vehicles.*,taxi_drivers.Name FROM vehicles JOIN taxi_drivers ON vehicles.driverID = taxi_drivers.TaxiDriverID WHERE vehicles.VehicleID=:VehicleID');
            $this->db->bind(':VehicleID',$id);

            $row=$this->db->single();

            return $row;
        }
        

        public function getVehicleByOwnerID($id){
            $this->db->query('SELECT vehicles.*,taxi_drivers.Name FROM vehicles JOIN taxi_drivers ON vehicles.driverID = taxi_drivers.TaxiDriverID WHERE vehicles.OwnerID=:OwnerID');
            $this->db->bind(':OwnerID',$id);

            $row=$this->db->resultSet();

            return $row;
        }


        public function deletetaxiVehicle($id){
        
            $this->db->query('DELETE FROM `vehicles` WHERE VehicleID=:VehicleID');
            $this->db->bind(':VehicleID',$id);

            

            if ($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        public function editTaxiVehicle($data){
            $vehicle_image_names = $data['vehicle_image_names'];

            // convert the array of image names to a comma-separated string
            $Vehicle_Images_str = implode(",", $vehicle_image_names);
        

            $this->db->query('UPDATE vehicles SET driverID=:driverID,color=:color, area=:area,no_of_seats=:no_of_seats,price_per_km=:price_per_km,AC=:AC,media=:media,wifi=:wifi,Vehicle_Images=:Vehicle_Images WHERE VehicleID=:VehicleID');
            $this->db->bind(':driverID',$data['driverID']);
            $this->db->bind(':Vehicle_Images',$Vehicle_Images_str);
            $this->db->bind(':area',$data['area']);
            $this->db->bind(':color',$data['color']);
            $this->db->bind(':no_of_seats',$data['no_of_seats']);
            $this->db->bind(':price_per_km',$data['price_per_km']);
            $this->db->bind(':VehicleID',$data['VehicleID']);
            $this->db->bind(':AC',$data['AC']);
            $this->db->bind(':media',$data['media']);
            $this->db->bind(':wifi',$data['wifi']);
            


            if ($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }


}

?>