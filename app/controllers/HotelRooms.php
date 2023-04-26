<?php
    class HotelRooms extends Controller{
        public function __construct(){
            $this->roomModel=$this->model('M_Hotel_Rooms');
        }
        public function index(){

        }

        public function viewhotelroom($roomTypeID){
            $roomdetails=$this->roomModel->viewWantedRoom($roomTypeID);
            // $offers=filteritems($alloffers,$_SESSION['user_type'],$_SESSION['user_id']);
            $data=[
                'wantedRoom'=> $roomdetails
            ];
            $this->view('hotels/v_booking',$data);
        }

        public function addroom(){
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                // echo 'register1';
                //Data validation
                $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

            
                $data=[
                        'RoomTypeID'=>rand(100000,999999),
                        'hotelid'=>$_SESSION['user_id'],
                        'RoomName'=>trim($_POST['roomName']),
                        'RoomSize'=>trim($_POST['roomSize']),
                        'NoofGuests'=>trim($_POST['noofpeople']),
                        'NoofBeds'=>trim($_POST['total-beds']),                      
                        'PricePerNight'=>trim($_POST['pricepernight']),
                        'NoOfRooms'=>trim($_POST['noofrooms']),
                        'TwinBed'=>trim($_POST['bed1']),
                        'DoubleBed'=>trim($_POST['bed2']),
                        'QueenBed'=>trim($_POST['bed3']),
                        'KingBed'=>trim($_POST['bed4']),
                        'BunkBed'=>trim($_POST['bed5']),
                        

                        'NoofBeds_err'=>'',
                        'RoomType_err'=>'',
                        'NoofGuests_err'=>'',
                        'RoomSize_err'=>'',
                        'description_err'=>'',
                        'PricePerNight_err'=>''
    
                    ];               

                    if ($this->roomModel->addaroom($data)) {
                        flash('reg_flash', 'Room is successfully added!');
                        redirect('HotelRooms/rooms');
                    }
                    else{
                        die('Something went wrong');
                    }              



            }
            else {
                $data=[
                    'RoomName'=>'',
                    'RoomSize'=>'',
                    'NoofGuests'=>'',
                    'NoofBeds'=>'',                      
                    'PricePerNight'=>'',
                    'NoOfRooms'=>'',
                    'TwinBed'=>'',
                    'DoubleBed'=>'',
                    'QueenBed'=>'',
                    'KingBed'=>'',
                    

                    'NoofBeds_err'=>'',
                    'RoomType_err'=>'',
                    'NoofGuests_err'=>'',
                    'RoomSize_err'=>'',
                    'description_err'=>'',
                    'PricePerNight_err'=>''

                ];
                $this->view('hotels/v_dash_hotelRooms',$data);
            }
            
        
        }

        public function rooms(){            
            $allroomtypes=$this->roomModel->viewAllRooms($_SESSION['user_id']);
            for($x=0;$x<count($allroomtypes);$x++){
                $current = $allroomtypes[$x]->RoomTypeID;
                
            }
        
            $data=[
                'allroomtypes'=>$allroomtypes,
    
            ];
            $this->view('hotels/v_dash_hotelviewroom',$data);
        }

    }

?>