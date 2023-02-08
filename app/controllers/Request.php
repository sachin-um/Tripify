<?php
    class Request extends Controller{
        public function __construct(){
            $this->taxirequestModel=$this->model('M_Taxi_Request');
            $this->guiderequestModel=$this->model('M_Guide_Request');
        }

        public function index(){

        }

        




        //View Guide Request
        public function GuideRequest(){
            $alltaxirequests=$this->guiderequestModel->viewall();
            $requests=filteritems($alltaxirequests,$_SESSION['user_type'],$_SESSION['user_id']);
            $data=[
                'guiderequests'=> $requests
            ];
            $this->view('traveler/v_view_guide_requests',$data);
        }

        //adding a Guide request
        public function addGuideRequest(){
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                //Data validation
                $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

            
                $data=[
                        'area'=>trim($_POST['area']),
                        'date'=>trim($_POST['date']),
                        'time'=>trim($_POST['time']),
                        'language'=>trim($_POST['description']),
                        'additional-details'=>trim($_POST['additional-details']),
                        'travelerid'=>trim($_POST['travelerid']),
                        'caption'=>trim($_POST['caption']),


                        'area_err'=>'',
                        'date_err'=>'',
                        'time_err'=>'',
                        'language_err'=>'',
                        'additional-details_err'=>'',
                        'travelerid_err'=>'',
                        'caption_err'=>''
    
                    ];


                //validate name
                if (empty($data['area'])) {
                    $data['area_err']='Please enter the area you want travel';
                }
                //validate email
                if (empty($data['date'])) {
                    $data['date_err']='please enter the date';
                }
                if (empty($data['language'])) {
                    $data['language_err']='please enter the language y';
                }
                if (empty($data['travelerid'])) {
                    $data['travelerid_err']='Error with traveler ID';
                }
                
                


                if (empty($data['area_err']) &&  empty($data['date_err']) && empty($data['language_err']) && empty($data['travelerid_err'])) {
                    
                    //Add a Taxi Request
                    if ($this->guiderequestModel->addguiderequest($data)) {
                        flash('reg_flash', 'Guide Request is Succusefully added..!');
                        redirect('Request/GuideRequest');
                    }
                    else{
                        die('Something went wrong');
                    }
                }
                else {
                    $this->view('traveler/v_guide_request',$data);
                }



            }
            else {
                $data=[
                    'area'=>'',
                    'date'=>'',
                    'time'=>'',
                    'language'=>'',
                    'additional-details'=>'',
                    'travelerid'=>'',
                    'caption'=>'',


                    'area_err'=>'',
                    'date_err'=>'',
                    'time_err'=>'',
                    'language_err'=>'',
                    'additional-details_err'=>'',
                    'travelerid_err'=>'',
                    'caption_err'=>''

                ];
                $this->view('traveler/v_guide_request',$data);
            }
        }

        //edit guide request
        public function editGuideRequest($request_id){
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                //Data validation
                $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

            
                $data=[
                    'area'=>trim($_POST['area']),
                    'date'=>trim($_POST['date']),
                    'time'=>trim($_POST['time']),
                    'language'=>trim($_POST['language']),
                    'additional-details'=>trim($_POST['additional-details']),
                    'travelerid'=>trim($_POST['travelerid']),
                    'caption'=>trim($_POST['caption']),
                    'request_id'=>$request_id,


                    'area_err'=>'',
                    'date_err'=>'',
                    'time_err'=>'',
                    'language_err'=>'',
                    'additional-details_err'=>'',
                    'travelerid_err'=>'',
                    'caption_err'=>''

                ];


                //validate name
                if (empty($data['area'])) {
                    $data['area_err']='Please enter the area you want travel';
                }
                //validate email
                if (empty($data['date'])) {
                    $data['date_err']='please enter the date';
                }
                if (empty($data['language'])) {
                    $data['language_err']='please enter the language y';
                }
                if (empty($data['travelerid'])) {
                    $data['travelerid_err']='Error with traveler ID';
                }
            
            


                if (empty($data['area_err']) &&  empty($data['date_err']) && empty($data['language_err']) && empty($data['travelerid_err'])) {
                    
                    //Add a Taxi Request
                    if ($this->guiderequestModel->editguiderequest($data)) {
                        flash('request_flash', 'Guide Request is Succusefully Updated..!');
                        redirect('Request/GuideRequest');
                    }
                    else{
                        die('Something went wrong');
                    }
                }
                else {
                    $this->view('traveler/v_edit_guide_request',$data);
                }



            }
            else {

                $guiderequest= $this->guiderequestModel->getGuideRequestById($request_id);
                
                if ($guiderequest->traveler_id !=$_SESSION['user_id']) {
                    flash('reg_flash', 'You need to have logged in first...');
                    redirect('Users/login');
                }
                $data=[
                    'area'=>$guiderequest->p_location,
                    'date'=>$guiderequest->date,
                    'time'=>$guiderequest->time,
                    'language'=>$guiderequest->p_language,
                    'additional-details'=>$guiderequest->description,
                    'travelerid'=>$guiderequest->traveler_id,
                    'caption'=>$guiderequest->caption,
                    'request_id'=>$request_id,


                    'area_err'=>'',
                    'date_err'=>'',
                    'time_err'=>'',
                    'language_err'=>'',
                    'additional-details_err'=>'',
                    'travelerid_err'=>'',
                    'caption_err'=>''

                ];
                $this->view('traveler/v_edit_guide_request',$data);
            }
        }

        //delete guide request
        public function deleteGuideRequest($request_id){

            $guiderequest= $this->guiderequestModel->getGuideRequestById($request_id);
            if ($guiderequest->traveler_id !=$_SESSION['user_id']) {
                flash('reg_flash', 'You need to have logged in first...');
                redirect('Users/login');
            }
            else {
                if ($this->guiderequestModel->deleteguiderequest($request_id)) {
                    flash('request_flash', 'Guide Request is Succusefully Deleted');
                    redirect('Request/TaxiRequest');
                }
                else {
                    die('Something went wrong');
                }
            }

        }





        //View taxi Request
        public function TaxiRequest(){
            $alltaxirequests=$this->taxirequestModel->viewall();
            $requests=filteritems($alltaxirequests,$_SESSION['user_type'],$_SESSION['user_id']);
            $data=[
                'taxirequests'=> $requests
            ];
            $this->view('traveler/v_view_taxi_requests',$data);
        }

        public function addTaxiRequest(){
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                //Data validation
                $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

            
                $data=[
                        'caption'=>trim($_POST['caption']),
                        'pickuplocation'=>trim($_POST['pickuplocation']),
                        'destination'=>trim($_POST['destination']),
                        'date'=>trim($_POST['date']),
                        'time'=>trim($_POST['time']),
                        'description'=>trim($_POST['description']),
                        'travelerid'=>trim($_POST['travelerid']),
                        'p-latitude'=>trim($_POST['p-latitude']),
                        'p-longitude'=>trim($_POST['p-longitude']),
                        'd-latitude'=>trim($_POST['d-latitude']),
                        'd-longitude'=>trim($_POST['d-longitude']),


                        'caption_err'=>'',
                        'pickuplocation_err'=>'',
                        'destination_err'=>'',
                        'date_err'=>'',
                        'time_err'=>'',
                        'description_err'=>'',
                        'travelerid_err'=>''
    
                    ];
                    


                //validate name
                if (empty($data['caption'])) {
                    $data['caption_err']='Add a Caption to ypur request';
                }
                if (empty($data['pickuplocation'])) {
                    $data['pickuplocation_err']='Please enter a Pickup Location';
                }
                //validate email
                if (empty($data['destination'])) {
                    $data['destination_err']='please enter a Destination';
                }
                if (empty($data['date'])) {
                    $data['date_err']='please enter a Pickup Date';
                }
                if (empty($data['time'])) {
                    $data['time_err']='please enter a Pickup Time';
                }

                if (empty($data['travelerid'])) {
                    $data['travelerid_err']='Error with traveler ID';
                }
                
                


                if (empty($data['caption_err']) && empty($data['pickuplocation_err']) &&  empty($data['destination_err']) && empty($data['date_err']) && empty($data['time_err']) && empty($data['travelerid_err'])) {
                    
                    //Add a Taxi Request
                    if ($this->taxirequestModel->addtaxirequest($data)) {
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
                    'caption'=>'',
                    'pickuplocation'=>'',
                    'destination'=>'',
                    'date'=>'',
                    'time'=>'',
                    'description'=>'',
                    'travelerid'=>'',
                    'p-latitude'=>'',
                    'p-longitude'=>'',
                    'd-latitude'=>'',
                    'd-longitude'=>'',


                    'caption_err'=>'',
                    'pickuplocation_err'=>'',
                    'destination_err'=>'',
                    'date_err'=>'',
                    'time_err'=>'',
                    'description_err'=>'',
                    'travelerid_err'=>''

                ];
                $this->view('traveler/v_taxi_request',$data);
            }
            $this->view('traveler/v_taxi_request');
        }


        //edit taxi request
        public function editTaxiRequest($request_id){
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                //Data validation
                $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

            
                $data=[
                        'pickuplocation'=>trim($_POST['pickuplocation']),
                        'destination'=>trim($_POST['destination']),
                        'date'=>trim($_POST['date']),
                        'time'=>trim($_POST['time']),
                        'description'=>trim($_POST['description']),
                        'travelerid'=>trim($_POST['travelerid']),
                        'p-latitude'=>trim($_POST['p-latitude']),
                        'p-longitude'=>trim($_POST['p-longitude']),
                        'd-latitude'=>trim($_POST['d-latitude']),
                        'd-longitude'=>trim($_POST['d-longitude']),
                        'request_id'=>$request_id,


                        'pickuplocation_err'=>'',
                        'destination_err'=>'',
                        'date_err'=>'',
                        'time_err'=>'',
                        'description_err'=>'',
                        'travelerid_err'=>''
    
                    ];
                    


                //validate name
                if (empty($data['pickuplocation'])) {
                    $data['pickuplocation_err']='Please enter a Pickup Location';
                }
                //validate email
                if (empty($data['destination'])) {
                    $data['destination_err']='please enter a Destination';
                }
                if (empty($data['date'])) {
                    $data['date_err']='please enter a Pickup Date';
                }
                if (empty($data['time'])) {
                    $data['time_err']='please enter a Pickup Time';
                }

                if (empty($data['travelerid'])) {
                    $data['travelerid_err']='Error with traveler ID';
                }
                
                


                if (empty($data['pickuplocation_err']) &&  empty($data['destination_err']) && empty($data['date_err']) && empty($data['time_err']) && empty($data['travelerid_err'])) {
                    
                    //Add a Taxi Request
                    if ($this->taxirequestModel->edittaxirequest($data)) {
                        flash('request_flash', 'Taxi Request is Succusefully Updated..!');
                        redirect('Request/TaxiRequest');
                    }
                    else{
                        die('Something went wrong');
                    }
                }
                else {
                    $this->view('traveler/v_edit_taxi_request',$data);
                }



            }
            else {

                $taxirequest= $this->taxirequestModel->getTaxiRequestById($request_id);
                
                if ($taxirequest->traveler_id !=$_SESSION['user_id']) {
                    flash('reg_flash', 'You need to have logged in first...');
                    redirect('Users/login');
                }
                $data=[
                    'pickuplocation'=>$taxirequest->pickup_location,
                    'destination'=>$taxirequest->destination,
                    'date'=>$taxirequest->date,
                    'time'=>$taxirequest->time,
                    'description'=>$taxirequest->additional_details,
                    'travelerid'=>$taxirequest->traveler_id,
                    'p-latitude'=>$taxirequest->p_latitude,
                    'p-longitude'=>$taxirequest->p_longitude,
                    'd-latitude'=>$taxirequest->d_latitude,
                    'd-longitude'=>$taxirequest->d_longitude,
                    'request_id'=>$request_id,


                    'pickuplocation_err'=>'',
                    'destination_err'=>'',
                    'date_err'=>'',
                    'time_err'=>'',
                    'description_err'=>'',
                    'travelerid_err'=>''

                ];
                $this->view('traveler/v_edit_taxi_request',$data);
            }
        }

        //delete taxi request
        public function deleteTaxiRequest($request_id){

            $taxirequest= $this->taxirequestModel->getTaxiRequestById($request_id);
            if ($taxirequest->traveler_id !=$_SESSION['user_id']) {
                flash('reg_flash', 'You need to have logged in first...');
                redirect('Users/login');
            }
            else {
                if ($this->taxirequestModel->deletetaxirequest($request_id)) {
                    flash('request_flash', 'Taxi Request is Succusefully Deleted');
                    redirect('Request/TaxiRequest');
                }
                else {
                    die('Something went wrong');
                }
            }

        }

        
        
    }

?>
