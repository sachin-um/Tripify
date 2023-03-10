<?php
class M_Taxi_Driver{
        private $db;

        public function __construct()
        {
            $this->db=new Database();
        }

        public function addtaxidriver($data){
            $this->db->query('INSERT INTO taxi_drivers(OwnerID,Age,Name,contact_number,LicenseNo) VALUES(:OwnerID,:Age,:Name,:contact_number,:LicenseNo)');
            $this->db->bind(':OwnerID',$data['owner']);
            $this->db->bind(':Age',$data['age']);
            $this->db->bind(':Name',$data['name']);
            $this->db->bind(':contact_number',$data['contact_number']);
            $this->db->bind(':LicenseNo',$data['licenseno']);
            
            
    
            if ($this->db->execute()) {
                
                return true;
            }
            else {
                return false;
            }
        }

        public function viewall($id){
            $this->db->query('SELECT * FROM taxi_drivers WHERE OwnerID=:OwnerID');
            $this->db->bind(':OwnerID',$id);
            $drivers=$this->db->resultSet();

            return $drivers;
        }


        public function getDriverByID($id){
            $this->db->query('SELECT * FROM taxi_drivers WHERE TaxiDriverID=:TaxiDriverID');
            $this->db->bind(':TaxiDriverID',$id);

            $row=$this->db->single();

            return $row;
        }


        public function deletetaxiDriver($id){
        
            $this->db->query('DELETE FROM `taxi_drivers` WHERE TaxiDriverID=:TaxiDriverID');
            $this->db->bind(':TaxiDriverID',$id);

            

            if ($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        public function editTaxiDriver($data){
            $this->db->query('UPDATE taxi_drivers SET Name=:name, Age=:age,contact_number=:contact_number, LicenseNo=:LicenseNo WHERE TaxiDriverID=:TaxiDriverID');
            $this->db->bind(':name',$data['name']);
            $this->db->bind(':age',$data['age']);
            $this->db->bind(':contact_number',$data['contact_number']);
            $this->db->bind(':LicenseNo',$data['LicenseNo']);
            $this->db->bind(':TaxiDriverID',$data['TaxiDriverID']);


            if ($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }


}

?>