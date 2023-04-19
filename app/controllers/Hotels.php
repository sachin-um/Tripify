<?php
    class Hotels extends Controller{
        public function __construct(){
            $this->hotelModel=$this->model('M_Hotels');
            $this->userModel=$this->model('M_Users');
            $this->roomModel=$this->model('M_Hotel_Rooms');
        }
        public function index(){

        }


        public function register()
        {
            // echo "register0";
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // echo "register1";
            //Data validation
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
            

            $data = [
                'hotel_id' => $_SESSION['user_id'],
                'name' => trim($_POST['name']),                
                'line1' => trim($_POST['line1']),
                'line2' => trim($_POST['line2']),
                'district' => trim($_POST['district']),
                'hotel_reg_number' => trim($_POST['hotel_reg_number']),
                'property_category' => trim($_POST['category']),
                'contact_number' => trim($_POST['contact']),
                'pets' => ($_POST['pets']),
                'children' => ($_POST['children']),
                'check_in' => trim($_POST['check_in']),
                'check_out' => trim($_POST['check_out']),
                'description' => trim($_POST['description']),

                'name_err' => '',
                'hotel_reg_number_err' => '',
                'line1_err' => '',
                'line2_err' => '',
                'district_err' => '',
                'property_address_err' => '',
                'property_category_err' => '',
                'contact_number_err' => '',
                'checkin_err' => '',
                'checkout_err' => '',
                'hotel_id_err' => ''
            ];

            if (empty($data['name'])) {
                $data['name_err'] = 'This field is required';
            } else if (!preg_match("/^[a-zA-Z ]+$/", $data['name'])) {
                $data['name_err'] = 'Invalid Property Name';
            }

            if (empty($data['hotel_reg_number'])) {
                $data['hotel_reg_number_err'] = 'This field is required';
            } else if (!preg_match('/^R\d{6}$/', $data['hotel_reg_number'])) {
                $data['hotel_reg_number_err'] = 'Should start with R followed by six digits';
            }else{
                if($this->hotelModel->findHotelNumber($data['hotel_reg_number'])){
                    $data['hotel_reg_number_err'] = 'This property is already registered';
                }
            }

            if (empty($data['line1'])) {
                $data['line1_err'] = 'This field is required';
            }

            if ($data['district']=='--'){
                $data['district_err'] = 'Please specify the district';
            }

            if($data['property_category']=='--'){
                $data['property_category_err'] = 'Please specify the property category';
            }

            if (empty($data['contact_number'])) {
                $data['contact_number_err'] = 'This field is required';
            } else if (!preg_match('/^[0-9]{10}+$/', $data['contact_number'])) {
                $data['contact_number_err'] = 'Invalid Contact Number';
            } 

            if (empty($data['check_in'])) {
                $data['checkin_err'] = 'This field is required';
            }

            if (empty($data['check_out'])) {
                $data['checkout_err'] = 'This field is required';
            }

            if (
                empty($data['name_err']) && empty($data['hotel_reg_number_err']) && empty($data['line1_err']) && empty($data['district_err']) && empty($data['property_category_err']) &&
                empty($data['contact_number_err']) && empty($data['checkin_err']) && empty($data['checkout_err'])
            ) {
                //Register Hotel
                if ($this->hotelModel->register($data)) {
                    flash('reg_flash', 'You are Successfully registered');
                    redirect('Hotels/login');
                } else {
                    die('Something went wrong');
                }

            } else {
                $this->view('hotels/v_hotelReg', $data);
            }



            } else {

            $data = [
                'name' => '',
                'hotel_reg_number' => '',
                'line1' => '',
                'line2' => '',
                'district' => '',
                'property_category' => '',
                'contact_number' => '',
                'pets' => '',
                'children' => '',
                'cancel_period' => '',
                'cancel_fee' => '',
                'check_in' => '',
                'check_out' => '',
                'hotel_id' => $_SESSION['user_id'],
                'description' => '',


                'name_err' => '',
                'hotel_reg_number_err' => '',
                'line1_err' => '',
                'line2_err' => '',
                'district_err' => '',
                'property_address_err' => '',
                'property_category_err' => '',
                'contact_number_err' => '',
                'checkin_err' => '',
                'checkout_err' => '',
                'hotel_id_err' => ''
            ];
            $this->view('hotels/v_hotelReg', $data);
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
                        $this->view('hotels/v_loginHotel',$data);
                    }
                    else if ($log_user->UserType!='Hotel') {
                        flash('reg_flash', 'You Cannot logging as a Hotel Owner');
                        redirect('Hotels/login');
                    }
                    elseif ($log_user=='NotValidate') {
                        flash('verify_flash', 'You Should Verify your email address first..');
                        $this->createVerifySession($data['email']);
                        redirect('Users/emailverify');
                    }
                    //logging user
                    else{
                        $this->createUserSession($log_user);
                    }
                }
                else {
                    $this->view('hotels/v_loginHotel',$data);
                }



            }
            else {
                $data=[
                    'email'=>'',
                    'password'=>'',

                    'email_err'=>'',
                    'password_err'=>'',

                ];
                $this->view('hotels/v_loginHotel',$data);
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

        public function addroom(){
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                
                $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

            
                $data=[
                        'NoofBeds'=>trim($_POST['no-of-beds']),
                        'RoomType'=>trim($_POST['roomtype']),
                        'NoofGuests'=>trim($_POST['no-of-guests']),
                        'RoomSize'=>trim($_POST['roomsize']),
                        'PricePerNight'=>trim($_POST['pricepernight']),


                        'NoofBeds_err'=>'',
                        'RoomType_err'=>'',
                        'NoofGuests_err'=>'',
                        'RoomSize_err'=>'',
                        'description_err'=>'',
                        'PricePerNight_err'=>''
    
                    ];


                //validate name
                if (empty($data['NoofBeds'])) {
                    $data['NoofBeds_err']='Please enter the number of beds available';
                }
                //validate email
                if (empty($data['RoomType'])) {
                    $data['RoomType_err']='please add the Room type';
                }
                if (empty($data['NoofGuests'])) {
                    $data['NoofGuests_err']='Please enter No of guests can stay in the Room';
                }
                if (empty($data['RoomSize'])) {
                    $data['RoomSize_err']='please enter the room size';
                }

                if (empty($data['PricePerNight'])) {
                    $data['PricePerNight_err']='please enter price per night';
                }
                
                


                if (empty($data['pickuplocation_err']) &&  empty($data['destination_err']) && empty($data['date_err']) && empty($data['time_err']) && empty($data['travelerid_err'])) {
                    
                    //Add a Taxi Request
                    if ($this->taxirequestModel->addtaxirequest($data)) {
                        flash('reg_flash', 'Taxi Request is Successfully added..!');
                        redirect('Request/TaxiRequest');
                    }
                    else{
                        die('Something went wrong');
                    }
                }
                else {
                    $this->view('traveler/v_taxi_request',$data);
                }



            }
            else {
                $data=[
                    'pickuplocation'=>'',
                    'destination'=>'',
                    'date'=>'',
                    'time'=>'',
                    'description'=>'',
                    'travelerid'=>'',

                    'pickuplocation_err'=>'',
                    'destination_err'=>'',
                    'date_err'=>'',
                    'time_err'=>'',
                    'description_err'=>'',
                    'travelerid_err'=>''

                ];
                $this->view('traveler/v_taxi_request',$data);
            }
            $this->view('traveler/v_taxi_request');
        
        }

        public function searchForHotels(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
                $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
                
                $data = [
                    'destination' => trim($_POST['place'])
                ];

                $hotelSearch = $this->hotelModel->searchForHotels($data);

                $data = [
                    'hotelSearch' => $hotelSearch
                ];
                $this->view('hotels/v_searchResultsPage',$data);
            }else{
                $data = [
                    'destination' => ''
                ];

                $this->view('hotels/v_hotelHome');
            }
        }

        


        public function showHotels(){ 

            $allhotels=$this->hotelModel->viewAllHotels();
            // $offers=filteritems($alloffers,$_SESSION['user_type'],$_SESSION['user_id']);
            $data=[
                'allhotels'=> $allhotels
            ];
            $this->view('hotels/v_hotelHome',$data);
        }

        public function hotelProfile($hotelID){
            // echo $hotelID;

            $profileDetails = $this->hotelModel->getProfileInfo($hotelID);
            $allroomtypes=$this->roomModel->viewAllRooms($hotelID);
            echo $profileDetails->Name;
            $data=[
                'profileName'=> $profileDetails->Name,
                'profileAddress'=> $profileDetails->Line1.", ".$profileDetails->Line2.", ".$profileDetails->District,   
                'allroomtypes'=> $allroomtypes,
                'description'=>$profileDetails->Description
                // 'profileName'=> $profileDetails->Name,
                // 'profileName'=> $profileDetails->Name

            ];
            $this->view('hotels/v_hotel_details_page',$data);
        }

        public function rooms($hotelID){
            $allrooms=$this->roomModel->viewRooms($hotelID);
            // $offers=filteritems($alloffers,$_SESSION['user_type'],$_SESSION['user_id']);
            $data=[
                'allroomtypes'=> $allrooms
            ];
            $this->view('hotels/v_hotel_details_page',$data);
        }

        public function load(){
            $hotelvar=$this->hotelModel->findUserDetails();
            $hotelaccountvar= $this->userModel->getUserDetails($_SESSION['user_id']);
            $data=[
                'hoteldetails'=>$hotelvar,
                'hotelaccountdetails' => $hotelaccountvar
            ];
            $this->view('hotels/v_dash_profile',$data);
        }

        public function loadFacilities(){
            $facilities=$this->hotelModel->lookupfacilities($hotelID);
            $data=[
                'facilities'=>$facilities
            ];
            $this->view('hotels/v_dash_profile',$data);
        }

        public function addFacilities(){
            $facilityDetails=$this->hotelModel->facilityDetails();
            $data=[
                'facilityDetails'=>$facilityDetails
            ];
            $this->view('hotels/v_dashAddFacilities', $data);
        }

        public function uploadPhotos(){
            if(isset($_POST['upload'])){

                $images = $_FILES['images'];

                #number of images
                $num_of_imgs = count($images['name']);

                for($i=0; $i < $num_of_imgs; $i++){
                    #get the img info and store them in var
                    $image_name = $images['name'][$i];
                    $tmp_name = $images['tmp_name'][$i];
                    $error = $images['error'][$i];

                    #if there is not error occured while uploading
                    if($error === 0){
                        #get image extension store it in var
                        $img_ex = pathinfo($image_name, PATHINFO_EXTENSION);
                        $img_ex_lc = strtolower($img_ex);

                        $allowed_exs = array('jpg', 'jpeg', 'png');

                        if(in_array($img_ex_lc, $allowed_exs)){
                            $new_img_name = uniqid('IMG-', true).'.'.$img_ex_lc;
                            $img_upload_path = 'app/public/img/hotel-uploads'.$new_img_name;

                            #inserting img name into database
                            $this->hotelModel->insertingImages($_SESSION('user_id'), $new_img_name);
                            move_uploaded_file($tmp_name, $img_upload_path);

                            header("Location: echo URLROOT/hotels/v_dash_profile");

                        }else{
                            #error message
                            $em = "You can't upload files of this type";

                            header("Location: echo URLROOT/hotels/v_dash_profile?error=$em");
                        }

                    }else{
                        #error message
                        $em = "Unknown Error Occured While Uploading";

                        header("Location: echo URLROOT/hotels/v_dash_profile?error=$em");
                    }
                }
                // echo "<pre>";
                // print_r($_FILES['images']['name'][0]);
            }
        }

        public function loadBooking(){
            $this->view('hotels/v_dash_bookings');
        }

        public function loadPayments(){
            $this->view('hotels/v_dash_payments');
        }

        public function loadMessages(){
            $this->view('hotels/v_dash_messages');
        }

        public function loadReviews(){
            $this->view('hotels/v_dash_reviews');
        }

        public function hotelSupport(){
            $this->view('hotels/v_dash_support');
        }

        public function test(){
            $this->view('hotels/v_hotelviewroom');
        }

    }

?>