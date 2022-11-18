<?php
    class Users extends Controller{
        public function __construct(){
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
                    'email'=>trim($_POST['email']),
                    'password'=>trim($_POST['password']),
                    'confirm-password'=>trim($_POST['confirm-password']),
                    'otp'=>'',

                    'name_err'=>'',
                    'email_err'=>'',
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


                if (empty($data['name_err']) &&  empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm-password_err'])) {
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
                    'password'=>'',
                    'confirm-password'=>'',
                    'otp'=>'',

                    'name_err'=>'',
                    'email_err'=>'',
                    'password_err'=>'',
                    'confirm-password_err'=>'',

                ];
                $this->view('users/v_register',$data);
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
                    'usertype'=>trim($_POST['usertype']),

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

                    if ($log_user->UserType!=$data['usertype']) {
                        flash('reg_flash', 'You Cannot logging as a Traveler');
                        redirect('Users/login');
                    }
                    elseif ($log_user=='NotValidate') {
                        flash('verify_flash', 'You Should Verify your email address first..');
                        $this->createVerifySession($data['email']);
                        redirect('Users/emailverify');
                    }

                    //Register user
                    elseif ($log_user) {
                        $this->createUserSession($log_user);
                    }
                    else{
                        $data['password_err']='Password is incorrect';
                        $this->view('users/v_login',$data);
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
            // $this->view('users/v_login');
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

        public function createVerifySession($email){
            $_SESSION['v_email']=$email;
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
        public function about($name,$age){
            $data=[
                'userName'=>$name,
                'userAge'=>$age
            ];
            $this->view('v_about',$data);
        }
    }

?>