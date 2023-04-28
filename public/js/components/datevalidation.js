let olddateError =false;
let driverAvailableError =false;
let timeslotError= false;


$(document).ready(function() {
  inputOrder();
  validation();
  finalValidation();



});

function finalValidation(){
  const form = document.getElementById('taxi-booking-form');
  const submitButton = document.getElementById('taxi-get-price-but');

  if(olddateError && driverAvailableError && timeslotError){           // validation 
    submitButton.style.backgroundColor = '#0F6C13';
    form.submit();
  }else{
    submitButton.style.backgroundColor = '#03002E';
  }
}



function validation(){
  
  const dateInput = document.getElementById('bookingDate');
  const timeInput = document.getElementById('bookingTime');
  const pickL = document.getElementById('taxi-PL');
  const dropL = document.getElementById('taxi-DL');

  $('#bookingTime').on('change', function() {
    $('#avail').html('');
    if (timeInput.value) {
      validationDateTime();
    }
    
  });

  $('#bookingDate').on('click', function() {
    $('#avail').html('');
    if (dateInput.value) {
      validationDateTime();
    }
    
  });

  $('#taxi-PL').on('click', function() {
    $('#availTime').html('');
    if (dateInput.value && dateInput.value) {
      validationDateTime();
    }
    
    
  });

  $('#taxi-DL').on('click', function() {
    $('#availTime').html('');
    if (dateInput.value && dateInput.value) {
      validationDateTime();
    }
    
    
  });

  $('#taxi-get-price-but').on('click', function() {

    if(pickL.value && dropL.value && dateInput.value && timeInput.value){
      event.preventDefault();
      availableTime();
      driverAvailable();
      finalValidation();

    }else{
      $('#availTime').html('Please Completly Fill The Form to Get Price details!');
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
  const est = $('#duration').val();


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
  const est = $('#duration').val();
  const pickupLocationInput = document.querySelector('#taxi-PL');
  const pickupLocationValue = pickupLocationInput.value;

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





function inputOrder(){
  const dateInput = document.getElementById('bookingDate');
  const timeInput = document.getElementById('bookingTime');
  const pickL = document.getElementById('taxi-PL');
  const dropL = document.getElementById('taxi-DL');


  timeInput.addEventListener('click', function() {
  if (!dateInput.value) {
      timeInput.value = '';
      alert('Please select a date before selecting a time.');
  }
  });
  
  // pickL.addEventListener('click', function() {
  //   if (!dateInput.value || !timeInput.value ) {
  //       timeInput.value = '';
  //       alert('Please select a date & time before selecting a Location.');
  //   }
  //   });

    dropL.addEventListener('click', function() {
      if (!pickL.value) {
          dropL.value = '';
          alert('Please select a pick up location before selecting a drop Location.');
      }
      });
}




