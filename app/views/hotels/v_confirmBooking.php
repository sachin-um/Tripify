<?php require APPROOT.'/views/inc/components/header.php'; ?>
<!-- <?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?> -->

<div class="wrapper">
    <div class="content" id="confirm-booking-content">
        <div class="main-details">
            <div class="first-div">
                <h2 style="color: green; margin-top: 15px;">Booking Details</h2>

                <!-- <?php 
                echo gettype($data['bookedRoomIDs']);
                print_r($data['bookedRoomIDs']) ;
                ?> -->

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
                        <b>Requested Rooms : </b>
                    </div>
                    <div class="sub-sub-items-pricing">
                        <?php 
                            $roomnames = $data['bookedRoomNames'];
                            $noofroomsfromeach = $data['noofbookedrooms'];
                            for($a=0;$a<count($roomnames);$a++){
                                echo $roomnames[$a]." x ".$noofroomsfromeach[$a]."<br>";
                            }
                        ?>
                    </div>
                </div>

                <div class="sub-items-pricing">
                    <div class="sub-sub-items-pricing">
                        <b>No of rooms : </b>
                    </div>
                    <div class="sub-sub-items-pricing">
                        <?php 
                        $count = 0;
                        for($a=0;$a<count($roomnames);$a++){
                            $count = $count + $noofroomsfromeach[$a];
                        }

                        echo $count;
                        ?>
                        
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

                <div class="sub-items-pricing">
                    <div class="sub-sub-items-pricing">
                        <b>Payment Method : </b>
                    </div>

                    <div class="sub-sub-items-pricing">
                        <select id="booking-method-select">
                            <option><b>Online</b></option>
                            <option><b>On Site</b></option>
                        </select>
                    </div>
                </div>
                <br>
            </div>

            <div class="second-div">
                <h3 style="color: green; margin-top: 10px;">Any special requests?</h3>
                <p>*Please note that special requests can't be guaranteed.
                </p>

                <textarea name="hotel-requests" rows="9"
                placeholder="I want an extra single bed.."></textarea>
            </div>
            

        </div>
    
        <br><br>
        <div class="hotel-reg-form-div-2">
            <button class="all-purpose-btn" id="payBtn" type="button" style="margin: auto;">Book Now</button>
            <!-- onclick="paymentGateway('Hotel')" -->
        </div>

    </div>
</div>

<script src="<?php echo URLROOT ?>/js/jquery.min.js"></script>

<script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>

<script>   
    var paymentMethod = document.getElementById("booking-method-select");
    var payBtn = document.getElementById("payBtn");

    payBtn.addEventListener("click", function() {
        console.log("HI");
        var selectedValue = paymentMethod.value;

        if (selectedValue == "Online") {
            paymentGateway('Hotel');
        } else if (selectedValue == "On Site") {
            save(<?php echo $data['hotelID']?>, <?php echo $data['payment']?>,0);
        }
    });

    function paymentGateway(type){ 
        var bookingType = type;
        console.log(type);
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = ()=>{
            console.log("test3");
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
        xhttp.open("GET","<?php echo URLROOT?>/payhere/paymentDetails/"+<?php echo $data['payment']?>+
        "/"+<?php echo $data['bookingID']?>+"/"+type,true);
        xhttp.send();
        console.log("test4");
    }

    payhere.onCompleted = function onCompleted(orderId) {
        console.log("Payment completed. OrderID:" + orderId);        
        save(<?php echo $data['hotelID']?>, <?php echo $data['payment']?>,1);
        // Note: validate the payment and show success or failure page to the customer
    };

    payhere.onDismissed = function onDismissed() {
        // Note: Prompt user to pay again or show an error page
        console.log("Payment dismissed");
    };

    // Error occurred
    payhere.onError = function onError(error) {
        // Note: show an error page
        console.log("Error:"  + error);
    };

    function save(hotelID,payment,mode){
        console.log(hotelID);
        console.log(payment);
        console.log(mode);
                
        $.ajax({
            type: "POST",
            url: "<?php echo URLROOT ?>/Bookings/booking",
            data: {
                hotelID: hotelID,
                payment: payment,
                paymentMethod: mode
            },
            dataType: "JSON",
            success: function(response) {
                
                if(response){
                    alert(response);
                    // window.location = '<?= URLROOT ?>/Bookings/HotelBookings/Traveler/<?php echo $_SESSION['user_id']?>';

                }else{
                    alert("Failed");
                }
                // console.log(response);
                

            },
            error:function () {
                alert("Error"); 
            }
        });


                // 
            
       

        // $.ajax({ 
        //     type: "POST",
        //     url: "<?php echo URLROOT;?>/Bookings/booking",
        //     data: {
        //         hotelID: hotelID,
        //         payment: payment,
        //         paymentMethod: paymentMethod
        //     },
        //     dataType: "JSON",
        //     success: function(response) {                

        //         if(response){
        //             //traveler's booking dashboard
        //             window.location = '<?php echo URLROOT ?>/Pages/home';
        //         }                
                
        //     },
        //     error:function () {
        //         alert("Error"); 
        //     }
        // });
    }

</script>
