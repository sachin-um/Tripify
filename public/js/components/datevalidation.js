let olddateError =false;
let passengersError =false;
let timeslotError= false;


$(document).ready(function() {
  inputOrder();
  validation();
  // console.log('distance'+$('#distance').val());

});

function finalValidation(){
  validationDateTime();
  // const form = document.getElementById('taxi-booking-form');
  const submitButton = document.getElementById('taxi-get-price-but');

  if(olddateError && passengersError && timeslotError){           // validation
    submitButton.style.backgroundColor = '#0F6C13'; 
    if( $('#checker').val()==0){
      // form.submit();
    }else{
      $("#hotel-booking-form").hide();
      calculatePrice(dist,estimateTime);
    }
    
    
  }else{
    $('#errorBut').html('There is an Error! Please Check Your Details');
    submitButton.style.backgroundColor = '#03002E';
  }
}


function editTaxiBooking(){
  const form = document.getElementById('taxi-booking-form');
  

  form.submit(); 
}


function calculatePrice(dist,estimateTime) {
  document.getElementById("taxi-booking-cont").style.display = "block";

  let bookingDate = $('#bookingDate').val();
  let bookingTime = $('#bookingTime').val();
  console.log(estimateTime);
  let estTime =estimateTime;


  var bookingDateTime = new Date(`${bookingDate}T${bookingTime}`);
  // console.log(bookingDate+' + '+bookingTime+' = '+bookingDateTime);
  var estHours = parseInt(estTime.slice(0, 2));
  var estMinutes = parseInt(estTime.slice(3, 5));
  var estSeconds = parseInt(estTime.slice(6, 8));

  bookingDateTime.setHours(bookingDateTime.getHours() + estHours);
  bookingDateTime.setMinutes(bookingDateTime.getMinutes() + estMinutes);
  bookingDateTime.setSeconds(bookingDateTime.getSeconds() + estSeconds);

  var localBookingDateTime = new Date(bookingDateTime.toLocaleString("en-US", {timeZone: "Asia/Colombo"}));
  var endDate = localBookingDateTime.toISOString().slice(0, 10);
  var endTime = localBookingDateTime.toLocaleTimeString("en-US", {hour12:false});
  
  // console.log(bookingDateTime+'  '+endDate+'  '+endTime);
  

  document.getElementById("startDate").innerHTML = bookingDate;
  document.getElementById("startTime").innerHTML = bookingTime;
  document.getElementById("endDate").innerHTML = endDate;
  document.getElementById("endTime").innerHTML = endTime;
  document.getElementById("pickupL").innerHTML = $('#taxi-PL').val();
  document.getElementById("dropL").innerHTML = $('#taxi-DL').val();
  document.getElementById("dist").innerHTML = dist;
  document.getElementById("jurDist").innerHTML = dist;
  // document.getElementById("timeEst").innerHTML = estTime;

  var rate = parseFloat($('#rate').val());
  var totalSub = parseFloat(dist) * rate;
  var total = parseFloat(dist) * rate;

  document.getElementById("totalSub").innerHTML = totalSub.toFixed(2);
  document.getElementById("total").innerHTML = total.toFixed(2);

  $('#tripEndDate').val(endDate);
  $('#tripEndTime').val(endTime);
  $('#amount').val(totalSub.toFixed(2));
}



function buttonclicked(){
  event.preventDefault();
  $('#avail').html('');
  $('#availTime').html('');
  $('#availSeats').html('');
  $('#errorBut').html('');
  
  const dateInput = document.getElementById('bookingDate');
  const timeInput = document.getElementById('bookingTime');
  const pickL = document.getElementById('taxi-PL');
  const dropL = document.getElementById('taxi-DL');
  const passenger = document.getElementById('passengers');
  const payment = document.getElementById('payment-option');
  if(pickL.value && dropL.value && dateInput.value && timeInput.value && passenger.value && payment.value){
   
    availableTime();
    passengersValidation();
    validationDateTime();
    
    
    
  }else{
    $('#availTime').html('Please Completly Fill The Form to Get Price details!');
    
  }
}



