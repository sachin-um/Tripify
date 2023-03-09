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
            }
        }

        public function CancelTaxiBooking($bookingid){
            $booking=$this->taxiBookingModel->getTaxiBookingbyId($bookingid);
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
        }

        public function acceptTaxiOffer($offerid,$requestid){
            $request=$this->taxirequestModel->getTaxiRequestById($requestid); 
            $offer=$this->taxiofferModel->getOfferById($offerid);
            if ($request->traveler_id!=$_SESSION['user_id']) {
                flash('reg_flash', 'Access denied..');
                redirect('Users/login');
            }
            else {
                $data=[
                    'request'=>$request,
                    'offer'=>$offer
                ];
                if ($this->taxiBookingModel->addtaxiBooking($data)) {
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



        public function CalculatePrice($pickupL,$dropL){
           
            // Set the origin and destination addresses
            // $origin = $pickupL;
            // $destination =$dropL;

            $origin = 'kandy,Srilanka';
            $destination ='Colombo,Srilanka';

            // Create the URL for the Google Maps Distance Matrix API
            $url = 'https://maps.googleapis.com/maps/api/distancematrix/json?origins=' . urlencode($origin) . '&destinations=' . urlencode($destination) . '&mode=driving&units=metric&key=AIzaSyCo0cnVa0-HmEMm2M5wGXP_DQ37Z2L0teo';

            // Make a GET request to the API and decode the JSON response
            $response = json_decode(file_get_contents($url), true);

            // Get the distance in kilometers from the response
            $distance = $response['rows'][0]['elements'][0]['distance']['value'] / 1000;

            // return the result
            return $distance; 

        }



        public function TaxiBookingPage($vehicleID,$ownerID){

            $details=$this->taxiBookingModel->getVehicleAndDriversbyID($vehicleID);
            $owner=$this->taxiBookingModel->getTaxiOwnerbyID($ownerID); 

            if(isset($owner->company_name)){
                $com_name = $owner->company_name;
            }else{
                $com_name = $owner->owner_name;
            }
            
            

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
                $_POST = filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);
                $pickupL =trim($_POST['pickupL']);
                $dropL =  trim($_POST['dropL']);

                $origin = $pickupL;
                $destination =$dropL;

                // $distance=CalculatePrice( $origin, $destination);

                // Create the URL for the Google Maps Distance Matrix API
                $url = 'https://maps.googleapis.com/maps/api/distancematrix/json?origins=' . urlencode($origin) . '&destinations=' . urlencode($destination) . '&mode=driving&units=metric&key=AIzaSyCo0cnVa0-HmEMm2M5wGXP_DQ37Z2L0teo';

                // Make a GET request to the API and decode the JSON response
                $response = json_decode(file_get_contents($url), true);

                // Get the distance in kilometers from the response
                $distance = $response['rows'][0]['elements'][0]['distance']['value'] / 1000;

                $cost = $distance*$details->price_per_km;
                $tax = ($cost*3)/100;
                $total = $cost+$tax;

                $data=[
                    's_date'=>trim($_POST['s_date']),
                    's_time'=>trim($_POST['s_time']),
                    'pickupL'=>$pickupL,
                    'dropL'=>$dropL,
                    'details'=>$details,
                    'com_name'=>$com_name,
                    'owner'=>$owner,
                    'distance'=>$distance,
                    'cost' =>$cost,
                    'tax' =>$tax,
                    'total' => $total     
                    ];
                    
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

        
       

        



    }
?>
