<?php
    class Chat extends Controller
    {
        public function __construct()
        {
            $this->chatmodel=$this->model('M_Chats');
            if (empty($_SESSION['user_id'])) {
                flash('reg_flash', 'You need to have logged in first...');
                redirect('Users/login');
            }
        }

        public function insert_chat()
        {
            
            $data=[
                'sender'=>trim($_POST['outgoing_id']),
                'receiver'=>trim($_POST['incoming_id']),
                'message'=>trim($_POST['message'])
            ];

            if (!empty($data['message'])) {
                if($this->chatmodel->insert($data)){

                }
                else {
                    die('Something went wrong');
                }
            }
            else {
                die('Something went wrong');
            }
        }

        public function get_chat()
        {
            $data=[
                'sender'=>trim($_POST['outgoing_id']),
                'receiver'=>trim($_POST['incoming_id'])
            ];
            $output=$this->chatmodel->getmessages($data);
            echo $output;
        }

        public function get_details($sender,$reciver)
        {
            $data=[
                'sender'=>$sender,
                'receiver'=>$reciver
            ];
            
        }
    }
    

?>