<?php
    class Hotels extends Controller{
        public function __construct(){
            $this->hotelModel=$this->model('M_Hotels');
        }
        public function index(){

        }

        public function register(){
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                //Data validation
                $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

                $data=[
                    'property_name'=>trim($_POST['name']),
                    'property_address'=>trim($_POST['email']),
                    'property_catagory'=>trim($_POST['password']),
                    'contact_number'=>trim($_POST['confirm-password']),
                    'reg_number'=>trim($_POST['confirm-password']),
                    'hotel_id'=>$_SESSION['user_id'],

                    'property_name_err'=>'',
                    'property_address_err'=>'',
                    'property_catagory_err'=>'',
                    'contact_number_err'=>'',
                    'reg_number_err'=>'',
                    'hotel_id_err'=>'',

                ];

                //validate name
                if (empty($data['property_name'])) {
                    $data['property_name_err']='Please enter the Property Name';
                }
                //validate email
                if (empty($data['property_address'])) {
                    $data['property_address_err']='please enter the Property Address';
                }
                if (empty($data['property_catagory'])) {
                    $data['property_catagory_err']='Please select the Property Catagory';
                }
                if (empty($data['contact_number'])) {
                    $data['contact_number_err']='Please enter a Contact number';
                }
                if (empty($data['reg_number'])) {
                    $data['reg_number_err']='Please enter a Registration number';
                }
                if (empty($data['hotel_id'])) {
                    $data['hotel_id_err']='Error in Hotel ID';
                }

                if (empty($data['property_name_err']) &&  empty($data['property_address_err']) && empty($data['property_catagory_err']) && empty($data['contact_number_err']) && empty($data['reg_number_err']) && empty($data['hotel_id_err'])) {
                

                    //Register Hotel
                    if ($this->hotelModel->register($data)) {
                        flash('reg_flash', 'You are Succusefully registered');
                        redirect('Hotels/login');
                    }
                    else{
                        die('Something went wrong');
                    }
                }
                else {
                    $this->view('hotels/v_register',$data);
                }



            }
            else {
                $data=[
                    'property_name'=>'',
                    'property_address'=>'',
                    'property_catagory'=>'',
                    'contact_number'=>'',
                    'reg_number'=>'',
                    'hotel_id'=>$_SESSION['user_id'],

                    'property_name_err'=>'',
                    'property_address_err'=>'',
                    'property_catagory_err'=>'',
                    'contact_number_err'=>'',
                    'reg_number_err'=>'',
                    'hotel_id_err'=>'',

                ];
                $this->view('hotels/v_register',$data);
            }
            // $this->view('hotels/v_register');
        }

        //login
        public function login(){
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                //Data validation
                $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

                $data=[
                    'email'=>trim($_POST['email']),
                    'password'=>trim($_POST['password']),

                    'email_err'=>'',
                    'password_err'=>'',

                ];

                
                //validate email
                if (empty($data['email'])) {
                    $data['email_err']='please enter a email';
                }
                else{
                    if(!$this->userModel->findUserByEmail($data['email'])) {
                        $data['email_err']='Account doesnt Exist..11';
                    }
                }

                if (empty($data['password'])) {
                    $data['password_err']='Please fill the password field';
                }


                if (empty($data['email_err']) && empty($data['password_err'])) {
                    
                    $log_user=$this->userModel->login($data);

                    if ($log_user->UserType !='Hotel') {
                        flash('reg_flash', 'You Cannot logging as a Hotel');
                        redirect('Hotels/login');
                    }

                    //Register user
                    elseif ($log_user) {
                        $this->createUserSession($log_user);
                    }
                    else{
                        $data['password_err']='Password is incorrect';
                        $this->view('hotels/v_login',$data);
                    }
                }
                else {
                    $this->view('hotels/v_login',$data);
                }



            }
            else {
                $data=[
                    'email'=>'',
                    'password'=>'',

                    'email_err'=>'',
                    'password_err'=>'',

                ];
                $this->view('hotels/v_login',$data);
            }
            // $this->view('users/v_login');
        }

        public function addroom(){
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                //Data validation
                $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

            
                $data=[
                        'NoofBeds'=>trim($_POST['pickuplocation']),
                        'destination'=>trim($_POST['destination']),
                        'date'=>trim($_POST['date']),
                        'time'=>trim($_POST['time']),
                        'description'=>trim($_POST['description']),
                        'travelerid'=>trim($_POST['travelerid']),


                        'pickuplocation_err'=>'',
                        'destination_err'=>'',
                        'date_err'=>'',
                        'time_err'=>'',
                        'description_err'=>'',
                        'travelerid_err'=>''
    
                    ];


                //validate name
                if (empty($data['pickuplocation'])) {
                    $data['pickuplocation_err']='Please enter a Pickup Location';
                }
                //validate email
                if (empty($data['destination'])) {
                    $data['destination_err']='please enter a Destination';
                }
                if (empty($data['date'])) {
                    $data['date_err']='please enter a Pickup Date';
                }
                if (empty($data['time'])) {
                    $data['time_err']='please enter a Pickup Time';
                }

                if (empty($data['travelerid'])) {
                    $data['travelerid_err']='Error with traveler ID';
                }
                
                


                if (empty($data['pickuplocation_err']) &&  empty($data['destination_err']) && empty($data['date_err']) && empty($data['time_err']) && empty($data['travelerid_err'])) {
                    
                    //Add a Taxi Request
                    if ($this->taxirequestModel->addtaxirequest($data)) {
                        flash('reg_flash', 'Taxi Request is Succusefully added..!');
                        redirect('Request/TaxiRequest');
                    }
                    else{
                        die('Something went wrong');
                    }
                }
                else {
                    $this->view('traveler/v_taxi_request',$data);
                }



            }
            else {
                $data=[
                    'pickuplocation'=>'',
                    'destination'=>'',
                    'date'=>'',
                    'time'=>'',
                    'description'=>'',
                    'travelerid'=>'',

                    'pickuplocation_err'=>'',
                    'destination_err'=>'',
                    'date_err'=>'',
                    'time_err'=>'',
                    'description_err'=>'',
                    'travelerid_err'=>''

                ];
                $this->view('traveler/v_taxi_request',$data);
            }
            $this->view('traveler/v_taxi_request');
        
        }

        public function createUserSession($user){
            $_SESSION['user_id']=$user->UserID;
            $_SESSION['user_name']=$user->Name;
            $_SESSION['user_email']=$user->Email;
            
            $data=[
                'isLoggedIn'=>$this->isLoggedIn()
            ];
            $this->view('v_home',$data);
            // redirect('Pages/home',$data);
        }


        public function logout(){
            unset($_SESSION['user_id']);
            unset($_SESSION['user_email']);


            session_destroy();

            redirect('Pages/index');
        }


        public function isLoggedIn(){
            if (isset($_SESSION['user_id'])) {
                return true;
            }
            else{
                return false;
            }
        }
    }

?>