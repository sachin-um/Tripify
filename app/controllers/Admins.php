<?php
    class Admins extends Controller{
        public function __construct(){
            $this->adminModel=$this->model('M_Admins');
            $this->userModel=$this->model('M_Users');
            $this->guideBookingModel=$this->model('M_Guide_Bookings');
            $this->hotelBookingModel=$this->model('M_Hotel_Bookings');
            $this->taxiBookingModel=$this->model('M_Taxi_Bookings');
        }

        public function index(){

        }

        //Register an Admin
        public function register(){
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                //Data validation
                $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

                $data=[
                    'name'=>trim($_POST['name']),
                    'email'=>trim($_POST['email']),
                    'password'=>trim($_POST['password']),
                    'confirm-password'=>trim($_POST['confirm-password']),
                    'contactno'=>trim($_POST['contactno']),
                    'nic'=>trim($_POST['nic']),
                    'assigned-area'=>trim($_POST['assigned-area']),

                    'name_err'=>'',
                    'email_err'=>'',
                    'password_err'=>'',
                    'confirm-password_err'=>'',
                    'contactno_err'=>'',
                    'nic_err'=>'',
                    'assigned-area_err'=>''

                ];
                
                //validate name
                if (empty($data['name'])) {
                    $data['name_err']='Please enter a name';
                }
                //validate email
                if (empty($data['email'])) {
                    $data['email_err']='please enter a email';
                }
                else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $data['email_err'] = "Invalid email format";
                }
                else{
                    if($this->userModel->findUserByEmail($data['email'])) {
                        $data['email_err']='Email is already registered';
                    }
                }
                
                if (empty($data['contactno'])) {
                    $data['contactno_err']='Please Enter a Valid Contact number';
                }
                if (empty($data['nic'])) {
                    $data['nic_err']='Please Enter the NIC number of Admin';
                }
                if (empty($data['assigned-area'])) {
                    $data['assigned-area_err']='Please Select the Assinged area of Admin';
                }

                if (empty($data['password'])) {
                    $data['password_err']='Please fill the password field';
                }
                elseif (strlen($data['password'])<8) {
                    $data['password_err']='your passowrd should contains at least 8 characters';
                }
                elseif (ctype_lower($data['password']) || ctype_upper($data['password'])) {
                    $data['password_err']='your passowrd should be a mix of lowercase and uppercase characters.';
                }
                elseif (ctype_alnum($data['password'])) {
                    $data['password_err']='your passowrd should contains at least one or more non-alphabetic character.';
                }
                elseif (empty($data['confirm-password'])) {
                    $data['confirm-password_err']='Please confirm the password';
                }
                else{
                    if($data['password'] != $data['confirm-password'] ) {
                        $data['confirm-password_err']='Password and the confirm password are not matching';
                    }
                }


                if (empty($data['name_err']) &&  empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm-password_err']) && empty($data['contactno_err']) && empty($data['nic_err']) && empty($data['assigned-area_err'])) {
                    $data['password']=password_hash($data['password'], PASSWORD_DEFAULT);

                    //send verification email and get otp code
                    $data['otp']=sendAdminMail($data['email'],$data['name']);
                    //Register user
                    if ($data['otp']!='') {
                        if ($this->adminModel->register($data)) {
                            redirect('Admins/manageadmins');
                        }
                        else{
                            die('Something went wrong');
                        }
                    }
                    else{
                        die('Something went wrong');
                    }
                    
                }
                else {
                    $this->view('admin/v_admin_register',$data);
                }



            }
            else {
                $data=[
                    'name'=>'',
                    'email'=>'',
                    'password'=>'',
                    'confirm-password'=>'',
                    'contactno'=>'',
                    'nic'=>'',
                    'assigned-area'=>'',

                    'name_err'=>'',
                    'email_err'=>'',
                    'password_err'=>'',
                    'confirm-password_err'=>'',
                    'contactno_err'=>'',
                    'nic_err'=>'',
                    'assigned-area_err'=>''

                ];
                $this->view('admin/v_admin_register',$data);
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
                        $this->view('admin/v_login',$data);
                    }
                    else if ($log_user->UserType!='Admin') {
                        flash('reg_flash', 'You Cannot logging as a Admin');
                        redirect('Admins/login');
                    }
                    
                    //logging user
                    else{
                        $this->createUserSession($log_user);
                    }
                }
                else {
                    $this->view('admin/v_login',$data);
                }



            }
            else {
                $data=[
                    'email'=>'',
                    'password'=>'',

                    'email_err'=>'',
                    'password_err'=>'',

                ];
                $this->view('admin/v_login',$data);
            }
        }

        public function editAdminDetails($adminid){
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

                if ($adminid==$_SESSION['user_id']) {
                    $data=[
                        'profile-img'=>$_FILES['profile-imgupload'],
                        'profile-img_name'=>time().'_'.$_FILES['profile-imgupload']['name'],
                        'name'=>trim($_POST['name']),
                        'contactno'=>trim($_POST['contact-number']),
                        'id'=>$adminid
                    ];

                    if (uploadImage($data['profile-img']['tmp_name'],$data['profile-img_name'],'/img/profileImgs/')) {
                        if ($this->adminModel->editAdminDetails($data)) {
                            unset($_SESSION['user_profile_image']);
                            $user=$this->userModel->getUserDetails($_SESSION['user_id']);
                            $_SESSION['user_profile_image']=$user->profileimg;

                            redirect('Pages/profile');
                        }
                        else{
                            die('Something went wrong');
                        }
                    }
                    else {
                        
                        flash('img_flash', 'Image Upload Failed'.$data['profile-img_name']);
                        redirect('Pages/profile');
                    }
    
                    
                }
                else {
                    flash('reg_flash', 'Access denied..');
                    redirect('Users/login');
                }
                
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

        public function changepassword($otp)
        {
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                //Data validation
                $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

                $data=[
                    'otp'=>$otp,
                    'email'=>trim($_POST['email']),
                    'password'=>trim($_POST['password']),
                    'confirm-password'=>trim($_POST['confirm-password']),
                    
                    'email_err'=>'',
                    'password_err'=>'',
                    'confirm-password_err'=>''
                ];

                //validate code
                if (empty($data['email'])) {
                    $data['email_err']='please enter your Username';
                }
                if (empty($data['otp'])) {
                    $data['confirm-password_err']='OTP Error..!';
                }
                if (empty($data['password'])) {
                    $data['password_err']='Please fill the password field';
                }
                elseif (strlen($data['password'])<8) {
                    $data['password_err']='your passowrd should contains at least 8 characters';
                }
                elseif (strlen($data['password'])<8) {
                    $data['password_err']='your passowrd should contains at least 8 characters';
                }
                elseif (ctype_lower($data['password']) || ctype_upper($data['password'])) {
                    $data['password_err']='your passowrd should be a mix of lowercase and uppercase characters.';
                }
                elseif (ctype_alnum($data['password'])) {
                    $data['password_err']='your passowrd should contains at least one or more non-alphabetic character.';
                }
                elseif (empty($data['confirm-password'])) {
                    $data['confirm-password_err']='Please confirm the password';
                }
                else{
                    if($data['password'] != $data['confirm-password'] ) {
                        $data['confirm-password_err']='Password and the confirm password are not matching';
                    }
                }
                if (empty($data['password_err']) && empty($data['confirm-password_err'])) {
                    $data['password']=password_hash($data['password'], PASSWORD_DEFAULT);
                    //reset password
                    if ($this->adminModel->resetpassword($data)) {
                        flash('reg_flash', 'Your Password is successfully Changed..');
                        redirect('Users/login');
                    }
                    //error
                    else{
                        $data['confirm-password_err']='Something went wrong please check your verification code and try again...';
                        $this->view('admin/v_reset_password',$data);
                    }
                }
                else {
                    $this->view('admin/v_reset_password',$data);
                }



            }
            else {
                $data=[
                    'otp'=>$otp,
                    'email'=>'',
                    'password'=>'',
                    'confirm-password'=>'',
                    
                    'email_err'=>'',
                    'password_err'=>'',
                    'confirm-password_err'=>''

                ];
                $this->view('admin/v_reset_password',$data);
            }
        }


        public function profiles($usertype){

            $userData=$this->userModel->getAllUserDetails($usertype);
            $data=[
                'UserData'=>$userData
            ];
            if($usertype=='Traveler'){
                $this->view('admin/v_admin_up_traveler',$data);
            }
            elseif($usertype=='Hotel'){
                $this->view('admin/v_admin_up_Hotels',$data);
            }
            elseif($usertype=='Guide'){
                $this->view('admin/v_admin_up_guides',$data);
            }
            elseif($usertype=='Taxi'){
                $this->view('admin/v_admin_up_Taxies',$data);
            }
        }


        public function verification($usertype){

            $userData=$this->userModel->getAllUserDetails($usertype,'verify');
            $data=[
                'UserData'=>$userData
            ];
            if($usertype=='Hotel'){
                $this->view('admin/v_admin_up_Hotels',$data);
            }
            elseif($usertype=='Guide'){
                $this->view('admin/v_admin_up_guides',$data);
            }
            elseif($usertype=='Taxi'){
                $this->view('admin/v_admin_up_Taxies',$data);
            }

        }

        public function manageadmins()
        {
            
            if ($_SESSION['user_id']==1) {
                $adminData=$this->adminModel->getAllAdminDetails();
                $data=[
                    'AdminData'=>$adminData
                ];
                $this->view('admin/v_admin_manage',$data); 
            }
            else {
                flash('reg_flash', 'Access denied');
                redirect('Users/login');
            }
        }

        public function unverifiedDrivers(){
            $driverData=$this->userModel->getUnverifiedDrivers();
            $admindetails=$this->userModel->getAdminDetails($_SESSION['user_id']);

            $data = [
                'driverData'=>$driverData,
                'details' =>$admindetails,
                'AssignedArea' =>$_SESSION['admin_type']
            ];
            $this->view("admin/v_admin_unverified_drivers",$data);
        }

        public function unverifiedVehicles(){
            $vehicleData=$this->userModel->getUnverifiedVehicles();
            $admindetails=$this->userModel->getAdminDetails($_SESSION['user_id']);

            $data=[
                'vehicleData'=>$vehicleData,
                'details' =>$admindetails,
                'AssignedArea' =>$_SESSION['admin_type']
            ];
            
            $this->view("admin/v_admin_unverified_vehicles",$data);
        }

        public function verifydriver($id)
        {
            if ($this->adminModel->verifydriver($id)) {
                flash('admin_driver_verify_flash', 'Verification Successful');
                redirect('Admins/unverifiedDrivers');
            }
            else {
                flash('admin_driver_verify_flash', 'Somthing Went Wrong Please Try again');
                redirect('Admins/unverifiedDrivers');
            }
        }

        public function verifyvehicle($id)
        {
            if ($this->adminModel->verifyvehicle($id)) {
                flash('admin_vehicle_verify_flash', 'Verification Successful');
                redirect('Admins/unverifiedVehicles');
            }
            else {
                flash('admin_vehicle_verify_flash', 'Somthing Went Wrong Please Try again');
                redirect('Admins/unverifiedVehicles');
            }
        }
        
        public function viewStats(){
            $data=$this->userModel->getUserDetails($_SESSION['user_id']);
            $admindetails=$this->userModel->getAdminDetails($_SESSION['user_id']);
            $data->details=$admindetails;
            $_SESSION['admin_type']=$data->details->AssignedArea;

            $result = $this->userModel->getUserNumbers();
            $newar = array();
            foreach($result as $r){
                $newar[] = $r->count;
            }
            $data->users = $newar;

            $guidetotal = $this->guideBookingModel->getGuidePayforMonth();
            $data->guideTotal = $guidetotal;

            $hoteltotal = $this->hotelBookingModel->getHotelPayforMonth();
            $data->hoteltotal = $hoteltotal;

            $taxitotal = $this->taxiBookingModel->getTaxiPayforMonth();
            $data->taxitotal = $taxitotal;

            $guidebookingtotal = $this->guideBookingModel->getGuideBookingsforMonth();
            $data->guideBookingTotal = $guidebookingtotal;

            $hotelbookingtotal = $this->hotelBookingModel->getHotelBookingsforMonth();
            $data->hotelBookingTotal = $hotelbookingtotal;

            $taxibookingtotal = $this->taxiBookingModel->getTaxiBookingsforMonth();
            $data->taxiBookingTotal = $taxibookingtotal;

            $this->view("admin/v_admin_statistic",$data);

        }
    }



?>