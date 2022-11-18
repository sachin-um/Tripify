<?php
    class Hotels extends Controller{
        public function __construct(){
            $this->hotelModel=$this->model('M_Hotels');
        }
        public function index(){

        }

        public function register(){
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                //Data validation
                $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

                $data=[
                    'property_name'=>trim($_POST['name']),
                    'property_address'=>trim($_POST['email']),
                    'property_catagory'=>trim($_POST['password']),
                    'contact_number'=>trim($_POST['confirm-password']),
                    'reg_number'=>trim($_POST['confirm-password']),
                    'hotel_id'=>$_SESSION['user_id'],

                    'property_name_err'=>'',
                    'property_address_err'=>'',
                    'property_catagory_err'=>'',
                    'contact_number_err'=>'',
                    'reg_number_err'=>'',
                    'hotel_id_err'=>'',

                ];

                //validate name
                if (empty($data['property_name'])) {
                    $data['property_name_err']='Please enter the Property Name';
                }
                //validate email
                if (empty($data['property_address'])) {
                    $data['property_address_err']='please enter the Property Address';
                }
                if (empty($data['property_catagory'])) {
                    $data['property_catagory_err']='Please select the Property Catagory';
                }
                if (empty($data['contact_number'])) {
                    $data['contact_number_err']='Please enter a Contact number';
                }
                if (empty($data['reg_number'])) {
                    $data['reg_number_err']='Please enter a Registration number';
                }
                if (empty($data['hotel_id'])) {
                    $data['hotel_id_err']='Error in Hotel ID';
                }

                if (empty($data['property_name_err']) &&  empty($data['property_address_err']) && empty($data['property_catagory_err']) && empty($data['contact_number_err']) && empty($data['reg_number_err']) && empty($data['hotel_id_err'])) {
                

                    //Register Hotel
                    if ($this->hotelModel->register($data)) {
                        flash('reg_flash', 'You are Succusefully registered');
                        redirect('Hotels/login');
                    }
                    else{
                        die('Something went wrong');
                    }
                }
                else {
                    $this->view('hotels/v_register',$data);
                }



            }
            else {
                $data=[
                    'property_name'=>'',
                    'property_address'=>'',
                    'property_catagory'=>'',
                    'contact_number'=>'',
                    'reg_number'=>'',
                    'hotel_id'=>$_SESSION['user_id'],

                    'property_name_err'=>'',
                    'property_address_err'=>'',
                    'property_catagory_err'=>'',
                    'contact_number_err'=>'',
                    'reg_number_err'=>'',
                    'hotel_id_err'=>'',

                ];
                $this->view('hotels/v_register',$data);
            }
            // $this->view('hotels/v_register');
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
                        flash('reg_flash', 'Taxi Request is Succusefully added..!');
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

        
    }

?>