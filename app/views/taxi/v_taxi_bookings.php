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
            <h2 class="title" >Bookings</h2>
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
                            <th>Traveler Name</th>
                            <th>Booking Date</th>
                            <th>Booking Time</th>
                            <th>Pickup Location</th>
                            <th>Destination</th>
                            <th>Payment</th>
                            <th>Payment Status</th>
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
                            <td data-lable="Name"><?php echo $booking->vehicle->vehicle_number ?></a></td>
                            <td data-lable="Email"><?php echo $booking->vehicle->Name ?></td>
                            <td data-lable="Email"><a href="<?php echo URLROOT; ?>/Pages/profile/<?php echo $booking->traveler->UserID; ?>/Traveler" style="text-decoration:none;cursor:pointer;"><?php echo $booking->traveler->Name ?></a></td>
                            <td data-lable="Message"><?php echo $booking->booking_date ?></td>
                            <td data-lable="Message"><?php echo $booking->booking_time ?></td>
                            <td data-lable="Message"><?php echo $booking->pickup_location ?></td>
                            <td data-lable="Message"><?php echo $booking->destination ?></td>
                            <td data-lable="Message"><?php echo $booking->Price ?></td>
                            <td data-lable="Message"><?php echo $booking->PaymentStatus ?></td>
                    
                            <td data-lable="Message"><?php echo $booking->status ?></td>
                            <td data-lable="Name">
                            <a href="<?php echo URLROOT; ?>/Bookings/TaxiBookingsDetails/<?php echo $booking->ReservationID ?>"><button class="edit-btn" type="button">View</button></a>
                            </td>
                            <!-- <?php
                                if ($booking->status=='Yet To Confirm') {
                                    ?>
                                    
                                    <td data-lable="Name">
                                        <a href="<?php echo URLROOT; ?>/Taxies/bookingsview/<?php echo $booking->ReservationID ?>"><button class="edit-btn" type="button">Confirm</button></a>
                                        
                                    </td>
                                    <?php
                                }
                               
                                elseif ($booking->status=='Finished') {
                                    ?>
                                    <td data-lable="Name"><img src="<?php echo URLROOT; ?>/img/done.png" alt="user" class="post-by-img"><br>Completed
                                    <br>
                                    <a href="<?php echo URLROOT; ?>/Bookings/EditTaxiBooking/<?php echo $booking->ReservationID ?>"><button class="review-btn" type="button">Add a Review</button></a>
                                    </td>
                                    <?php
                                }
                                elseif ($booking->status=='Canceled') {
                                    ?>
                                    <td data-lable="Name"><img src="<?php echo URLROOT; ?>/img/cancel.png" alt="user" class="post-by-img"><br>Canceled</td>
                                    <?php
                                }
                            ?> -->
                            
                        </tr>
                        <?php
                            endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
            
        </div>

    </main>
 </div>

 <?php
}
?>

<?php require APPROOT.'/views/inc/components/footer.php'; ?>
