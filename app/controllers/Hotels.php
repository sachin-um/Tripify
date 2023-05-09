<?php
require_once APPROOT.'/vendor/autoload.php';
use Dompdf\Dompdf;
use Dompdf\Options;

    class Hotels extends Controller{
        public function __construct(){
            $this->hotelModel=$this->model('M_Hotels');
            $this->userModel=$this->model('M_Users');
            $this->roomModel=$this->model('M_Hotel_Rooms');
            $this->hotelBookingModel=$this->model('M_Hotel_Bookings');
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
                $destination = trim($_POST['place']);
                $checkin = trim($_POST['date-1']);
                $checkout = trim($_POST['date-2']);
                $noofadults =trim($_POST['noofadults']);
                
                $data = [
                    'destination' => trim($_POST['place'])
                ];

                $hotelSearch = $this->hotelModel->searchForHotels($data);

                $data = [
                    'hotelSearch' => $hotelSearch,
                    'destination' => $destination,
                    'check-in' => trim($_POST['date-1']),
                    'check-out' => trim($_POST['date-2']),
                    'noofadults' => trim($_POST['noofadults'])
                    
                ];
                $this->view('hotels/v_searchResultsPage',$data);
            }else{
                $data = [
                    'destination' => ''
                ];

                $this->view('hotels/v_searchResultsPage',$data);
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

        public function hotelProfilewithoutrooms($hotelID){
            $profileDetails = $this->hotelModel->getProfileInfo($hotelID);
            $images = $this->hotelModel->getImages($hotelID);

            if(empty($images)){
                print_r($images);
            }
            
            $data=[
                'hotelID'=>$hotelID,
                'profileDetails'=>$profileDetails,
                'profileName'=> $profileDetails->Name,
                'profileAddress'=> $profileDetails->Line1.", ".$profileDetails->Line2.", ".$profileDetails->District,
                'description'=>$profileDetails->Description,
                'images'=>$images
                // 'facilities'=>$facilities
            ];
            $this->view('hotels/v_hotel_profile_details',$data);
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
            if (isset($_POST['submit'])) {
                $farray = implode(",",$_POST['facilities']);
                $data=[
                    'facilities'=>$farray,
                    'hotelID' => $_SESSION['user_id']
                ];
                
                if ($this->hotelModel->addFacilities($data)) {
                    flash('reg_flash', 'Successfully updated!');
                    redirect('Hotels/load');
                }else{
                    flash('reg_flash', 'Something went wrong.');
                    redirect('Hotels/load');
                }

            }else{
                $this->view('hotels/v_dashAddFacilities');
            }
        }

        public function uploadPhotos($hotelID){

            if(isset($_POST['submit'])){
                // print_r($_FILES);
                $imageCount = count($_FILES['image']['name']);
                // echo $imageCount;

                for($i=0;$i<$imageCount;$i++){
                    $imageName = $_FILES['image']['name'][$i];
                    $imageTempName = $_FILES['image']['tmp_name'][$i];
                    $targetPath = "C:/xampp/htdocs/Tripify/public/img/hotel-uploads/".$imageName;
                    if(move_uploaded_file($imageTempName, $targetPath)){
                        $this->hotelModel->insertingImages($hotelID,$imageName);                            
                    }
                }
             
            }

            redirect('Pages/profile');            
        }

        public function uploadRoomPhotos($roomID){
            if(isset($_POST['submit'])){
                // print_r($_FILES);
                $imageCount = count($_FILES['image']['name']);
                // echo $imageCount;

                for($i=0;$i<$imageCount;$i++){
                    $imageName = $_FILES['image']['name'][$i];
                    $imageTempName = $_FILES['image']['tmp_name'][$i];
                    $targetPath = "C:/xampp/htdocs/Tripify/public/img/hotel-room-uploads/".$imageName;
                    if(move_uploaded_file($imageTempName, $targetPath)){
                        $this->roomModel->insertingImages($roomID,$imageName);                            
                    }
                }
            }

            redirect('Pages/profile');  
        }

        public function hotelReviews($hotelID){
            //Get the reviews
            $hotelreviews=$this->hotelModel->findReviews($hotelID);

            //Get each review's travelerIDs to an array
            $rarray = array();
            foreach($hotelreviews as $review){
                $rarray[] = $review->TravelerID;
            }

            //Get each user's details
            $travelerInfo = array();
            foreach($rarray as $element){
                $travelerInfo[] = $this->userModel->getUserDetails($element);
            }

            $data=[
                'hotelID' => $hotelID,
                'reviewSet' => $hotelreviews,
                'travelerInfo' => $travelerInfo
            ];

            $this->view('hotels/v_hotel_reviews',$data);
            
        }

        // public function editProfileDetails(){

        // }

        public function loadBooking(){
            $hotelbookings=$this->hotelBookingModel->viewbookings('Hotel',$_SESSION['user_id']);
            // echo gettype($hotelbookings);
            // if(empty($hotelbookings)){
            //     "its empty";
            // }else{
            //     "its not empty";
            // }
            $data=[                
                'bookings'=>$hotelbookings
            ];
            $this->view('hotels/v_dash_bookings',$data);
        }        

        public function loadPayments(){
            $payments=$this->hotelBookingModel->getPayments();
            $data=[                
                'payments'=>$payments
            ];

            $this->view('hotels/v_dash_payments',$data);
        }


        public function loadReviews(){
            $reviews=$this->hotelBookingModel->getReviews();
            $data=[                
                'reviews'=>$reviews
            ];
            $this->view('hotels/v_dash_reviews',$data);
        }

        public function deleteReviews($travelerID){
            if($this->hotelBookingModel->deleteReviews($travelerID)){
                flash('review_flash', 'Review Deleted');
                redirect('Hotels/loadReviews');
            }else{
                flash('reg_flash', 'Something went wrong');
                redirect('Hotels/loadReviews');
            }
        }

        public function generatePDF(){           
            
            $startDate = $_POST["start-date"];
            $endDate = $_POST["end-date"];
            

            $results = $this->hotelBookingModel->filterPayments($startDate,$endDate);
        
            // $html = "<img style='text-align: center;' src='/public/img/logo.png'>";
            $html = "<h1 style='color: #03002E'>Payments Between $startDate and $endDate</h1><hr>";
            $html .= "<table><tr><th>Booking ID</th><th>CustomerID</th><th>Payment Amount</th><th>Payment Date</th><th>Payment Method</th></tr>";
            

            foreach ($results as $payment){
            $html .= "<tr><td>$payment->booking_id</td>
                <td>$payment->TravelerID</td>
                <td>$payment->payment</td>
                <td>$payment->date_added</td>
                <td>$payment->paymentmethod</td>
            </tr>";
            }

            $html .= "<br><br><hr>";
            $html .= "<br><p>This is a system generated report by Tripify(pvt)ltd</p>";

            $options = new Options;
            $options->setChroot(__DIR__);

            $dompdf = new Dompdf($options);

            // $dompdf = new Dompdf([
            //     "chroot" => __DIR__
            // ]);

            $dompdf->loadHtml($html);

            // $dompdf->setPaper('A4','landscape');

            $dompdf->render();
            $dompdf->stream();
            
        }



    }

?>