<?php
    class Trips extends Controller{
        public function __construct(){
            $this->tripModel=$this->model('M_Trips');

            if (empty($_SESSION['user_id'])) {
                flash('reg_flash', 'You need to have logged in first...');
                redirect('Users/login');
            }
            elseif ($_SESSION['user_type']!='Traveler') {
                flash('reg_flash', 'You need to be register as a Traveler ...');
                redirect('Pages/home');
            }
        }

        public function index(){

        }

        public function tripplan(){
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);
                $data=[
                    'trip_name'=>trim($_POST['trip_name']),
                    'trip_location'=>trim($_POST['trip_location']),
                    'start_date'=>trim($_POST['trip_startdate']),
                    'end_date'=>trim($_POST['trip_enddate']),
                    'traveler_id'=>$_SESSION['user_id'],

                    'trip_err'=>'',

                    'create_status'=>''
                ];

                if (empty($data['trip_name']) || empty($data['trip_location']) || empty($data['start_date']) || empty($data['end_date'])) {
                    $data['trip_err']='Please Provide Valid Details About your trip';
                }

                if (empty($data['trip_err'])) {
                    if ($this->TripModel->createAtrip($data)) {
                        $this->view('traveler/v_trip_plan',$data);
                    }
                    else {
                        flash('trip_flash', 'Somthing went Wrong please try again');
                        redirect('Trips/tripplan');
                    }
                }
                else {
                    $this->view('traveler/v_trip_plan',$data);
                    
                }

            }
            else {
                $data=[
                    'trip_name'=>'',
                    'trip_location'=>'',
                    'start_date'=>'',
                    'end_date'=>'',
                    'traveler_id'=>'',

                    'trip_err'=>'',

                    'create_status'=>0

                ];
                $this->view('traveler/v_trip_plan',$data);
            }
            
        }
        
    }



?>