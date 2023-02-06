<?php
    class Trips extends Controller{
        public function __construct(){

        }

        public function tripplan(){
            $this->view('traveler/v_trip_plan');
        }
    }



?>