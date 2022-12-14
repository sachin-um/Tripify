<?php
    class Offers extends Controller{
        public function __construct(){
            $this->taxirequestModel=$this->model('M_Taxi_Request');
            $this->guideofferModel=$this->model('M_Guide_Offer');
        }

        public function index(){

        }

        public function guideoffers(){
            $alloffers=$this->guideofferModel->viewall();
            $offers=filteritems($alloffers,$_SESSION['user_type'],$_SESSION['user_id']);
            $data=[
                'guideoffers'=> $offers
            ];
            $this->view('guide/v_guide_offers',$data);
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
                        flash('reg_flash', 'Taxi Request is Succusefully added..!');
                        redirect('Request/TaxiRequest');
                    }
                    else{
                        die('Something went wrong');
                    }
                }
                else {
                    $this->view('traveler/v_taxi_request',$data);
                }



            }
            else {

                $data=[
                        'charges'=>trim($_POST['charges']),
                        'payment-option'=>'',
                        'additional-info'=>'',
                        'guide_id'=>'',
                        'requestid'=>'',


                        'charges_err'=>'',
                        'payment-option_err'=>'',
                        
                ];
                $this->view('guide/v_add_guide_offer',$data);
            }
            $this->view('guide/v_add_guide_offer');
        }

        
        
    }

?>
