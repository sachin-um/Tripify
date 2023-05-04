<?php require APPROOT.'/views/inc/components/header.php'; ?>
<!-- <?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?> -->

<div class="wrapper">

    <div class="content">

        <div class="hotel-room-top-picks">
            <!-- <div class="booking-header">
                <b>The rooms you requested are available for booking.</b>
            </div> -->

        <form action="">
        <div class="main-details">
                <div class="price-details">
                    <h2 style="color: green;">Price Details</h2>
                    <div class="sub-items-pricing">
                        <div class="sub-sub-items-pricing">
                            <b>Booking ID : </b><br>
                            <b>Check In Date : </b>
                        </div>
                        <div class="sub-sub-items-pricing">
                            <?php echo (string)$data['bookingID']?><br>
                            <?php echo $_SESSION['checkin']?>
                        </div>
                    </div>

                    <div class="sub-items-pricing">
                        <div class="sub-sub-items-pricing">
                            <b>Check Out Date : </b>
                        </div>
                        <div class="sub-sub-items-pricing">
                            <?php echo $_SESSION['checkout']?>
                        </div>
                    </div>

                    <div class="sub-items-pricing">
                        <div class="sub-sub-items-pricing">
                            <b>Requested Rooms : </b>
                        </div>
                        <div class="sub-sub-items-pricing">
                            <?php 
                                $roomnames = $data['bookedRoomNames'];
                                $noofroomsfromeach = $data['noofbookedrooms'];
                                for($a=0;$a<count($roomnames);$a++){
                                    echo $roomnames[$a]." - ".$noofroomsfromeach[$a]."<br>";
                                }
                            ?>
                        </div>
                    </div>

                    <div class="sub-items-pricing">
                        <div class="sub-sub-items-pricing">
                            <b>No of rooms : </b>
                        </div>
                        <div class="sub-sub-items-pricing">
                            <!-- <?php echo $data['noofrooms']?> -->
                        </div>
                    </div>

                    <div class="sub-items-pricing">
                        <div class="sub-sub-items-pricing">
                            <b>No of nights : </b>
                        </div>
                        <?php 
                            $date1 = new DateTime($_SESSION['checkin']);
                            $date2 = new DateTime($_SESSION['checkout']);
                            $nights = $date1->diff($date2);
                        ?>
                        <div class="sub-sub-items-pricing">
                            <?php echo $nights->format('%a nights');?>
                        </div>
                    </div>

                    <div class="sub-items-pricing">
                        <div class="sub-sub-items-pricing">
                            <b>Total Price : </b>
                        </div>
                        <div class="sub-sub-items-pricing">
                            <?php echo $data['payment'].".00 "?>LKR
                        </div>
                    </div>
                </div>
            </div>
            <br>

            
            <div class="hotel-reg-form-div-2">
                <button class="all-purpose-btn" type="button" style="margin: auto;" onclick="paymentGateway('Hotel')">Book Now</button>
            </div> 
        </form>
            
            
        </div>
        
    </div>

</div>

<?php require APPROOT.'/views/inc/components/footer.php'; ?>

<script src="<?php echo URLROOT ?>/js/jquery.min.js"></script>

<script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
<script>    
    function paymentGateway(type){
        var bookingType = type;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = ()=>{
            if(xhttp.readyState == 4){ 
                
                let obj=JSON.parse(xhttp.responseText);
                // Payment completed. It can be a successful failure.
                

                // Put the payment variables here
                var payment = {
                    "sandbox": true,
                    "merchant_id": "1223006",    // Replace your Merchant ID
                    "return_url": "<?php echo URLROOT?>/Hotels/showHotels",     // Important
                    "cancel_url": "<?php echo URLROOT?>/Hotels/showHotels",     // Important
                    "notify_url": "http://sample.com/notify",
                    "order_id": obj["order_id"],
                    "items": "Payment to <?php echo $data['hotelID']?>",
                    "amount": obj["amount"],
                    "currency": obj["currency"],
                    "hash": obj["hash"], // *Replace with generated hash retrieved from backend
                    "first_name": obj["first_names"],
                    "last_name": obj["last_name"],
                    "email": obj["email"],
                    "phone": obj["phone"],
                    "address": obj["address"],
                    "city": obj["city"],
                    "country": "Sri Lanka",
                    "delivery_address": "No. 46, Galle road, Kalutara South",
                    "delivery_city": "Kalutara",
                    "delivery_country": "Sri Lanka",
                    "custom_1": "",
                    "custom_2": type
                };

                payhere.startPayment(payment);
            }
        };
        xhttp.open("GET","<?=URLROOT?>/payhere/paymentDetails/"+<?php echo $data['payment']?>+
        "/"+<?php echo $data['bookingID']?>+"/"+type,true);
        xhttp.send();
    }

    payhere.onCompleted = function onCompleted(orderId) {
        console.log("Payment completed. OrderID:" + orderId);
        
        saveBooking(<?php echo $data['hotelID']?>,<?php echo $data['roomIDstring']?>,<?php echo $data['payment']?>);
        // Note: validate the payment and show success or failure page to the customer
    };

    // Payment window closed
    payhere.onDismissed = function onDismissed() {
        // Note: Prompt user to pay again or show an error page
        console.log("Payment dismissed");
    };

    // Error occurred
    payhere.onError = function onError(error) {
        // Note: show an error page
        console.log("Error:"  + error);
    };

    function saveBooking(hotelID,roomIDstring,payment){
        // ajax request liyala back end controller ekata data yawanna
        $.ajax({
                    type: "POST",
                    url: "<?= URLROOT ?>/HotelBookings/booking",
                    data: {
                        hotelID: hotelID,
                        roomIDstring: roomIDstring,
                        payment: payment
                    },
                    dataType: "JSON",
                    success: function(response) {
                        // alert('<?= URLROOT ?> / CustomerLocker / viewLockerArticle / ' + response);

                        if(response){
                            //traveler's booking dashboard
                            window.location = '<?= URLROOT ?>/Pages/home';
                        }
                        
                        
                    }
                });

    }
</script>

