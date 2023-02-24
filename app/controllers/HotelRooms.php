<?php
    class HotelRooms extends Controller{
        public function __construct(){
            $this->roomModel=$this->model('M_Hotel_Rooms');
            $this->roomVar=100;
        }
        public function index(){

        }

        public function rooms(){
            $allrooms=$this->roomModel->viewall();
            // $offers=filteritems($alloffers,$_SESSION['user_type'],$_SESSION['user_id']);
            $data=[
                'allrooms'=> $allrooms
            ];
            $this->view('hotels/v_hotelviewroom',$data);
        }

        public function addroom(){
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                // echo 'register1';
                //Data validation
                $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

            
                $data=[
                        'RoomTypeID'=>rand(100000,999999),
                        'NoofBeds'=>trim($_POST['no-of-beds']),
                        'RoomType'=>trim($_POST['roomtype']),
                        'NoofGuests'=>trim($_POST['no-of-guests']),
                        'RoomSize'=>trim($_POST['roomsize']),
                        'PricePerNight'=>trim($_POST['pricepernight']),
                        'NoOfRooms'=>trim($_POST['no-of-rooms']),
                        'hotelid'=>$_SESSION['user_id'],

                        'NoofBeds_err'=>'',
                        'RoomType_err'=>'',
                        'NoofGuests_err'=>'',
                        'RoomSize_err'=>'',
                        'description_err'=>'',
                        'PricePerNight_err'=>''
    
                    ];


                

               
                    //Add a Taxi Request
                    if ($this->roomModel->addaroom($data)) {
                        flash('reg_flash', 'Room is successfully added..!');
                        redirect('HotelRooms/rooms');
                    }
                    else{
                        die('Something went wrong');
                    }              



            }
            else {
                $data=[
                    'pickuplocation'=>'',
                    'destination'=>'',
                    'date'=>'',
                    'time'=>'',
                    'description'=>'',
                    'travelerid'=>'',

                    'pickuplocation_err'=>'',
                    'destination_err'=>'',
                    'date_err'=>'',
                    'time_err'=>'',
                    'description_err'=>'',
                    'travelerid_err'=>''

                ];
                $this->view('hotels/v_hotelRooms',$data);
            }
            
        
        }

        
    }

?>