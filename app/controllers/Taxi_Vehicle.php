<?php
    class Taxi_Vehicle extends Controller{
        public function __construct(){
            $this->taxi_vehicleModel=$this->model('M_Taxi_Vehicle');

            $this->taxi_driverModel=$this->model('M_Taxi_Driver');

            $this->taxiModel=$this->model('M_Taxi');
        
        }
        public function index(){

        }

        public function getvehicle($vehicleid)
        {
            $vehicle=$this->taxi_vehicleModel->getVehicleByID($vehicleid);

            header('Content-Type: application/json');
            echo json_encode($vehicle);
        }


        public function viewvehicles(){
           
            $user_id='';
            if ($_SESSION['admin_type']=='verification' || $_SESSION['admin_type']=='Super Admin') {
                $user_id=$_SESSION['service_id'];
            } else {
                $user_id=$_SESSION['user_id'];
            }
            
            $allvehicles=$this->taxi_vehicleModel->viewall($user_id);

            $data=[
                'vehicles'=> $allvehicles
            ];
            $this->view('taxi/v_taxi_vehicles',$data);
        }

        public function viewVehicleByOwner($id){
            if ($_SESSION['user_type']=='Admin' || $_SESSION['user_id']==$id) {
                $vehicles=$this->taxi_vehicleModel->viewall($id);
                $data=[
                    'vehicles'=> $vehicles
                ];
                $this->view('admin/v_admin_taxi_vehicles',$data);
            }
            else {
                flash('vehicle_flash', 'Access Denied');
                redirect('Users/login');
            }
        }

        public function addavehicle(){
            
            $alldrivers=$this->taxi_driverModel->viewall($_SESSION['user_id']);

            if ($_SERVER['REQUEST_METHOD']=='POST') {
                //Data validation
                $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

            
                $data=[ 
                        'driver'=>trim($_POST['driver']),
                        'vehicleType'=>trim($_POST['type']),
                        'model'=>trim($_POST['model']),
                        'yearofProduction'=>trim($_POST['year']),
                        'vehicleNumber'=>trim($_POST['number']),
                        'area'=>trim($_POST['area']),
                        'noOfSeats'=>trim($_POST['max']),
                        'price_per_km'=>trim($_POST['flag']),
                        'AC'=>trim($_POST['ac']),
                        'media'=>trim($_POST['media']),
                        'wifi'=>trim($_POST['wifi']),      
                        'owner'=>$_SESSION['user_id']                 

    
                    ];

                    

                    


                // //validate driver
                // if (empty($data['driver'])) {
                //     $data['driver_err']='Please select a driver';
                // }
                // //validate vehicle type
                // if (empty($data['vehicleType'])) {
                //     $data['vehicleType_err']='please enter your vehicle type.';
                // }
                // //validate Model
                // if (empty($data['model'])) {
                //     $data['model_err']='Please enter your vehicle model';
                // }
                // //validate YOP
                // if (empty($data['yearofProduction'])) {
                //     $data['yearofProduction_err']="Please enter your vehicle's Year of Production.";
                // }
                // //validate vehicle number
                // if (empty($data['vehicleNumber'])) {
                //     $data['vehicleNumber_err']='please enter your vehicle Number';
                // }
                // //validate area
                // if (empty($data['area'])) {
                //     $data['area_err']='Please enter your vehicle model';
                // }    
                // //validate number of seats
                // if (empty($data['price_per_km'])) {
                //     $data['price_per_km_err']='please enter your service charges';
                // }
                // //validate price per km
                // if (empty($data['noOfSeats'])) {
                //     $data['noOfSeats_err']='please enter No of seats in your vehicle';
                // }
                
                


                // if (empty($data['driver_err']) &&  empty($data['vehicleType_err']) && empty($data['model_err']) && empty($data['yearofProduction_err']) && empty($data['vehicleNumber_err']) && empty($data['price_per_km_err']) && empty($data['noOfSeats_err'])) {
                    
                    //Add a Taxi Request
                    if ($this->taxi_vehicleModel->addtaxivehicle($data)) {
                        flash('vehicle_flash', 'Your Vehicle is Succusefully added..!');
                        redirect('Taxi_Vehicle/viewvehicles');
                    }
                    else{
                        die('Something went wrong');
                    }
                // }
                // else {
                //     $this->view('taxies/add_vehicle',$data);
                // }



            }
            else {
                $data=[

                    'drivers'=> $alldrivers,

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
                    'AC'=>"",
                    'media'=>"",
                    'wifi'=>"",
                    'price_per_km_err'=>'',


                ];
                $this->view('taxi/add_taxi_vehicle',$data);
            }
            
        }


        public function deleteTaxiVehicle($request_id){

            $taxiVehicle= $this->taxi_vehicleModel->getVehicleByID($request_id);
            
            if ($taxiVehicle->OwnerID !=$_SESSION['user_id']) {
                flash('reg_flash', 'You need to have logged in first...');
                redirect('Users/login');
            }
            else {
                if ($this->taxi_vehicleModel->deletetaxiVehicle($request_id)) {
                    flash('request_flash', 'Vehicle was Succusefully Deleted');
                    redirect('Taxi_Vehicle/viewvehicles');
                }
                else {
                    die('Something went wrong');
                }
            }

        }


        // public function edit(){
        //     $data=[];
        //     $this->view('taxi/v_taxi_vehicle_deatails',$data);
        // }


        public function edit($vehicle_id){
          
            if ($_SERVER['REQUEST_METHOD']=='POST') {

                //Data validation
                $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

                // $uploaded_files = $_FILES['vehicleImgs'];
                // var_dump($_FILES['vehicleImgs']);
                // $num_files = count($uploaded_files['name']);
            
                // $vehicle_image_names = array();
                // // $vehicle_old_image_names = array();
            
                // for ($i=0; $i<$num_files; $i++) {
                //     $name = time().'_'.$uploaded_files['name'][$i];
                //     $vehicle_image_names[] = $name;
                //     echo $name;
                // }

                $data=[
                    'driverID'=>trim($_POST['driverID']),
                    // 'vehicle_image_names'=>$vehicle_image_names,
                    'area'=>trim($_POST['area']),
                    'color'=>trim($_POST['color']),
                    'no_of_seats'=>trim($_POST['noOfSeats']),
                    'AC'=>trim($_POST['ac']),
                    'media'=>trim($_POST['media']),
                    'wifi'=>trim($_POST['wifi']),
                    'services'=>trim($_POST['services']),
                    'price_per_km'=>trim($_POST['price_per_km']),      
                    'VehicleID'=>$vehicle_id,

                    'vehicle_imgs_err'=>''
                    ];

                    var_dump($data);

                // if(uploadImageGallary($vehicle_image_names, $uploaded_files['name'], '/img/vehicle_images/')) {
                        
                // }else{
                //     $data['vehicle_imgs_err'] = 'Profile Picture Uploading Unsuccessful!';
                //     // handle error and return
                // }

            
                

                    if ($this->taxi_vehicleModel->editTaxiVehicle($data)) {
                        flash('vehicle_flash', 'Vehicle is Succusefully Updated..!');
                        redirect('Taxi_Vehicle/viewvehicles');
                    }
                    else{
                        die('Something went wrong');
                    }
                



            }
            else {

                $alldrivers=$this->taxi_driverModel->viewall($_SESSION['user_id']);

                $taxiVehicle= $this->taxi_vehicleModel->getVehicleByID($vehicle_id);
                
                if ($taxiVehicle->OwnerID !=$_SESSION['user_id']) {
                    flash('vehicle_flash', 'You need to have logged in first...');
                    redirect('Users/login');
                }
                $data=[
                        'drivers'=> $alldrivers, // user want to change to driver also editing purpose
                        'driverID'=>$taxiVehicle->driverID,
                        'driver'=>$taxiVehicle->Name,
                        'ID' => $taxiVehicle->VehicleID,
                        'vehicleType'=>$taxiVehicle->VehicleType,
                        'model'=>$taxiVehicle->Model,
                        'color'=>$taxiVehicle->color,
                        'yearofProduction'=>$taxiVehicle->YearOfProduction,
                        'vehicleNumber'=>$taxiVehicle->vehicle_number,
                        'area'=>$taxiVehicle->area,
                        'noOfSeats'=>$taxiVehicle->no_of_seats,
                        'price_per_km'=>$taxiVehicle->price_per_km,
                        'AC'=>$taxiVehicle->AC,
                        'media'=>$taxiVehicle->media,
                        'wifi'=>$taxiVehicle->wifi,     
                        'owner'=>$_SESSION['user_id'] 

                ];

                $this->view('taxi/v_taxi_vehicle_deatails',$data);
            }
        }


        public function taxideatails($id){
            
            $allvehicles=$this->taxi_vehicleModel->getVehicleByOwnerID($id);

            $taxiOwner=$this->taxiModel->getOwnerByID($id);

            //  var_dump($taxiOwner);

             if ($taxiOwner) {
                // Check if the 'company_name' property exists before accessing it
                $com_name = isset($taxiOwner->company_name) ? $taxiOwner->company_name : $taxiOwner->owner_name.'CABS';
            } else {
                $com_name = '';
            }

            $data=[
                'vehicles'=> $allvehicles,
                'com_name'=>$com_name,
                'owner'=> $taxiOwner
            ];
            $this->view('taxi/v_taxi_details_page',$data);
        }







    }


?>