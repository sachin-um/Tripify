<?php
$_SESSION['user_id'];
$_SESSION['user_type'];


if (empty($_SESSION['user_id'])) {
    flash('reg_flash', 'You need to have logged in first...');
    redirect('Users/login');
}
elseif ($_SESSION['user_type']!='Traveler') {
    flash('reg_flash', 'Only the Traveler can have access...');
    redirect('Pages/home');
}
else {
    ?>
<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>
<div class="app">
    <aside class="sidebar">

        <div class="menu-toggle">
            <div class="hamburger">
                <span></span>
            </div>
        </div>

        <nav class="menu">
            <a href="<?php echo URLROOT; ?>/Pages/profile" class="menu-item">User Profile</a>
            <a href="<?php echo URLROOT; ?>/Bookings/HotelBookings/<?php echo $_SESSION['user_type'] ?>/<?php echo $_SESSION['user_id'] ?>" class="menu-item">Hotel Bookings</a>
            <a href="<?php echo URLROOT; ?>/Bookings/TaxiBookings/<?php echo $_SESSION['user_type'] ?>/<?php echo $_SESSION['user_id'] ?>" class="menu-item is-active">Taxi Bookings</a>
            <a href="<?php echo URLROOT; ?>/Bookings/GuideBookings/<?php echo $_SESSION['user_type'] ?>/<?php echo $_SESSION['user_id'] ?>" class="menu-item">Guide Bookings</a>
            <a href="<?php echo URLROOT; ?>/Request/TaxiRequest" class="menu-item">Taxi Requests</a>
            <a href="<?php echo URLROOT; ?>/Request/GuideRequest" class="menu-item">Guide Requests</a>
            <a href="<?php echo URLROOT; ?>/Trips/yourtrips/<?php echo $_SESSION['user_id'] ?>" class="menu-item">Your Trips</a>
            <a href="<?php echo URLROOT; ?>/Request/TaxiRequest" class="menu-item ">Complains</a>
            <a href="<?php echo URLROOT; ?>/Pages/home" class="menu-item">Exit Dashboard</a>
        </nav>
    </aside>

    <main class="right-side-content">
        <br>
        <br>
        <h2 style="text-align: left;">Taxi Bookings</h2>
        <hr>
        <?php flash('booking_flash'); ?>
        <br>
        <div class="first-container">
            <div class="admin-table-container">
                <table class="message-table">
                    <thead>
                        <tr>
                            <th>Booking ID</th>
                            <th>Vehicle Number</th>
                            <th>Driver Name</th>
                            <th>Booking Date</th>
                            <th>Booking Time</th>
                            <th>Pickup Location</th>
                            <th>Destination</th>
                            <th>Payment</th>
                            <th>Payment Method</th>
                            <th>Booking Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $bookings=$data['taxibookings'];
                            foreach($bookings as $booking):
                        ?>
                        <tr>
                            <td data-lable="ID"><?php echo  $booking->ReservationID ?></td>
                            <td data-lable="Name"><a href="<?php echo URLROOT; ?>/Pages/profile/<?php echo $booking->vehicle->OwnerID; ?>"><?php echo $booking->vehicle->vehicle_number ?></a></td>
                            <td data-lable="Email"><?php echo $booking->vehicle->Name ?></td>
                            <td data-lable="Message"><?php echo $booking->booking_date ?></td>
                            <td data-lable="Message"><?php echo $booking->booking_time ?></td>
                            <td data-lable="Message"><?php echo $booking->pickup_location ?></td>
                            <td data-lable="Message"><?php echo $booking->destination ?></td>
                            <td data-lable="Message"><?php echo $booking->Price ?></td>
                            <td data-lable="Message"><?php echo $booking->PaymentMethod ?></td>
                            <td data-lable="Message"><?php echo $booking->status ?></td>
                            <td data-lable="Name">
                            <button class="acc-view-btn" type="button" onclick="showTaxiBooking('<?php echo $booking->ReservationID; ?>','<?php echo URLROOT; ?>')">
                                <i class="fa-solid fa-eye" style="margin-right: 10px"></i>
                                View 
                            </button>
                            <?php
                                if ($booking->status=='Yet To Confirm') {
                                    ?>
                                    
                                    
                                        <a href="<?php echo URLROOT; ?>/Bookings/EditTaxiBooking/<?php echo $booking->ReservationID ?>"><button class="edit-btn" type="button" style="margin-top:10px">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                                Edit
                                            </button>
                                        </a>
                                        <a href="<?php echo URLROOT; ?>/Bookings/CancelTaxiBooking/<?php echo $booking->ReservationID ?>"><button class="btn" type="button" style="margin-top:10px">
                                            <i class="fa-solid fa-xmark"></i>
                                            Cancel
                                            </button>
                                        </a>
                                        
                                    
                                    <?php
                                }
                                elseif ($booking->status=='Confirmed') {
                                    if ($booking->PaymentStatus!='Paid') {
                                        if ($booking->PaymentMethod=='Online') {
                                            ?>
                                            
                                                <button class="pay-btn" type="button" style="margin-top:10px">
                                                    <i class="fa-solid fa-money-check-dollar" style="margin-right: 10px"></i>
                                                    Pay Now
                                                </button>
                                            <?php
                                        }
                                        else {
                                            ?>
                                                <button class="add-to-plan-btn" type="button" onclick="showPopup(this,'taxi','<?php echo URLROOT; ?>')">
                                                    <i class="fa-solid fa-plane" style="margin-right: 10px"></i>    
                                                    Add to Trip Plan
                                                </button>
                                            <?php
                                        }
                                    }
                                    else {
                                        ?>
                                            <button class="add-to-plan-btn" type="button" onclick="showPopup(this,'taxi','<?php echo URLROOT; ?>')">
                                                <i class="fa-solid fa-plane" style="margin-right: 10px"></i>    
                                                Add to Trip Plan
                                            </button>
                                        <?php
                                    }
                                }
                                elseif ($booking->status=='Finished') {
                                    ?>
                                    
                                    <br>
                                    <?php
                                }
                                elseif ($booking->status=='Canceled') {
                                    ?>
                                    
                                    <?php
                                }
                            ?>
                            </td>
                        </tr>
                        <?php
                            endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
            <div id="popup" class="trip-popup">
                <div id="popup-content" class="trip-popup-content"></div>
            </div>
        </div>
        
    </main>
 </div>

 <script type="text/JavaScript" src="<?php echo URLROOT;?>/js/components/popups.js"></script>
 <script type="text/javascript" src="<?php echo AUTO_MAP_URL ?>" defer></script>
 <script>
    var map;
                  function initMap(data) {
                    var start = new google.maps.LatLng(data.p_latitude,data.p_longitude);
                    var destination=new google.maps.LatLng(data.d_latitude,data.d_longitude);
                    map = new google.maps.Map(document.getElementById('map'), {
                      center: start, 
                      zoom: 11
                    });
                  
                    
                    var directionsService = new google.maps.DirectionsService();
                    var directionsRenderer = new google.maps.DirectionsRenderer();
                    directionsRenderer.setMap(map);
                    
                    var request = {
                      origin: start, 
                      destination: destination, 
                      travelMode: 'DRIVING' 
                    };
                    
                    directionsService.route(request, function(result, status) {
                      if (status === 'OK') {
                        directionsRenderer.setDirections(result);
                      }
                    });
                  }
 </script>
 <?php
}
?>