<?php
    class Guides extends Controller{
        public function __construct(){
            $this->guideModel=$this->model('M_Guides');
            $this->userModel=$this->model('M_Users');
        }
        public function index(){

        }

        public function register(){
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                //Data validation
                $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

                $data=[
                    'name'=>trim($_POST['name']),
                    'phone_number'=>trim($_POST['number']),
                    'area'=>trim($_POST['area']),
                    'price_per_hour'=>trim($_POST['price']),
                    'nic'=>trim($_POST['nic']),
                    'languages'=>$_POST['languages'],
                    'bio'=>trim($_POST['bio']),
                    'id'=>$_SESSION['user_id'],
                    
                    
                    

                    'name_err'=>'',
                    'number_err'=>'',
                    'area_err'=>'',
                    'price_err'=>'',
                    'nic_err'=>'',
                    'languages_err'=>'',

                ];

                //validate name
                if (empty($data['name'])) {
                    $data['name_err']='Please enter your name';
                }
                //validate phone number
                if (empty($data['phone_number'])) {
                    $data['number_err']='please enter a phone number';
                }
                if (strlen((string)$data['phone_number'])!=10) {
                    $data['number_err']='please enter a Valid phone number';
                }
                //validate area
                if (empty($data['area'])) {
                    $data['area_err']='please enter the area you want to travel';
                }
                //validate price
                if (empty($data['price_per_hour'])) {
                    $data['price_err']='please enter the Service charges.';
                }
                //validate nic
                if (empty($data['nic'])) {
                    $data['nic_err']='please enter your NIC number.';
                }
                if (strlen((string)$data['nic'])!=10) {
                    $data['nic_err']='please enter a Valid NIC number';
                }
                //validate language
                if (empty($data['languages'])) {
                    $data['languages_err']='please enter languages you speak';
                }
                


                if (empty($data['name_err']) &&  empty($data['phone_number_err']) && empty($data['area_err']) && empty($data['price_err']) && empty($data['nic_err']) && empty($data['languages_err'])) {
                    
                    //register guide
                    if ($this->guideModel->register($data)) {
                        $this->logout();
                        redirect('Guides/login');
                    }
                    else{
                        die('Something went wrong');
                    }
                }
                else {
                    $this->view('guide/v_register',$data);
                }



            }
            else {
                $data=[
                    'name'=>'',
                    'phone_number'=>'',
                    'area'=>'',
                    'price_per_hour'=>'',
                    'nic'=>'',
                    'languages'=>'',
                    'bio'=>'',
                    
                    
                    

                    'name_err'=>'',
                    'number_err'=>'',
                    'area_err'=>'',
                    'price_err'=>'',
                    'nic_err'=>'',
                    'languages_err'=>'',

                ];
                $this->view('guide/v_register',$data);
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
                        $this->view('guide/v_login',$data);
                    }
                    else if ($log_user->UserType!='Guide') {
                        flash('reg_flash', 'You Cannot logging as a Guide');
                        redirect('Guides/login');
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
                    $this->view('guide/v_login',$data);
                }



            }
            else {
                $data=[
                    'email'=>'',
                    'password'=>'',

                    'email_err'=>'',
                    'password_err'=>'',

                ];
                $this->view('guide/v_login',$data);
            }
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

        public function logout(){
            unset($_SESSION['user_id']);
            unset($_SESSION['user_email']);


            session_destroy();

            redirect('Pages/index');
        }

        public function loadGuideProfile($id){
            $guideDetails=$this->guideModel->getGuideById($id);
            $guidelanguages=$this->guideModel->getGuideLanguageById($id);


            $data=[
                //'guidename'=>$guideDetails->Name,
               // 'guidearea'=>$guideDetails->Area,
                
                'guidelanguages'=>$guidelanguages,

                'guideDetails'=> $guideDetails
            ];
           
            
            $this->view('guide/v_guide_details',$data);
        }

        public function showGuides(){
            $this->view('guide/v_guide_list');
        }

        public function showGuideDetails(){
            $this->view('guide/v_guide_details');
        }

        public function viewGuideBookings(){
            
            $this->view('guide/v_guide_bookings');
        }

        public function loadBooking(){
            $this->view('guide/v_guide_booking_form');
        }

    }

    

?>