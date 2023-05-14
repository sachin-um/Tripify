    function showPopup(button,type,baseurl) {
        const row = button.parentNode.parentNode;
        const firstName = row.cells[0].textContent;
        const lastName = row.cells[1].textContent;
        const email = row.cells[2].textContent;
        const popup = document.getElementById("popup");
        const popupContent = document.getElementById("popup-content");
        $.ajax({
            url: baseurl+"/Trips/gettrips",
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#popup-content').append('<p>Selecet your Trip</p>');
  
                $.each(data, function(index, item) {
                    $('#popup-content').append('<a href="'+baseurl+'/Trips/addToTripPlan/'+row.cells[0].getAttribute('data')+'/'+type+'/'+item.TourPlanID+'"><button class="add-to-plan-btn" type="button">'+item.trip_name+'<br>From '+item.start_date+' To '+item.end_date+'</button></a>');
                });
              
              
              popup.style.display = "block";
            },
            error: function() {
              alert("Error fetching data from server.");
            }
        });

        document.addEventListener('click', function(event) {
        if (!popupContent.contains(event.target)) {
            popup.style.display = "none";
            $('#popup-content').empty();
        }
        },2000);
    }

    function showChat() {
      const popup = document.getElementById("popup");
      const popupContent = document.getElementById("chat-content");

      popup.style.display = "block";


      document.addEventListener('click', function(event) {
        if (!popupContent.contains(event.target)) {
            popup.style.display = "none";
            $('#popup-content').empty();
        }
        },2000);
    }


  function showRequest(id,baseurl) {
            
            const requestid = id;
            
            
            const popup = document.getElementById("popup");
            const requestcontent = document.getElementById("request-content");
            $.ajax({
                url: baseurl+"/Request/getTaxiRequest/"+requestid,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                      $('#request-content').append('<p>Taxi Request</p>');
                      $('#request-content').append(`
                      <form>
                        <label class="abc">Vehicle Type</label><br>
                        <input type="text" id="vehicle_type" name="vehicle_type" placeholder="`+data.vehicle_type+`" disabled>
                        <label class="abc">From</label><br>
                        <input type="text" id="pickuplocation" name="pickuplocation" placeholder="`+data.pickup_location+`" disabled>
                        <input type="hidden" name="p-latitude" id="p-latitude" value="">
                        <input type="hidden" name="p-longitude" id="p-longitude" value="">
                        <label class="abc">To</label><br>
                        <input type="text" id="destination" name="destination" placeholder="`+data.destination+`"  disabled>
                        <input type="hidden" name="d-latitude" id="d-latitude" value="">
                        <input type="hidden" name="d-longitude" id="d-longitude" value="">
                        <div id="map-container">
                            <div id="map"></div>
                        </div>
                        <label class="abc">Request Date</label><br>
                        <input type="text" id="date" name="date" placeholder="`+data.date+`" disabled>
                        <label class="abc">Request Time</label><br>
                        <input type="text" id="time" name="time" placeholder="`+data.time+`"  disabled>
                        <label class="abc">No: of Passengers</label><br>
                        <input type="text" id="passengers" name="passengers" placeholder="`+data.passengers+`" disabled>
                        <label class="abc">Additional Details</label><br>
                        <textarea name="description" id="description" cols="52" rows="10" placeholder="`+data.additional_details+`" disabled></textarea>
                        <input type="hidden" name="travelerid" id="travelerid" value="<?php echo $_SESSION['user_id'];?>">
                    </form>                      
              </div>
              <br>
              <button id="sign-up-btn-1" type="submit" style="margin:auto;" onclick="document.getElementById('popup').style.display = 'none';">Close</button> 
              `);  
                  // display the popup
                  
                  popup.style.display = "block";
                  initMap(data);
                  
                },
                error: function() {
                  alert("Error fetching data from server.");
                }
                
            });
    
            document.addEventListener('click', function(event) {
            if (!requestcontent.contains(event.target)) {
                popup.style.display = "none";
                $('#request-content').empty();
            }
            },2000);
  
            
  }

  function showTaxiBooking(id,baseurl) {
          
          const bookingid = id;
          
          const popup = document.getElementById("popup");
          const requestcontent = document.getElementById("popup-content");
          $.ajax({
              url: baseurl+"/Bookings/getTaxiBooking/"+bookingid,
              method: 'GET',
              dataType: 'json',
              success: function(data) {
                console.log(data);
                    $('#popup-content').append('<p>Taxi Booking</p>');
                    $('#popup-content').append(`
                    <form>
                      <label class="abc">Vehicle Type</label><br>
                      <input type="text" id="vehicle_type" name="vehicle_type" placeholder="`+data.vehicle.VehicleType+`" disabled>
                      <label class="abc">Vehicle number</label><br>
                      <input type="text" id="vehicle_type" name="vehicle_type" placeholder="`+data.vehicle.vehicle_number+`" disabled>
                      <label class="abc">Driver Name</label><br>
                      <input type="text" id="vehicle_type" name="vehicle_type" placeholder="`+data.vehicle.Name+`" disabled>
                      <label class="abc">From</label><br>
                      <input type="text" id="pickuplocation" name="pickuplocation" placeholder="`+data.pickup_location+`" disabled>
                      <input type="hidden" name="p-latitude" id="p-latitude" value="`+data.p_latitude+`">
                      <input type="hidden" name="p-longitude" id="p-longitude" value="`+data.p_longitude+`">
                      <label class="abc">To</label><br>
                      <input type="text" id="destination" name="destination" placeholder="`+data.destination+`"  disabled>
                      <input type="hidden" name="d-latitude" id="d-latitude" value="`+data.d_latitude+`">
                      <input type="hidden" name="d-longitude" id="d-longitude" value="`+data.d_longitude+`">
                      <div id="map-container">
                          <div id="map"></div>
                      </div>
                      <label class="abc">Booking Date</label><br>
                      <input type="text" id="date" name="date" placeholder="`+data.booking_date+`" disabled>
                      <label class="abc">Booking Time</label><br>
                      <input type="text" id="time" name="time" placeholder="`+data.booking_time+`"  disabled>
                      <label class="abc">Payment</label><br>
                      <input type="text" id="passengers" name="passengers" placeholder="`+data.Price+`" disabled>
                      <input type="hidden" name="travelerid" id="travelerid" value="<?php echo $_SESSION['user_id'];?>">
                  </form>                      
            </div>
            <br>
            <button id="sign-up-btn-1" type="submit" style="margin:auto;" onclick="document.getElementById('popup').style.display = 'none';">Close</button> 
            `);  
                // display the popup
                
                popup.style.display = "block";
                initMap(data);
                
              },
              error: function() {
                alert("Error fetching data from server.");
              }
              
          });
  
          document.addEventListener('click', function(event) {
          if (!requestcontent.contains(event.target)) {
              popup.style.display = "none";
              $('#popup-content').empty();
          }
          },2000);

          
}
        
