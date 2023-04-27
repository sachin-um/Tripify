<?php
    class Pages extends Controller{
        public function __construct(){
            $this->userModel=$this->model('M_Users');
            $this->hotelModel=$this->model('M_Hotels');
            $this->guideModel=$this->model('M_Guides');
            $this->taxiModel=$this->model('M_Taxi');
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


        public function profile($id=null,$type=null)
        {
            if (empty($_SESSION['user_id'])) {
                flash('reg_flash', 'You need to have logged in first...');
                redirect('Users/login');
            }
            else {
                $user_id='';
                $user_type='';
                if ($id!=null) {
                    $user_id=$id;
                    $_SESSION['service_id']=$id;
                } else {
                    $user_id=$_SESSION['user_id'];
                    
                }
                if ($type!=null) {
                    $user_type=$type;
                } else {
                    $user_type=$_SESSION['user_type'];
                }
                
                $data=$this->userModel->getUserDetails($user_id);
                if ($user_type=='Traveler') {
                    $travelerDetails=$this->userModel->getTravelerDetails($user_id);
                    $data->travelerDetails=$travelerDetails;
                    $this->view('traveler/v_traveler_dashboard',$data);
                }
                else if ($user_type=='Taxi') {
                    $taxidetails=$this->userModel->getTaxiById($user_id);
                    $data->details=$taxidetails;
                    $this->view('taxi/v_taxi_dashboard',$data);
                }
                else if ($user_type=='Guide') {
                    $guide=$this->guideModel->getGuideById($user_id);
                    $languages=$this->guideModel->getGuideLanguageById($user_id);
                    $data->guideDetails=$guide;
                    $data->guideLanguages=$languages;
                    $this->view('guide/v_dash_profile',$data);
                }
                else if ($user_type=='Hotel') {
                    $hotelvar=$this->hotelModel->findUserDetails();
                    $data->hoteldetails=$hotelvar;
                    $this->view('hotels/v_dash_profile',$data);
                }
                else if ($user_type=='Admin') {
                    $admindetails=$this->userModel->getAdminDetails($user_id);
                    $data->details=$admindetails;
                    $_SESSION['admin_type']=$data->details->AssignedArea;
                    $this->view('admin/v_admin_dashboard',$data);
                }
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
            $allOwners=$this->taxiModel->viewall();
            $data=[
                'owners'=>$allOwners
            ];
            $this->view('taxi/v_taxi_home',$data);
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
