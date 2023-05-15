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
            <!-- <a href="#" class="menu-item is-active">Company</a> -->
            <a href="<?php echo URLROOT; ?>/Taxi_Driver/viewdrivers" class="menu-item">Drivers</a>
            <a href="<?php echo URLROOT; ?>/Taxi_Vehicle/viewvehicles" class="menu-item">Vehicles</a>
            <a href="<?php echo URLROOT; ?>/Taxies/payments" class="menu-item is-active">Payments</a>
            <a href="<?php echo URLROOT; ?>/Request/TaxiRequest" class="menu-item">Trip Requests</a>
            <a href="<?php echo URLROOT; ?>/Offers/taxioffers" class="menu-item">Offers</a>
            <a href="<?php echo URLROOT; ?>/Bookings/TaxiBookings/<?php echo $_SESSION['user_type'] ?>/<?php echo $_SESSION['user_id'] ?>" class="menu-item">Bookings</a>
            <a href="<?php echo URLROOT; ?>/Pages/taxies" class="menu-item">Exit Dashboard</a>
        </nav>
    </aside>

    <main class="right-side-content">
        <br><br>
        <div>
            <h2 class="title" >Payments</h2>
            <hr>
        <div class="taxi_pay_cont">
            <div class="taxi_dash_payment">
                <table class="taxi_pay_cont_table">
                    <tr id="tax_off_th">
                        <th>ReservationID</th>
                        <th>Vehicle Number</th>
                        <th>Date Added</th>
                        <th>Trip</th>
                        <th>Payment Amount(Rs)</th>
                        <th>Payment Method</th>
                        <th>Payment Status</th>
                        <th></th>
                    </tr>
                    <?php 
                        foreach ($data['taxibookings'] as $booking){
                       
                    ?>
                    <tr>
                        <td><?php echo $booking->ReservationID?></td>
                        <td><?php echo $booking->vehicle->vehicle_number?></td>
                        <td><?php echo $booking->est_end_date?></td>
                        <td><?php echo $booking->pickup_location.'-->'?><?php echo $booking->destination?></td>
                        <td><?php echo $booking->Price?></td>
                        <td><?php echo $booking->PaymentMethod?></td>
                        <td><?php echo $booking->PaymentStatus?></td>
                        <td><button id="tax_off_tb_not">view</button></td>
                    </tr>

                    <?php }?>

                </table>

            </div>
            <button id="tax_dash_paybut" onclick="window.location.href='<?php echo URLROOT?>/Taxies/generatepaymentPDF'">Get Full Report</button>
            

        </div>
    </main>
</div>