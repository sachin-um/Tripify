<?php
    class payhere extends Controller{




        public function paymentDetails($payment,$bookingID,$bookingType){

            //Set bookingID according to type
            if($bookingType == "hotel"){
                $bookingID = "H".$bookingID;
            }

            $amount = $payment;
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
            $array["first_name"] = $_SESSION['user_name'];
            $array["last_name"] = "Kumara";
            $array["email"] = $_SESSION['user_email'];
            $array["phone"] = "0777123456";
            $array["address"] = "No.1, Galle Road";
            $array["city"] = "Colombo";

            $array["amount"] = $amount;
            $array["merchant_id"] = $merchant_id;
            $array["order_id"] = $bookingID;
            $array["currency"] = $currency;
            $array["hash"] = $hash;

            $jsonObj = json_encode($array); 
            echo $jsonObj;

        }

    }
   
?>