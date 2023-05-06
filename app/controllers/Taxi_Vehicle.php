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

            foreach($allvehicles as $vehicle){
                $vehicle_images_str = $vehicle->Vehicle_Images; // Example string from the database
                $vehicle_images_array = explode(",", $vehicle_images_str);
                $vehicle->vehicle_images_arr=$vehicle_images_array;

            }

             
           
            

            $data=[
                'vehicles'=> $allvehicles
            ];
            // var_dump($data);
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

                $uploaded_files = $_FILES['vehicleImgs'];

                $num_files = count($uploaded_files['name']);
            
                $vehicle_image_names = array();

            
                for ($i=0; $i<$num_files; $i++) {
                    $name = time().'_'.$uploaded_files['name'][$i];
                    $vehicle_image_names[] = $name;

                }

            
                $data=[ 
                        'drivers'=> $alldrivers,
                        'driver'=>trim($_POST['driver']),
                        'vehicle_image_names'=>$vehicle_image_names,
                        'vehicleType'=>trim($_POST['type']),
                        'model'=>trim($_POST['model']),
                        'yearofProduction'=>trim($_POST['year']),
                        'vehicleNumber'=>trim($_POST['number']),
                        'area'=>trim($_POST['area']),
                        'color'=>trim($_POST['color']),
                        'noOfSeats'=>trim($_POST['max']),
                        'price_per_km'=>trim($_POST['flag']),
                        'AC'=>trim($_POST['ac']) ?? '',
                        'media'=>trim($_POST['media'] ?? ''),
                        'wifi'=>trim($_POST['wifi'] ?? ''),      

                        'owner'=>$_SESSION['user_id'],
                        
                        'vehicle_imgs_err'=>'',
                        'price_per_km_err'=>'',
                        'noOfSeats_err'=>'',


    
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
                $current_year = date('Y');
                echo $current_year;
                if($current_year<$data['yearofProduction']){
                    $data['yearofProduction_err']="Please enter valid year";
                }


                if($data['vehicleType'] == "Bus"){
                    if($data['noOfSeats']>70){
                        $data['noOfSeats_err']='Number of seats out of range';
                    }
                }else if($data['vehicleType'] == "Tuk Tuk"){
                    if($data['noOfSeats']>3){
                        $data['noOfSeats_err']='Number of seats out of range';
                    }
                }else if($data['vehicleType'] == "Van"){
                    if($data['noOfSeats']>15){
                        $data['noOfSeats_err']='Number of seats out of range';
                    }
                }else if($data['vehicleType'] == "Car"){
                    if($data['noOfSeats']>7){
                        $data['noOfSeats_err']='Number of seats out of range';
                    }
                }

                if($data['price_per_km']>1000){
                    $data['price_per_km_err']='Price Per KM out of range';
                }


                if(!uploadImageGallary($vehicle_image_names, $uploaded_files, '/img/vehicle_images/')) {
                    $data['vehicle_imgs_err'] = 'Profile Picture Uploading Unsuccessful!';
                    
                }
                
                


                if (empty($data['vehicle_imgs_err']) && empty($data['noOfSeats_err']) && empty($data['price_per_km_err']) && empty($data['yearofProduction_err']) ) {
                    
                   
                    if ($this->taxi_vehicleModel->addtaxivehicle($data)) {
                        flash('vehicle_flash', 'Your Vehicle is Succusefully added..!');
                        redirect('Taxi_Vehicle/viewvehicles');
                    }
                    else{
                        die('Something went wrong');
                    }
                }
                else {
                    $this->view('taxi/add_taxi_vehicle',$data);
                }



            }
            else {
                $data=[

                    'drivers'=> $alldrivers,

                    'driver'=>'',
                    'vehicle_image_names'=>'',
                    'vehicleType'=>'',
                    'model'=>'',
                    'color'=>'',
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
                    'vehicle_imgs_err'=>'',


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

 



                // Data validation
                $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

                $uploaded_files = $_FILES['vehicleImgs'];

                $num_files = count($uploaded_files['name']);

            
                $vehicle_image_names = array();

            
                for ($i=0; $i<$num_files; $i++) {
                    $name = time().'_'.$uploaded_files['name'][$i];
                    $vehicle_image_names[] = $name;

                }

                $data=[
                    'driverID'=>trim($_POST['driverID']),
                    'vehicle_image_names'=>$vehicle_image_names,
                    'area'=>trim($_POST['area']),
                    'color'=>trim($_POST['color']),
                    'no_of_seats'=>trim($_POST['noOfSeats']),
                    'AC'=>trim($_POST['TaxiAC'] ?? ''),
                    'media'=>trim($_POST['media'] ?? ''),
                    'wifi'=>trim($_POST['wifi'] ?? '') ,
                    'price_per_km'=>trim($_POST['price_per_km']),      
                    'VehicleID'=>$vehicle_id,

                    'vehicle_imgs_err'=>''
                    ];

                    var_dump($data);

                if(!uploadImageGallary($vehicle_image_names, $uploaded_files, '/img/vehicle_images/')) {
                    $data['vehicle_imgs_err'] = 'Profile Picture Uploading Unsuccessful!';
                    flash('vehicle_flash', 'Vehicle Image Uploading is Unsuccusefull..!');
                    redirect('Taxi_Vehicle/viewvehicles');
                }



                if ($this->taxi_vehicleModel->editTaxiVehicle($data)) {
                    flash('vehicle_flash', 'Vehicle is Succusefully Updated..!');
                    redirect('Taxi_Vehicle/viewvehicles');
                }
                else{
                    flash('vehicle_flash', 'Vehicle update is Unsuccusefull..!');
                    redirect('Taxi_Vehicle/viewvehicles');
                }    




            }
            else {

                $alldrivers=$this->taxi_driverModel->viewall($_SESSION['user_id']);

                $taxiVehicle= $this->taxi_vehicleModel->getVehicleByID($vehicle_id);

                
                $vehicle_images_str = $taxiVehicle->Vehicle_Images; // Example string from the database
                $vehicle_images_arr = explode(",", $vehicle_images_str);

                
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
                        'vehicle_images_arr'=>$vehicle_images_arr,     
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