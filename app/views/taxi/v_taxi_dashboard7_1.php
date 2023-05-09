<!-- ........Bookings........... -->

<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>
<div class="app">
<?php
$_SESSION['user_id'];


if (empty($_SESSION['user_id'])) {
    flash('reg_flash', 'You need to have logged in first...');
    redirect('Users/login');
}
elseif ($_SESSION['user_type']!='Taxi') {
    // flash('reg_flash', 'Only the Taxi Owner can add Taxi Vehicles..');
    redirect('Users/login');
}
else {
?>
    <aside class="sidebar">

        <div class="menu-toggle">
            <div class="hamburger">
                <span></span>
            </div>
        </div>

        <nav class="menu">
            <a href="<?php echo URLROOT; ?>/Pages/profile" class="menu-item">User Profile</a>
            <!-- <a href="#" class="menu-item is-active">Company</a> -->
            <a href="<?php echo URLROOT; ?>/Taxi_Driver/viewdrivers" class="menu-item">Drivers</a>
            <a href="<?php echo URLROOT; ?>/Taxi_Vehicle/viewvehicles" class="menu-item">Vehicles</a>
            <a href="<?php echo URLROOT; ?>/Taxies/payments" class="menu-item">Payments</a>
            <a href="<?php echo URLROOT; ?>/Request/TaxiRequest" class="menu-item">Trip Requests</a>
            <a href="<?php echo URLROOT; ?>/Offers/taxioffers" class="menu-item">Offers</a>
            <a href="<?php echo URLROOT; ?>/Bookings/TaxiBookings/<?php echo $_SESSION['user_type'] ?>/<?php echo $_SESSION['user_id'] ?>" class="menu-item is-active">Bookings</a>
            <a href="<?php echo URLROOT; ?>/Pages/taxies" class="menu-item">Exit Dashboard</a>
        </nav>
    </aside>

    <main class="right-side-content">
    <div class="taxi_off_cont">
        <div>
        <a href="<?php echo URLROOT; ?>/Bookings/TaxiBookings/<?php echo $_SESSION['user_type'] ?>/<?php echo $_SESSION['user_id'] ?>?>"><button id="tax_book_backBut">Back</button></a><br>
            <h2 class="title" >Bookings</h2>
            <hr>
            <?php flash('booking_flash'); ?>
        <br>

        <div id="map-container">
            <div id="map"></div>
        </div>
        <div class="first-container">
          <div class="taxi-booking-table-container">
            <div>
                <table class="message-table">
                        
                        <tr>
                            <th>Booking ID</th>
                            <td data-lable="ID"><?php echo  $data['taxibookings']->ReservationID ?></td>
                        </tr>

                        <tr>
                            <th>Vehicle Number</th>
                            <td data-lable="Name"><?php echo $data['taxibookings']->VehicleNumber ?></a></td>
                        </tr>

                        <tr>
                            <th>Booking Date</th>
                            <td data-lable="Message"><?php echo $data['taxibookings']->booking_date ?></td>
                        </tr>

                            
                        <th>Pickup Location</th>
                            <td data-lable="Message"><?php echo $data['taxibookings']->pickup_location ?></td>
                        </tr>

                        <tr>
                            <th>Distance</th>
                            <td data-lable="Message"><?php echo $data['taxibookings']->distance ?></td>
                        </tr>

                        

                        <tr>
                            <th>Payment Satus</th>
                            <td data-lable="Message"><?php echo $data['taxibookings']->PaymentStatus ?></td>
                        </tr>
                            
                            

                        
                </table>
            </div>
                

               <div>
                    <table class="message-table">
                        <tr>
                            <th>Booking Added</th>
                            <td data-lable="Name"><?php echo $data['taxibookings']->DateAdded ?></a></td>
                        </tr>

                        <tr>
                            <th>Driver Name</th>
                            <td data-lable="Email"><?php echo $data['taxibookings']->Name ?></td>
                        </tr>

                        
                        <tr>
                            <th>Booking Time</th>
                            <td data-lable="Message"><?php echo $data['taxibookings']->booking_time ?></td>
                        </tr>
                        <tr>
                        
                        <tr>
                            <th>Destination</th>
                            <td data-lable="Message"><?php echo $data['taxibookings']->destination ?></td>
                        </tr>

                        <tr>
                            <th>Estimate Time</th>
                            <td data-lable="Name"><?php echo $data['taxibookings']->estTime ?></a></td>
                        </tr>

                        <tr>
                            <th>Payment Method</th>
                            <td data-lable="Message"><?php echo $data['taxibookings']->PaymentMethod ?></td>
                        </tr>

                        

                        <tr>
                            <th>Booking Status</th>
                            <td data-lable="Message"><?php echo $data['taxibookings']->status ?></td>
                        </tr>
                        
                           
                    
                    </table>
               </div>
            </div>
            
         </div>
        <input type="hidden" name="p-latitude" id="p-latitude" value="<?php echo $data['taxibookings']->p_latitude?>">
        <input type="hidden" name="p-longitude" id="p-longitude" value="<?php echo $data['taxibookings']->p_longitude?>">
                                    
        <input type="hidden" name="d-latitude" id="d-latitude" value="<?php echo $data['taxibookings']->d_latitude?>">
        <input type="hidden" name="d-longitude" id="d-longitude" value="<?php echo $data['taxibookings']->d_longitude?>">
        <div class="taxi-booking-table-container">
            <?php
                if ($data['taxibookings']->status=='Yet To Confirm') {
            ?>
                <a href="<?php echo URLROOT; ?>/Bookings/ConfirmTaxiBooking/<?php echo $data['taxibookings']->ReservationID ?>"><button id="taxi_veh_view" type="button">Confirm</button></a>
            
                <a href="<?php echo URLROOT; ?>/Bookings/CancelTaxiBooking/<?php echo $data['taxibookings']->ReservationID ?>"><button id="taxi_veh_delete" type="button">Cancel</button></a>
                
            <?php
                }
                elseif ($data['taxibookings']->status=='Confirmed') {
                                            ?>
                                          
                                            <a href="<?php echo URLROOT; ?>/Bookings/CompleteTaxiBooking/<?php echo $data['taxibookings']->ReservationID."/".$data['taxibookings']->TaxiOwnerID?>"><button class="review-btn" id="taxi_veh_view" type="button">Completed</button></a>
                                            <a href="<?php echo URLROOT; ?>/Bookings/CancelTaxiBooking/<?php echo $data['taxibookings']->ReservationID ?>"><button id="taxi_veh_delete" type="button">Cancel</button></a>
                
                                            <?php
                }
                elseif ($data['taxibookings']->status=='Canceled') {
                                            ?>
                                             <td data-lable="Name"><img src="<?php echo URLROOT; ?>/img/cancel.png" alt="user" class="post-by-img"><br>Canceled</td>
                                            <?php
                }
            ?>
        </div>

        

    </main>
 </div>

 <?php
}
?>

