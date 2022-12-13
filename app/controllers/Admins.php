<?php
    class Admins extends Controller{
        public function __construct(){
            $this->adminModel=$this->model('M_Admins');
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
        
    }



?>