function validation(){
  
  let dateInput = document.getElementById('bookingDate');
  let timeInput = document.getElementById('bookingTime');

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

  // $('#taxi-PL').on('click', function() {
  //   $('#availTime').html('');
  //   if (dateInput.value && dateInput.value) {
  //     validationDateTime();
  //   }
    
    
  // });

  // $('#taxi-DL').on('click', function() {
  //   $('#availTime').html('');
  //   if (dateInput.value && dateInput.value) {
  //     validationDateTime();
  //   }
    
    
  // });



}




// function driverAvailable(){     // A driver can only drive 14 hours per day 
//   const bookingDate = $('#bookingDate').val();
//   const bookingTime = $('#bookingTime').val();
//   const est = $('#duration').val();


//   $.ajax({
//     url: URLROOT+'/Bookings/checkTimeAvailability',
//     method: 'POST',
//     data: {
//       bookingDate: bookingDate,
//       est:est,
//       vehicleID:vehicleID
//     },
//     dataType: 'json',
//     success: function(result) {
      
//       if (result) {
//         $('#availTime').html('This vehicle reach the Limit. Please chose another vehicle');
//         driverAvailableError=false;

//       } else {
//         driverAvailableError=true;
//         $('#availTime').html('');
//         finalValidation();
        
//       }
//     },
//     error: function(xhr, status, error) {
//       console.log("AJAX error:", status, error);
//       alert('data not received');
//     }
//   });
// }


function availableTime(){   // Checking Time slot is Available


  

  let bookingDate = $('#bookingDate').val();
  let bookingTime = $('#bookingTime').val();
  let est = $('#duration').val();
  if( $('#checker').val()==0){
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
        finalValidation();
     
      },
      error: function(xhr, status, error) {
        console.log("AJAX error:", status, error);
        alert('data not received');
      }
    });
  }else{
    $.ajax({
      url: URLROOT+'/Bookings/EditcheckTimeSlot',
      method: 'POST',
      data: {
        bookingDate: bookingDate,
        bookingTime: bookingTime,
        bookingID:bookingID,
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
        finalValidation();
     
      },
      error: function(xhr, status, error) {
        console.log("AJAX error:", status, error);
        alert('data not received');
      }
    });
  }
   


}





function validationDateTime(){
  var bookingDate = $('#bookingDate').val(); 
  currentDate = getTodayDate();  // function is below
  currentTime = getTodayTime();

  var bookingTime = $('#bookingTime').val();
  var userInputDateTime = new Date(`${bookingDate}T${bookingTime}`);
  var now = new Date(`${currentDate}T${currentTime}`);


  if (userInputDateTime < now ) {
    $('#avail').html('Please Enter Valid Date/Time');
    olddateError = false; 

  }else{
    olddateError = true; 
  }

  
  

}


function passengersValidation(){
 
    var passengers = $('#passengers').val(); 
    
    
    if (passengers < 1) {
      $('#availSeats').html('Please enter a number greater than or equal to 1');
      passengersError=false;
    } else {
      if (passengers>seats) {
        passengersError=false;
        $('#availSeats').html('* Seats Not Enough in this Vehicle');
      } else {
        $('#availSeats').html('');
        passengersError=true;
        
      }
      
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






function bookdays(){
  $("#taxi-day-bookingButs").hide();
  document.getElementById("hotel-booking-dayform").style.display = "block";
  document.getElementById("hotel-booking-dayform").style.pointerEvents = "auto";

  
  
}

function bookTrip(){
  $("#taxi-day-bookingButs").hide();
  document.getElementById("hotel-booking-form").style.display = "block";
  document.getElementById("hotel-booking-form").style.pointerEvents = "auto";

}






   
 