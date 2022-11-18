<?php
    class Pages extends Controller{
        public function __construct(){
            // echo 'This is the pages controller';
        }
        public function index(){

            $data=[
                'isLoggedIn'=>false
            ];

            $this->view('hotels/v_hotelHome',$data);
        }

        public function home(){
            $this->view('hotels/v_hotelHome');
        }

        

        public function about($name,$age){
            $data=[
                'userName'=>$name,
                'userAge'=>$age
            ];
            $this->view('v_about',$data);
        }
    }

?>