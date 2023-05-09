<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>
<?php $_SESSION['user_id'];
?>
<div class="app">
    <aside class="sidebar">

        <div class="menu-toggle">
            <div class="hamburger">
                <span></span>
            </div>
        </div>

        <nav class="menu">
                <a href="<?php echo URLROOT; ?>/Pages/profile" class="menu-item">User Profile</a>
                <a href="<?php echo URLROOT; ?>/Request/GuideRequest" class="menu-item">Trip Request</a>
                <a href="<?php echo URLROOT; ?>/Offers/guideoffers" class="menu-item">Offers</a>
                <a href="<?php echo URLROOT; ?>/Bookings/GuideBookings/<?php echo $_SESSION['user_type']; ?>/<?php echo $_SESSION['user_id']; ?>" class="menu-item">Bookings</a>
                <a href="<?php echo URLROOT; ?>/Payments/GuidePayments/" class="menu-item">Payments</a>
                <a href="<?php echo URLROOT; ?>/Pages/home/" class="menu-item" >Exit Dashboard</a>
        </nav>
    
    </aside>

    <main class="right-side-content">

        <br><br>
        <h2>Bookings</h1>
        <hr>

        <table class="guide-table">
                <tr id="header">
                    <th>Booking Date</th>
                    <th>Traveler Name </th>
                    <th>Reservation Date</th>
                    <th>Trip End Date</th>
                    <th>Location</th>
                    <th>Payment</th>
                    <th>payment Status</th>
                    <th>booking Status</th>
                    <th>Action</th>
                    
                </tr>
                <?php
                    //print_r($data);
                    $bookings=$data['guidebookings'];
                    foreach($bookings as $booking):
                ?>
                <tr>
                    <td><?php echo $booking->DateAdded?></td>
                    <td><?php echo $booking->traveler_name?> </td>
                    <td><?php echo $booking->StartDate?> </td>
                    <td><?php echo $booking->EndDate?> </td>
                    <td><?php echo $booking->Location?> </td>
                    <td><?php echo $booking->payment?> </td>
                    <td><?php echo $booking->PaymentStatus?> </td>
                    <td><?php echo $booking->status?> </td>

                    <?php
                        if ($booking->status=='Yet To Confirm') {
                    ?>
                                    
                        <td data-lable="Name">
                            <a href="<?php echo URLROOT; ?>/Bookings/ConfirmGuideBooking/<?php echo $booking->BookingID ?>"><button class="edit-btn" id="taxi_veh_view" type="button">Confirm</button></a>
                            <a href="<?php echo URLROOT; ?>/Bookings/CancelGuideBooking/<?php echo $booking->BookingID ?>"><button id="taxi_veh_delete" type="button">Cancel</button></a>
                        </td>
                        
                    <?php
                        }else if ($booking->status=='Confrimed') {
                    ?>
               
                        <td data-lable="Name">
                            <a href="<?php echo URLROOT; ?>/Bookings/CompletedGuideBooking/<?php echo $booking->BookingID ?>"><button class="edit-btn" id="taxi-complete-btn" type="button">Finished</button></a>
                            <a href="<?php echo URLROOT; ?>/Bookings/CancelGuideBooking/<?php echo $booking->BookingID ?>"><button id="taxi_veh_delete" type="button">Cancel</button></a>
                        </td>
                               
                    <?php
                        }  
                    ?>

                </tr>
                <?php
                    endforeach;
                ?>
                
                

        </table> 
        
    </main>
 </div>