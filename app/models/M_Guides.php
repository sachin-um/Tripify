<?php
class M_Guides{
    private $db;

    public function __construct()
    {
        $this->db=new Database();
    }

    //register

    public function register($data){
        $this->db->query('INSERT INTO guides(GuideID,Name,Rate,NIC,Area,NTL,bio,phone_number) VALUES(:guideid,:name,:rate,:nic,:area,:ntl,:bio,:phone_number)');
        $this->db->bind(':guideid',$data['id']);
        $this->db->bind(':name',$data['name']);
        $this->db->bind(':rate',$data['price_per_hour']);
        $this->db->bind(':nic',$data['nic']);
        $this->db->bind(':area',$data['area']);
        $this->db->bind(':ntl',$data['NTL']);
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
}

?>
