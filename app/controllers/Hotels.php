<?php
class Hotels extends Controller
{
    public function __construct()
    {
        $this->hotelModel = $this->model('M_Hotels');
        $this->userModel = $this->model('M_Users');
    }
    public function index()
    {

    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Data validation
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
            $ad1 = trim($_POST['line1']);
            $ad2 = trim($_POST['line2']);
            $ad3 = trim($_POST['line3']);
            $ad4 = trim($_POST['city']);
            $address = $ad1 . ',' . $ad2 . ',' . $ad3 . ',' . $ad4 . '.';
            $data = [
                'property_name' => trim($_POST['name']),
                'property_address' => $address,
                'contact_number' => trim($_POST['contact_number']),
                'reg_number' => trim($_POST['reg_number']),
                'hotel_id' => $_SESSION['user_id'],





                'property_name_err' => '',
                'property_address_err' => '',
                'property_catagory_err' => '',
                'contact_number_err' => '',
                'reg_number_err' => '',
                'hotel_id_err' => '',

            ];
            if (empty($data['property_name'])) {
                $data['property_name_err'] = 'This field is required';
            } else if (!preg_match("/^[a-zA-Z]+$/", $data['property_name'])) {
                $data['property_name_err'] = 'Invalid Property Name';
            }
            if (empty($data['hotel_id'])) {
                $data['hotel_id_err'] = 'This field is required';
            }
            if (empty($ad1) || empty($ad2) || empty($ad4)) {
                $data['property_address_err'] = 'All address fields need to be filled';
            }
            if (empty($data['contact_number'])) {
                $data['contact_number_err'] = 'This field is required';
            } else if (!preg_match('/^[0-9]{10}+$/', $data['contact_number'])) {
                $data['contact_number_err'] = 'Invalid Contact Number';
            } 
            // else if (strlen($data['contact_number']) == 10) {
            //     $data['contact_number_err'] = 'Invalid Contact Number';
            // }



            if (empty($data['reg_number'])) {
                $data['reg_number_err'] = 'This field is required';
            }

            if (
                $data['property_name_err'] && $data['property_address_err'] && $data['contact_number_err']
                && $data['reg_number_err'] && $data['hotel_id_err']
            ) {
                //Register Hotel
                if ($this->hotelModel->register($data)) {
                    flash('reg_flash', 'You are Succusefully registered');
                    redirect('Hotels/login');
                } else {
                    die('Something went wrong');
                }

            } else {
                $this->view('hotels/v_hotelReg', $data);
            }





        } else {
            $data = [
                'property_name' => '',
                'property_address' => '',
                'property_catagory' => '',
                'contact_number' => '',
                'reg_number' => '',
                'hotel_id' => $_SESSION['user_id'],

                'property_name_err' => '',
                'property_address_err' => '',
                'property_catagory_err' => '',
                'contact_number_err' => '',
                'reg_number_err' => '',
                'hotel_id_err' => '',

            ];
            $this->view('hotels/v_hotelReg', $data);
        }
        // $this->view('hotels/v_register');
    }

    //login
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Data validation
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),

                'email_err' => '',
                'password_err' => '',

            ];


            //validate email
            if (empty($data['email'])) {
                $data['email_err'] = 'please enter a email';
            } else {
                if (!$this->userModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = 'Account doesnt exist...';
                }
            }

            if (empty($data['password'])) {
                $data['password_err'] = 'Please fill the password field';
            }


            if (empty($data['email_err']) && empty($data['password_err'])) {

                $log_user = $this->userModel->login($data);

                if (!$log_user) {
                    $data['password_err'] = 'Password is incorrect';
                    $this->view('hotels/v_loginHotel', $data);
                } else if ($log_user->UserType != 'Hotel') {
                    flash('reg_flash', 'You Cannot logging as a Hotel Owner');
                    redirect('Hotels/login');
                } elseif ($log_user == 'NotValidate') {
                    flash('verify_flash', 'You Should Verify your email address first..');
                    $this->createVerifySession($data['email']);
                    redirect('Users/emailverify');
                }
                //logging user
                else {
                    $this->createUserSession($log_user);
                }
            } else {
                $this->view('hotels/v_loginHotel', $data);
            }



        } else {
            $data = [
                'email' => '',
                'password' => '',

                'email_err' => '',
                'password_err' => '',

            ];
            $this->view('hotels/v_loginHotel', $data);
        }
    }

    //user session
    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->UserID;
        $_SESSION['user_name'] = $user->Name;
        $_SESSION['user_email'] = $user->Email;
        $_SESSION['user_type'] = $user->UserType;

        $data = [
            'isLoggedIn' => $this->isLoggedIn()
        ];
        $this->view('v_home', $data);
        // redirect('Pages/home',$data);
    }

    public function isLoggedIn()
    {
        if (isset($_SESSION['user_id'])) {
            return true;
        } else {
            return false;
        }
    }

    public function addroom()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Data validation
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);


            $data = [
                'NoofBeds' => trim($_POST['no-of-beds']),
                'RoomType' => trim($_POST['roomtype']),
                'NoofGuests' => trim($_POST['no-of-guests']),
                'RoomSize' => trim($_POST['roomsize']),
                'PricePerNight' => trim($_POST['pricepernight']),


                'NoofBeds_err' => '',
                'RoomType_err' => '',
                'NoofGuests_err' => '',
                'RoomSize_err' => '',
                'description_err' => '',
                'PricePerNight_err' => ''

            ];


            //validate name
            if (empty($data['NoofBeds'])) {
                $data['NoofBeds_err'] = 'Please enter the number of beds available';
            }
            //validate email
            if (empty($data['RoomType'])) {
                $data['RoomType_err'] = 'please add the Room type';
            }
            if (empty($data['NoofGuests'])) {
                $data['NoofGuests_err'] = 'Please enter No of guests can stay in the Room';
            }
            if (empty($data['RoomSize'])) {
                $data['RoomSize_err'] = 'please enter the room size';
            }

            if (empty($data['PricePerNight'])) {
                $data['PricePerNight_err'] = 'please enter price per night';
            }




            if (empty($data['pickuplocation_err']) && empty($data['destination_err']) && empty($data['date_err']) && empty($data['time_err']) && empty($data['travelerid_err'])) {

                //Add a Taxi Request
                if ($this->taxirequestModel->addtaxirequest($data)) {
                    flash('reg_flash', 'Taxi Request is Succusefully added..!');
                    redirect('Request/TaxiRequest');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('traveler/v_taxi_request', $data);
            }



        } else {
            $data = [
                'pickuplocation' => '',
                'destination' => '',
                'date' => '',
                'time' => '',
                'description' => '',
                'travelerid' => '',

                'pickuplocation_err' => '',
                'destination_err' => '',
                'date_err' => '',
                'time_err' => '',
                'description_err' => '',
                'travelerid_err' => ''

            ];
            $this->view('traveler/v_taxi_request', $data);
        }
        $this->view('traveler/v_taxi_request');

    }


}

?>