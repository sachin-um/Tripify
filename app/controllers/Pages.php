<?php
    class Pages extends Controller{
        public function __construct(){
            $this->userModel=$this->model('M_Users');
            $this->hotelModel=$this->model('M_Hotels');
            $this->guideModel=$this->model('M_Guides');
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
                $travelerDetails=$this->userModel->getTravelerDetails($_SESSION['user_id']);
                $data->travelerDetails=$travelerDetails;
                $this->view('traveler/v_traveler_dashboard',$data);
            }
            else if ($_SESSION['user_type']=='Taxi') {
                $taxidetails=$this->userModel->getTaxiById($_SESSION['user_id']);
                $data->details=$taxidetails;
                $this->view('taxi/v_taxi_dashboard',$data);
            }
            else if ($_SESSION['user_type']=='Guide') {
                $guide=$this->guideModel->getGuideById($_SESSION['user_id']);
                $languages=$this->guideModel->getGuideLanguageById($_SESSION['user_id']);
                $data->guideDetails=$guide;
                $data->guideLanguages=$languages;
                $this->view('guide/v_dash_profile',$data);
            }
            else if ($_SESSION['user_type']=='Hotel') {
                $hotelvar=$this->hotelModel->findUserDetails();
                $data->hoteldetails=$hotelvar;
                $data->hotelaccountdetails=$this->userModel->getUserDetails($_SESSION['user_id']);
                $this->view('hotels/v_dash_profile',$data);
            }
            else if ($_SESSION['user_type']=='Admin') {
                $admindetails=$this->userModel->getAdminDetails($_SESSION['user_id']);
                $data->details=$admindetails;
                $_SESSION['admin_type']=$data->details->AssignedArea;
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
            $allhotels=$this->hotelModel->viewAllHotels();

            $data=[
                'allhotels'=> $allhotels
            ];
            $this->view('hotels/v_hotelHome',$data);
        }

        public function taxies(){
            $this->view('taxi/v_taxi_home');
        }

        public function guides(){
            $allguides=$this->guideModel->viewAllguides();

            $data=[
                'allguides'=> $allguides
            ];
            $this->view('guide/v_guide_home',$data);
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
