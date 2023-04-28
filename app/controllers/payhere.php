<?php
    class payhere extends Controller{




        public function paymentDetails($payment){

            $amount = $payment;
            // $hotelid=$hotelid;
            $merchant_id = "1223006";
            $order_id = uniqid();
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
            $array["items"] = "Door bell wireles";
            $array["first_name"] = "Saman";
            $array["last_name"] = "Kumara";
            $array["email"] = "saman@gmail.com";
            $array["phone"] = "0777123456";
            $array["address"] = "No.1, Galle Road";
            $array["city"] = "Colombo";

            $array["amount"] = $amount;
            $array["merchant_id"] = $merchant_id;
            $array["order_id"] = $order_id;
            $array["currency"] = $currency;
            $array["hash"] = $hash;

            $jsonObj = json_encode($array); 
            echo $jsonObj;

        }

    }
   
?>