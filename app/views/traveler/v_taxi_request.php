<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?> 

<?php
$_SESSION['user_id'];


if (empty($_SESSION['user_id'])) {
    flash('reg_flash', 'You need to have logged in first...');
    redirect('Users/login');
}
elseif ($_SESSION['user_type']!='Traveler') {
    flash('reg_flash', 'Only the Travelers can add Taxi Request..');
    redirect('Users/login');
}
else {
    ?>
    <div class="form">
        <div >
            <img id="logo" src="<?php echo URLROOT; ?>/img/updatedLOGO.png" alt="logo">
            <p id="tag">Tell Us About Your Ride</p> 
        </div>
    
        <div >
            <form action="<?php echo URLROOT; ?>/Request/addTaxiRequest" method="POST">
                

                <select class="search" id="vehicle_type" name="vehicle_type">
                    <option value="Vehicle type you prefer" disabled selected>Vehicle type you prefer</option>
                    <option value='tuk-tuk'>Tuk Tuk</option>
                    <option value='car'>Car</option>
                    <option value='van'>Van</option>
                    
                </select>
                <input type="text" id="pickuplocation" name="pickuplocation" placeholder="From Where journey Begin...?" value="<?php echo $data['pickuplocation']; ?>">
                <span class="invalid"><?php echo $data['pickuplocation_err']; ?></span>
                <input type="hidden" name="p-latitude" id="p-latitude" value="">
                <input type="hidden" name="p-longitude" id="p-longitude" value="">
                <input type="text" id="destination" name="destination" placeholder="From Where journey End...?"  value="<?php echo $data['destination']; ?>">
                <span class="invalid"><?php echo $data['destination_err']; ?></span>
                <input type="hidden" name="d-latitude" id="d-latitude" value="">
                <input type="hidden" name="d-longitude" id="d-longitude" value="">
                <div id="map-container">
                    <div id="map"></div>
                </div>
                
                <input type="text" id="date" name="date" placeholder="Request Date" onfocus="(this.type='date')" value="<?php echo $data['date']; ?>" min="<?php echo date('Y-m-d'); ?>">
                <span class="invalid"><?php echo $data['date_err']; ?></span>
                <input type="text" id="time" name="time" placeholder="Pickup Time" onfocus="(this.type='time')" value="<?php echo $data['time']; ?>">
                <span class="invalid"><?php echo $data['time_err']; ?></span>
                <select class="search" id="no_of_days" name="no_of_days">
                    <option value=0 disabled selected>No: of Days (Optional)</option>
                    <option value=1>1</option>
                    <option value=2>2</option>
                    <option value=3>3</option>
                    <option value=4>4</option>
                    <option value=5>5</option>
                    <option value=6>6</option>
                    <option value=7>7</option>
                    <option value=8>8</option>
                    <option value=9>9</option>
                </select>
                <select class="search" id="passengers" name="passengers">
                    <option value="" disabled selected>No: of Passengers</option>
                    <option value=1>1</option>
                    <option value=2>2</option>
                    <option value=3>3</option>
                    <option value=4>4</option>
                    <option value=5>5</option>
                    <option value=6>6</option>
                    <option value=7>7</option>
                    <option value=8>8</option>
                    <option value=9>9</option>
                </select>
                <span class="invalid"><?php echo $data['passengers_err']; ?></span>
                <textarea name="description" id="description" cols="52" rows="10" placeholder="Additional Details"></textarea>
                <span class="invalid"><?php echo $data['description_err']; ?></span>
                <button id="sign-up-btn-1" type="submit">Request a Taxi</button>
                <input type="hidden" name="travelerid" id="travelerid" value="<?php echo $_SESSION['user_id'];?>">
                <input type="hidden" name="distance" id="distance" value="">
                <input type="hidden" name="duration" id="duration" value="">
                <span class="invalid"><?php echo $data['travelerid_err']; ?></span>
              </form> 
        </div>
    </div>
    <?php
}

