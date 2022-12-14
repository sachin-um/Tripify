<?php
    class Taxi_Vehicle extends Controller{
        public function __construct(){
            $this->taxi_vehicleModel=$this->model('M_Taxi_Vehicle');
        }
        public function index(){

        }


        public function viewvehicles(){
            $allvehicles=$this->taxi_vehicleModel->viewall();
            $requests=filteritems($alltaxirequests,$_SESSION['user_type'],$_SESSION['user_id']);
            $data=[
                'vehicles'=> $allvehicles
            ];
            $this->view('taxi/v_taxi_vehicles',$data);
        }
        public function addavehicle(){
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                //Data validation
                $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

            
                $data=[
                        'driver'=>trim($_POST['driver']),
                        'vehicleType'=>trim($_POST['vehicle-type']),
                        'model'=>trim($_POST['model']),
                        'yearofProduction'=>trim($_POST['year-of-production']),
                        'vehicleNumber'=>trim($_POST['vehicle-number']),
                        'noOfSeats'=>trim($_POST['no-of-seats']),
                        'price_per_km'=>trim($_POST['price-per-km']),                        


                        'driver_err'=>'',
                        'vehicleType_err'=>'',
                        'model_err'=>'',
                        'yearofProduction_err'=>'',
                        'vehicleNumber_err'=>'',
                        'noOfSeats_err'=>'',
                        'price_per_km_err'=>'',
    
                    ];


                //validate driver
                if (empty($data['driver'])) {
                    $data['driver_err']='Please select a driver';
                }
                //validate vehicle type
                if (empty($data['vehicleType'])) {
                    $data['vehicleType_err']='please enter your vehicle type.';
                }
                //validate Model
                if (empty($data['model'])) {
                    $data['model_err']='Please enter your vehicle model';
                }
                //validate YOP
                if (empty($data['yearofProduction'])) {
                    $data['yearofProduction_err']="Please enter your vehicle's Year of Production.";
                }
                //validate vehicle number
                if (empty($data['vehicleNumber'])) {
                    $data['vehicleNumber_err']='please enter your vehicle Number';
                }
                //validate number of seats
                if (empty($data['price_per_km'])) {
                    $data['price_per_km_err']='please enter your service charges';
                }
                //validate price per km
                if (empty($data['noOfSeats'])) {
                    $data['noOfSeats_err']='please enter No of seats in your vehicle';
                }
                
                


                if (empty($data['driver_err']) &&  empty($data['vehicleType_err']) && empty($data['model_err']) && empty($data['yearofProduction_err']) && empty($data['vehicleNumber_err']) && empty($data['price_per_km_err']) && empty($data['noOfSeats_err'])) {
                    
                    //Add a Taxi Request
                    if ($this->taxi_vehicleModel->addtaxivehicle($data)) {
                        flash('vehicle_flash', 'Your Vehicle is Succusefully added..!');
                        redirect('Request/TaxiRequest');
                    }
                    else{
                        die('Something went wrong');
                    }
                }
                else {
                    $this->view('taxies/add_vehicle',$data);
                }



            }
            else {
                $data=[
                    'driver'=>'',
                    'vehicleType'=>'',
                    'model'=>'',
                    'yearofProduction'=>'',
                    'vehicleNumber'=>'',
                    'noOfSeats'=>'',
                    'price_per_km'=>'',                        


                    'driver_err'=>'',
                    'vehicleType_err'=>'',
                    'model_err'=>'',
                    'yearofProduction_err'=>'',
                    'vehicleNumber_err'=>'',
                    'noOfSeats_err'=>'',
                    'price_per_km_err'=>'',

                ];
                $this->view('taxi/add_taxi_vehicle',$data);
            }
            
        }
    }


?>