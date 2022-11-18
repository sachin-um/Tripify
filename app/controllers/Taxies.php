<?php
    class Taxies extends Controller{
        public function __construct(){
            $this->taxiModel=$this->model('M_Taxi');
        }
        public function index(){

        }

        public function register(){
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                //Data validation
                $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

                $data=[
                    'owner_name'=>trim($_POST['owener-name']),
                    'NIC_no'=>trim($_POST['nicno']),
                    'company_name'=>trim($_POST['company-name']),
                    'contact_number'=>trim($_POST['contact-number']),
                    'noOfVehicle'=>trim($_POST['no-of-vehicle']),
                    'address'=>($_POST['address']),
                    'owner_id'=>$_SESSION['user_id'],

                    'owner_name_err'=>'',
                    'NIC_no_err'=>'',
                    'company_name_err'=>'',
                    'contact_number_err'=>'',
                    'noOfVehicle_err'=>'',
                    'address_err'=>'',
                    'owner_id_err'=>'',

                ];

                //validate name
                if (empty($data['owner_name'])) {
                    $data['owner_name_err']='Please enter the Property Name';
                }
                //validate email
                if (empty($data['NIC_no'])) {
                    $data['NIC_no_err']='please enter the Property Address';
                }
                
                if (empty($data['contact_number'])) {
                    $data['contact_number_err']='Please enter a Contact number';
                }
                if (empty($data['noOfVehicle'])) {
                    $data['noOfVehicle_err']='Please enter a Registration number';
                }
                if (empty($data['address'])) {
                    $data['address_err']='Please enter an address';
                }
                if (empty($data['owner_id'])) {
                    $data['owner_id_err']='Error in Owner ID';
                }

                if (empty($data['owner_name_err']) &&  empty($data['NIC_no_err']) && empty($data['contact_number_err']) && empty($data['noOfVehicle_err']) && empty($data['address_err']) && empty($data['owner_id_err'])) {
                

                    //Register Taxi Account
                    if ($this->taxiModel->register($data)) {
                        flash('reg_flash', 'You are Succusefully registered as Taxi Owner');
                        redirect('Taxies/login');
                    }
                    else{
                        die('Something went wrong');
                    }
                }
                else {
                    $this->view('taxi/v_register',$data);
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
                    'owner_id'=>$_SESSION['user_id'],

                    'owner_name_err'=>'',
                    'NIC_no_err'=>'',
                    'company_name_err'=>'',
                    'contact_number_err'=>'',
                    'noOfVehicle_err'=>'',
                    'address_err'=>'',
                    'owner_id_err'=>'',

                ];
                $this->view('taxi/v_register',$data);
            }
            // $this->view('hotels/v_register');
        }

        


        


        
    }

?>