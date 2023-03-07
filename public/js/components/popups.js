    function showPopup(button,type,baseurl) {
  // get the table row
        const row = button.parentNode.parentNode;
        // get the data from the table row
        const firstName = row.cells[0].textContent;
        const lastName = row.cells[1].textContent;
        const email = row.cells[2].textContent;
        
        
        // popupContent.innerHTML = content;
        const popup = document.getElementById("popup");
        const popupContent = document.getElementById("popup-content");
        $.ajax({
            url: baseurl+"/Trips/gettrips",
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#popup-content').append('<p>Selecet your Trip</p>');
  
                $.each(data, function(index, item) {
                    $('#popup-content').append('<a href="'+baseurl+'/Trips/addToTripPlan/'+row.cells[0].textContent+'/'+type+'/'+item.TourPlanID+'"><button class="add-to-plan-btn" type="button">'+item.trip_name+'</button></a>');
                });
              
              // display the popup
              
              popup.style.display = "block";
            },
            error: function() {
              // handle the error
              alert("Error fetching data from server.");
            }
        });

        document.addEventListener('click', function(event) {
        // check if the click event target is outside of the popup window
        if (!popupContent.contains(event.target)) {
            // remove the popup window from the DOM
            popup.style.display = "none";
            $('#popup-content').empty();
        }
        },2000);
    }
        
