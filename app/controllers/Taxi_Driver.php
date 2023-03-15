<?php
    class Taxi_Driver extends Controller{
        public function __construct(){
            $this->taxi_driverModel=$this->model('M_Taxi_Driver');
        }
        public function index(){

        }

        public function viewdrivers(){
            $alldrivers=$this->taxi_driverModel->viewall($_SESSION['user_id']);
            // $ve=filteritems($alltaxirequests,$_SESSION['user_type'],$_SESSION['user_id']);
            $data=[
                'drivers'=> $alldrivers
            ];
            $this->view('taxi/v_taxi_drivers',$data);
        }

        public function adddriver(){
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                //Data validation
                $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

            
                $data=[
                        'name'=>trim($_POST['name']),
                        'age'=>trim($_POST['age']),
                        'contact_number'=>trim($_POST['contact_number']),
                        'licenseno'=>trim($_POST['licenseno']),
                        'owner'=>$_SESSION['user_id']                 
                    ];


                    if ($this->taxi_driverModel->addtaxidriver($data)) {
                        flash('driver_flash', 'Your Driver is Succusefully added..!');
                        redirect('Taxi_Driver/viewdrivers');
                        // die("Driver was sucessfully Added");
                    }
                    else{
                        die('Something went wrong');
                    }          


            }
            else {
                $data=[
                    'driver'=>'',
                    'vehicleType'=>'',
                    'model'=>'',
                    'yearofProduction'=>'',
                    'vehicleNumber'=>'',
                    'area'=>'',
                    'noOfSeats'=>'',
                    'price_per_km'=>'',                        


                    'driver_err'=>'',
                    'vehicleType_err'=>'',
                    'model_err'=>'',
                    'yearofProduction_err'=>'',
                    'vehicleNumber_err'=>'',
                    'area_err'=>'',
                    'noOfSeats_err'=>'',
                    'price_per_km_err'=>'',


                ];
                $this->view('taxi/v_taxi_add_driver',$data);
            }
            
        }

        public function deleteTaxiDrivers($request_id){

            $taxiDriver= $this->taxi_driverModel->getDriverByID($request_id);
            
            if ($taxiDriver->OwnerID !=$_SESSION['user_id']) {
                flash('reg_flash', 'You need to have logged in first...');
                redirect('Users/login');
            }
            else {
                if ($this->taxi_driverModel->deletetaxiDriver($request_id)) {
                    flash('request_flash', 'Driver was Succusefully Deleted');
                    redirect('Taxi_Driver/viewdrivers');
                }
                else {
                    die('Something went wrong');
                }
            }

        }

        public function editdrivers($driverID){

            if($_SERVER['REQUEST_METHOD']=='POST'){
                $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);
                $data=[
                    'name'=>trim($_POST['name']),
                    'age'=>trim($_POST['age']),
                    'contact_number'=>trim($_POST['contact_number']),
                    'LicenseNo'=>trim($_POST['LicenseNo']),      
                    'TaxiDriverID'=>$driverID
                    ];

                    if ($this->taxi_driverModel->editTaxiDriver($data)) {
                        flash('request_flash', 'Driver Deatails was Succusefully Updated..!');
                        redirect('Taxi_Driver/viewdrivers');
                    }
                    else{
                        die('Something went wrong');
                    }
            }
            
            else{
                
                $taxiDriver= $this->taxi_driverModel->getDriverByID($driverID);
                $data=[
                    'name'=>$taxiDriver->Name,
                    'age'=>$taxiDriver->Age,
                    'contact_number'=>$taxiDriver->contact_number,
                    'licenseno'=>$taxiDriver->LicenseNo,
                    'ID'=>$taxiDriver->TaxiDriverID
                ];
                $this->view('taxi/v_taxi_driver_deatails',$data);
            }
            
            
        }

        public function viewDriversByOwner($id){
            if ($_SESSION['user_type']=='Admin' || $_SESSION['user_id']==$id) {
                $drivers=$this->taxi_driverModel->viewall($id);
                $data=[
                    'drivers'=> $drivers
                ];
                $this->view('admin/v_admin_taxi_drivers',$data);
            }
            else {
                flash('reg_flash', 'Access Denied');
                redirect('Users/login');
            }
        }

        


    
    }


?>