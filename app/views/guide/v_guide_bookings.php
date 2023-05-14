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
        <?php flash('booking_flash'); ?>
        <div class="admin-table-container">
            <table class="message-table" id="message-table">
                <thead>
                    <th>Booking Date</th>
                    <th>Traveler Name </th>
                    <th>Reservation Date</th>
                    <th>Trip End Date</th>
                    <th>Location</th>
                    <th>Payment</th>
                    <th>payment Status</th>
                    <th>booking Status</th>
                    <th>Action</th>
                </thead>
                <tbody>
                <?php
                    //print_r($data);
                    $bookings=$data['guidebookings'];
                    foreach($bookings as $booking):
                ?> 
                        <tr>
                            <td><?php echo $booking->DateAdded?></td>
                            <td><a href="<?php echo URLROOT; ?>/Pages/profile/<?php echo $booking->traveler->UserID; ?>/Traveler" style="text-decoration:none;cursor:pointer;"><?php echo $booking->traveler_name?></a></td>
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
                                    <a href="<?php echo URLROOT; ?>/Bookings/ConfirmGuideBooking/<?php echo $booking->BookingID ?>"><button class="pay-btn" type="button">Confirm</button></a>
                                    <a href="<?php echo URLROOT; ?>/Bookings/CancelGuideBooking/<?php echo $booking->BookingID ?>"><button class="btn" type="button">Cancel</button></a>
                                </td>
                                
                            <?php
                                }else if ($booking->status=='Confirmed') {
                            ?>
                    
                                <td data-lable="Name">
                                    <a href="<?php echo URLROOT; ?>/Bookings/CompletedGuideBooking/<?php echo $booking->BookingID ?>"><button class="pay-btn" type="button">Finished</button></a>
                                    <a href="<?php echo URLROOT; ?>/Bookings/CancelGuideBooking/<?php echo $booking->BookingID ?>"><button class="btn" type="button">Cancel</button></a>
                                </td>
                            <?php
                                }  
                                    else if ($booking->status=='Cancelled') {
                                    ?>
                            
                                        <td data-lable="Name">
                                            <i class="fa-solid fa-xmark"></i>
                                        </td>
                                            
                                    <?php
                                        }else if ($booking->status=='Completed') {
                                            ?>
                                    
                                                <?php
                                                    if ($booking->PaymentStatus!='Paid' && $booking->PaymentMethod=='Cash') {
                                                        ?>
                                                            <a href="<?php echo URLROOT; ?>/Bookings/CompletedGuidePayment/<?php echo $booking->BookingID ?>"><button class="pay-btn" type="button"><i class="fa-solid fa-square-dollar" style="margin-right: 10px"></i>Payment Recieved</button></a>
                                                        <?php
                                                    } else {
                                                       ?>
                                                            <td data-lable="Name">
                                                                <i class="fa-solid fa-check"></i>
                                                            </td>
                                                       <?php
                                                    }
                                                    

                                                ?>
                                                
                                                    
                                    <?php
                                        }  
                                    ?>

                                </tr> 
                                <?php
                                    endforeach;
                                ?>
                </tbody>
            </table>
        </div>
         
        
    </main>
 </div>