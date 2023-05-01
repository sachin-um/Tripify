<?php
    class HotelBookings extends Controller{
        public function __construct(){
            $this->hotelBookingModel=$this->model('M_Hotel_Bookings');
            $this->roomBookingModel=$this->model('M_Hotel_Rooms');
        }


        public function test(){
            echo "yay"."<br>";
            // echo $_POST["hotelID"]."<br>";
            $allroomtypes=$this->roomBookingModel->viewAllRooms($_POST["hotelID"]);
            // echo "test1"."<br>";
            // if(empty($allroomtypes)){
            //     echo "EMpty";
            // }else{
            //     echo "test2"."<br>";
            // }
            // echo gettype($allroomtypes) . "<br>";

            $num_rooms_array = array();
            //get the roomTypes and their respective numbers

            if($_SERVER['REQUEST_METHOD']=='POST'){
                echo "test1"."<br>";
                $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

                
                $total = 0;
                $temp = 0; 
                $newarray = array();

                //Get the total price for the booked rooms
                foreach($_POST as $value){
                    $newarray[] = $value;
                }
                
                for($i=2;$i<count($newarray);$i=$i+3){
                    $temp = $newarray[$i]*$newarray[$i+1];
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

                // print_r($bookedRoomNames);

                //Get booked room IDs
                $bookedRoomIDs = array();
                $nonZeroIndexes = array();
                foreach ($_POST as $index => $value) {
                    if ($value != 0) {
                        $nonZeroIndexes[] = $index;
                    }
                }
                // print_r($nonZeroIndexes);

                for ($i = 3; $i < count($nonZeroIndexes); $i += 3) {
                    $bookedRoomIDs[] = $nonZeroIndexes[$i];
                }

                //Array with the roomIDs
                // print_r($bookedRoomIDs);

                //Get booked 

                $data=[
                    'hotelID'=>trim($_POST['hotelID']),
                    'TravelerID'=>$_SESSION['user_id'],
                    'roomIDs'=> '',
                    'payment' =>$total,
                    'postedValues' => $_POST,
                    'noofbookedrooms' => $noofeachbookedrooms,
                    'bookedRoomIDs' => $bookedRoomIDs,
                    'bookedRoomNames' => $bookedRoomNames
                ];
                // $newArray = array();
                // foreach ($_POST as $key => $value) {
                //     $newArray[] = $key;
                //     $newArray[] = $value;
                // }

                
                // for($i = 3;$i<=count($newArray);$i+2){
                //     $roomType = $newArray[$i];
                //     $roomTypeID = 0;

                //     //Get the roomTypeID
                //     foreach($allroomtypes as $room){
                //         if($room->RoomTypeName == $roomType){
                //             $roomTypeID = $room->RoomTypeID;
                //         }
                //     }

                //     //pass the roomTypeID and get the room IDs
                //     $allroomIDs=$this->roomBookingModel->getRoomIDs($roomTypeID);

                //     //get bookings from that hotel that overlap with checkin and checkout dates 
                //     // $bookedrecords = $this->hotelBookingModel->RoomAvailabilityRecords($roomTypeID);

                //     $availabilityRecords = array();
                //     // foreach($bookedrecords as $record){
                //     //     if (!in_array($record, $availabilityRecords)){
                //     //         $availabilityRecords[] = $record;
                //     //         print_r($record);
                //     //     }
                        
                //     // }

                $this->view('hotels/v_bookingConfirm', $data);
            }
                
                

            
            

                // echo "test3"."<br>";
                // //check if the key exists
                // echo $room->RoomTypeName;
                // echo $_POST[$room->RoomTypeName];
                // if (isset($_POST[$room->RoomTypeName])) {
                //     echo "test4"."<br>";
                //     //get the no of rooms needed for each room type
                //     $num_rooms_needed = $_POST[$room->RoomTypeName];

                //     //get the respective room type ID
                //     $roomTypeID = $room->RoomTypeID;
                //     echo $roomTypeID;

                //     //Get all the roomIDs for the roomType
                //     $roomIDset = $this->roomBookingModel->getRoomIDs($roomTypeID);
                //     echo $num_rooms_needed . "<br>";


                //     if(empty($roomIDset)){
                //         echo "Empty";
                //     }else{
                //         echo "Hurrah";
                //     }
                //     // echo gettype($roomIDset) . "<br>";

                //     foreach ($roomIDset as $roomID) {
                //         echo $roomID->roomNo;
                //     }

                //     echo $num_rooms_needed . "<br>";
                //     $num_rooms_array[] = $num_rooms_needed; // Append $num_rooms to the array
                // }   
            
        }

        function bookaroom(){

            $num_rooms_array = array();
            //get the roomTypes and their respective numbers
            foreach($data['allroomtypes'] as $room){
                $num_rooms = $_POST[$room->RoomTypeName];
                $num_rooms_array[] = $num_rooms; // Append $num_rooms to the array
            }


            
            if ($_SERVER['REQUEST_METHOD']=='POST') {

                $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

                $data=[
                    'hotelID' => $_POST['hotel_id'],    //got
                    'travelerID' => $_SESSION['user_id'],   //got
                    

                    'roomIDs' => $_POST['roomID'], 
                    'paymentAmount' => '',
                    'dateAdded' => '',
                    'bookedDate' => '',
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

        function checkAvailability($roomTypeID){

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