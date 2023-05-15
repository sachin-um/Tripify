<?php
    

    class Bookings extends Controller{
        
        public function __construct(){
            $this->taxiBookingModel=$this->model('M_Taxi_Bookings');
            $this->guideBookingModel=$this->model('M_Guide_Bookings');
            $this->hotelModel=$this->model('M_Hotels');
            $this->hotelBookingModel=$this->model('M_Hotel_Bookings');
            $this->roomBookingModel=$this->model('M_Hotel_Rooms');
            $this->taxiofferModel=$this->model('M_Taxi_Offers');
            $this->guideofferModel=$this->model('M_Guide_Offers');
            $this->taxirequestModel=$this->model('M_Taxi_Request');
            $this->guiderequestModel=$this->model('M_Guide_Request'); 
            $this->guideModel=$this->model('M_Guides');
            $this->userModel=$this->model('M_Users');
            
        }

        public function index(){


        }

        public function HotelBookings($usertype,$userid){
            
            if ($usertype=='Traveler') {
                $hotelbookings=$this->hotelBookingModel->viewBookings($usertype,$userid);
                foreach($hotelbookings as $booking){
                    $hoteldetails=$this->hotelModel->getHotelById($booking->hotel_id);
                    $booking->hoteldetails=$hoteldetails;
                }
                
                $data=[
                    'hotelbookings'=> $hotelbookings
                ];

                $this->view('traveler/v_hotelbookings',$data);
            }
        }

        public function CancelHotelBooking($bookingid){
            $booking=$this->hotelBookingModel->getHotelBookingbyId($bookingid);
            if ($booking->TravelerID!=$_SERVER['user_id']) {
                flash('reg_flash', 'Access Denied...');
                redirect('Users/login');
            }
            else {
                if($this->hotelBookingModel->cancelBooking($bookingid)){
                    flash('booking_flash', 'Hotel Booking is Canceled');
                    redirect('Bookings/HotelBookings/'.$_SESSION['user_type'].'/'.$_SESSION['user_id']);   
                }
                else {
                    flash('booking_flash', 'Somthing went wrong try again');
                    redirect('Bookings/HotelBookings/'.$_SESSION['user_type'].'/'.$_SESSION['user_id']);   
                }
            }
        }        

        public function GuideBookings($usertype,$userid)
        {
            if ($usertype=='Traveler') {
                $guidebookings=$this->guideBookingModel->viewBookings($usertype,$userid);
                $data=[
                    'guidebookings'=> $guidebookings
                ];
                $this->view('traveler/v_guidebookings',$data);
            }
            else if ($usertype=='Guide') {
                $guidebookings=$this->guideBookingModel->viewBookings($usertype,$userid);
                
                $data=[
                    'guidebookings'=> $guidebookings
                ];
                $this->view('guide/v_guide_bookings',$data);
            }
        }
        // public function filterGuidebooking($usertype,$userid){
        //     $filter=$this->guideBookingModel->filterguidebooking($usertype,$userid);
        //     $data=[
        //         'guidebookings'=> $filter
        //     ];
        //     $this->view('guide/v_guide_bookings',$data);
        // }








        public function ConfirmGuideBooking($ReservationID){
            
            $booking=$this->guideBookingModel->getGudieBookingbyId($ReservationID);

            if($booking->Guides_GuideID == $_SESSION['user_id']){
                if($this->guideBookingModel->confrimBooking($ReservationID)){
                    flash('booking_flash', 'Booking Confrimed');
                    redirect('Bookings/GuideBookings/'.$_SESSION['user_type'].'/'.$_SESSION['user_id']);
                }else{
                    flash('booking_flash', 'Somthing went wrong try again');
                    redirect('Bookings/GuideBookings/'.$_SESSION['user_type'].'/'.$_SESSION['user_id']);  
                }
            }else{
                flash('reg_flash', 'Access Denied...');
                redirect('Users/login');
            }
            
        }

        public function CancelGuideBooking($bookingid){
            $booking=$this->guideBookingModel->getGudieBookingbyId($bookingid);
            if ($booking->TravelerID==$_SESSION['user_id']) {

                if ($booking->status!='Yet To Confirm') {
                    flash('booking_flash', 'Cannot Cancel Your Booking, Please contact your Service Provider..');
                    redirect('Bookings/GuideBookings/'.$_SESSION['user_type'].'/'.$_SESSION['user_id']);   
                }
                else {
                    if($this->guideBookingModel->cancelBooking($bookingid)){
                        flash('booking_flash', 'Guide Booking is Canceled');
                        redirect('Bookings/GuideBookings/'.$_SESSION['user_type'].'/'.$_SESSION['user_id']);   
                    }else {
                        flash('booking_flash', 'Somthing went wrong try again');
                        redirect('Bookings/GuideBookings/'.$_SESSION['user_type'].'/'.$_SESSION['user_id']);   
                    }
                }

            }else if($_SESSION['user_type']=='Guide'){
                
                
                    if($this->guideBookingModel->cancelBooking($bookingid)){
                        flash('booking_flash', 'Guide Booking is Canceled');
                        redirect('Bookings/GuideBookings/'.$_SESSION['user_type'].'/'.$_SESSION['user_id']);   
                    }else {
                        flash('booking_flash', 'Somthing went wrong try again');
                        redirect('Bookings/GuideBookings/'.$_SESSION['user_type'].'/'.$_SESSION['user_id']);   
                    }
    
                }else{
                flash('reg_flash', 'Access Denied...');
                redirect('Users/login');
            }
        }

        
         public function CompletedGuideBooking($ReservationID){
            
            $booking=$this->guideBookingModel->getGudieBookingbyId($ReservationID);

            if($booking->Guides_GuideID == $_SESSION['user_id']){
                if($this->guideBookingModel->CompletedGuideBooking($ReservationID)){
                    flash('booking_flash', 'Booking Completed Awai For Payment');
                    redirect('Bookings/GuideBookings/'.$_SESSION['user_type'].'/'.$_SESSION['user_id']);
                }else{
                    flash('booking_flash', 'Somthing went wrong try again');
                    redirect('Bookings/GuideBookings/'.$_SESSION['user_type'].'/'.$_SESSION['user_id']);  
                }
            }else{
                flash('reg_flash', 'Access Denied...');
                redirect('Users/login');
            }
            
        }

        public function CompletedGuidePayment($bookingId)
        {
            $booking=$this->guideBookingModel->getGudieBookingbyId($bookingId);

            if($booking->Guides_GuideID == $_SESSION['user_id']){
                $data=[
                    'bookingid'=>$bookingId,
                    
                ];
                if($this->guideBookingModel->GuideBookingPaymentUpdate($data)){
                    flash('booking_flash', 'Payment Recieved');
                    redirect('Bookings/GuideBookings/'.$_SESSION['user_type'].'/'.$_SESSION['user_id']);
                }else{
                    flash('booking_flash', 'Somthing went wrong try again');
                    redirect('Bookings/GuideBookings/'.$_SESSION['user_type'].'/'.$_SESSION['user_id']);  
                }
            }else{
                flash('reg_flash', 'Access Denied...');
                redirect('Users/login');
            }
        }
        
        public function GuideDateValidation(){
            $bookingDate = $_POST['bookingDate'];
            $bookingEndDate = $_POST['bookingEndDate'];
            $GuideID = $_POST['GuideID'];
            
            $guideAvailable = $this->guideBookingModel->checkGuideAvailable($GuideID,$bookingDate,$bookingEndDate);
            
            echo json_encode($guideAvailable);        

        }


        public function GuideBooking($GuideID){ //book a guide from guide booking 
            if ($_SESSION['user_type'] == 'Traveler') { 
                $guideDetails=$this->guideModel->getGuideById($GuideID);
                $guidelanguages=$this->guideModel->getGuideLanguageById($GuideID);
                $guide = $this->userModel->getUserDetails($GuideID);

                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $_POST = filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);
                    $data=[
                        'GuideID' =>$GuideID,
                        'StartDate'=>$_POST['sdate'],
                        'EndDate'=>$_POST['endDate'],
                        'PaymentMethod'=>$_POST['payment_option'],
                        'payment'=>$_POST['total'],
                        'TravelerID'=>$_SESSION['user_id'],
                        'Location'=>$_POST['G_book_location']
                    ];


                    if($_SESSION['user_type']){
                        if($this->guideBookingModel->insertGuideBooking($data)){
                            $data['guideDetails']=$this->guideModel->getGuideByID($data->GuideID);
                            $data['userDetails']=$this->userModel->getAllUserDetails($data->GuideID);
                            $data['travelerDetails']=$this->userModel->getAllUserDetails($data->TravelerID);
                            confirmBookingGuide($data);
                            flash('booking_flash', 'Guide Booked Sucessfully');
                            redirect('Bookings/GuideBookings/'.$_SESSION['user_type'].'/'.$_SESSION['user_id']);
                        }else{
                            flash('booking_flash', 'Somthing went wrong try again');
                            redirect('Bookings/GuideBookings/'.$_SESSION['user_type'].'/'.$_SESSION['user_id']);  
                        }
                    }else{
                        flash('reg_flash', 'Access denied..');
                        redirect('Users/login');
                    }

                    

                    
                }else{
                    $data=[
                        'guidedetails'=>$guideDetails,
                        'guideLanguages'=>$guidelanguages,
                        'GuideID'=>$guideDetails->GuideID,
                        'guideimg' => $guide->profileimg
                    ];
                    
                    
                    // echo var_dump($data);
                    $this->view('guide/v_guide_booking',$data);
                }
            }else{
                flash('reg_flash', 'Only Traveler Can Place Booking...');
                redirect('Users/login');
            }
        }
        
    


        public function acceptGuideOffer($offerid,$requestid){
            $request=$this->guiderequestModel->getGuideRequestById($requestid); 
            $offer=$this->guideofferModel->getGuideOfferId($offerid);
            if ($request->traveler_id!=$_SESSION['user_id']) {
                flash('reg_flash', 'Access denied..');
                redirect('Users/login');
            }
            else {
                $start_date = $request->start_date;
                $end_date = $request->end_date;

                // Convert date strings to timestamps
                $start_timestamp = strtotime($start_date);
                $end_timestamp = strtotime($end_date);

                // Calculate difference in seconds
                $seconds_diff = $end_timestamp - $start_timestamp;

                // Convert seconds to days
                $days_diff = round($seconds_diff / (60 * 60 * 24));

                $total = $days_diff*$offer->HourlyRate;


                $data=[
                    'request'=>$request,
                    'offer'=>$offer,
                    'total'=>$total

                ];
                if ($this->guideBookingModel->addguideBooking($data)) {
                    if ($this->guideofferModel->acceptGuideOffer($offerid,$requestid)) {
                        flash('guide_booking_flash', 'Offer succesfully accepted placed your booking');
                        redirect('Bookings/GuideBookings/'.$_SESSION['user_type'].'/'.$_SESSION['user_id']);   
                    }
                    else {
                        flash('guide_offer_flash', 'Something went wrong..!');
                        redirect('Offers/guideoffers/'.$requestid);   
                    }
                }
                else {
                    flash('guide_offer_flash', 'Something went wrong..!');
                    redirect('Offers/guideoffers/'.$requestid);   
                }
                
            }
        }

        public function TaxiBookings($usertype,$userid)
        {
            if ($usertype=='Traveler') {
                $taxibookings=$this->taxiBookingModel->viewBookings($usertype,$userid);
                $data=[
                    'taxibookings'=> $taxibookings
                ];
                $this->view('traveler/v_taxibookings',$data);
            }else if ($usertype == 'Taxi') {
                $taxibookings = $this->taxiBookingModel->viewbookings($usertype,$userid);

                $data = [
                    'taxibookings' => $taxibookings
                ];
        
                $this->view('taxi/v_taxi_bookings', $data);
            }
        }


        public function TaxiBookingsDetails($ReservationID){
            $usertype= $_SESSION['user_type'];
               

            if ($usertype == 'Taxi') {
                $taxibookings = $this->taxiBookingModel->getTaxiBookingbyId($ReservationID);
                $traveler = $this->userModel->getUserDetails($taxibookings->TravelerID);
                
                
                    $vehicleDetails = $this->taxiBookingModel->getVehicleAndDriversbyID($taxibookings->Vehicles_VehicleID);
                    $taxibookings->Name = $vehicleDetails->Name;
                    $taxibookings->VehicleNumber = $vehicleDetails->vehicle_number;
                    $taxibookings->vdetails=$vehicleDetails;
                    $taxibookings->travelerName=$traveler->Name;

                $data = [
                    'taxibookings' => $taxibookings
                ];

            
            $this->view('taxi/v_taxi_dashboard7_1',$data);
           
        }
    }

        public function CancelTaxiBooking($bookingid){
            $booking=$this->taxiBookingModel->getTaxiBookingbyId($bookingid);
            if($_SESSION['user_type']=='Traveler'){
                if ($booking->TravelerID!=$_SESSION['user_id']) {
                    flash('reg_flash', 'Access Denied...');
                    redirect('Users/login');
                }
                elseif ($booking->status!='Yet To Confirm') {
                    flash('booking_flash', 'Cannot Cancel Your Booking, Please contact your Service Provider..');
                    redirect('Bookings/TaxiBookings');
                }
                else {
                    if($this->taxiBookingModel->cancelBooking($bookingid)){
                        flash('booking_flash', 'Taxi Booking is Canceled');
                        redirect('Bookings/TaxiBookings/'.$_SESSION['user_type'].'/'.$_SESSION['user_id']);
                    }
                    else {
                        flash('guide_offer_flash', 'Something went wrong..!');
                        redirect('Bookings/TaxiBookings/'.$_SESSION['user_type'].'/'.$_SESSION['user_id']);
                    }
                }
            }else if($_SESSION['user_type']=='Taxi'){
                 
                if($booking->TaxiOwnerID == $_SESSION['user_id']){
                    if($this->taxiBookingModel->cancelBooking($bookingid)){
                        flash('booking_flash', 'Taxi Booking is Canceled');
                        redirect('Bookings/TaxiBookings/'.$_SESSION['user_type'].'/'.$_SESSION['user_id']);
                    }else{
                        flash('booking_flash', 'Somthing went wrong try again');
                        redirect('Bookings/TaxiBookings/'.$_SESSION['user_type'].'/'.$_SESSION['user_id']);  
                    }
                }else{
                    flash('reg_flash', 'Access Denied...');
                    redirect('Users/login');
                }
            }
            
        }

        public function ConfirmTaxiBooking($ReservationID){
            
            $booking=$this->taxiBookingModel->getTaxiBookingbyId($ReservationID);

            if($booking->TaxiOwnerID == $_SESSION['user_id']){
                if($this->taxiBookingModel->confrimBooking($ReservationID)){
                    flash('booking_flash', 'Booking Confirmed');
                    redirect('Bookings/TaxiBookings/'.$_SESSION['user_type'].'/'.$_SESSION['user_id']); 
                }else{
                    flash('booking_flash', 'Somthing went wrong try again');
                    redirect('Bookings/TaxiBookings/'.$_SESSION['user_type'].'/'.$_SESSION['user_id']);  
                }
            }else{
                flash('reg_flash', 'Access Denied...');
                redirect('Users/login');
            }
            
        }

        public function CompleteTaxiBooking($ReservationID,$taxiOwnerID){
            if($taxiOwnerID==$_SESSION['user_id']){
                if($this->taxiBookingModel->CompleteTaxiBooking($ReservationID)){
                    flash('booking_flash', 'Booking Completed');
                    redirect('Bookings/TaxiBookings/'.$_SESSION['user_type'].'/'.$_SESSION['user_id']); 
                }else{
                    flash('booking_flash', 'Somthing went wrong try again');
                    redirect('Bookings/TaxiBookings/'.$_SESSION['user_type'].'/'.$_SESSION['user_id']);  
                }
            }else{
                flash('reg_flash', 'Access Denied...');
                redirect('Users/login');
            }
        }

        public function acceptTaxiOffer($offerid,$requestid){
            $request=$this->taxirequestModel->getTaxiRequestById($requestid); 
            $offer=$this->taxiofferModel->getOfferByOfferId($offerid);
            var_dump($request);
            var_dump($offer);
            if ($request->traveler_id!=$_SESSION['user_id']) {
                flash('reg_flash', 'Access denied..');
                redirect('Users/login');
            }
            else {
                $ppk=$offer->PricePerKm;
                $total=$ppk*$request->distance;
                

                $bookingdatetime = date('Y-m-d H:i:s', strtotime("$request->date $request->time"));
        
                $est_datetime = date('Y-m-d H:i:s', strtotime("$bookingdatetime +$request->duration"));
                $end_date = date('Y-m-d', strtotime($est_datetime));
                $end_time = date('H:i:s', strtotime($est_datetime));
                $data=[
                    'e_date'=>$end_date,
                    'e_time'=>$end_time,
                    'price'=>$total,
                    'request'=>$request,
                    'offer'=>$offer
                ];
                if ($this->taxiBookingModel->acceptTaxiOffer($data)) {
                    if ($this->taxiofferModel->acceptTaxiOffer($offerid,$requestid)) {
                        flash('taxi_booking_flash', 'Offer succesfully accepted placed your booking');
                        redirect('Bookings/TaxiBookings/'.$_SESSION['user_type'].'/'.$_SESSION['user_id']);   
                    }
                    else {
                        flash('taxi_offer_flash', 'Something went wrong..!');
                        redirect('Offers/taxioffers/'.$requestid);   
                    }
                }
                else {
                    flash('taxi_offer_flash', 'Something went wrong..!');
                    redirect('Offers/taxioffers/'.$requestid);   
                }
                
            }
        }



        // public function CalculatePrice($pickupL,$dropL){
           
        //     // Set the origin and destination addresses
        //     $origin = $pickupL;
        //     $destination =$dropL;

        //     // $origin = 'kandy,Srilanka';
        //     // $destination ='Colombo,Srilanka';

        //     // Create the URL for the Google Maps Distance Matrix API
        //     $url = 'https://maps.googleapis.com/maps/api/distancematrix/json?origins=' . urlencode($origin) . '&destinations=' . urlencode($destination) . '&mode=driving&units=metric&key=AIzaSyCo0cnVa0-HmEMm2M5wGXP_DQ37Z2L0teo';

        //     // Make a GET request to the API and decode the JSON response
        //     $response = json_decode(file_get_contents($url), true);

        //     // Get the distance in kilometers from the response
        //     $distance = $response['rows'][0]['elements'][0]['distance']['value'] / 1000;

        //     // return the result
        //     return $distance; 

        // }


        // public function CalculateExtimateTime($pickupL,$dropL){
           
      

        //     $origin = $pickupL;
        //     $destination =$dropL;

            
        //     $url = 'https://maps.googleapis.com/maps/api/distancematrix/json?origins=' . urlencode($origin) . '&destinations=' . urlencode($destination) . '&mode=driving&units=metric&key=AIzaSyCo0cnVa0-HmEMm2M5wGXP_DQ37Z2L0teo';

        //     $ch = curl_init();
        //     curl_setopt($ch, CURLOPT_URL, $url);
        //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //     $response = curl_exec($ch);
        //     curl_close($ch);
            
        //     $data = json_decode($response);
        //     $duration = $data->rows[0]->elements[0]->duration->text;
            
        //     return $duration;
            

        // }

        public function checkTimeAvailability(){
            $bookingDate = $_POST['bookingDate'];
            $vehicleID = $_POST['vehicleID'];
            $est = $_POST['est'];

            $driverAvailable = $this->taxiBookingModel->checkDriverAvailable($vehicleID,$bookingDate,$est);
           
            
            echo json_encode($driverAvailable);
        

        }

        public function checkTimeSlot(){
            $bookingDate = $_POST['bookingDate'];
            $bookingTime = $_POST['bookingTime'];
            $vehicleID = $_POST['vehicleID'];
            $est = $_POST['est'];


            $bookingAvailable = $this->taxiBookingModel->checkBookingDate($vehicleID,$bookingDate,$bookingTime,$est);
            
            echo json_encode($bookingAvailable);
            
        }

        public function EditcheckTimeSlot(){
            $bookingDate = $_POST['bookingDate'];
            $bookingTime = $_POST['bookingTime'];
            $vehicleID = $_POST['vehicleID'];
            $est = $_POST['est'];
            $bookingID = $_POST['bookingID'];


            $bookingAvailable = $this->taxiBookingModel->checkEditBookingDate($vehicleID,$bookingID,$bookingDate,$bookingTime,$est);
            
            echo json_encode($bookingAvailable);
            
        }

        public function TaxiBookingPage($vehicleID,$ownerID){
          
        
            if ($_SESSION['user_type'] == 'Traveler') {
                $details=$this->taxiBookingModel->getVehicleAndDriversbyID($vehicleID);
                // var_dump($details);
                $owner=$this->taxiBookingModel->getTaxiOwnerbyID($ownerID);             
               
                $vehicle_images_str = $details->Vehicle_Images; // Example string from the database
                $vehicle_images_array = explode(",", $vehicle_images_str);
                $details->vehicle_images_arr=$vehicle_images_array;

                if(isset($owner->company_name)){
                    $com_name = $owner->company_name;
                }else{
                    $com_name = $owner->owner_name;
                }               
                
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                
                    $_POST = filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);
                    $pickupL = trim($_POST['pickupL']);
                    $dropL =  trim($_POST['dropL']);
                    $bookingDate = $_POST['s_date'];
                    $bookingTime = $_POST['s_time'];
                    $passengers = $_POST['passengers'];
                    $payment_option = $_POST['payment_option'];
                    
                    $exTime=$_POST['duration']; //extimate time

                    $distance=$_POST['distance'];

                    $days = $_POST['days'];
                    
                    
                    
                    
                    $bookingdatetime = new DateTime("$bookingDate $bookingTime");

                    if($days>0){
                        
                        $pickup_timestamp = strtotime($bookingDate . ' ' . $bookingTime);
                       
                        $dropoff_timestamp = strtotime('+' . $days . ' days', $pickup_timestamp);

                        // Convert the drop-off timestamp to a date and time string
                        $dropoff_date = date('Y-m-d', $dropoff_timestamp);
                        $dropoff_time = date('H:i:s', $dropoff_timestamp);

                        // Display the estimated end time to the customer
                        // echo 'Estimated drop-off date and time: ' . $dropoff_date . ' ' . $dropoff_time;
                        $end_date = $dropoff_date;
                        $end_time = $dropoff_time;

                        $total = (float)$days * (float)$details->DayRate;
                        

                    }else{

                        $exHours = (int)substr($exTime, 0, 2);
                        $exMinutes = (int)substr($exTime, 3, 2);
                        $exSeconds = (int)substr($exTime, 6, 2);

                        $bookingdatetime->add(new DateInterval("PT{$exHours}H{$exMinutes}M{$exSeconds}S"));
                        $est_datetime = $bookingdatetime->format("Y-m-d H:i:s");

                        $end_date = date('Y-m-d', strtotime($est_datetime));
                        $end_time = date('H:i:s', strtotime($est_datetime));
                        if($details->VehicleType == "Tuk Tuk"){
                            $price=30;
                            if($distance<=100){
                                $total=$distance*30;
                            }else{
                                $total = (float)100*30+((float)$distance-100)*(float)$details->price_per_km;
                                $lkm=(float)$distance-100;
                                
                            }
                        }else if($details->VehicleType == "Car"){
                                $price=40;
                            if($distance<=100){
                                $total=$distance*40;
                                
                            }else{
                                $total = (float)100*40+((float)$distance-100)*(float)$details->price_per_km;
                                $lkm=(float)$distance-100;
                                
                            }
                        }else if($details->VehicleType == "Van"){
                            $price=50;
                            if($distance<=100){
                                $total=$distance*50;
                            }else{
                                $total = ((float)100*50)+((float)$distance-100)*(float)$details->price_per_km;
                                $lkm=(float)$distance-100;
                               
                               
                            }
                        }else if($details->VehicleType == "Bus"){
                            $price=70;
                            if($distance<=100){
                                $total=$distance*70;
                            }else{
                                $total = (float)100*70+((float)$distance-100)*(float)$details->price_per_km;
                                $lkm=(float)$distance-100;
                                
                            }
                        }
                    }

    
                    $data=[
                        's_date'=>trim($_POST['s_date']),
                        's_time'=>trim($_POST['s_time']),
                        'p_latitude'=>trim($_POST['p-latitude']),
                        'p_longitude'=>trim($_POST['p-longitude']),
                        'd_latitude'=>trim($_POST['d-latitude']),
                        'd_longitude'=>trim($_POST['d-longitude']),
                        'payment_option'=>$payment_option,
                        'passengers'=>$passengers,
                        'e_date'=>$end_date,
                        'e_time'=>$end_time,
                        'pickupL'=>$pickupL,
                        'dropL'=>$dropL,
                        'details'=>$details,
                        'lkm'=>$lkm,
                        'price'=>$price,
                        'extime'=>$exTime,
                        'com_name'=>$com_name,
                        'owner'=>$owner,
                        'days'=>$days,
                        'DayRate'=>$details->DayRate,
                        'TaxiOwnerID'=>$owner->OwnerID,
                        'distance'=>$distance,
                        'total' => $total     
                        ];
                        
                        $_SESSION['booking_data'] = $data;
                        $this->view('taxi/v_bookings',$data);

                }else{
                    

                    $data=[
                        'details'=>$details,
                        'com_name'=>$com_name,
                        'owner'=>$owner,
                        'hide'=>'false'
                    ];
                    
                    
                    // echo var_dump($data);
                    $this->view('taxi/v_bookings',$data);
                    
                }
            }else{
                flash('reg_flash', 'Only Traveler Can Place Booking...');
                redirect('Users/login');
            }           
            

        }

        public function EditTaxiBooking($id){

            if ($_SESSION['user_type'] == 'Traveler') {


                $booking=$this->taxiBookingModel->getBookingByID($id);
                $details = $this->taxiBookingModel->getVehicleAndDriversbyID($booking->Vehicles_VehicleID);
                $owner = $this->taxiBookingModel->getTaxiOwnerbyID($booking->TaxiOwnerID);
                // var_dump($booking);

                if(isset($owner->company_name)){
                    $com_name = $owner->company_name;
                }else{
                    $com_name = $owner->owner_name;
                }
                
                
                
                if($_SERVER['REQUEST_METHOD'] == 'POST'){

                    if ($booking->status == "Yet To Confirm"){
                        $data=[
                            's_date'=>trim($_POST['s_date']),
                            's_time'=>trim($_POST['s_time']),
                            'p_latitude'=>trim($_POST['p-latitude']),
                            'p_longitude'=>trim($_POST['p-longitude']),
                            'd_latitude'=>trim($_POST['d-latitude']),
                            'd_longitude'=>trim($_POST['d-longitude']),
                            'payment_option'=>trim($_POST['payment_option']),
                            'passengers'=>trim($_POST['passengers']),
                            'e_date'=>trim($_POST['tripEndDate']),
                            'e_time'=>trim($_POST['tripEndTime']),
                            'pickupL'=>trim($_POST['pickupL']),
                            'dropL'=>trim($_POST['dropL']),
                            'extime'=>trim($_POST['duration']),
                            'distance'=>trim($_POST['distance']),
                            'total' => trim($_POST['total']),
                            'TaxiOwnerID'=>$booking->TaxiOwnerID,
                            'travelerID'=>$booking->TravelerID, 
                            'vehicleID'=>  $booking->Vehicles_VehicleID  
                            ];

                        
                        if ($this->taxiBookingModel->EditTaxiBooking($data,$id)) {
                            flash('booking_flash', 'Your Booking Update Sucessfully..!');
                            redirect('Bookings/TaxiBookings/'.$_SESSION['user_type'].'/'.$_SESSION['user_id']);
                        }
                        else{
                            flash('booking_flash', 'Something Went to Wrong!');
                            redirect('Bookings/TaxiBookings/'.$_SESSION['user_type'].'/'.$_SESSION['user_id']);
                        }
                    }else{
                        flash('booking_flash', 'Contact Taxi Owner to Edit Booking!');
                        redirect('Bookings/TaxiBookings/'.$_SESSION['user_type'].'/'.$_SESSION['user_id']);

                    }
                    
                
                
                }else{
                    $data=[
                        'details'=>$details,
                        'com_name'=>$com_name,
                        'owner'=>$owner,
                        'booking'=>$booking,
                        'hide'=>'false'
                    ];

                    $this->view('taxi/v_edit_bookings',$data);
                }

            }else{
                flash('booking_flash', 'Only Traveler Can Edit Booking...');
                redirect('Users/login');
            }
            
        }

       

       

        public function TaxiBookingdetails($vehicleID,$userId){

            $duration = $_SESSION['booking_data']['extime'];
            $datetime = new DateTime('0000-01-01 ' . $duration);
            $formattedTime = $datetime->format('H:i:s');


            $data=[
                's_date'=>$_SESSION['booking_data']['s_date'],
                's_time'=>$_SESSION['booking_data']['s_time'],
                'e_date'=>$_SESSION['booking_data']['e_date'],
                'e_time'=>$_SESSION['booking_data']['e_time'],
                'pickupL'=>$_SESSION['booking_data']['pickupL'],
                'dropL'=>$_SESSION['booking_data']['dropL'],
                'payment_option'=>$_SESSION['booking_data']['payment_option'],
                'passengers'=>$_SESSION['booking_data']['passengers'],
                'p_latitude'=>$_SESSION['booking_data']['p_latitude'],
                'p_longitude'=>$_SESSION['booking_data']['p_longitude'],
                'd_latitude'=>$_SESSION['booking_data']['d_latitude'],
                'd_longitude'=>$_SESSION['booking_data']['d_longitude'],
                'days'=>$_SESSION['booking_data']['days'],
                'extime'=> $formattedTime ,
                'distance'=>$_SESSION['booking_data']['distance'],
                'travelerID'=>$userId,
                'TaxiOwnerID'=>$_SESSION['booking_data']['TaxiOwnerID'],
                'vehicleID'=>$vehicleID,
                'total' =>$_SESSION['booking_data']['total'],
                ];

                

                if ($this->taxiBookingModel->insertTaxiBooking($data)) {
                    $user=$this->userModel->getUserDetails($data['travelerID']);
                    $owner=$this->userModel->getUserDetails($data['TaxiOwnerID']);
                    $data['userdetails']=$user;
                    $data['taxiowner']=$owner;
                    confirmBookingTaxi($data);
                    flash('request_flash', 'Your Vehicle Booked Sucessfully..!');
                    unset($_SESSION['booking_data']);
                    redirect('Bookings/TaxiBookings/'.$_SESSION['user_type'].'/'.$_SESSION['user_id']);
                }
                else{
                    die('Something went wrong');
                }
                unset($_SESSION['booking_data']);

        }


        public function checkRoomAvailability(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
                $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
                $checkin = $_POST['date-1'];
                $hotelID = trim($_POST['hotelID']);
                $_SESSION['checkin'] = $checkin;
                $checkout = $_POST['date-2'];
                $_SESSION['checkout'] = $checkout;
                $noofadults =trim($_POST['noofadults']);

                $profileDetails = $this->hotelModel->getProfileInfo($hotelID);
                $allroomtypes=$this->roomBookingModel->viewAllRooms($hotelID);
                $beds = $this->roomBookingModel->getAllBedsforAllRooms();

                $bookedrecords = $this->hotelBookingModel->RoomAvailabilityRecords($hotelID);

                //The array with booked records
                // echo "This is the bookedrecords thingy"."<br>";
                // print_r($bookedrecords)."<br>";

                //get all room types and their total number
                $allrooms = array();
                foreach($allroomtypes as $roomtype){
                    $allrooms[] = $roomtype->RoomTypeID;
                    $allrooms[] = $roomtype->no_of_rooms;
                }

                

                // get bookedrecords' room types and no of them
                $bookedrooms = array();
                foreach($bookedrecords as $record){
                    $bookedrecordsarray = explode(",",$record->roomTypes);
                    // print_r($bookedrecordsarray)."<br>";
                    foreach($bookedrecordsarray as $a){
                        $bookedrooms[] = $a;
                    }
                }
                

                for($i=0;$i<count($allrooms);$i=$i+2){
                    if(!empty($bookedrooms)){
                        for($j=0;$j<count($bookedrooms);$j=$j+2){
                            if($allrooms[$i]==$bookedrooms[$j]){
                                $allrooms[$i+1]=$allrooms[$i+1]-$bookedrooms[$j+1];
                            }
                        }
                    }                    
                }

                // print_r($allrooms); 
                $images = $this->hotelModel->getImages($hotelID);

                $data=[
                    'hotelID'=>$hotelID,
                    'profileDetails'=>$profileDetails,
                    'profileName'=> $profileDetails->Name,
                    'profileAddress'=> $profileDetails->Line1.", ".$profileDetails->Line2.", ".$profileDetails->District,   
                    'allroomtypes'=> $allroomtypes,
                    'description'=>$profileDetails->Description,
                    'availablerooms'=>$allrooms,
                    'images'=>$images,
                    'allBeds'=>$beds
                    // 'noofadults' => $data['noofadults']
                    // 'profileName'=> $profileDetails->Name,
                    // 'profileName'=> $profileDetails->Name
    
                ];
                $this->view('hotels/v_hotel_details_page',$data);
            }
    
        }

        public function placeBooking($hotelID){
            $allroomtypes=$this->roomBookingModel->viewAllRooms($hotelID);
            $lastBooking=$this->roomBookingModel->getBookingID();
            $bookingID = (int)$lastBooking->booking_id+1;

            //get the roomTypes and their respective numbers

            if($_SERVER['REQUEST_METHOD']=='POST'){
                
                $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);
                
                $total = 0;
                $temp = 0; 
                $newarray = array();

                //Get the total price for the booked rooms
                foreach($_POST as $value){
                    $newarray[] = $value;
                }
                
                // print_r($newarray);
                for($i=2;$i<count($newarray);$i=$i+3){
                    $temp = floatval($newarray[$i])*intval($newarray[$i+1]);
                    $total = $total+$temp;
                }

                //Get no of booked rooms from each type
                $noofeachbookedrooms = array();
                for($i=3;$i<count($newarray);$i=$i+3){
                    if($newarray[$i]!=0){
                        $noofeachbookedrooms[] = $newarray[$i];
                    }
                    
                }



                //Get booked room names
                $bookedRoomNames = array();
                for($i=1;$i<count($newarray);$i=$i+3){
                    if($newarray[$i+2]!=0){
                        $bookedRoomNames[] = $newarray[$i];
                    }                    
                }

                //Get booked room IDs
                $a = 0;
                $bookedRoomIDs = array();
                foreach ($_POST as $index => $value) {
                    if ($a!=0 && $a%3 == 0) {
                        $bookedRoomIDs[] = $index;
                        $bookedRoomIDs[] = $value;
                    }
                    $a = $a + 1;
                }

                $b = 0;
                foreach($bookedRoomIDs as $ID) {
                    if ($ID == 0) {
                        unset($bookedRoomIDs[$b]);
                        unset($bookedRoomIDs[$b-1]);
                    }
                    $b = $b+1;
                }
                
                // print_r($bookedRoomIDs)."<br>";
                // echo gettype($bookedRoomIDs);

                // Convert the array to a string with a comma separator
                $roomIDstring = implode(",", $bookedRoomIDs);

                $_SESSION['roomIDs'] = $bookedRoomIDs;
                 
                $data=[
                    'hotelID'=>trim($_POST['hotelID']),
                    'TravelerID'=>$_SESSION['user_id'],
                    'payment' =>$total,
                    'postedValues' => $_POST,
                    'noofbookedrooms' => $noofeachbookedrooms,
                    'bookedRoomIDs' => $bookedRoomIDs,
                    'bookedRoomNames' => $bookedRoomNames,
                    'bookingID' => $bookingID,
                    'roomIDstring' => $roomIDstring,
                    'bookingType' => "hotel"
                ];               
                

                $this->view('hotels/v_confirmBooking', $data);
            }
            
        }

        public function TaxiBookingPaymentUpdate()
        {
            $data=[
                'bookingid'=>$_POST['booking_id'],
                
            ];
            if ($this->taxiBookingModel->TaxiBookingPaymentUpdate($data)) {

                flash('booking_flash', 'Your Payment is recieved  Thank You..!');
                
                $jsonObj = json_encode($data);
                // printr($jsonObj);
                // var_dump($jsonObj)
                 echo $jsonObj;
            }
            else{
                die('Something went wrong');
            }
        }

        public function GuideBookingPaymentUpdate()
        {
            $data=[
                'bookingid'=>$_POST['booking_id'],
                
            ];
            if ($this->guideBookingModel->GuideBookingPaymentUpdate($data)) {
                flash('booking_flash', 'Your Payment is recieved  Thank You..!');
                
                $jsonObj = json_encode($data);
                // printr($jsonObj);
                // var_dump($jsonObj)
                 echo $jsonObj;
            }
            else{
                die('Something went wrong');
            }
        }

        public function getTaxiBooking($id)
        {
            $booking=$this->taxiBookingModel->getTaxiBookingbyId($id);
            header('Content-Type: application/json');
            echo json_encode($booking);
        }


        public function booking(){
           
            $hotelID = $_POST['hotelID'];
            $payment = $_POST['payment'];
            $paymentM = $_POST['paymentMethod'];

            // $lastBooking=$this->roomBookingModel->getBookingID();
            // $bookingID = (int)$lastBooking->booking_id+1;

            $paymentMethod = "Not known";
            if($paymentM==1){
                $paymentMethod = "Online";
            }else{
                $paymentMethod = "On Site";
            }

            $data=[
                'hotelID' => intval($hotelID),
                'travelerID' => $_SESSION['user_id'],
                'payment' => intval($payment),
                'paymentMethod' => $paymentMethod,
                'checkin' => $_SESSION['checkin'],
                'checkout' => $_SESSION['checkout'],
                'bookingID' => ''
            ];

            
            if ($this->hotelBookingModel->addHotelBooking($data)) {
                flash('reg_flash', 'Your booking was successful');
                $user=$this->userModel->getUserDetails($_SESSION['user_id']);
                $hotel=$this->hotelModel->getHotelById(intval($hotelID));
                $checkin = (string)$_SESSION['checkin'];
                // $mailData=[
                //     'userDetails'=>$user,
                //     'bookingDetails'=>$data,
                //     'hotelName'=>$hotel->Name,
                //     'payment' => $payment
                // ];

                // confirmBookingHotel($mailData);
                echo json_encode(true);
                
            }else{
                echo json_encode(false);
            }
            
        }



    }
?>
