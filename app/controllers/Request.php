<?php
    class Request extends Controller{
        public function __construct(){
            $this->taxirequestModel=$this->model('M_Taxi_Request');
            $this->guiderequestModel=$this->model('M_Guide_Request');
        }

        public function index(){

        }

        public function TaxiRequest(){
            $taxirequests=$this->taxirequestModel->viewall();
            $data=[
                'taxirequests'=> $taxirequests
            ];
            $this->view('traveler/v_view_taxi_requests',$data);
        }

        public function addTaxiRequest(){
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
                $this->view('traveler/v_taxi_request',$data);
            }
            $this->view('traveler/v_taxi_request');
        }

        public function viewTaxiRequest(){
            $this->view('traveler/v_view_taxi_requests');
        }
        
    }

?>
