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
                'cancel_period' => trim($_POST['cancel_period']),
                'cancel_fee' => trim($_POST['fee']),
                'check_in' => trim($_POST['check_in']),
                'check_out' => trim($_POST['check_out']),
                

                'name_err' => '',
                'hotel_reg_number_err' => '',
                'property_address_err' => '',
                'property_category_err' => '',
                'contact_number_err' => '',
                'pets_err' => '',
                'children_err' => '',
                'cancel_period_err' => '',
                'cancel_fee_err' => '',
                'hotel_id_err' => '',
            ];

            

            if (empty($data['name'])) {
                echo "test";
                $data['name_err'] = 'This field is required';
            } else if (!preg_match("/^[a-zA-Z]+$/", $data['name'])) {
                $data['name_err'] = 'Invalid Property Name';
            }

            if (empty($data['hotel_reg_number'])) {
                $data['hotel_reg_number_err'] = 'This field is required';
            }else{
                if($this->hotelModel->findHotelNumber($data['hotel_reg_number'])){
                    $data['hotel_reg_number_err'] = 'This property is already registered';
                }
            }

            // if (empty($ad1) || empty($ad2) || empty($ad3)) {
            //     $data['property_address_err'] = 'All address fields need to be filled';
            // }

            if(empty($data['property_category'])){
                $data['property_category_err'] = 'Please specify the property category';
            }

            // if (empty($data['contact_number'])) {
            //     $data['contact_number_err'] = 'This field is required';
            // } else if (!preg_match('/^[0-9]{10}+$/', $data['contact_number'])) {
            //     $data['contact_number_err'] = 'Invalid Contact Number';
            // } 

            if(empty($data['cancel_period'])){
                $data['cancel_period_err'] = 'This field is required';
            }

            if(empty($data['cancel_fee'])){
                $data['cancel_fee_err'] = 'This field is required';
            }
        

            if (empty($data['reg_number'])) {
                $data['reg_number_err'] = 'This field is required';
            }

            // empty($data['contact_number_err']) &&
            // empty($data['property_address_err']) && 

            if (
                empty($data['property_name_err']) && empty($data['hotel_reg_number_err']) && empty($data['property_category_err']) &&
                empty($data['cancel_period_err']) && empty($data['cancel_fee_err'])
            ) {
                echo "register2";
                //Register Hotel
                if ($this->hotelModel->register($data)) {
                    flash('reg_flash', 'You are Successfully registered');
                    redirect('Hotels/login');
                } else {
                    die('Something went wrong');
                }

            } else {
                echo "reg23";
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


                'name_err' => '',
                'hotel_reg_number_err' => '',
                'property_address_err' => '',
                'property_category_err' => '',
                'contact_number_err' => '',
                'pets_err' => '',
                'children_err' => '',
                'cancel_period_err' => '',
                'cancel_fee_err' => '',
                'hotel_id_err' => '',

            ];
            $this->view('hotels/v_hotelReg', $data);
        }
        // $this->view('hotels/v_register');
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
                //Data validation
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

                if ($this->hotelModel->searchForHotels($data)) {
                    redirect('Hotels/showHotels');
                } else {
                    redirect('Hotels/hotels');
                }
            }
        }

        public function rooms(){
            $hotelrooms=$this->roomModel->viewRooms();

            $data=[
                'allhotels'=> $allhotels
            ];
            $this->view('hotels/v_hotelHome',$data);
        }


        public function showHotels(){        
            $this->view('hotels/v_hotel_list');
        }

        public function hotelProfile($hotelID){
            echo $hotelID;

            $profileDetails = $this->hotelModel->getProfileInfo($hotelID);
            echo $profileDetails->Name;
            $data=[
                'profileName'=> $profileDetails->Name,
                'profileAddress'=> $profileDetails->Line1.", ".$profileDetails->Line2.", ".$profileDetails->District
                // 'profileName'=> $profileDetails->Name,
                // 'profileName'=> $profileDetails->Name

            ];
            
            $this->view('hotels/v_hotel_details_page',$data);
        }

        // public function showHotelDetails(){
        //     $this->view('hotels/v_hotel_details_page');            
        // }

        public function load(){
            $this->view('hotels/v_dash_profile');
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

    }

?>