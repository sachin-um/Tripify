let olddateError =false;
let timeslotError= false;
let passengersError =false;


function validation(vID,bd,bt,est,offerID,request_id,passengers,seats){
   
  event.preventDefault(); 
  passengersValidation(passengers,seats,offerID);
  availableTime(vID,bd,bt,est,offerID,request_id);

}

function sentCont(offerID,request_id){

  const submitButton = document.getElementById('request-offer-btn-'+offerID);

  if(olddateError && timeslotError && passengersError){           // validation 
    submitButton.style.backgroundColor = '#0F6C13';
    submitButton.style.color = 'white';
    window.location.href = URLROOT+'/Bookings/acceptTaxiOffer/' + offerID + '/' +request_id;
  }else{
    submitButton.style.backgroundColor = '#931111';
    submitButton.style.color = 'white';
  }
  
}


function availableTime(vID,bd,bt,est,offerID,request_id){  // checking can traveler place the booking in that time slot

  $.ajax({
    url: URLROOT+'/Bookings/checkTimeSlot',
    method: 'POST',
    data: {
      bookingDate: bd,
      bookingTime: bt,
      est: est,
      vehicleID:vID,
     
    },
    dataType: 'json',
    success: function(result) {
      
      if (result) {
        timeslotError=false;
        $('#availTime-'+offerID).html('* Time Slot Not Available or Enough!');
        $('#availTime-' + offerID).css('display', 'inline');
        
      } else {
        timeslotError=true;
        $('#availTime-'+offerID).html('');
        $('#availTime-' + offerID).css('display', 'none');

        
      }

      dateExpire(bd,bt,offerID,request_id);
      
    },
    error: function(xhr, status, error) {
      console.log("AJAX error:", status, error);
      alert('data not received');
    }
  });

}




function dateExpire(bd,bt,offerID,request_id){
  
  currentDate = getTodayDate();  // function is below
  currentTime = getTodayTime();
  

  var userInputDateTime = new Date(`${bd}T${bt}`);
  var now = new Date(`${currentDate}T${currentTime}`);

  if (userInputDateTime < now ) {
    olddateError = false; 
    $('#checkdate-'+offerID).html('* Booking Date is Expired!');
    $('#checkdate-' + offerID).css('display', 'inline');
    
  }else{
    olddateError = true; 
    $('#checkdate-' + offerID).css('display', 'none');
  }
  sentCont(offerID,request_id);

}

function passengersValidation(passengers,seats,offerID){

  
      console.log(passengers+' '+seats+' '+offerID);
      console.log(passengers>seats);
        if (passengers>seats) {
          passengersError=false;
          $('#availSeats-'+offerID).html('* Seats Not Enough in this Vehicle');
        } else {
          passengersError=true;
          $('#availSeats-'+offerID).html('');
          
        }
     

} 


function getTodayDate(){
    const today = new Date();
    const year = today.getFullYear();
    const month = ("0" + (today.getMonth() + 1)).slice(-2); 
    const day = ("0" + today.getDate()).slice(-2); 

    const currentDate = `${year}-${month}-${day}`;
    return currentDate;
}


function getTodayTime(){
  const today = new Date();
  const hours = ("0" + today.getHours()).slice(-2); 
  const minutes = ("0" + today.getMinutes()).slice(-2); 
  const seconds = ("0" + today.getSeconds()).slice(-2); 
  const currentTime = `${hours}:${minutes}:${seconds}`;
  return currentTime;

}



