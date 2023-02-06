<?php
    class Pages extends Controller{
        public function __construct(){
            $this->userModel=$this->model('M_Users');
        }
        public function index(){

            $data=[
                'isLoggedIn'=>false
            ];
            $this->view('v_home',$data);
        }

        public function home(){
            $this->view('v_home');
        }


        public function profile()
        {
            $data=$this->userModel->getUserDetails($_SESSION['user_id']);
            if ($_SESSION['user_type']=='Traveler') {
                $this->view('traveler/v_traveler_dashboard',$data);
            }
            else if ($_SESSION['user_type']=='Taxi') {
                $this->view('taxi/v_taxi_dashboard',$data);
            }
            else if ($_SESSION['user_type']=='Guide') {
                $this->view('guide/v_guide_dashboard',$data);
            }
            else if ($_SESSION['user_type']=='Hotel') {
                $this->view('hotels/v_hotel_dashboard',$data);
            }
            else if ($_SESSION['user_type']=='Admin') {
                $admindetails=$this->userModel->getAdminDetails($_SESSION['user_id']);
                $data->details=$admindetails;
                $this->view('admin/v_admin_dashboard',$data);
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
