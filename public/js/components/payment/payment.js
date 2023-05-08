var bookingType;
var booking_id;
var userid;
function paymentGateway(type,payment,bookingID,serviceProviderID,urlroot){
    bookingType = type;
    booking_id=bookingID;
    
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = ()=>{
        if(xhttp.readyState == 4){ 
            
            let obj=JSON.parse(xhttp.responseText);
            // Payment completed. It can be a successful failure.
            userid=obj["user_id"];
            console.log(userid);
            var cancel_url;
            if(type=="Taxi"){
                cancel_url=urlroot+"/Bookings/TaxiBookings/"+type+"/"+obj["userid"];
            }else if (type=="Guide") {
                cancel_url=urlroot+"/Bookings/GuideBookings/"+type+"/"+obj["userid"];
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
    
    
    if(bookingType=="Taxi"){
        // console.log("Payment completed. OrderID:" + orderId + booking_id);
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = ()=>{
            if(xhttp.readyState == 4){ 
                // let obj=JSON.parse(xhttp.responseText);
                // console.log(obj);
                window.location.href='http://localhost/Tripify/Bookings/TaxiBookings/Traveler/'+userid;
            }
        };
        xhttp.open("POST","http://localhost/Tripify/Bookings/TaxiBookingPaymentUpdate",true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("booking_id="+booking_id);
    }else if (bookingType=="Guide") {
        // console.log("Payment completed. OrderID:" + orderId + booking_id);
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = ()=>{
            if(xhttp.readyState == 4){ 
                // let obj=JSON.parse(xhttp.responseText);
                // console.log(obj);
                window.location.href='http://localhost/Tripify/Bookings/GuideBookings/Traveler/'+userid;
            }
        };
        xhttp.open("POST","http://localhost/Tripify/Bookings/GuideBookingPaymentUpdate",true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("booking_id="+booking_id);
    }
    
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