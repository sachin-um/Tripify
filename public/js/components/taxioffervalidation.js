let olddateError =false;
let driverAvailableError =false;
let timeslotError= false;


$(document).ready(function() {
  inputOrder();
  validation();
});




function validation(){
  
  const dateInput = document.getElementById('bookingDate');
  const timeInput = document.getElementById('bookingTime');
  const pickL = document.getElementById('taxi-PL');
  const dropL = document.getElementById('taxi-DL');

  

  $('#taxi-DL').on('click', function() {
    $('#availTime').html('');
    validationDateTime();
    
    
  });

  $('#taxi-get-price-but').on('click', function() {

    if(pickL.value && dropL.value && dateInput.value && timeInput.value){
      event.preventDefault();
      availableTime();
      driverAvailable();
      finalValidation();

    }else{
      $('#availTime').html('Something went wrong Please try again!');
      event.preventDefault();
      
    }

  
  });

  $('#taxi-PL').on('change', function() {
    $('#availTime').html('');
    
  });

  $('#taxi-DL').on('change', function() {
    $('#availTime').html('');
    
    
  });


  


}




function driverAvailable(){     // A driver can only drive 14 hours per day 
  const bookingDate = $('#bookingDate').val();
  const bookingTime = $('#bookingTime').val();
  const pickupLocationInput = document.querySelector('#taxi-PL');
  const pickupLocationValue = pickupLocationInput.value;

  const dropupLocationInput = document.querySelector('#taxi-DL');
  const dropLocationValue = dropupLocationInput.value;

  $.ajax({
    url: URLROOT+'/Bookings/checkTimeAvailability',
    method: 'POST',
    data: {
      bookingDate: bookingDate,
      bookingTime: bookingTime,
      pickL: pickupLocationValue,
      dropL:dropLocationValue,
      vehicleID:vehicleID
    },
    dataType: 'json',
    success: function(result) {
      
      if (result) {
        $('#availTime').html('This vehicle reach the Limit. Please chose another vehicle');
        driverAvailableError=false;

      } else {
        driverAvailableError=true;
        $('#availTime').html('');
        finalValidation();
        
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
  const pickupLocationInput = document.querySelector('#taxi-PL');
  const pickupLocationValue = pickupLocationInput.value;

  const dropupLocationInput = document.querySelector('#taxi-DL');
  const dropLocationValue = dropupLocationInput.value;



    $.ajax({
      url: URLROOT+'/Bookings/check',
      method: 'POST',
      data: {
        bookingDate: bookingDate,
        bookingTime: bookingTime,
        vehicleID:vehicleID,
        pickL: pickupLocationValue,
        dropL:dropLocationValue
      },
      dataType: 'json',
      success: function(result) {
        
        if (result) {
          $('#avail').html('Time Slot Not Available or Enough!');
          timeslotError=false;
        } else {
          $('#avail').html('');
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

  const bookingTime = $('#bookingTime').val();
  const userInputDateTime = new Date(`${bookingDate}T${bookingTime}`);
  const now = new Date(`${currentDate}T${currentTime}`);


  if (userInputDateTime < now ) {
    $('#avail').html('Please Enter Valid Date/Time');
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




