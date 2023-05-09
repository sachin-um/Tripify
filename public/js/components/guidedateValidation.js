let timeslotError= false;
let startdateError = false; 
let enddateError = false;
let olderError = false;

$(document).ready(function() {
  inputDates();  // this function automatically run when page loaded
});


function validate(){   // when book now buuton clicked this fuction will be triger
    event.preventDefault();
    validationDateTime();
    availableTime();
}

function finalValidation(){
  console.log(timeslotError+'  '+startdateError+'  '+enddateError+'  '+olderError);
 
  const submitButton = document.getElementById('book-now-btn');

  if(startdateError && enddateError && olderError && timeslotError){           // validation 
    submitButton.style.backgroundColor = '#0F6C13';
    $("#hotel-booking-form").hide();
    calculatePrice();
    
  }else{
    submitButton.style.backgroundColor = '#03002E';
  }
}

function calculatePrice(){

  

document.getElementById("guide-booking-cont").style.display = "block";

const date1 = new Date($('#bookingDate').val());
const date2 = new Date($('#bookingEndDate').val());

// Calculate the difference in milliseconds
const diffInMs = date2 - date1;
console.log(diffInMs);
// Convert to days
let days = Math.floor(diffInMs / 86400000);

days= days+1;
const total = days*guideRate;



  

  document.getElementById("startDate").innerHTML = $('#bookingDate').val();
  document.getElementById("endDate").innerHTML = $('#bookingEndDate').val();
  document.getElementById("g_location").innerHTML = $('#G_book_loc').val();
  document.getElementById("G_payment_mrthod").innerHTML = $('#payment-option').val();
  document.getElementById("days").innerHTML = days;
  document.getElementById("total").innerHTML = total;
  document.getElementById("g_total").innerHTML = total;
  $('#guide_payment').val(total);

}

function sentcontroller(){
  const form = document.getElementById('gide-booking-form');
  form.submit();
}


function availableTime(){   // Checking Time slot is Available
  

  const bookingDate = $('#bookingDate').val();
  const bookingEndDate = $('#bookingEndDate').val();

    $.ajax({
      url: URLROOT+'/Bookings/GuideDateValidation',
      method: 'POST',
      data: {
        bookingDate: bookingDate,
        bookingEndDate: bookingEndDate,
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
        finalValidation();
     
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

  if(bookingDate>bookingEndDate){
    $('#older').html('End Date is older than Start Date !');
    olderError=false;
  }else{
    $('#older').html('');
    olderError=true;
  }

  

}

function inputDates(){
  $('#bookingDate').on('change', function() {

    var bookingDate = $('#bookingDate').val();
    
    if($('#bookingDate').val()){
      
      if(isDateOld(bookingDate)){
        startdateError = false;
        $('#start_validate').html('Enter Valid Start Date!');
      
      }else{
        $('#start_validate').html('');
        startdateError = true;
      }
    } 
    
    
  });

  $('#bookingEndDate').on('change', function() {

    var bookingEndDate = $('#bookingEndDate').val();   // Get end date value
    
    if($('#bookingEndDate').val()){  // checking date is input or not
      
      if(isDateOld(bookingEndDate)){
        $('#end_validate').html('Enter Valid End Date!');
        enddateError=false;
      }else{
        enddateError=true;
        $('#end_validate').html('');
  
      }
    }
    


  });
}






function isDateOld(bookingDate){
  currentDate = getTodayDate();  // function is below

  if (bookingDate < currentDate ) {
    return true;

  }else{
    return false;
  }
}



function getTodayDate(){   // give today date
    const today = new Date();
    const year = today.getFullYear();
    const month = ("0" + (today.getMonth() + 1)).slice(-2); 
    const day = ("0" + today.getDate()).slice(-2); 

    const currentDate = `${year}-${month}-${day}`;
    return currentDate;
}







