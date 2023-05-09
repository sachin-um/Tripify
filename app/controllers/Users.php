<?php
    class Users extends Controller{
        public function __construct(){
            $this->userModel=$this->model('M_Users');
            $this->messageModel=$this->model('M_Messages');
        }
        public function index(){

        }

        public function getuser($type,$userid)
        {
            $user=[];
            if ($type=="Guide") {
                $user=$this->userModel->getGuideByID($userid);
            }
            elseif ($type=="Hotel") {
                $user=$this->userModel->getHotelById($userid);
            }
            elseif ($type=="Taxi") {
                $user=$this->userModel->getTaxiById($userid);
            }
            
            header('Content-Type: application/json');
            echo json_encode($user);
        }

        public function register(){
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                //Data validation
                $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

                $data=[
                    'name'=>trim($_POST['name']),
                    'email'=>trim($_POST['email']),
                    'contactno'=>trim($_POST['contactno']),
                    'country'=>trim($_POST['country']),
                    'password'=>trim($_POST['password']),
                    'confirm-password'=>trim($_POST['confirm-password']),
                    'otp'=>'',

                    'name_err'=>'',
                    'email_err'=>'',
                    'contactno_err'=>'',
                    'country_err'=>'',
                    'password_err'=>'',
                    'confirm-password_err'=>'',

                ];

                //validate name
                if (empty($data['name'])) {
                    $data['name_err']='Please enter a name';
                }
                //validate email
                if (empty($data['email'])) {
                    $data['email_err']='please enter a email';
                }
                if (empty($data['country'])) {
                    $data['country_err']='please Select your country';
                }
                if (empty($data['contactno'])) {
                    $data['contactno_err'] = 'This field is required';
                } else if (!preg_match('/^[0-9]{10}+$/', $data['contactno'])) {
                    $data['contactno_err'] = 'Invalid Contact Number';
                }
                else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $data['email_err'] = "Invalid email format";
                }
                else{
                    if($this->userModel->findUserByEmail($data['email'])) {
                        $data['email_err']='Email is already registered';
                    }
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


                if (empty($data['name_err']) &&  empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm-password_err']) && empty($data['country_err']) && empty($data['contactno_err'])) {
                    $data['password']=password_hash($data['password'], PASSWORD_DEFAULT);

                    //send verification email and get otp code
                    $data['otp']=sendMail($data['email'],$data['name']);
                    //Register user
                    
                    if ($this->userModel->register($data)) {
                        $this->createVerifySession($data['email']);

                        //verify email
                        //$this->login();
                        //$this->emailverify();
                        // flash('reg_flash', 'You are Succusefully registered');
                        redirect('Users/emailverify');
                    }
                    else{
                        die('Something went wrong');
                    }
                }
                else {
                    $this->view('users/v_register',$data);
                }



            }
            else {
                $data=[
                    'name'=>'',
                    'email'=>'',
                    'contactno'=>'',
                    'country'=>'',
                    'password'=>'',
                    'confirm-password'=>'',
                    'otp'=>'',

                    'name_err'=>'',
                    'email_err'=>'',
                    'contactno_err'=>'',
                    'country_err'=>'',
                    'password_err'=>'',
                    'confirm-password_err'=>'',

                ];
                $this->view('users/v_register',$data);
            }
        }

        //edit travler details
        public function editTravelerDetails($travlerid){
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

                if ($travlerid==$_SESSION['user_id']) {
                    $data=[
                        'name'=>trim($_POST['name']),
                        'contactno'=>trim($_POST['contact-number']),
                        'country'=>trim($_POST['country']),
                        'id'=>$travlerid
                    ];

                    if ($_FILES['profile-imgupload']['error']!=4){
                        $data['profile_img']=$_FILES['profile-imgupload'];
                        $data['profile_img_name']=time().'_'.$_FILES['profile-imgupload']['name'];
                        
                        if (uploadImage($data['profile_img']['tmp_name'],$data['profile_img_name'],'/img/profileImgs/')) {
                            if ($this->userModel->editTravelerDetails($data)) {
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
                    else if($_FILES['profile-imgupload']['error']==4) {
                        $data->profile_img_name='';
                        if ($this->userModel->editTravelerDetails($data)) {
                            $user=$this->userModel->getUserDetails($_SESSION['user_id']);

                            redirect('Pages/profile');
                        }
                        else{
                            die('Something went wrong');
                        }
                        // print_r($_FILES['profile-imgupload']['error']);
                    }
                    
    
                    
                }
                else {
                    flash('reg_flash', 'Access denied..');
                    redirect('Users/login');
                }
                
            }
        }

        //edit hotel user details
        public function editHotelDetails($hotelID){
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

                if ($hotelID==$_SESSION['user_id']) {
                    $data=[
                        'profile-img'=>$_FILES['profile-imgupload'],
                        'profile-img_name'=>time().'_'.$_FILES['profile-imgupload']['name'],
                        'name'=>trim($_POST['name']),
                        'contactno'=>trim($_POST['contact-number']),
                        'id'=>$hotelID
                    ];

                    if (uploadImage($data['profile-img']['tmp_name'],$data['profile-img_name'],'/img/profileImgs/')) {
                        if ($this->userModel->editHotelDetails($data)) {
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

        //edit hotel profile details
        public function editHotelProfileDetails($hotelID){
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

                if ($hotelID==$_SESSION['user_id']) {
                    $data=[
                        'id'=>$hotelID,
                        'name'=>trim($_POST['name']),
                        'line1'=>trim($_POST['line1']),
                        'line2'=>trim($_POST['line2']),
                        'district'=>trim($_POST['district']),
                        'rating'=>trim($_POST['rating']),
                        'category'=>$_POST['category'],
                        'pets'=>$_POST['pets'],
                        'checkin'=>$_POST['checkin'],
                        'checkout'=>$_POST['checkout'],
                        'regNo'=>$_POST['regNo'],                       
                        'description'=>$_POST['description'],                      
                        'contact'=>trim($_POST['contact'])                      
                    ];

                    if ($this->userModel->editHotelDetails($data)) {
                            flash('reg_flash', 'Successfully Updated');
                            redirect('Hotels/load');
                        }
                        else{
                            flash('reg_flash', 'Could not update profile. Try again later.');
                            redirect('Hotels/load');
                        }   
                    
                }
                else {
                    flash('reg_flash', 'Access denied..');
                    redirect('Users/login');
                }
                
            }
        }

        //login
        public function login($usertype=NULL){
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                //Data validation
                $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

                $data=[
                    'email'=>trim($_POST['email']),
                    'password'=>trim($_POST['password']),
                    'usertype'=>trim($_POST['usertype']),

                    'email_err'=>'',
                    'password_err'=>'',

                ];

                
                //validate email
                if (empty($data['email'])) {
                    $data['email_err']='please enter a email';
                }
                else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $data['email_err'] = "Invalid email format";
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
                        $this->view('users/v_login',$data);
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
                    $this->view('users/v_login',$data);
                }



            }
            else {
                $data=[
                    'email'=>'',
                    'password'=>'',

                    'email_err'=>'',
                    'password_err'=>'',

                ];
                
                $this->view('users/v_login',$data);
                
            }
        }

        public function emailverify(){
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                //Data validation
                $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

                $data=[
                    'code'=>trim($_POST['code']),
                    'email'=>$_SESSION['v_email'],

                    'code_err'=>'',

                ];

                //validate code
                if (empty($data['code'])) {
                    $data['email_err']='please enter the verification code';
                }

                if (empty($data['code_err'])) {
                    
                    
                    //register user
                    if ($this->userModel->emailverify($data)) {
                        flash('reg_flash', 'You are Succusefully registered');
                        redirect('Users/login');
                    }
                    //not valid code
                    else{
                        $data['code_err']='Invalid Code';
                        $this->view('users/v_email_verify',$data);
                    }
                }
                else {
                    $this->view('users/v_email_verify',$data);
                }



            }
            else {
                $data=[
                    'code'=>'',
                    'email'=>'',

                    'code_err'=>'',

                ];
                $this->view('users/v_email_verify',$data);
            }
            // $this->view('users/v_login');
        }

        //password reset verification

        public function passwordverify(){
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                //Data validation
                $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

                $data=[
                    'email'=>trim($_POST['email']),
                    'pw_rest_otp'=>'',
                    
                    'email_err'=>'',
                    'pw_rest_otp_err'=>''
                ];

                //validate code
                if (empty($data['email'])) {
                    $data['email_err']='Please Enter a valid email address...';
                }
                if (empty($data['pw_rest_otp'])) {
                    $data['pw_rest_otp_err']='ERROR with OTP sending, please try again later...';
                }

                if (empty($data['email_err'])) {
                    
                    $data['pw_rest_otp']=sendResetPasswordMail($data['email']);
                    
                    //register user
                    if ($this->userModel->passwordverify($data)) {
                        flash('reset_flash', 'We send you a verification code to '.$data['email'].'.');
                        $this->createVerifySession($data['email']);
                        redirect('Users/resetpassword');
                    }
                    //error
                    else{
                        flash('verify_flash', 'ERROR... Please Try again..');
                        redirect('Users/passwordverify');
                    }
                }
                else {
                    $this->view('users/v_forget_password',$data);
                }



            }
            else {
                $data=[
                    'email'=>'',
                    'pw_rest_otp'=>'',
    
                    'email_err'=>'',

                ];
                $this->view('users/v_forget_password',$data);
            }

        }

        public function resetpassword(){
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                //Data validation
                $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

                $data=[
                    'reset_code'=>trim($_POST['reset_code']),
                    'email'=>$_SESSION['v_email'],
                    'password'=>trim($_POST['password']),
                    'confirm-password'=>trim($_POST['confirm-password']),
                    
                    'email_err'=>'',
                    'reset_code_err'=>'',
                    'password_err'=>'',
                    'confirm-password_err'=>''
                ];

                //validate code
                if (empty($data['email'])) {
                    $data['email_err']='ERROR... Please try again later..';
                }
                if (empty($data['reset_code'])) {
                    $data['reset_code_err']='Please enter your verificaion code';
                }
                if (empty($data['reset_code'])) {
                    $data['reset_code_err']='Please enter your verificaion code';
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
                if (empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm-password_err']) && empty($data['reset_code_err'])) {
                    $data['password']=password_hash($data['password'], PASSWORD_DEFAULT);
                    //reset password
                    if ($this->userModel->resetpassword($data)) {
                        flash('reg_flash', 'Your Password is successfully Changed..');
                        redirect('Users/login');
                    }
                    //error
                    else{
                        $data['confirm-password_err']='Something went wrong please check your verification code and try again...';
                        $this->view('users/v_reset_password',$data);
                    }
                }
                else {
                    $this->view('users/v_reset_password',$data);
                }



            }
            else {
                $data=[
                    'reset_code'=>'',
                    'email'=>'',
                    'password'=>'',
                    'confirm-password'=>'',
                    
                    'email_err'=>'',
                    'reset_code_err'=>'',
                    'password_err'=>'',
                    'confirm-password_err'=>''

                ];
                $this->view('users/v_reset_password',$data);
            }

        }


        public function createUserSession($user){
            $_SESSION['user_id']=$user->UserID;
            $_SESSION['user_name']=$user->Name;
            $_SESSION['user_profile_image']=$user->profileimg;
            $_SESSION['user_email']=$user->Email;
            $_SESSION['user_type']=$user->UserType;
            $current_date = date("m-d-Y");
            $tomorrow = date('m-d-Y', strtotime('+1 day'));
            $_SESSION['checkin'] = $current_date;
            $_SESSION['checkout'] = $tomorrow;
            $_SESSION['admin_type']='';

            
            // $this->view('v_home',$data);

            if ($_SESSION['user_type']=='Traveler') {
                redirect('Pages/home');
            }
            elseif ($_SESSION['user_type']=='Hotel') {
                redirect('Pages/profile');
            }
            elseif ($_SESSION['user_type']=='Taxi') {
                redirect('Pages/profile');
            }
            elseif ($_SESSION['user_type']=='Guide') {
                redirect('Pages/profile');
            }
            elseif ($_SESSION['user_type']=='Admin') {
                redirect('Pages/profile');
            }
            
        }

        public function createVerifySession($email){
            $_SESSION['v_email']=$email;
        }


        public function logout(){
            if ($this->userModel->logout()) {
                unset($_SESSION['user_id']);
                unset($_SESSION['user_email']);
                unset($_SESSION['user_profile_image']);
                unset( $_SESSION['user_email']);
                if ($_SESSION['user_type']=='Admin') {
                    unset($_SESSION['admin_type']);
                }
                unset($_SESSION['user_type']);


                session_destroy();

                redirect('Pages/index');
            }
            //error
            else{
                die('Something went wrong');
            }
            
        }


        public function isLoggedIn(){
            if (isset($_SESSION['user_id'])) {
                return true;
            }
            else{
                return false;
            }
        }
        public function about($name,$age){
            $data=[
                'userName'=>$name,
                'userAge'=>$age
            ];
            $this->view('v_about',$data);
        }


        //action on account

        //suspend
        public function suspendaccount($id,$usertype,$action)
        {
            if ($_SESSION['admin_type']=='management' || $_SESSION['admin_type']=='Super Admin') {
                if ($this->userModel->suspendaccount($id,$action)) {
                    if ($usertype=='Traveler') {
                        redirect('Admins/profiles/'.$usertype);
                    }
                    elseif ($usertype=='Hotel') {
                        redirect('Admins/profiles/'.$usertype);
                    }
                    elseif ($usertype=='Taxi') {
                        redirect('Admins/profiles/'.$usertype);
                    }
                    elseif ($usertype=='Guide') {
                        redirect('Admins/profiles/'.$usertype);
                    }
                }
            } else {
                flash('reg_flash', 'Access denied..');
                redirect('Users/login');
            }
            
        }

        //veriify
        public function verifyaccount($id,$usertype)
        {
            if ($_SESSION['admin_type']=='verification' || $_SESSION['admin_type']=='Super Admin') {
                if ($this->messageModel->verifyaccount($id)) {
                    if ($usertype=='Hotel') {
                        if ($_SESSION['admin_type']=='Super Admin') {
                            redirect('Admins/profiles/'.$usertype);
                        }
                        else {
                            redirect('Admins/verification/'.$usertype);
                        }    
                    }
                    elseif ($usertype=='Taxi') {
                        if ($_SESSION['admin_type']=='Super Admin') {
                            redirect('Admins/profiles/'.$usertype);
                        }
                        else {
                            redirect('Admins/verification/'.$usertype);
                        }
                    }
                    elseif ($usertype=='Guide') {
                        if ($_SESSION['admin_type']=='Super Admin') {
                            redirect('Admins/profiles/'.$usertype);
                        }
                        else {
                            redirect('Admins/verification/'.$usertype);
                        }
                    }
                }
            } else {
                flash('reg_flash', 'Access denied..');
                redirect('Users/login');
            }
            
        }
        
        public function contactus(){
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                //Data validation
                $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

                $data=[
                    'name'=>trim($_POST['name']),
                    'email'=>trim($_POST['email']),
                    'message'=>trim($_POST['message']),
                    

                    'name_err'=>'',
                    'email_err'=>'',
                    'message_err'=>''
                    

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
                
                if (empty($data['message'])) {
                    $data['message_err']='Please leave us any message...';
                }
                

                if (empty($data['name_err']) &&  empty($data['email_err']) && empty($data['message_err'])) {
                    
                    
                    if ($this->messageModel->contactus($data)) {
                        
                        flash('reg_flash', 'Your message is recieved, we w');
                        redirect('Users/contactus');
                    }
                    else{
                        die('Something went wrong');
                    }
                }
                else {
                    $this->view('users/v_contact_admin',$data);
                }



            }
            else {
                $data=[
                    'name'=>'',
                    'email'=>'',
                    'message'=>'',
                    

                    'name_err'=>'',
                    'email_err'=>'',
                    'message_err'=>''

                ];
                $this->view('users/v_contact_admin',$data);
            }
        }

        public function messages()
        {
            $messages=$this->messageModel->viewall();
            // $messages=filtermessages($allmessages,$_SESSION['user_type'],$_SESSION['user_id']);
            $data=[
                'messages'=>$messages
            ];
            if ($_SESSION['user_type']=='Admin') {
                $this->view('admin/v_admin_messages',$data);
            }
            elseif ($_SESSION['user_type']=='Traveler') {
                $this->view('traveler/v_messages');
            }
            elseif ($_SESSION['user_type']=='Guide') {
                $this->view('guide/v_messages');
            }
            elseif ($_SESSION['user_type']=='Guide') {
                $this->view('guide/v_messages');
            }
            
        }

        public function complains()
        {
            $allcomplains=$this->complainModel->viewall();
            $complains=filtercomplains($allcomplains,$_SESSION['user_type'],$_SESSION['user_id']);
            $data=[
                'complains'=>$complains
            ];
            if ($_SESSION['user_type']=='Admin') {
                $this->view('admin/v_admin_complains');
            }
            elseif ($_SESSION['user_type']=='Traveler') {
                $this->view('traveler/v_complains');
            }
        }


        
    }

?>
