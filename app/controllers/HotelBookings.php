<?php
    class HotelBookings extends Controller{
        public function __construct(){
            $this->hotelModel=$this->model('M_Hotels');
            $this->hotelBookingModel=$this->model('M_Hotel_Bookings');
            $this->roomBookingModel=$this->model('M_Hotel_Rooms');
        }


        



        

        // public function checkRoomAvailability(){
        //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
        //         $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
        //         $checkin = trim($_POST['date-1']);
        //         $hotelID = trim($_POST['hotelID']);
        //         $_SESSION['checkin'] = $checkin;
        //         $checkout = trim($_POST['date-2']);
        //         $_SESSION['checkout'] = $checkout;
        //         $noofadults =trim($_POST['noofadults']);

        //         $profileDetails = $this->hotelModel->getProfileInfo($hotelID);
        //         $allroomtypes=$this->roomBookingModel->viewAllRooms($hotelID);
                
        //         $bookedrecords = $this->hotelBookingModel->RoomAvailabilityRecords($hotelID);

        //         //get all room types and their total number
        //         $allrooms = array();
        //         foreach($allroomtypes as $roomtype){
        //             $allrooms[] = $roomtype->RoomTypeID;
        //             $allrooms[] = $roomtype->no_of_rooms;
        //         }
        //         // print_r($allrooms)."<br>";

        //         //get bookedrecords' room types and no of them
        //         foreach($bookedrecords as $records){
        //             $roomIDs = $records->roomIDs;
        //             $bookedrooms = explode(',', $roomIDs);
        //         }
        //         //print_r($bookedrooms); 

        //         for($i=0;$i<count($allrooms);$i=$i+2){
        //             if(!empty($bookedrooms)){
        //                 for($j=0;$j<count($bookedrooms);$j=$j+2){
        //                     if($allrooms[$i]==$bookedrooms[$j]){
        //                         $allrooms[$i+1]=$allrooms[$i+1]-$bookedrooms[$j+1];
        //                     }
        //                 }
        //             }
                    
        //         }

        //         $data=[
        //             'hotelID'=>$hotelID,
        //             'profileDetails'=>$profileDetails,
        //             'profileName'=> $profileDetails->Name,
        //             'profileAddress'=> $profileDetails->Line1.", ".$profileDetails->Line2.", ".$profileDetails->District,   
        //             'allroomtypes'=> $allroomtypes,
        //             'description'=>$profileDetails->Description,
        //             'availablerooms'=>$allrooms
        //             // 'noofadults' => $data['noofadults']
        //             // 'profileName'=> $profileDetails->Name,
        //             // 'profileName'=> $profileDetails->Name
    
        //         ];
        //         $this->view('hotels/v_hotel_details_page',$data);
        //     }
    
        // }

        // function bookaroom(){

        //     $num_rooms_array = array();
        //     //get the roomTypes and their respective numbers
        //     foreach($data['allroomtypes'] as $room){
        //         $num_rooms = $_POST[$room->RoomTypeName];
        //         $num_rooms_array[] = $num_rooms; // Append $num_rooms to the array
        //     }


            
        //     if ($_SERVER['REQUEST_METHOD']=='POST') {

        //         $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

        //         $data=[
        //             'hotelID' => $_POST['hotel_id'],    //got
        //             'travelerID' => $_SESSION['user_id'],   //got
                    

        //             'roomIDs' => $_POST['roomID'], 
        //             'paymentAmount' => '',
        //             'dateAdded' => '',
        //             'bookedDate' => '',
        //             'check_in' => $_POST['checkin'],
        //             'check_out' =>$_POST['checkout'],
        //             'noofrooms' => $_POST['neededRoomCount']
        //         ];


        //         if ($this->hotelBookingModel->addHotelBooking($data)) {
        //             flash('reg_flash', 'You booking was successful');
        //             redirect('Pages/home');
        //         } else {
        //             die('Something went wrong');
        //         }
        //     }else{

        //         $data=[
        //             'hotel_id' => '',
        //             'travelerID' => $_SESSION['user_id'],
        //             'roomID' => '',
        //             'roomTypeID' => '',
        //             'payment' => '',
        //             'paymentMethod' => '',
        //             'checkInDate' => '',
        //             'checkOutDate' => '',
        //             'specialRequests' => ''
        //         ];
        //         $this->view('hotels/v_booking', $data);
        //     }
        
        // }
    }
    
    
?>

