<?php
    class Bookings extends Controller{
        public function __construct(){
            $this->taxiBookingModel=$this->model('M_Taxi_Bookings');
            $this->guideBookingModel=$this->model('M_Guide_Bookings');
            $this->hotelBookingModel=$this->model('M_Hotel_Bookings');    
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
                    flash('request_flash', 'Hotel Booking is Canceled');
                    redirect('Bookings/HotelBookings');
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
            else {
                if($this->GuideBookingModel->cancelBooking($bookingid)){
                    flash('request_flash', 'Guide Booking is Canceled');
                    redirect('Bookings/GuideBookings');
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
            else {
                if($this->taxiBookingModel->cancelBooking($bookingid)){
                    flash('request_flash', 'Taxi Booking is Canceled');
                    redirect('Bookings/TaxiBookings');
                }
            }
        }

        public function TaxiBookingPage(){
           
            $data=[
                
            ];
            $this->view('taxi/v_bookings',$data);
        }

        



    }
?>
