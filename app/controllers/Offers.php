<?php
    class Offers extends Controller{
        public function __construct(){
            $this->taxiofferModel=$this->model('M_Taxi_Offers');
            $this->guideofferModel=$this->model('M_Guide_Offers');
            $this->taxi_vehicleModel=$this->model('M_Taxi_Vehicle');
            $this->taxirequestModel=$this->model('M_Taxi_Request');
            $this->guiderequestModel=$this->model('M_Guide_Request');
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
                $this->view('traveler/v_guide_offers',$data);
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
                        'guide_id'=>$_SESSION['user_id'],
                        'requestid'=>$requestid,


                        'charges_err'=>'',
                        'payment-option_err'=>'',
                        
    
                    ];
                    


                //validate name
                if (empty($data['charges'])) {
                    $data['charges_err']='Please enter the charge';
                }
                //validate email
                if (empty($data['payment-option'])) {
                    $data['payment-option_err']='please enter a payment option';
                }
                
                
                


                if (empty($data['charges_err']) &&  empty($data['payment-option_err'])) {
                    
                    //Add a Taxi Request
                    if ($this->guideofferModel->addguideoffer($data)) {
                        flash('guide_offer_flash', 'Your Guide Offer is Succusefully added..!');
                        redirect('Offers/guideoffers');
                    }
                    else{
                        $data['payment-option_err']='Something went wrong please try again';
                        $this->view('guide/v_add_guide_offer',$data);
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


        //reject guide offer
        public function rejectGuideOffer($offerid,$requestid)
        {
            $request=$this->guiderequestModel->getGuideRequestById($requestid); 
            if ($request->traveler_id!=$_SESSION['user_id']) {
                flash('reg_flash', 'Access denied..');
                redirect('Users/login');
            }
            else {
                if ($this->guideofferModel->rejectGuideOffer($offerid)) {
                    flash('guide_offer_flash', 'Offer succesfully rejeced');
                    redirect('Offers/taxioffers/'.$requestid);   
                }
                else {
                    flash('guide_offer_flash', 'Something went wrong..!');
                    redirect('Offers/taxioffers/'.$requestid);   
                }
            }
        }

        public function taxioffers($request_id=NULL){
            $alloffers=$this->taxiofferModel->viewall();            
            // foreach($alloffers as $key => $value)
            // {
            //     echo $key." has the value". $value;
            // }
            $offers=filteroffers($alloffers,$_SESSION['user_type'],$request_id);
            $data=[
                'taxioffers'=> $offers,
            ];
            

            // $offerse=$data['taxioffers'];
            
            // foreach($offerse as $taxioffer){
            //     var_dump($taxioffer->request->duration);
            // }



            // var_dump($offers);

            $this->view('taxi/v_taxi_offers',$data);
            
        }


        public function taxiMakeOffers($request_id){
            $allvehicles=$this->taxi_vehicleModel->viewall($_SESSION['user_id']);
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
                        flash('taxi_offer_flash', 'Your Offer is Succusefully added..!');
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


        //reject taxi offer
        public function rejectTaxiOffer($offerid,$requestid)
        {
            $request=$this->taxirequestModel->getTaxiRequestById($requestid); 
            if ($request->traveler_id!=$_SESSION['user_id']) {
                flash('reg_flash', 'Access denied..');
                redirect('Users/login');
            }
            else {
                if ($this->taxiofferModel->rejectTaxiOffer($offerid)) {
                    flash('taxi_offer_flash', 'Offer succesfully rejeced');
                    redirect('Offers/taxioffers/'.$requestid);   
                }
                else {
                    flash('taxi_offer_flash', 'Something went wrong..!');
                    redirect('Offers/taxioffers/'.$requestid);   
                }
            }
        }

        public function deleteOffer($id)
        {
            if ($this->guideofferModel->deleteOffer($id)) {
                flash('guide_offer_flash','Offer succesfully removed');
                redirect('Offers/guideoffers');
            }
            else {
                flash('guide_offer_flash','Something went wrong please try again..');
                redirect('Offers/guideoffers');
            }
            
        }


        


        
        
    }

?>
