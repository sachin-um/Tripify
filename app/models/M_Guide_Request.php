<?php
    class M_Guide_Request{
        private $db;

        public function __construct()
        {
            $this->db=new Database();
        }




        //add guide request

        public function addguiderequest($data){
            $this->db->query('INSERT INTO guide_request(language,Location,Date,Time,Description,caption,TravelerID) VALUES(:language,:Location,:Date,:Time,:Description,:caption,:travelerid)');
            $this->db->bind(':language',$data['language']);
            $this->db->bind(':Location',$data['area']);
            $this->db->bind(':Date',$data['date']);
            $this->db->bind(':travelerid',$data['travelerid']);
            $this->db->bind(':Time',$data['time']);
            $this->db->bind(':Description',$data['additional-details']);
            $this->db->bind(':caption',$data['caption']);
            
            if ($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        //edit guide request
        public function editguiderequest($data){
            $this->db->query('UPDATE guide_request set language=:language,Location=:Location,Date=:Date,Time=:Time,Description=:Description,caption=:caption,TravelerID=:travelerid WHERE RequestID=:request_id');
            $this->db->bind(':language',$data['language']);
            $this->db->bind(':Location',$data['area']);
            $this->db->bind(':Date',$data['date']);
            $this->db->bind(':travelerid',$data['travelerid']);
            $this->db->bind(':Time',$data['time']);
            $this->db->bind(':Description',$data['additional-details']);
            $this->db->bind(':caption',$data['caption']);
            $this->db->bind(':request_id',$data['request_id']);
            
            if ($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }
        //delete guide request
        public function deleteguiderequest($id){
            $this->db->query('DELETE from guide_request WHERE RequestID=:request_id');
            $this->db->bind(':request_id',$data['request_id']);

            

            if ($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }


        public function getGuideRequestById($id){
            $this->db->query('SELECT * FROM v_guide_request WHERE request_id=:request_id');
            $this->db->bind(':request_id',$id);

            $row=$this->db->single();

            return $row;
        }

        public function viewall(){
            $this->db->query('SELECT * FROM v_guide_request');
            $posts=$this->db->resultSet();

            return $posts;
        }


        
    }

?>