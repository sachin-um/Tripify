<?php
    class Offers extends Controller{
        public function __construct(){
            $this->taxiofferModel=$this->model('M_Taxi_Offers');
            $this->guideofferModel=$this->model('M_Guide_Offers');

            $this->taxi_vehicleModel=$this->model('M_Taxi_Vehicle');
        }

        public function index(){

        }

        public function guideoffers($request_id=NULL){
            $alloffers=$this->guideofferModel->viewall();
            $offers=filteroffers($alloffers,$_SESSION['user_type'],$request_id);
            $data=[
                'guideoffers'=> $offers
            ];
            if ($_SESSION['user_type']=='Guide') {
                $this->view('guide/v_guide_offers',$data);
            }
            else {
                $this->view('traveler/v_guide_offers',$data);
            }
            
        }

        public function addGuideOffer($requestid){
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                //Data validation
                $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

            
                $data=[
                        'charges'=>trim($_POST['charges']),
                        'payment-option'=>trim($_POST['payment-option']),
                        'additional-info'=>trim($_POST['info']),
                        'guide_id'=>trim($_SESSION['user_id']),
                        'requestid'=>$requestid,


                        'charges_err'=>'',
                        'payment-option_err'=>'',
                        
    
                    ];
                    


                //validate name
                if (empty($data['charges'])) {
                    $data['charges_err']='Please enter a Pickup Location';
                }
                //validate email
                if (empty($data['payment-option'])) {
                    $data['payment-option_err']='please enter a Destination';
                }
                
                
                


                if (empty($data['charges_err']) &&  empty($data['payment-option_err'])) {
                    
                    //Add a Taxi Request
                    if ($this->guideofferModel->addguideoffer($data)) {
                        flash('reg_flash', 'Your Guide Offer is Succusefully added..!');
                        redirect('Offers/guideoffers');
                    }
                    else{
                        die('Something went wrong');
                    }
                }
                else {
                    $this->view('guide/v_add_guide_offer',$data);
                }



            }
            else {

                $data=[
                        'charges'=>'',
                        'payment-option'=>'',
                        'additional-info'=>'',
                        'guide_id'=>'',
                        'requestid'=>$requestid,


                        'charges_err'=>'',
                        'payment-option_err'=>'',
                        
                ];
                $this->view('guide/v_add_guide_offer',$data);
            }
            $this->view('guide/v_add_guide_offer');
        }


        public function taxioffers($request_id=NULL){
            $alloffers=$this->taxiofferModel->viewall();
            // foreach($alloffers as $key => $value)
            // {
            //     echo $key." has the value". $value;
            // }
            $offers=filteroffers($alloffers,$_SESSION['user_type'],$request_id);
            $data=[
                'taxioffers'=> $offers
            ];
            
                $this->view('taxi/v_taxi_offers',$data);
            
        }

        public function taxiMakeOffers($request_id){
            $allvehicles=$this->taxi_vehicleModel->viewall();
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                //Data validation
                $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

            
                $data=[ 
                        'VehicleID'=>trim($_POST['VehicleID']),
                        'PricePerKm'=>trim($_POST['charges']),
                        'PaymentMethod'=>trim($_POST['payment_option']),
                        'additional_details'=>trim($_POST['info']),
                        'request_id'=>$request_id,     
                        'OwnerID'=>$_SESSION['user_id']                 
                    ];


                // //validate driver
                // if (empty($data['driver'])) {
                //     $data['driver_err']='Please select a driver';
                // }
                // //validate vehicle type
                // if (empty($data['vehicleType'])) {
                //     $data['vehicleType_err']='please enter your vehicle type.';
                // }
                // //validate Model
                // if (empty($data['model'])) {
                //     $data['model_err']='Please enter your vehicle model';
                // }
                // //validate YOP
                // if (empty($data['yearofProduction'])) {
                //     $data['yearofProduction_err']="Please enter your vehicle's Year of Production.";
                // }
                // //validate vehicle number
                // if (empty($data['vehicleNumber'])) {
                //     $data['vehicleNumber_err']='please enter your vehicle Number';
                // }
                // //validate area
                // if (empty($data['area'])) {
                //     $data['area_err']='Please enter your vehicle model';
                // }    
                // //validate number of seats
                // if (empty($data['price_per_km'])) {
                //     $data['price_per_km_err']='please enter your service charges';
                // }
                // //validate price per km
                // if (empty($data['noOfSeats'])) {
                //     $data['noOfSeats_err']='please enter No of seats in your vehicle';
                // }
                
                


                // if (empty($data['driver_err']) &&  empty($data['vehicleType_err']) && empty($data['model_err']) && empty($data['yearofProduction_err']) && empty($data['vehicleNumber_err']) && empty($data['price_per_km_err']) && empty($data['noOfSeats_err'])) {
                    
                    //Add a Taxi Request
                    if ($this->taxiofferModel->makeTaxiOffer($data)) {
                        flash('vehicle_flash', 'Your Vehicle is Succusefully added..!');
                        redirect('Offers/taxioffers');
                    }
                    else{
                        die('Something went wrong');
                    }
                // }
                // else {
                //      $this->view('taxi/v_add_taxi_offer',$data);
                // }



            }
            else {
                $data=[

                    'vehicles'=> $allvehicles,
                    
                    //'vehicle_number'=>'',
                    'PricePerKm'=>'',
                    'PaymentMethod'=>'',
                    'additional_details'=>'',
                    'requestid'=>$request_id
                   
                ];
                $this->view('taxi/v_add_taxi_offer',$data);
            }
            
            
        }

        
        
    }

?>
