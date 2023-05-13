<?php
    class HotelRooms extends Controller{
        public function __construct(){
            $this->roomModel=$this->model('M_Hotel_Rooms');
        }
        public function index(){

        }

        //View room details for hotel owner
        public function viewhotelroom($userType,$roomTypeID){
            $roomdetails=$this->roomModel->viewWantedRoom($roomTypeID);
            $beds = $this->roomModel->getBeds($roomTypeID);
            $images = $this->roomModel->getImages($roomTypeID);

            // $offers=filteritems($alloffers,$_SESSION['user_type'],$_SESSION['user_id']);
            $data=[
                'wantedRoom'=> $roomdetails,
                'beds'=> $beds,
                'images'=> $images
            ];

            if($userType=='Hotel'){
                $this->view('hotels/v_viewHotelRoom',$data);
            }else{
                $this->view('hotels/v_viewHotelRoomforUser',$data);
            }
            
        }


        public function addroom(){
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                // echo 'register1';
                //Data validation
                $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);
                $farray = implode(",",$_POST['facilities']);
                print_r($farray);
            
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
                        'facilities'=>$farray,
                        

                        'NoofBeds_err'=>'',
                        'RoomType_err'=>'',
                        'NoofGuests_err'=>'',
                        'RoomSize_err'=>'',
                        'description_err'=>'',
                        'PricePerNight_err'=>''
    
                    ];               

                    if ($this->roomModel->addaroom($data)) {
                        flash('room_add_flash', 'Room is successfully added!');
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

        //View all rooms for hotel owner
        public function rooms(){            
            $allroomtypes=$this->roomModel->viewAllRooms($_SESSION['user_id']);
            // $images = $this->roomModel->getImages($roomTypeID);
            // print_r($allroomtypes);

            $roomtypeImgs = array();
            foreach($allroomtypes as $roomType){
                $roomtypeImgs[] = $this->roomModel->getImages($roomType->RoomTypeID);
            }

            $imgNames = array();
            foreach($roomtypeImgs as $one){
                foreach($one as $type){
                    $imgNames[] = $type->imgName;
                    break;
                }
                              
            }

            $data=[
                'allroomtypes'=>$allroomtypes,
                'images'=>$imgNames
            ];
            $this->view('hotels/v_dash_hotelviewroom',$data);
        }

        public function editHotelRoomDetails(){
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

                $data=[
                    'price' => trim($_POST['price']),
                    'size' => trim($_POST['size']),
                    'guests' => trim($_POST['guests']),
                    'noofrooms' => trim($_POST['noofrooms']),
                    'id' => trim($_POST['id'])
                ];

                if ($this->roomModel->editRoom($data)) {
                    flash('reg_flash', 'Room is successfully edited.');
                    redirect('HotelRooms/viewhotelroom');
                }
                else{
                    die('Something went wrong');
                }
            }
        }

        public function uploadPhotographs(){
            if(isset($_POST['submit'])){
                // print_r($_FILES);
                $imageCount = count($_FILES['image']['name']);
                // echo $imageCount;

                for($i=0;$i<$imageCount;$i++){
                    $imageName = $_FILES['image']['name'][$i];
                    $imageTempName = $_FILES['image']['tmp_name'][$i];
                    $targetPath = "C:/xampp/htdocs/Tripify/public/img/hotel-uploads/".$imageName;
                    if(move_uploaded_file($imageTempName, $targetPath)){
                        $this->hotelModel->insertingImages($hotelID,$imageName);                            
                    }
                }
             
            }

            redirect('Pages/profile'); 
        }



    }

?>