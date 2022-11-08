<?php
    class Request extends Controller{
        public function __construct(){
            $this->taxirequestModel=$this->model('M_Taxi_Request');
            $this->guiderequestModel=$this->model('M_Guide_Request');
        }

        public function index(){

        }

        public function addTaxiRequest(){
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                //Data validation
                $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

                $data=[
                    'name'=>trim($_POST['name']),
                    'email'=>trim($_POST['email']),
                    'password'=>trim($_POST['password']),
                    'confirm-password'=>trim($_POST['confirm-password']),

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

                    //Register user
                    if ($this->userModel->register($data)) {
                        flash('reg_flash', 'You are Succusefully registered');
                        redirect('Users/login');
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

                    'name_err'=>'',
                    'email_err'=>'',
                    'password_err'=>'',
                    'confirm-password_err'=>'',

                ];
                $this->view('users/v_register',$data);
            }
            $this->view('users/v_register');
        }
        
    }

?>
