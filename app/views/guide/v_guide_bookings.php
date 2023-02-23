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
                <a href="<?php echo URLROOT; ?>/Request/GuideRequest" class="menu-item">Trip Request</a>
                <a href="<?php echo URLROOT; ?>/Offers/guideoffers" class="menu-item">Offers</a>
                <a href="<?php echo URLROOT; ?>/Guides/viewGuideBookings" class="menu-item is-active">Bookings</a>
                <a href="#" class="menu-item">Payments</a><br>
                <a href="#" class="menu-item">Exit Dashboard</a>
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
                    <th>Starting Time</th>
                    <th>Duration</th>
                    <th>Location</th>
                    <th>Payment</th>
                    <th>Payment Status</th>
                    <th>Accept Booking</th>
                    <th>Ignore Booking</th>
                </tr>
                <?php
                    $bookings=$data['guidebookings'];
                    foreach($bookings as $booking):
                ?>
                <tr>
                    <td><?php echo $booking->DateAdded?></td>
                    <td><?php ?> </td>
                    <td><?php echo $booking->ReservedDate?> </td>
                    <td><?php echo $booking->StartingTime?> </td>
                    <td><?php echo $booking->Duration?> </td>
                    <td><?php echo $booking->Location?> </td>
                    <td><?php echo $booking->payment?> </td>
                    <td><?php echo $booking->PaymentStatus?> </td>
                    <td><button id="guide_booking">Accept</button></td>
                    <td><button id="guide_booking">Ignore</button></td>
                </tr>
                <?php
                    endforeach;
                ?>
                
                

        </table> 
        
    </main>
 </div>