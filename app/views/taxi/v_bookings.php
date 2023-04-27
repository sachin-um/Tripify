<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>

<div class="wrapper">
    <div class="content">
        <div class="hotel-booking-title">

            <p id="hotel-booking-title-1" class="home-title-2" style="text-transform:uppercase;" ><b><?php echo $data['com_name'] ?></b></p>    
        
        </div>
        <div class="hotel-room-top-picks">
            <div class="hotel-desc-page-div">
                <div class="taxi-disc-2">

                    <div class="taxi-disc-3">
                        <label id="taxi_book_subhead">
                            <b><?php echo $data['details']->Model.'&nbsp;&nbsp;'.$data['details']->vehicle_number?></b>
                        </label><br>
                        
                    </div>
                    <br>
                    <div class="taxi-disc-3">
                        <div class="taxi-disc-1">
                            
                            <label id="taxi_book_subhead">    
                                <b><?php echo $data['details']->VehicleType?></b>       
                            </label><br>          

                            <ul class="taxi_book_ul" style="list-style: circle;">
                                <li><label>Yellow Colour</label></li>
                                <li><label><?php echo $data['details']->no_of_seats?> Seats</label></li>
                                <li><label>Air Conditioning</label></li>   
                            </ul>
                            
                        </div>

                        <div class="taxi-disc-1">
                            <label id="taxi_book_subhead">
                                <b>Driver</b>
                            </label><br>

                            <ul class="taxi_book_ul" style="list-style: circle;">
                                    <li><label>Name: <?php echo $data['details']->Name?></label></li>
                                    <li><label>Age: <?php echo $data['details']->Age?></label></li>
                                    <li><label>Contact Number: <?php echo $data['details']->contact_number?></label></li>
                                
                                
                            </ul>
                        </div>
                    </div>
                    
                </div>        

                <div class="hotel-disc-2">
                    <div id="booking-slideshow" class="slideshow-container fade">
                        <div class="Containers">
                            <div class="MessageInfo">1 / 4</div>
                            <img src="<?php echo URLROOT?>/img/taxi-galary-1.jpg" style="width:100%">
                            <div class="H-Room-Info"></div>
                        </div>

                    <div class="Containers">
                        <div class="MessageInfo">2 / 4</div>
                        <img src="<?php echo URLROOT?>/img/taxi-galary-2.jpg" style="width:100%">
                        <div class="H-Room-Info"></div>
                    </div>

                    <div class="Containers">
                        <div class="MessageInfo">3 / 4</div>
                        <img src="<?php echo URLROOT?>/img/taxi-galary-3.jpg" style="width:100%">
                        <div class="H-Room-Info"></div>
                    </div>

                    <div class="Containers">
                        <div class="MessageInfo">4 / 4</div>
                        <img src="<?php echo URLROOT?>/img/taxi-galary-4.jpg" style="width:100%">
                        <div class="H-Room-Info"></div>
                    </div>

                        <!-- Back and forward buttons -->
                        <a class="Back" onclick="plusSlides(-1)">&#10094;</a>
                        <a class="forward" onclick="plusSlides(1)">&#10095;</a>
                        </div>
                        <br>

                        <!-- The circles/beads -->
                        <div style="text-align:center">
                            <span class="beads" onclick="currentSlide(1)"></span>
                            <span class="beads" onclick="currentSlide(2)"></span>
                            <span class="beads" onclick="currentSlide(3)"></span>
                            <span class="beads" onclick="currentSlide(4)"></span>
                        </div> 
                    </div>

                </div>
                
               
                

                <div id="hotel-booking-form" class="hotel-room-top-picks">
                    <?php 
                        if(isset($data['hide'])){
                    ?>
                        <p class="home-title-2" >Book Now</p>
                        <hr>
                        <form id ="taxi-booking-form" action="<?php echo URLROOT; ?>/Bookings/TaxiBookingPage/<?php echo $data['details']->VehicleID.'/'.$data['details']->OwnerID?>" method="POST">
                            <div class="hotel-reg-form">
                                <div class="hotel-reg-form-div-2">
                                    <div class="hotel-reg-elements">
                                        <p class="home-title-4">Date<sup> *</sup> :</p>
                                        <input class="hotel-labels-2" type="date" id="bookingDate" name="s_date"  required>
                                        <span id="avail"></span>
                                    </div>
                                    

                                    <div class="hotel-reg-elements">
                                        <p class="home-title-4">Time<sup> *</sup> :</p>
                                        <input class="hotel-labels-2" type="time" id="bookingTime"  name="s_time" required>
                                    </div>

                                   
                                </div>

                                <div class="hotel-reg-form-div-2">
                                    <div class="hotel-reg-elements">
                                        <p class="home-title-4">Pick Up Location<sup> *</sup> :</p>
                                        <input class="hotel-labels-2" type="text" id="taxi-PL" name="pickupL" required>
                                        
                                        <input type="hidden" name="p-latitude" id="p-latitude" value="">
                                        <input type="hidden" name="p-longitude" id="p-longitude" value="">
                                    </div>

                                    <div class="hotel-reg-elements">
                                        <p class="home-title-4">Destination Location <sup> *</sup> :</p>
                                        <input class="hotel-labels-2" type="text" id="taxi-DL" name="dropL" required>

                                        <!-- <span style="color:black;">Select the destination on Map(Optional)</span>
                                        <div id="map-container">
                                            <div id="map-d"></div>
                                        </div> -->
                                        <input type="hidden" name="d-latitude" id="d-latitude" value="">
                                        <input type="hidden" name="d-longitude" id="d-longitude" value="">
                                    </div>

                                    
                                </div>
                                <span id="availTime"></span>
                                <span style="color:black;">Select the pickup location on Map(Optional)</span>
                                    <div id="map-container">
                                        <div id="map"></div>
                                    </div>
                            
                            </div><br>

                            <div class="hotel-reg-form-div-2">
                                    <button id="taxi-get-price-but" class="all-purpose-btn" type="submit">Get Price Details</button>
                            </div>
                        </form>
                        <br>
                        <script type="text/JavaScript">
                            // var bookingTime;
                            var URLROOT="<?php echo URLROOT;?>";
                            // document.getElementById("bookingTime").addEventListener("change", function() {
                            //     bookingTime = this.value;
                            // });
                            
                        </script>
                       
                        
                    <?php
                        }
                    ?>


                    <?php 
                        if(isset($data['distance'])){
                    ?>

                    
                        <div>
                            <p class="home-title-3"><u>Price Details</u></p>
                            <br>
                            <div class="price-details-1">
                                <div class="hotel-price-check">
                                    <label><b>Trip Start :</b></label><br>
                                    <label><b><?php echo $data['s_date']?></b></label>
                                    <label><b><?php echo $data['s_time']?></b></label>
                                </div>
                                <div class="hotel-price-check">
                                    <label><b><?php echo $data['pickupL']?></b></label><br>
                                    <label><p><b>To</b></p></label>
                                    <label><b><?php echo $data['dropL']?></b></label>
                                </div>
                                <div id="hotel-nights-days" class="hotel-price-check">
                                    <label><?php echo $data['distance']?>KM</label>
                                </div>
                            </div>
                            <br>
                            <div class="price-details-2">
                                <div class="hotel-price-details">
                                    <label id="No-of-rooms"><?php echo $data['distance']?></label>
                                    <label id="X">X</label>
                                    <label id="No-of-nights"><?php echo $data['details']->price_per_km?></label>
                                    <label id="Priceofroom"><b><?php echo $data['cost']?></b></label>
                                </div>

                                <div class="hotel-price-details">
                                    <label id="hotel-taxes">Taxes(3%)</label>
                                    <label id="hotel-taxes-1"><b><?php echo $data['tax']?></b></label>
                                </div>

                                <hr id="prices-hr">
                                
                                <div class="hotel-price-details">
                                    <label id="hotel-taxes">Total</label>
                                    <label id="hotel-taxes-1"><b><?php echo $data['total']?></b></label>
                                </div>
                            </div>


                            <div class="hotel-reg-form-div-2">
                                <button  onclick="window.location.href='<?php echo URLROOT; ?>/Bookings/TaxiBookingdetails/<?php echo $data['details']->VehicleID.'/'.$_SESSION['user_id'];?>';"  id="confirm-booking-btn" class="all-purpose-btn" type="submit"  >Book Now</button>
                            </div>
                            <br>
                            <div class="hotel-reg-form-div-2">
                                <button onclick="window.location.href='<?php echo URLROOT; ?>/Bookings/TaxiBookingPage/<?php echo $data['details']->VehicleID.'/'.$data['details']->OwnerID?>';" id="confirm-booking-btn" class="taxi_all-purpose-btn" type="submit">Cancel</button>
                            </div>
                            
                        </div>
                    <?php
                        }
                    ?>
                </div>
            </div>

            
        </div>

        
        
    </div>
