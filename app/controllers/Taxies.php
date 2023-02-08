<?php
    class Taxies extends Controller{
        public function __construct(){
            $this->taxiModel=$this->model('M_Taxi');
            $this->userModel=$this->model('M_Users');
        }
        public function index(){

        }

        public function register(){
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                //Data validation
                $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);
                $ad1=trim($_POST['taxiownsadd']);
                $ad2=trim($_POST['taxiownsl2']);
                $ad3=trim($_POST['taxiowncity']);
                $address=$ad1.','.$ad2.','.$ad3.'.';
                // echo $address;
                // $a=trim($_POST['taxicomname']);
                // echo $a;
                $data=[
                    'owner_name'=>trim($_POST['ownername']),
                    'NIC_no'=>trim($_POST['ownernic']),
                    'company_name'=>trim($_POST['taxicomname']),
                    'contact_number'=>trim($_POST['taxiownmobile']),
                    'noOfVehicle'=>trim($_POST['taxiownnov']),
                    'address'=>$address,
                    'owner_id'=>$_SESSION['user_id'],
                    
                ];

                

                
                    //Register Taxi Account
                    if ($this->taxiModel->register($data)) {
                        unset($_SESSION['user_id']);
                        unset($_SESSION['user_email']);
                        flash('reg_flash', 'You are Succusefully registered as Taxi Owner');
                        redirect('Taxies/login');
                    }
                    else{
                        die('Something went wrong');
                    }
                



            }
            else {
                $data=[
                    'owner_name'=>'',
                    'NIC_no'=>'',
                    'company_name'=>'',
                    'contact_number'=>'',
                    'noOfVehicle'=>'',
                    'address'=>'',

                ];
                $this->view('taxi/v_register',$data);
            }
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
                        $data['email_err']='Account doesnt exist...';
                    }
                }

                if (empty($data['password'])) {
                    $data['password_err']='Please fill the password field';
                }


                if (empty($data['email_err']) && empty($data['password_err'])) {
                    
                    $log_user=$this->userModel->login($data);

                    if (!$log_user) {
                        $data['password_err']= 'Password is incorrect';
                        $this->view('taxi/v_login',$data);
                    }
                    else if ($log_user->UserType!='Taxi') {
                        flash('reg_flash', 'You Cannot logging as a Taxi Owner');
                        redirect('Taxies/login');
                    }
                    elseif ($log_user=='NotValidate') {
                        flash('verify_flash', 'You Should Verify your email address first..');
                        $this->createVerifySession($data['email']);
                        redirect('Users/emailverify');
                    }
                    //logging user
                    else{
                        $this->createUserSession($log_user);
                    }
                }
                else {
                    $this->view('taxi/v_login',$data);
                }



            }
            else {
                $data=[
                    'email'=>'',
                    'password'=>'',

                    'email_err'=>'',
                    'password_err'=>'',

                ];
                $this->view('taxi/v_login',$data);
            }
        }

        public function createVerifySession($email){
            $_SESSION['v_email']=$email;
        }

        //user session
        public function createUserSession($user){
            $_SESSION['user_id']=$user->UserID;
            $_SESSION['user_name']=$user->Name;
            $_SESSION['user_email']=$user->Email;
            $_SESSION['user_type']=$user->UserType;
            
            $data=[
                'isLoggedIn'=>$this->isLoggedIn()
            ];
            $this->view('v_home',$data);
            // redirect('Pages/home',$data);
        }

        public function isLoggedIn(){
            if (isset($_SESSION['user_id'])) {
                return true;
            }
            else{
                return false;
            }
        }

        public function offers(){
            $data=[];
            $this->view('taxi/v_taxi_dashboard6',$data);
            
        }

        public function makeoffers(){
            $data=[];
            $this->view('taxi/v_add_taxi_offer',$data);
            
        }

        

        public function bookings(){
            $data=[];
            $this->view('taxi/v_taxi_dashboard7',$data);
           
        }

        public function bookingsview(){
            $data=[];
            $this->view('taxi/v_taxi_dashboard7_1',$data);
           
        }

        public function payments(){
            $data=[];
            $this->view('taxi/v_taxi_dashboard5',$data);
        }

        
        public function trip(){
            $data=[];
            $this->view('taxi/v_taxi_dashboard8',$data);
        }


        public function tripview(){
            $data=[];
            $this->view('taxi/v_taxi_dashboard8_1',$data);
        }


        


        


        
    }

?>