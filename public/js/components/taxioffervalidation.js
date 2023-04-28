let olddateError =false;
let driverAvailableError =false;
let timeslotError= false;


$(document).ready(function() {
  validation();
});




function validation(){
  
  $('#request-offer-btn').on('click', function() {
      event.preventDefault();
      validationDateTime();
      availableTime();
      driverAvailable();

  
  });

}




function driverAvailable(){     // A driver can only drive 14 hours per day 
  const bookingDate = $('#bookingDate').val();
  var vehicleID = $('#vehicleID').val();
  var est = $('#duration').val();

  $.ajax({
    url: URLROOT+'/Bookings/checkTimeAvailability',
    method: 'POST',
    data: {
      bookingDate: bookingDate,
      est:est,
      vehicleID:vehicleID
    },
    dataType: 'json',
    success: function(result) {
      
      if (result) {
        $('#avail').html('* This vehicle reach the Limit. Please chose another vehicle');
        driverAvailableError=false;

      } else {
        driverAvailableError=true;
        $('#avail').html('');
        
      }
    },
    error: function(xhr, status, error) {
      console.log("AJAX error:", status, error);
      alert('data not received');
    }
  });
}


function availableTime(){   // Checking Time slot is Available
  

  
  var bookingDate = $('#bookingDate').val();
  const bookingTime = $('#bookingTime').val();
  const est = $('#duration').val();
  var vehicleID = $('#vehicleID').val();


    $.ajax({
      url: URLROOT+'/Bookings/checkTimeSlot',
      method: 'POST',
      data: {
        bookingDate: bookingDate,
        bookingTime: bookingTime,
        est: est,
        vehicleID:vehicleID,
       
      },
      dataType: 'json',
      success: function(result) {
        
        if (result) {
          $('#availTime').html('* Time Slot Not Available or Enough!');
          timeslotError=false;
        } else {
          $('#availTime').html('');
          timeslotError=true;
        }
     
      },
      error: function(xhr, status, error) {
        console.log("AJAX error:", status, error);
        alert('data not received');
      }
    });


}





function validationDateTime(){
  
  var bookingDate = $('#bookingDate').val(); 
  currentDate = getTodayDate();  // function is below
  currentTime = getTodayTime();
  var submitButton = document.getElementById('request-offer-btn');

  var bookingTime = $('#bookingTime').val();
  var userInputDateTime = new Date(`${bookingDate}T${bookingTime}`);
  var now = new Date(`${currentDate}T${currentTime}`);

  if (userInputDateTime < now ) {
    $('#checkdate').html('* Booking Date is Expired!');
    submitButton.style.backgroundColor = '#D55B40';
    submitButton.disabled = true;
    olddateError = false; 

  }else{
    olddateError = true; 
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




