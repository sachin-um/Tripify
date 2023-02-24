<?php
    class HotelBookings extends Controller{
        public function __construct(){
            $this->hotelBookingModel=$this->model('M_Hotel_Bookings');
        }

        public function index(){

        }

        public function bookaroom(){
            if ($_SERVER['REQUEST_METHOD']=='POST') {

                $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

                $data=[
                    'hotel_id' => '',
                    'travelerID' => $_SESSION['user_id'],
                    'roomID' =>'',
                    'roomTypeID' =>'',
                    'payment' => '',        //trim($_POST['name'])
                    'paymentMethod' => '',
                    'checkInDate' => '',
                    'checkOutDate' => '',
                    'specialRequests' => ''
                ];

                if ($this->hotelBookingModel->addHotelBooking($data)) {
                    flash('reg_flash', 'You booking was successful');
                    redirect('Hotels/login');
                } else {
                    die('Something went wrong');
                }
            }else{

                $data=[
                    'hotel_id' => '',
                    'travelerID' => $_SESSION['user_id'],
                    'roomID' => '',
                    'roomTypeID' => '',
                    'payment' => '',
                    'paymentMethod' => '',
                    'checkInDate' => '',
                    'checkOutDate' => '',
                    'specialRequests' => ''
                ];
                $this->view('hotels/v_booking', $data);
            }
        }
    }
?>