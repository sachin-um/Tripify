<!-- ........Bookings........... -->

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
            <a href="<?php echo URLROOT; ?>/Taxies/payments" class="menu-item">Payments</a>
            <a href="<?php echo URLROOT; ?>/Request/TaxiRequest" class="menu-item">Trip Requests</a>
            <a href="<?php echo URLROOT; ?>/Taxies/offers" class="menu-item">Offers</a>
            <a href="<?php echo URLROOT; ?>/Taxies/bookings" class="menu-item is-active">Bookings</a>
            <a href="#" class="menu-item">Exit Dashboard</a>
        </nav>
    </aside>

    <main class="right-side-content">
    <div class="taxi_off_cont">
           
            <table class="taxi_off_cont_table">
            <tr id="tax_off_th">
                <th>BookingID</th>
                <th>Traveler Name</th>
                <th>Driver Name</th>
                <th>Vehicle Number</th>
                <th>Trip Date</th>
                <th>Start</th>
                <th>Destination</th>
                <!-- <th>Completed</th> -->
                <th>Booking</th>
            </tr>
            
            <tr>
                <td>B1001</td>
                <td>Perera</td>
                <td>Kumar</td>
                <td>PE-5659</td>
                <td>02.10.2022</td>
                <td>Colombo</td>
                <td>Kandy</td>
                <!-- <td>Yes</td> -->
                <td><button id="tax_book_tb" onclick="window.location='<?php echo URLROOT; ?>/Taxies/bookingsview'">Confirm </button></td>
            </tr>

            <tr>
                <td>B1001</td>
                <td>Perera</td>
                <td>Kumar</td>
                <td>PE-5659</td>
                <td>02.10.2022</td>
                <td>Colombo</td>
                <td>Kandy</td>
                <!-- <td>Yes</td> -->
                <td><button id="tax_book_tb" onclick="window.location='<?php echo URLROOT; ?>/Taxies/bookingsview'">Confirm </button></td>
            </tr>

            <tr>
                <td>B1001</td>
                <td>Perera</td>
                <td>Kumar</td>
                <td>PE-5659</td>
                <td>02.10.2022</td>
                <td>Colombo</td>
                <td>Kandy</td>
                <!-- <td>Yes</td> -->
                <td><button id="tax_book_tb" onclick="window.location='<?php echo URLROOT; ?>/Taxies/bookingsview'">Confirm </button></td>
            </tr>
            
            </table>

        </div>
    </main>
 </div>