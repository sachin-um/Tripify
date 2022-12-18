<?php
    class Pages extends Controller{
        public function __construct(){
            // echo 'This is the pages controller';
        }
        public function index(){

            $data=[
                'isLoggedIn'=>false
            ];
            $this->view('v_home',$data);
        }

        public function home(){
            $this->view('guide/v_guide_dashboard');
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