<?php require APPROOT.'/views/inc/components/footer.php'; ?>


<script type="text/javascript" src="<?php echo AUTO_MAP_URL ?>" defer></script>
<script>
    let map;
    var marker_pickup;
    var marker_dropoff;
    var directionsService;
    var directionsRenderer;

    function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
            zoom: 8,
        });

        // Create a directions renderer object
        directionsRenderer = new google.maps.DirectionsRenderer();

        // Set the map for the directions renderer
        directionsRenderer.setMap(map);

        // Convert pickup location address to coordinates and create marker
        // geocodeAddress('<?php echo $data['taxibookings']->pickup_location ?>', function(results) {
            var myLatLng = new google.maps.LatLng($('#p-latitude').val(), $('#p-longitude').val());
            marker_pickup = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: 'Pickup Location'
            });
            // map.setCenter(results[0].geometry.location);
            calculateAndDisplayRoute();
        // });

        // Convert dropoff location address to coordinates and create marker
        // geocodeAddress('<?php echo $data['taxibookings']->destination ?>', function(results) {
            var myLatLng_d = new google.maps.LatLng($('#d-latitude').val(), $('#d-longitude').val());
            marker_dropoff = new google.maps.Marker({
                position: myLatLng_d,
                map: map,
                title: 'Dropoff Location'
            });
            calculateAndDisplayRoute();
        // });
    }

    function calculateAndDisplayRoute() {
        // If both markers have been created, calculate and display the route
        if (marker_pickup && marker_dropoff) {
            // Create a directions service object
            directionsService = new google.maps.DirectionsService();

            // Define the origin, destination, and travel mode for the route
            var request = {
                origin: marker_pickup.getPosition(),
                destination: marker_dropoff.getPosition(),
                travelMode: 'DRIVING'
            };

            // Call the directions service to calculate the route
            directionsService.route(request, function(result, status) {
                if (status === 'OK') {
                    // Display the route on the map
                    directionsRenderer.setDirections(result);
                    var distance = result.routes[0].legs[0].distance.text;
                    console.log('Shortest road distance: ' + distance);
                } else {
                    console.error('Error calculating route:', status);
                }
            });
        }
    }

    // function geocodeAddress(address, callback) {
    //     var geocoder = new google.maps.Geocoder();
    //     geocoder.geocode({ 'address': address }, function(results, status) {
    //         if (status === 'OK') {
    //             callback(results);
    //         } else {
    //             console.error('Geocode was not successful for the following reason:', status);
    //         }
    //     });
    // }

    function initialize() {
        initMap();
    }
</script>