?>
<script type="text/javascript" src="<?php echo AUTO_MAP_URL ?>" defer></script>
<script>
    let map;
    var marker;
    var marker_d;
    var directionsService;
    var directionsRenderer;

    let srilanka={lat: 7.8731 ,lng: 80.7718};
    function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
        center: srilanka,
        zoom: 8,
    });

        var input = document.getElementById("pickuplocation");
        var autocomplete = new google.maps.places.Autocomplete(input);
        marker = new google.maps.Marker({
        map: map,
        draggable:true,
        title:"Pickup location"
        });
        autocomplete.bindTo("bounds", map);
        autocomplete.setFields(['address_components','geometry','name'])
        autocomplete.addListener('place_changed', function () {
            // marker.setVisible(false);
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                // User entered the name of a Place that was not suggested and
                // pressed the Enter key, or the Place Details request failed.
                window.alert("No details available for input: '" + place.name + "'");
                return;
            }

            // If the place has a geometry, then present it on a map.
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);  // Why 17? Because it looks good.
            }
            marker.setPosition(place.geometry.location);
            marker.setVisible(true);
        });
        google.maps.event.addListener(marker,'position_changed',
            function () {
                // console.log('HI');
                document.getElementById('p-latitude').value=marker.position.lat();
                document.getElementById('p-longitude').value=marker.position.lng();
                // console.log(marker.position.lat()+'  '+marker.position.lng()+'--->')
            }
        );


        marker_d = new google.maps.Marker({
            map: map,
            draggable:true,
            title:"Destination"
        });
        var input_des = document.getElementById("destination");
        var autocomplete_des = new google.maps.places.Autocomplete(input_des);
        marker_d = new google.maps.Marker({
        map: map,
        draggable:true,
        title:"Destination"
        });
        autocomplete_des.bindTo("bounds", map);
        autocomplete_des.setFields(['address_components','geometry','name'])
        autocomplete_des.addListener('place_changed', function () {
            // marker.setVisible(false);
            var place_d = autocomplete_des.getPlace();
            if (!place_d.geometry) {
                // User entered the name of a Place that was not suggested and
                // pressed the Enter key, or the Place Details request failed.
                window.alert("No details available for input: '" + place_d.name + "'");
                return;
            }

            // If the place has a geometry, then present it on a map.
            if (place_d.geometry.viewport) {
                map.fitBounds(place_d.geometry.viewport);
            } else {
                map.setCenter(place_d.geometry.location);
                map.setZoom(17);  // Why 17? Because it looks good.
            }
            marker_d.setPosition(place_d.geometry.location);
            marker_d.setVisible(true);
        });


        google.maps.event.addListener(marker_d,'position_changed',
            function () {
                document.getElementById('d-latitude').value=marker_d.position.lat();
                document.getElementById('d-longitude').value=marker_d.position.lng();
                // console.log(marker_d.position.lat()+'  '+marker_d.position.lng())
                calculateAndDisplayRoute();
            }
        );
    }

    function calculateAndDisplayRoute() {
        // Create a directions service object
        var directionsService = new google.maps.DirectionsService();

        // Create a directions renderer object
        directionsDisplay = new google.maps.DirectionsRenderer();

        // Set the map for the directions renderer
        directionsDisplay.setMap(map);

        // Define the origin, destination, and travel mode for the route
        var request = {
            origin: marker.getPosition(),
            destination: marker_d.getPosition(),
            travelMode: 'DRIVING'
        };

        // Call the directions service to calculate the route
        directionsService.route(request, function(result, status) {
            if (status === 'OK') {
            // Display the route on the map
            directionsDisplay.setDirections(result);
            var distance = result.routes[0].legs[0].distance.text;
            var durationInSeconds = result.routes[0].legs[0].duration.value;
            var hours = Math.floor(durationInSeconds / 3600);
            var minutes = Math.floor((durationInSeconds % 3600) / 60);
            var seconds = durationInSeconds % 60;

            // Format the duration as hh:mm:ss
            var duration = hours.toString().padStart(2, '0') + ':' +
                     minutes.toString().padStart(2, '0') + ':' +
                     seconds.toString().padStart(2, '0');
            document.getElementById('distance').value=distance;
            document.getElementById('duration').value=duration;
            // console.log('Shortest road duration: ' + duration+'   distance= '+distance);
            } else {
            console.error('Error calculating route:', status);
            }
        });
    }
    
    function initialize() {
        initMap();
    }
</script>

<?php require APPROOT.'/views/inc/components/footer.php'; ?>

