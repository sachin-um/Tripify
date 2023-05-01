<?php
    class Trips extends Controller{
        public function __construct(){
            $this->tripModel=$this->model('M_Trips');
            $this->guideBookingModel=$this->model('M_Guide_Bookings');
            $this->taxiBookingModel=$this->model('M_Taxi_Bookings');
            $this->hotelBookingModel=$this->model('M_Hotel_Bookings');
            if (empty($_SESSION['user_id'])) {
                flash('reg_flash', 'You need to have logged in first...');
                redirect('Users/login');
            }
            elseif ($_SESSION['user_type']!='Traveler') {
                flash('reg_flash', 'You need to be register as a Traveler ...');
                redirect('Pages/home');
            }
        }

        public function index(){

        }

        public function tripplan(){
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);
                $data=[
                    'trip_name'=>trim($_POST['trip_name']),
                    'trip_location'=>trim($_POST['trip_location']),
                    'start_date'=>trim($_POST['trip_startdate']),
                    'end_date'=>trim($_POST['trip_enddate']),
                    'traveler_id'=>$_SESSION['user_id'],
                    'trip_id'=>'',

                    'view'=>1,

                    'trip_err'=>'',
                ];

                if (empty($data['trip_name']) || empty($data['trip_location']) || empty($data['start_date']) || empty($data['end_date'])) {
                    $data['trip_err']='Please Provide Valid Details About your trip';
                }

                if (empty($data['trip_err'])) {
                    $trip_id=$this->tripModel->createAtrip($data);
                    if ($trip_id) {
                        $data['trip_id']=$trip_id;
                        $this->view('traveler/v_trip_plan',$data);
                    }
                    else {
                        
                        flash('trip_flash', 'Somthing went Wrong please try again');
                        redirect('Trips/tripplan');
                    }
                }
                else {
                    $this->view('traveler/v_trip_plan',$data);
                    
                }

            }
            else {
                $data=[
                    'trip_name'=>'',
                    'trip_location'=>'',
                    'start_date'=>'',
                    'end_date'=>'',
                    'traveler_id'=>'',

                    'trip_err'=>'',

                ];
                $this->view('traveler/v_trip_plan',$data);
            }
            
        }

        public function viewTripPlan($tripid)
        {
            
            $trip=$this->tripModel->viewTripPlan($tripid);
            if ($trip->TravelerID==$_SESSION['user_id']) {
                
                $data=[
                    'trip_name'=>$trip->trip_name,
                    'trip_location'=>$trip->location,
                    'start_date'=>$trip->start_date,
                    'end_date'=>$trip->end_date,
                    'traveler_id'=>$trip->TravelerID,
                    'trip_id'=>$trip->TourPlanID,
    
                    'view'=>1,
                    'guide_bookings'=>array(),
                    'hotel_bookings'=>array(),
                    'taxi_bookings'=>array(),
    
                    'trip_err'=>'',
                ];
                foreach ($trip->trip_guide_bookings as $booking) {
                    $trip_booking=$this->guideBookingModel->getGudieBookingbyId($booking->trip_id);
                    array_push($data['guide_bookings'],$trip_booking);
                }
                foreach ($trip->trip_taxi_bookings as $booking) {
                    $trip_booking=$this->taxiBookingModel->getTaxiBookingbyId($booking->trip_id);
                    array_push($data['taxi_bookings'],$trip_booking);
                }
                foreach ($trip->trip_hotel_bookings as $booking) {
                    $trip_booking=$this->hotelBookingModel->getHotelBookingbyId($booking->trip_id);
                    array_push($data['hotel_bookings'],$trip_booking);
                }
                print_r($data);
                $this->view('traveler/v_trip_plan',$data);
            } else {
                flash('reg_flash', 'Access Denied');
                redirect('Users/login');
            }
            
            
            
        }


        public function addToTripPlan($bookingid,$type,$tripid)
        {
            
            if ($this->tripModel->addToTripPlan($bookingid,$type,$tripid)==="duplicate"){
                flash('booking_flash', 'Booking was already added');
                switch ($type) {
                    case 'guide':
                        redirect('Bookings/GuideBookings/'.$_SESSION['user_type'].'/'.$_SESSION['user_id']);   
                        break;
                    case 'taxi':
                        redirect('Bookings/TaxiBookings/'.$_SESSION['user_type'].'/'.$_SESSION['user_id']);   
                        break;
                    case 'hotel':
                        redirect('Bookings/HotelBookings/'.$_SESSION['user_type'].'/'.$_SESSION['user_id']);   
                        break;
                }
            }
            elseif ($this->tripModel->addToTripPlan($bookingid,$type,$tripid)) {
                flash('booking_flash', 'Booking was added to Trip plan');
                switch ($type) {
                    case 'guide':
                        redirect('Bookings/GuideBookings/'.$_SESSION['user_type'].'/'.$_SESSION['user_id']);   
                        break;
                    case 'taxi':
                        redirect('Bookings/TaxiBookings/'.$_SESSION['user_type'].'/'.$_SESSION['user_id']);   
                        break;
                    case 'hotel':
                        redirect('Bookings/HotelBookings/'.$_SESSION['user_type'].'/'.$_SESSION['user_id']);   
                        break;
                }
            } 
            else {
                flash('booking_flash', 'Somthing went wrong try again');
                switch ($type) {
                    case 'guide':
                        redirect('Bookings/GuideBookings/'.$_SESSION['user_type'].'/'.$_SESSION['user_id']);   
                        break;
                    case 'taxi':
                        redirect('Bookings/TaxiBookings/'.$_SESSION['user_type'].'/'.$_SESSION['user_id']);   
                        break;
                    case 'hotel':
                        redirect('Bookings/HotelBookings/'.$_SESSION['user_type'].'/'.$_SESSION['user_id']);   
                        break;
                }
            }
            
        }

        public function removeFromTripPlan($tripid,$bookingid,$type)
        {
            $trip=$this->tripModel->viewTripPlan($tripid);
            if ($trip->TravelerID==$_SESSION['user_id']) {
                if ($this->tripModel->removeFromTripPlan($tripid,$bookingid,$type)) {
                    flash('trip_flash', 'Booking Removed');
                    redirect('Trips/viewTripPlan/'.$tripid);
                } else {
                    flash('trip_flash', 'Somthing went wrong please try again..!');
                    redirect('Trips/viewTripPlan/'.$tripid);
                }
                
            } else {
                flash('reg_flash', 'Access Denied');
                redirect('Users/login');
            }
        }
            
        
        
        public function yourtrips()
        {
            $trips=$this->tripModel->yourtrips();
            $data=[
                'trips'=> $trips
            ];
            $this->view('traveler/v_dash_trip_plans',$data);
            
        }



        public function gettrips()
        {
            $trips=$this->tripModel->yourtrips();
            header('Content-Type: application/json');
            echo json_encode($trips);
        }
        
    }



?>