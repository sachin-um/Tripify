<?php
    class Taxi_Driver extends Controller{
        public function __construct(){
            $this->taxi_driverModel=$this->model('M_Taxi_Driver');
        }
        public function index(){

        }

        public function getdriver($driverid)
        {
            
            $driver=$this->taxi_driverModel->getDriverByID($driverid);

            header('Content-Type: application/json');
            echo json_encode($driver);
        }

        public function viewdrivers(){
            $user_id='';
            if ($_SESSION['admin_type']=='verification' || $_SESSION['admin_type']=='Super Admin') {
                $user_id=$_SESSION['service_id'];
            } else {
                $user_id=$_SESSION['user_id'];
            }
            $alldrivers=$this->taxi_driverModel->viewall($user_id);
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

                        'profileImg'=>$_FILES['profileImg'],
                        'profile_image_name'=>time().'_'.$_FILES['profileImg']['name'],

                        'LicenseImgFront'=>$_FILES['lisence_front'],
                        'LicenseImgFront_name'=>time().'_'.$_FILES['lisence_front']['name'],

                        'LicenseImgBack'=>$_FILES['lisence_back'],
                        'LicenseImgBack_name'=>time().'_'.$_FILES['lisence_back']['name'],

                        'age'=>trim($_POST['age']),
                        'contact_number'=>trim($_POST['contact_number']),
                        'licenseno'=>trim($_POST['licenseno']),
                        'owner'=>$_SESSION['user_id'],
                        
                        'profileImg_err'=>'',
                        'LicenseImgBack_err'=>'',
                        'LicenseImgFront_err'=>''
                    ];

                    if(uploadImage($data['profileImg']['tmp_name'],$data['profile_image_name'],'/img/driver_profileImgs/')){

                    }else{
                        $data['profileImg_err']='Profile Picture Uploading Unsucess!';
                    }

                    if(!uploadImage($data['LicenseImgFront']['tmp_name'],$data['LicenseImgFront_name'],'/img/license_images/')){
                        $data['LicenseImgFront_err']='License Front Image Uploading Unsucess!';
                    }

                    if(!uploadImage($data['LicenseImgBack']['tmp_name'],$data['LicenseImgBack_name'],'/img/license_images/')){
                        $data['LicenseImgBack_err']='License Back Image Uploading Unsucess!';
                    }


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
                    'profileImg_err'=>'',
                    'LicenseImgBack_err'=>'',
                    'LicenseImgFront_err'=>''

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
            $taxiDriver= $this->taxi_driverModel->getDriverByID($driverID);
            // var_dump($_FILES);
            
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);
                
                if (!$_FILES['vehicleImgs']['error'][0] == 4) {
                    $profileImg=$_FILES['profileImg'];
                    $profile_image_name=time().'_'.$_FILES['profileImg']['name'];
                }else{
                    $profile_image_name=$taxiDriver->profileImg;
                }
                
                $data=[
                    'name'=>trim($_POST['name']),
                    'profile_image_name'=>$profile_image_name,
                    'age'=>trim($_POST['age']),
                    'contact_number'=>trim($_POST['contact_number']),
                    'LicenseNo'=>trim($_POST['LicenseNo']),      
                    'TaxiDriverID'=>$driverID,

                    'profileImg_err'=>''
                    ];

                    if (!$_FILES['vehicleImgs']['error'][0] == 4) {
                        if(!updateImage($taxiDriver->profileImg,$profileImg['tmp_name'],$data['profile_image_name'],'/img/driver_profileImgs/')){
                            $data['profileImg_err']='Profile Picture Uploading Unsucess!';
                            flash('request_flash', 'Profile Picture Uploading Unsucess!');
                        }
                    }
                    

                    if ($this->taxi_driverModel->editTaxiDriver($data)) {
                        flash('request_flash', 'Driver Deatails was Succusefully Updated..!');
                        redirect('Taxi_Driver/viewdrivers');
                    }
                    else{
                        die('Something went wrong');
                    }
            }
            
            else{
                $data=[
                    'name'=>$taxiDriver->Name,
                    'profileImg'=>$taxiDriver->profileImg,
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

        public function getDriverById($driverid)
        {
            $driver=$this->taxi_driverModel->getDriverByID($driverid);
        }

        


    
    }


?>