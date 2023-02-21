<?php
    class Offers extends Controller{
        public function __construct(){
            $this->taxiofferModel=$this->model('M_Taxi_Offers');
            $this->guideofferModel=$this->model('M_Guide_Offers');
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
                    flash('offer_flash', 'Offer succesfully rejeced');
                    redirect('Offers/taxioffers/'.$requestid);   
                }
                else {
                    flash('offer_flash', 'Something went wrong..!');
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
                'taxioffers'=> $offers
            ];
            
                $this->view('taxi/v_taxi_offers',$data);
            
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
                    flash('offer_flash', 'Offer succesfully rejeced');
                    redirect('Offers/taxioffers/'.$requestid);   
                }
                else {
                    flash('offer_flash', 'Something went wrong..!');
                    redirect('Offers/taxioffers/'.$requestid);   
                }
            }
        }

        
        
    }

?>
