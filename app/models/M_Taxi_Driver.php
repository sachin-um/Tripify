<?php
class M_Taxi_Driver{
        private $db;

        public function __construct()
        {
            $this->db=new Database();
        }

        public function addtaxidriver($data){
            $this->db->query('INSERT INTO taxi_drivers(OwnerID,Age,Name,LicenseNo) VALUES(:OwnerID,:Age,:Name,:LicenseNo)');
            $this->db->bind(':OwnerID',$data['owner']);
            $this->db->bind(':Age',$data['age']);
            $this->db->bind(':Name',$data['name']);
            $this->db->bind(':LicenseNo',$data['licenseno']);
            
            
    
            if ($this->db->execute()) {
                
                return true;
            }
            else {
                return false;
            }
        }

        public function viewall(){
            $this->db->query('SELECT * FROM taxi_drivers');
            $drivers=$this->db->resultSet();

            return $drivers;
        }


}

?>