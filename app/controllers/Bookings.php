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
            else {
                if($this->taxiBookingModel->cancelBooking($bookingid)){
                    flash('request_flash', 'Taxi Booking is Canceled');
                    redirect('Bookings/TaxiBookings');
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

        public function TaxiBookingPage(){
           
            $data=[
                
            ];
            $this->view('taxi/v_bookings',$data);
        }

        



    }
?>
