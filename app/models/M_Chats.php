<?php

class M_Chats{
    private $db;
    
    public function __construct()
    {
        $this->db=new Database();
    }

    public function insert($data)
    {
        $this->db->query('INSERT INTO chats(sender,receiver,message) VALUES(:sender,:receiver,:message)');
        $this->db->bind(':sender',$data['sender']);
        $this->db->bind(':receiver',$data['receiver']);
        $this->db->bind(':message',$data['message']);
        
        if ($this->db->execute()) {
            return true;
        }
        else {
            return false;
        }
    }
    public function getmessages($data)
    {
        $this->db->query('SELECT * FROM chats LEFT JOIN users ON users.UserID = chats.sender WHERE (sender=:sender AND receiver=:receiver) OR (sender=:receiver AND receiver=:sender) ORDER BY message_id ASC');
        $this->db->bind(':sender',$data['sender']);
        $this->db->bind(':receiver',$data['receiver']);
        $msgs=$this->db->resultSet();
        $output="";
        if ($this->db->rowCount()>0) {
            foreach ($msgs as $msg) {
                if ($msg->sender===$data['sender']) {
                    $output .= '<div class="chat outgoing">
                                    <div class="details">
                                        <p>'. $msg->message.'</p>
                                    </div>
                                </div>';
                }
                else {
                    $output .= '<div class="chat incoming">
                                    <img src="'.URLROOT.'/img/profileImgs/'.$msg->profileimg.'" alt="" >
                                    <div class="details">
                                        <p>'. $msg->message.'</p>
                                    </div>
                                </div>';
                }
            }
            return $output;
        }
        else {
            return $output;
        }
    }
}


?>