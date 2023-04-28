<?php
    

    class Bookings extends Controller{
        
        public function __construct(){
            $this->taxiBookingModel=$this->model('M_Taxi_Bookings');
            $this->guideBookingModel=$this->model('M_Guide_Bookings');
            $this->hotelBookingModel=$this->model('M_Hotel_Bookings');
            $this->taxiofferModel=$this->model('M_Taxi_Offers');
            $this->guideofferModel=$this->model('M_Guide_Offers');
            $this->taxirequestModel=$this->model('M_Taxi_Request');
            $this->guiderequestModel=$this->model('M_Guide_Request');
            
            
            
        }
        public function HotelBookings($usertype,$userid)
        {
            
            if ($usertype=='Traveler') {
                $hotelbookings=$this->hotelBookingModel->viewBookings($usertype,$userid);
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
                print_r($guidebookings);
                $data=[
                    'guidebookings'=> $guidebookings
                ];
                $this->view('guide/v_guide_bookings',$data);
            }
        }

        public function CancelGuideBooking($bookingid){
            $booking=$this->GuideBookingModel->getGuideBookingbyId($bookingid);
            if ($booking->TravelerID!=$_SERVER['user_id']) {
                flash('reg_flash', 'Access Denied...');
                redirect('Users/login');
            }
            elseif ($booking->status!='Yet To Confirm') {
                flash('booking_flash', 'Cannot Cancel Your Booking, Please contact your Service Provider..');
                redirect('Bookings/GuideBookings/'.$_SESSION['user_type'].'/'.$_SESSION['user_id']);   
            }
            else {
                if($this->GuideBookingModel->cancelBooking($bookingid)){
                    flash('booking_flash', 'Guide Booking is Canceled');
                    redirect('Bookings/GuideBookings/'.$_SESSION['user_type'].'/'.$_SESSION['user_id']);   
                }
                else {
                    flash('booking_flash', 'Somthing went wrong try again');
                    redirect('Bookings/GuideBookings/'.$_SESSION['user_type'].'/'.$_SESSION['user_id']);   
                }
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
                $data=[
                    'request'=>$request,
                    'offer'=>$offer
                ];
                if ($this->guideBookingModel->addguideBooking($data)) {
                    if ($this->guideofferModel->acceptGuideOffer($offerid)) {
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
                
                    $vehicleDetails = $this->taxiBookingModel->getVehicleAndDriversbyID($taxibookings->Vehicles_VehicleID);
                    $taxibookings->Name = $vehicleDetails->Name;
                    $taxibookings->VehicleNumber = $vehicleDetails->vehicle_number;
        
                $data = [
                    'taxibookings' => $taxibookings
                ];

            
            $this->view('taxi/v_taxi_dashboard7_1',$data);
           
        }

    }

        public function CancelTaxiBooking($bookingid){
            $booking=$this->taxiBookingModel->getTaxiBookingbyId($bookingid);
            if($_SESSION['user_type']=='Traveler'){
                if ($booking->TravelerID!=$_SERVER['user_id']) {
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
                 
                if($bookings->TaxiOwnerID == $_SERVER['user_id']){
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

            if($bookings->TaxiOwnerID == $_SERVER['user_id']){
                if($this->taxiBookingModel->confrimBooking($ReservationID)){
                    flash('booking_flash', 'Confrimed Success');
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
            $offer=$this->taxiofferModel->getOfferById($offerid);
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
                    if ($this->taxiofferModel->acceptTaxiOffer($offerid)) {
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

        public function TaxiBookingPage($vehicleID,$ownerID){
         
            $details=$this->taxiBookingModel->getVehicleAndDriversbyID($vehicleID);
            // var_dump($details);
            $owner=$this->taxiBookingModel->getTaxiOwnerbyID($ownerID); 

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
                $exTime=$_POST['duration']; //extimate time

                $distance=$_POST['distance'];
                
                $total = (float)$distance * (float)$details->price_per_km;

                
                $bookingdatetime = new DateTime("$bookingDate $bookingTime");
               
                $exHours = (int)substr($exTime, 0, 2);
                $exMinutes = (int)substr($exTime, 3, 2);
                $exSeconds = (int)substr($exTime, 6, 2);

                $bookingdatetime->add(new DateInterval("PT{$exHours}H{$exMinutes}M{$exSeconds}S"));
                $est_datetime = $bookingdatetime->format("Y-m-d H:i:s");

                $end_date = date('Y-m-d', strtotime($est_datetime));
                $end_time = date('H:i:s', strtotime($est_datetime));
  


                $data=[
                    's_date'=>trim($_POST['s_date']),
                    's_time'=>trim($_POST['s_time']),
                    'p_latitude'=>trim($_POST['p-latitude']),
                    'p_longitude'=>trim($_POST['p-longitude']),
                    'd_latitude'=>trim($_POST['d-latitude']),
                    'd_longitude'=>trim($_POST['d-longitude']),
                    'e_date'=>$end_date,
                    'e_time'=>$end_time,
                    'pickupL'=>$pickupL,
                    'dropL'=>$dropL,
                    'details'=>$details,
                    'extime'=>$exTime,
                    'com_name'=>$com_name,
                    'owner'=>$owner,
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
                'p_latitude'=>$_SESSION['booking_data']['p_latitude'],
                'p_longitude'=>$_SESSION['booking_data']['p_longitude'],
                'd_latitude'=>$_SESSION['booking_data']['d_latitude'],
                'd_longitude'=>$_SESSION['booking_data']['d_longitude'],
                'extime'=> $formattedTime ,
                'distance'=>$_SESSION['booking_data']['distance'],
                'travelerID'=>$userId,
                'TaxiOwnerID'=>$_SESSION['booking_data']['TaxiOwnerID'],
                'vehicleID'=>$vehicleID,
                'total' =>$_SESSION['booking_data']['total'],
                ];

                var_dump($data);

                if ($this->taxiBookingModel->insertTaxiBooking($data)) {
                    flash('request_flash', 'Your Vehicle Booked Sucessfully..!');
                    unset($_SESSION['booking_data']);
                    redirect('Bookings/TaxiBookings/'.$_SESSION['user_type'].'/'.$_SESSION['user_id']);
                }
                else{
                    die('Something went wrong');
                }
                // unset($_SESSION['booking_data']);
        }

        



    }
?>
