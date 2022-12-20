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
            $this->view('traveler/v_traveler_dashboard');
        }


        public function profile()
        {
            
            if ($_SESSION['user_type']=='Traveler') {
                $this->view('traveler/v_traveler_dashboard');
            }
            else if ($_SESSION['user_type']=='Taxi') {
                $this->view('taxi/v_taxi_dashboard');
            }
            else if ($_SESSION['user_type']=='Guide') {
                $this->view('guide/v_guide_dashboard');
            }
            else if ($_SESSION['user_type']=='Hotel') {
                $this->view('hotels/v_hotel-dashboard');
            }
        }
        public function logins(){
            $this->view('v_logins');
        }

        public function rooms(){
            $this->view('hotels/v_hotelviewroom');
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
