<?php
class Payments extends Controller
{
    public function __construct()
    {
        $this->guideBookingModel=$this->model('M_Guide_Bookings');

    }

    public function getHashForPayment(){
        $merchant_id="1222996";
        $order_id=$_POST['order_id'];
        $amount=$_POST['amount'];
        $currency="LKR";
        $merchant_secret="MzM4MDA5MjU0NTE4OTQyMTY4MzY4NTM4MDA4NTIzNjAyNDAwODE1";
        $hash = strtoupper(
           md5(
                 $merchant_id . 
                 $order_id . 
                 number_format($amount, 2, '.', '') . 
                 $currency .  
                 strtoupper(md5($merchant_secret)) 
           ) 
        );
        echo $hash;
     }

     public function GuidePayments(){
        $guidebookings=$this->guideBookingModel->getPaymentDetails();

        $data=[
            'guidebookings'=> $guidebookings
        ];

        $this->view('guide/v_guide_dash_payment',$data);
    }


     public function paymentDetails(){

      //Set bookingID according to type
      $bookingID='';
      if($_POST['bookingtype'] == "hotel"){
          $bookingID = "H".$_POST['order_id'];
      }elseif($_POST['bookingtype']=="Taxi"){
         $bookingID="T".$_POST['order_id'];
      }

      $amount = $_POST['amount'];
      // $hotelid=$hotelid;
      $merchant_id = "1223006";
      $order_id = $bookingID;
      $merchant_secret = "MTMxNjYxOTQ1NzU5MjExNzQ5MzMzMjE2NjU5NTQxNzgzNTEzMzM4";
      $currency = "LKR";

      $hash = strtoupper(
          md5(
              $merchant_id . 
              $order_id . 
              number_format($amount, 2, '.', '') . 
              $currency .  
              strtoupper(md5($merchant_secret)) 
          ) 
      );

      $array = [];
      $array["user_id"]=$_SESSION['user_id'];
      $array["first_name"] = $_SESSION['user_name'];
      $array["last_name"] = "Kumara";
      $array["email"] = $_SESSION['user_email'];
      $array["phone"] = "0777123456";
      $array["address"] = "No.1, Galle Road";
      $array["city"] = "Colombo";

      $array["userid"]=$_SESSION['user_id'];
      $array["amount"] = $amount;
      $array["merchant_id"] = $merchant_id;
      $array["order_id"] = $bookingID;
      $array["currency"] = $currency;
      $array["hash"] = $hash;


      $jsonObj = json_encode($array);
      // printr($jsonObj);
      // var_dump($jsonObj)
      echo $jsonObj;

  }




}






?>