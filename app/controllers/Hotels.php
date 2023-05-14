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
                'contact_number' => trim($_POST['contact']),
                'pets' => ($_POST['pets']),
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
                empty($data['name_err']) && empty($data['hotel_reg_number_err']) && empty($data['line1_err']) && empty($data['district_err']) &&
                empty($data['contact_number_err']) && empty($data['checkin_err']) && empty($data['checkout_err'])
            ) {
                //Register Hotel
                if ($this->hotelModel->register($data)) {
                    session_destroy();
                    flash('reg_flash', 'You are Succusefully registered as Guide, Please wait for verication process is done...');
                    redirect('Users/login');
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
                'contact_number' => '',
                'pets' => '',
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

                $hotelSearch = $this->hotelModel->searchForHotels($destination);
                $images = $this->hotelModel->getImagesforHotels();

                $data = [
                    'hotelSearch' => $hotelSearch,
                    'destination' => $destination,  
                    'check-in' => $_POST['date-1'],
                    'check-out' => $_POST['date-2'],
                    'noofadults' => trim($_POST['noofadults']),
                    'images'=>$images,

                    'place_err' => '',
                    'sdate_err' => '',
                    'edate_err' => ''
                ];

                
                if(strtotime($data['check-in']) > strtotime($data['check-out'])){
                    $data['edate_err'] = 'Check out date must be later than the check in date';
                }

                if(strtotime($data['check-in'])<time()){
                    $data['sdate_err'] = 'Please enter a later date for check in date';
                }
                
                if(empty($data['destination'])){
                    $data['place_err'] = 'Please enter your destination';
                }
                
                if(empty($data['edate_err']) && empty($data['place_err'])){
                    $this->view('hotels/v_searchResultsPage',$data);
                }else{
                    $this->view('hotels/v_searchResultsPage',$data);
                }                
            }else{
                $data = [
                    'hotelSearch' => '',
                    'destination' => '',  
                    'check-in' => '',
                    'check-out' => '',
                    'noofadults' => '',
                    'images'=>'',
                    'destination' => '',

                    'place_err' => '',
                    'sdate_err' => '',
                    'edate_err' => ''
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
            $images = $this->hotelModel->getImages($_SESSION['user_id']);
            $data=[
                'hoteldetails'=>$hotelvar,
                'hotelaccountdetails' => $hotelaccountvar,
                'images'=>$images
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

            $data=[
                'hotelID' => $hotelID,
                'reviewSet' => $hotelreviews
            ];

            $this->view('hotels/v_hotel_reviews',$data);
            
        }

        public function addHotelReview($hotelID){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);                
    
                $data = [
                    'hotelID'=>$hotelID,
                    'hotel_rating'=>$_POST['hotel_rating'],
                    'review'=>trim($_POST['review']),

                    'rating_err'=>'',
                    'review_err'=>''
                ];

                if (empty($data['hotel_rating'])) {
                    $data['rating_err'] = 'This field is required';
                }
                if (empty($data['review'])) {
                    $data['review_err'] = 'This field is required';
                }

                if (empty($data['rating_err']) && empty($data['review_err'])) {
                    
                    if ($this->hotelModel->addReview($data)) {
                        flash('review_flash', 'Your review was successfully added');
                        redirect('Hotels/hotelProfilewithoutrooms/'.$data['hotelID']);
                    } else {
                        flash('review_flash', 'Something went wrong.');
                        redirect('Hotels/hotelProfilewithoutrooms/'.$data['hotelID']);
                    }
    
                } else {
                    $this->view('hotels/v_addReview', $data);
                }


            }else{
                $data=[
                    'hotelID'=>$hotelID,
                    'hotel_rating'=>'',
                    'rating_err'=>'',
                    'review'=>'',
                    'review_err'=>''
                ];
                $this->view('hotels/v_addReview',$data);
            }
        }

        public function loadBooking($status=null){
            if($status==null){
                $status = "In progress";
            }
            $hotelbookings=$this->hotelBookingModel->getHotelBookingbyStatus($status,$_SESSION['user_id']);
            // $allroomtypes=$this->roomModel->viewAllRooms($_SESSION['user_id']);

            // print_r($allroomtypes);
            $start = date('Y-m-d', strtotime('-30 days')); 
            $endDate = date('Y-m-d');

            $data=[                
                'bookings'=>$hotelbookings,
                'status'=>$status,
                'startdate'=>$start,
                'enddate'=>$endDate
                // 'allroomtypes'=>$allroomtypes
            ];
            $this->view('hotels/v_dash_bookings',$data);
            
        }        


        public function filterBooking($status=null){
            $startDate = $_POST["start-date"];
            $endDate = $_POST["end-date"];

            $hotelbookings = $this->hotelBookingModel->filterBookings($startDate,$endDate,$_SESSION['status']);

            // echo gettype($startDate);
            // echo gettype($endDate);
            // echo $startDate."<br>";
            // echo $endDate."<br>";
            // echo $_SESSION['status']."<br>";
            if(empty($hotelbookings)){
                echo "empty";
            }

            // $allroomtypes=$this->roomModel->viewAllRooms($_SESSION['user_id']);
            $_SESSION['filterbookings'] = $hotelbookings;
            // print_r($allroomtypes);

            $data=[                
                'bookings'=>$hotelbookings,
                'status'=>$_SESSION['status'],
                'startdate'=>$startDate,
                'enddate'=>$endDate
                // 'allroomtypes'=>$allroomtypes
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
            
            // $startDate = $_POST["start-date"];
            // $endDate = $_POST["end-date"];
            

            $results = $this->hotelBookingModel->filterBookings();
        
            // $html = "<img style='text-align: center;' src='/public/img/logo.png'>";

            $html = '<html> 
    
            <head>
                
                <link rel="stylesheet" href="'.  URLROOT .'/public/css/pdfstyle.css"> 
            </head>
            
            <body>    
        
                <div class="invo-title">
                    <h1>Booking Report</h1>
                </div><br>
                <p>From to</p>
            
            </body>
            </html>';

            // $html = "<h1 style='color: #03002E'>Payments Between $startDate and $endDate</h1><hr>";
            // $html .= "<table><tr><th>Booking ID</th><th>CustomerID</th><th>Payment Amount</th><th>Payment Date</th><th>Payment Method</th></tr>";
            

            // foreach ($results as $payment){
            // $html .= "<tr><td>$payment->booking_id</td>
            //     <td>$payment->TravelerID</td>
            //     <td>$payment->payment</td>
            //     <td>$payment->date_added</td>
            //     <td>$payment->paymentmethod</td>
            // </tr>";
            // }

            // $html .= "<br><br><hr>";
            // $html .= "<br><p>This is a system generated report by Tripify(pvt)ltd</p>";

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