<?php
class Payments extends Controller
{
    public function __construct()
    {
        
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
}




?>