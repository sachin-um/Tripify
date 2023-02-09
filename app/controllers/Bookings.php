<?php
    class Bookings extends Controller{
        public function __construct(){
            $this->taxirequestModel=$this->model('M_Taxi_Request');
            $this->guideofferModel=$this->model('M_Guide_Offers');
        }

        public function index(){

        }

        public function guidebookings(){
            /*echo $_SESSION['user_type'];
            $alloffers=$this->guideofferModel->viewall();
            $offers=filteritems($alloffers,$_SESSION['user_type'],$_SESSION['user_id']);
            $data=[
                'guideoffers'=> $offers
            ];*/
            $this->view('guide/v_guide_bookings',$data);
        }

        

        
        
    }

?>
