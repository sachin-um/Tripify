let timeslotError= false;

function validate(){
    event.preventDefault();
    validationDateTime();
}

function finalValidation(){
  const form = document.getElementById('taxi-booking-form');
  const submitButton = document.getElementById('taxi-get-price-but');

  if(olddateError && passengersError && timeslotError){           // validation 
    submitButton.style.backgroundColor = '#0F6C13';
    form.submit();
  }else{
    submitButton.style.backgroundColor = '#03002E';
  }
}



// function validation(){
  
//   const dateInput = document.getElementById('bookingDate');
//   const timeInput = document.getElementById('bookingTime');
//   const pickL = document.getElementById('taxi-PL');
//   const dropL = document.getElementById('taxi-DL');

//   $('#bookingTime').on('change', function() {
//     $('#avail').html('');
//     if (timeInput.value) {
//       validationDateTime();
//     }
    
//   });

//   $('#bookingDate').on('click', function() {
//     $('#avail').html('');
//     if (dateInput.value) {
//       validationDateTime();
//     }
    
//   });

//   $('#taxi-PL').on('click', function() {
//     $('#availTime').html('');
//     if (dateInput.value && dateInput.value) {
//       validationDateTime();
//     }
    
    
//   });

//   $('#taxi-DL').on('click', function() {
//     $('#availTime').html('');
//     if (dateInput.value && dateInput.value) {
//       validationDateTime();
//     }
    
    
//   });

//   $('#taxi-get-price-but').on('click', function() {

//     if(pickL.value && dropL.value && dateInput.value && timeInput.value){
//       event.preventDefault();
//       availableTime();
//       finalValidation();
//     }else{
//       $('#availTime').html('Please Completly Fill The Form to Get Price details!');
//       event.preventDefault();
//     }

//   });

//   $('#taxi-PL').on('change', function() {
//     $('#availTime').html('');
    
//   });

//   $('#taxi-DL').on('change', function() {
//     $('#availTime').html('');
    
//   });

//   $('#passengers').on('change', function() {
//     $('#availSeats').html('');
//     passengersValidation();
    
//   });


  


// }



function availableTime(){   // Checking Time slot is Available
  

  var bookingDate = $('#bookingDate').val();
  const bookingTime = $('#bookingTime').val();
  const est = $('#duration').val();
  // const pickupLocationInput = document.querySelector('#taxi-PL');
  // const pickupLocationValue = pickupLocationInput.value;

    $.ajax({
      url: URLROOT+'/Bookings/checkGuideDate',
      method: 'POST',
      data: {
        bookingDate: bookingDate,
        bookingTime: bookingTime,
        GuideID:GuideID,
       
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
  var bookingEndDate = $('#bookingEndDate').val(); 

  validateDate(bookingDate);
  validateDate(bookingEndDate);
  

}

function validateDate(bookingDate){
    currentDate = getTodayDate();  // function is belo

  if (bookingDate < currentDate ) {
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







