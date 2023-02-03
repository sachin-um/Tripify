<?php
    class Admins extends Controller{
        public function __construct(){
            $this->adminModel=$this->model('M_Admins');
            $this->userModel=$this->model('M_Users');
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
                    $data['otp']=sendAdminMail($data['email'],$data['name'], $data['password']);
                    //Register user
                    
                    if ($this->userModel->register($data)) {
                        redirect('Admins/admins');
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

        public function changepassword()
        {
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                //Data validation
                $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

                $data=[
                    'email'=>$_SESSION['v_email'],
                    'old_password'=>trim($_POST['old_password']),
                    'password'=>trim($_POST['password']),
                    'confirm-password'=>trim($_POST['confirm-password']),
                    
                    'email_err'=>'',
                    'old_password_err'=>'',
                    'password_err'=>'',
                    'confirm-password_err'=>''
                ];

                //validate code
                if (empty($data['email'])) {
                    $data['email_err']='Please enter an Email';
                }
                else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $data['email_err'] = "Invalid email format";
                }
                else{
                    if(!$this->userModel->findUserByEmail($data['email'])) {
                        $data['email_err']='Account doesnt exist...';
                    }
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
                    echo "HI";
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
        
    }



?>