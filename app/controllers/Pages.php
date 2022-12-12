<?php
    class Pages extends Controller{
        public function __construct(){
            // echo 'This is the pages controller';
        }
        public function index(){

            $data=[
                'isLoggedIn'=>false
            ];
<<<<<<< HEAD

            $this->view('hotels/v_6hotelRooms',$data);
=======
            $this->view('v_home',$data);
>>>>>>> 2a9e4c9cbc5c961d71368c5fa14326ebfdc22213
        }

        public function home(){
            $this->view('v_home');
        }


        public function logins(){
            $this->view('v_logins');
        }


        public function hotels(){
            $this->view('hotels/v_hotelHome');
        }

        public function taxies(){
            $this->view('taxi/v_taxi_home');
        }

        public function guides(){
            $this->view('guide/v_guide_home');
        }

        public function about($name,$age){
            $data=[
                'userName'=>$name,
                'userAge'=>$age
            ];
            $this->view('v_about',$data);
        }
    }

?>
