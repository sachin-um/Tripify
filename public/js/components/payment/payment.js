function paymentGateway(type,payment,bookingID,serviceProviderID,urlroot,userID){
    var bookingType = type;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = ()=>{
        if(xhttp.readyState == 4){ 
            
            let obj=JSON.parse(xhttp.responseText);
            // Payment completed. It can be a successful failure.
            
            if(type=="Taxi"){
                var cancel_url=urlroot+"/Bookings/TaxiBookings/"+type+"/"+obj["userid"];     // Important
            }else{
                // saveBooking(serviceProviderID,<?php echo $data['roomIDstring']?>,payment);
            }
            
            // Put the payment variables here
            var payment = {
                "sandbox": true,
                "merchant_id": "1223006",    // Replace your Merchant ID
                "return_url": urlroot+"/Pages/Home",     // Important
                "cancel_url":cancel_url,     // Important
                "notify_url": "http://sample.com/notify",
                "order_id": obj["order_id"],
                "items": "Payment to "+serviceProviderID,
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
    xhttp.open("POST",urlroot+"/Payments/paymentDetails",true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("order_id="+bookingID+"&amount="+payment+"&bookingtype="+type);
}

payhere.onCompleted = function onCompleted(orderId) {
    console.log("Payment completed. OrderID:" + orderId);
    
    
    if(type=="Taxi"){
        saveTaxiBooking(bookingID,payment);
    }else{
        // saveBooking(serviceProviderID,<?php echo $data['roomIDstring']?>,payment);
    }
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
                url: urlroot+"/HotelBookings/booking",
                data: {
                    hotelID: hotelID,
                    roomIDstring: roomIDstring,
                    payment: payment
                },
                dataType: "JSON",
                success: function(response) {
                    // alert('<?= urlrrot ?> / CustomerLocker / viewLockerArticle / ' + response);

                    if(response){
                        //traveler's booking dashboard
                        window.location = urlrrot +"/Pages/home";
                    }
                    
                    
                }
            });

}

function saveTaxiBooking(bookingID,payment){
    // ajax request liyala back end controller ekata data yawanna
    $.ajax({
                type: "POST",
                url: URLROOT +"/Bookings/TaxiBookingdetails/"+VID+"/"+serviceProviderID,
                data: {
                    bookingID: bookingID,
                    payment: payment
                },
                dataType: "JSON",
                success: function(response) {
                    // alert('<?= URLROOT ?> / CustomerLocker / viewLockerArticle / ' + response);

                    if(response){
                        //traveler's booking dashboard
                        window.location =  URLROOT+'/Pages/home';
                    }
                    
                    
                }
            });

}