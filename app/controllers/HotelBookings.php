<?php
    class HotelBookings extends Controller{
        public function __construct(){
            $this->hotelBookingModel=$this->model('M_Hotel_Bookings');
            $this->roomBookingModel=$this->model('M_Hotel_Rooms');
        }

        public function index(){

        }

        public function bookaroom(){
            if ($_SERVER['REQUEST_METHOD']=='POST') {

                $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

                $data=[
                    'hotelID' => $_POST['hotel_id'],
                    'travelerID' => $_POST['travelerID'],
                    'roomIDs' => $_POST['roomID'],
                    'roomTypeID' => $_POST['roomTypeID'],
                    'paymentDue' => $_POST['paymentDue'],
                    'check_in' => $_POST['checkin'],
                    'check_out' =>$_POST['checkout'],
                    'noofrooms' => $_POST['neededRoomCount']
                ];


                if ($this->hotelBookingModel->addHotelBooking($data)) {
                    flash('reg_flash', 'You booking was successful');
                    redirect('Pages/home');
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

        public function checkAvailability($roomTypeID){
            echo "yes";
            // echo "<br>";
            // echo $roomTypeID;
            // echo "<br>";
            if(isset($_POST["confirm-booking-btn"])){
                //Data validation
                // $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

                $searchrecords = $this->hotelBookingModel->RoomAvailabilityRecords($roomTypeID);
                $allroomIDs = $this->roomBookingModel->viewAllIndividualRooms($roomTypeID);
                $reloadInfo = $this->roomBookingModel->viewWantedRoom($roomTypeID);

                $data=[
                    'check_in' => trim($_POST['check_in']),
                    'check_out' =>trim($_POST['check_out']),
                    'noofrooms' => trim($_POST['noofrooms']),
                    'searchrecords'=>$searchrecords,
                    'allRoomIDs'=>$allroomIDs,
                    'wantedRoom'=>$reloadInfo
                ];
      
                //array to include empty rooms
                $roomIDs = array();
                

                foreach($data['searchrecords'] as $record){
                    $checkin = $record->check_in;
                    echo $checkin;
                    $checkout = $record->check_out;
                    echo $checkout;
                    // echo "<br>";

                    if($checkin==$data['check_in'] && $checkout==$data['check_out']){
                        $roomIDs[] = $record->roomID;
                    }
                
                }


                $new_rooms = [];
                $count = 0;

                if (empty($roomIDs)){
                    $count = count($data['allRoomIDs']);
                    foreach($data['allRoomIDs'] as $record2){
                        $new_rooms[] = $record2->roomID; 
                    }
                }else{
                    foreach($data['allRoomIDs'] as $record2){ //All rooms IDs
                        foreach($roomIDs as $roomID){   //Room IDs that should be deleted
                            if($roomID==$record2->roomID){
                                continue;
                            }
                            $new_rooms[] = $record2->roomID;    //get a new array with available room IDs
                        }
                    }

                    $count = count($new_rooms);
                }          

                //count the number of available rooms
                
                echo "<br>";
                echo $count;

                $data=[
                    'check_in' => trim($_POST['check_in']),
                    'check_out' =>trim($_POST['check_out']),
                    'noofrooms' => trim($_POST['noofrooms']),
                    'searchrecords'=>$searchrecords,
                    'allRoomIDs'=>$allroomIDs,
                    'availableRoomIDs' => $new_rooms,
                    'wantedRoom'=>$reloadInfo,
                    'availableCount' =>$count
                ];

                //Check how many rooms they want and proceed
                if($data['noofrooms']<=$count){
                    // echo "yesss";
                    
                    $this->view('hotels/v_bookingConfirm', $data);
                    // $this->view('hotels/v_bookingConfirm', $data);

                    // flash('checkAvailability',"Sorry, only ".$count. " rooms are available at the moment",'');
                }else if($data['noofrooms']>$count){
                    // flash('checkAvailability','This room is available to reserve. Click continue to proceed.','');
                    $message = 'Sorry, only ' . $count . ' rooms left';
                    flash('reg_flash', $message);
                }

                

            }else {
                $data=[
                    'check_in' => '',
                    'check_out' =>'',
                    'noofrooms' => ''
                ];
                    $this->view('hotels/v_booking', $data);
            }

            

        }
    }
?>