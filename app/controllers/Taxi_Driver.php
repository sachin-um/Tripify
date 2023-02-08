<?php
    class Taxi_Driver extends Controller{
        public function __construct(){
            $this->taxi_driverModel=$this->model('M_Taxi_Driver');
        }
        public function index(){

        }

        public function viewdrivers(){
            $alldrivers=$this->taxi_driverModel->viewall();
            // $ve=filteritems($alltaxirequests,$_SESSION['user_type'],$_SESSION['user_id']);
            $data=[
                'drivers'=> $alldrivers
            ];
            $this->view('taxi/v_taxi_dashboard2',$data);
        }

        public function adddriver(){
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                //Data validation
                $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

            
                $data=[
                        'name'=>trim($_POST['name']),
                        'age'=>trim($_POST['age']),
                        'licenseno'=>trim($_POST['licenseno']),
                        'owner'=>$_SESSION['user_id']                 
                    ];


                    if ($this->taxi_driverModel->addtaxidriver($data)) {
                        // flash('vehicle_flash', 'Your Driver is Succusefully added..!');
                        // redirect('Taxi_Vehicle/viewvehicles');
                        die("Driver was sucessfully Added");
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

        public function editdrivers(){
            $data=[];
            $this->view('taxi/v_taxi_dashboard2_1',$data);
        }

    }


?>