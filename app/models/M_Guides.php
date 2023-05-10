<?php
class M_Guides{
    private $db;

    public function __construct()
    {
        $this->db=new Database();
    }

    //register

    public function register($data){
        $this->db->query('INSERT INTO guides(GuideID,Name,Rate,NIC,Area,bio,phone_number) VALUES(:guideid,:name,:rate,:nic,:area,:bio,:phone_number)');
        $this->db->bind(':guideid',$data['id']);
        $this->db->bind(':name',$data['name']);
        $this->db->bind(':rate',$data['price_per_hour']);
        $this->db->bind(':nic',$data['nic']);
        $this->db->bind(':area',$data['area']);
        $this->db->bind(':bio',$data['bio']);
        $this->db->bind(':phone_number',$data['phone_number']);

        $guide=$this->db->execute();

        foreach ($data['languages'] as $language) {
            $this->db->query('INSERT INTO guide_languages(guide_id,language) VALUES(:guideid,:language)');//check  typing above
            $this->db->bind(':language',$language);
            $this->db->bind(':guideid',$data['id']);
            $this->db->execute();
        }

        if ($guide) {
            
            $this->db->query('DELETE FROM traveler WHERE TravelerID=:travelerid');
            $this->db->bind(':travelerid',$data['id']);
            $updatetraveler=$this->db->execute();

            $this->db->query('UPDATE users SET UserType="Guide" WHERE UserID=:guideid');
            $this->db->bind(':guideid',$data['id']);
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

    public function editGuideDetails($data){
        $this->db->query('UPDATE guides set Name=:name,Rate=:rate,Area=:area,phone_number=:contact_number WHERE GuideID=:id');
        $this->db->bind(':name',$data['name']);
        $this->db->bind(':rate',$data['rate']);
        $this->db->bind(':area',$data['area']);
        $this->db->bind(':contact_number',$data['contactno']);
        $this->db->bind(':id',$data['id']);

        $s1=$this->db->execute();

        if ($data['profile_img_name']=="") {
            $this->db->query('UPDATE users set Name=:name,ContactNo=:contactno,profileimg=:profile_img WHERE UserID=:id');
            $this->db->bind(':name',$data['name']);
            $this->db->bind(':contactno',$data['contactno']);
            $this->db->bind(':id',$data['id']);

            $s2=$this->db->execute();
        } else {
            $this->db->query('UPDATE users set Name=:name,ContactNo=:contactno,profileimg=:profile_img WHERE UserID=:id');
            $this->db->bind(':name',$data['name']);
            
            $this->db->bind(':profile_img',$data['profile_img_name']);
            $this->db->bind(':contactno',$data['contactno']);
            $this->db->bind(':id',$data['id']);

            $s2=$this->db->execute();
        }
        

        if ($s1 && $s2) {
            $_SESSION['user_name']=$data['name'];
            return true;
        }
    }
    
    public function getGuideById($id){
        $this->db->query('SELECT * FROM guides WHERE GuideID=:id');
        $this->db->bind(':id',$id);

        $row=$this->db->single();

        return $row;
    }
    

    public function getGuideLanguageById($id){
        $this->db->query('SELECT language FROM guide_languages WHERE guide_id=:id');
        $this->db->bind(':id',$id);

        $languages=$this->db->resultSet();

        return $languages;
    }
    public function viewAllguides(){
        $this->db->query('SELECT * FROM guides');
        $guideset=$this->db->resultSet();

        return $guideset;
    }

}

?>