</div>

<?php require APPROOT.'/views/inc/components/footer.php'; ?>

<script>
    var slidePosition = 1;
    SlideShow(slidePosition);

    // forward/Back controls
    function plusSlides(n) {
    SlideShow(slidePosition += n);
    }

    //  images controls
    function currentSlide(n) {
    SlideShow(slidePosition = n);
    }

    function SlideShow(n) {
    var i;
    var slides = document.getElementsByClassName("Containers");
    var circles = document.getElementsByClassName("beads");
    if (n > slides.length) {slidePosition = 1}
    if (n < 1) {slidePosition = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < circles.length; i++) {
        circles[i].className = circles[i].className.replace(" enable", "");
    }
    slides[slidePosition-1].style.display = "block";
    circles[slidePosition-1].className += " enable";
    } 


    const vehicleID = <?php echo json_encode($data['details']->VehicleID); ?>;

</script>

<script type="text/JavaScript" src="<?php echo URLROOT;?>/js/components/datevalidation.js"></script>
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

        var input = document.getElementById("taxi-PL");
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
                console.log('HI');
                document.getElementById('p-latitude').value=marker.position.lat();
                document.getElementById('p-longitude').value=marker.position.lng();
            }
        );


        marker_d = new google.maps.Marker({
            map: map,
            draggable:true,
            title:"Destination"
        });
        var input_des = document.getElementById("taxi-DL");
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

        
        // directionsService = new google.maps.DirectionsService();
        // directionsRenderer = new google.maps.DirectionsRenderer();
        // directionsRenderer.setMap(map);
        // var start = new google.maps.LatLng(marker.position.lat(),marker.position.lng());
        // var destination=new google.maps.LatLng(marker_d.position.lat(),marker_d.position.lng());
        //             map = new google.maps.Map(document.getElementById('map'), {
        //               center: start, 
        //               zoom: 11
        //             });
        // // google.maps.event.addListener(marker_d,'position_changed',
        // //     function () {
        // console.log('HIII');
                
            // }
        // )


        google.maps.event.addListener(marker_d,'position_changed',
            function () {
                document.getElementById('p-latitude').value=marker.position.lat();
                document.getElementById('p-longitude').value=marker.position.lng();
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
            console.log('Shortest road distance: ' + distance);
            } else {
            console.error('Error calculating route:', status);
            }
        });
}








    
    
    function initialize() {
        initMap();
    }

    
    

</script>
 


