
<script>

    function paymentGateway(type){  
        var bookingType = type;
        console.log(type);
        // var xhttp = new XMLHttpRequest();
        // xhttp.onreadystatechange = ()=>{
        //     if(xhttp.readyState == 4){ 
                
        //         let obj=JSON.parse(xhttp.responseText);
        //         // Payment completed. It can be a successful failure.
                

        //         // Put the payment variables here
        //         var payment = {
        //             "sandbox": true,
        //             "merchant_id": "1223006",    // Replace your Merchant ID
        //             "return_url": "<?php echo URLROOT?>/Hotels/showHotels",     // Important
        //             "cancel_url": "<?php echo URLROOT?>/Hotels/showHotels",     // Important
        //             "notify_url": "http://sample.com/notify",
        //             "order_id": obj["order_id"],
        //             "items": "Payment to <?php echo $data['hotelID']?>",
        //             "amount": obj["amount"],
        //             "currency": obj["currency"],
        //             "hash": obj["hash"], // *Replace with generated hash retrieved from backend
        //             "first_name": obj["first_names"],
        //             "last_name": obj["last_name"],
        //             "email": obj["email"],
        //             "phone": obj["phone"],
        //             "address": obj["address"],
        //             "city": obj["city"],
        //             "country": "Sri Lanka",
        //             "delivery_address": "No. 46, Galle road, Kalutara South",
        //             "delivery_city": "Kalutara",
        //             "delivery_country": "Sri Lanka",
        //             "custom_1": "",
        //             "custom_2": type
        //         };

        //         payhere.startPayment(payment);
        //     }
        // };
        // xhttp.open("GET","<?php echo URLROOT?>/payhere/paymentDetails/"+<?php echo $data['payment']?>+
        // "/"+<?php echo $data['bookingID']?>+"/"+type,true);
        // xhttp.send();
    }

    payhere.onCompleted = function onCompleted(orderId) {
        console.log("Payment completed. OrderID:" + orderId);
        
        // saveBooking(<?php echo $data['hotelID']?>,1);
        // Note: validate the payment and show success or failure page to the customer
    };

    // Payment window closed
    

    function saveBooking(hotelID,paymentMethod){
        // ajax request liyala back end controller ekata data yawanna
        $.ajax({
                    type: "POST",
                    url: "<?php echo URLROOT ?>/Bookings/booking",
                    data: {
                        hotelID: hotelID,
                        roomIDs: <?php echo $data['bookedRoomIDs']?>,
                        payment: <?php echo $data['payment']?>,
                        paymentMethod: paymentMethod
                    },
                    dataType: "JSON",
                    success: function(response) {
                        

                        if(response){
                            //traveler's booking dashboard
                            window.location = '<?php echo URLROOT ?>/Pages/home';
                        }
                        
                        
                    },
                    error:function () {
                       alert("Error"); 
                    }
                });

    }

</script>


<?php require APPROOT.'/views/inc/components/footer.php'; ?>