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
            <a href="<?php echo URLROOT; ?>/Request/TaxiRequest" class="menu-item is-active">Trip Requests</a>
            <a href="<?php echo URLROOT; ?>/Taxies/offers" class="menu-item">Offers</a>
            <a href="<?php echo URLROOT; ?>/Taxies/bookings" class="menu-item">Bookings</a>
            <a href="#" class="menu-item">Exit Dashboard</a>
        </nav>
    </aside>

    <main class="right-side-content">

    <button id="tax_trip_backBut" onclick="window.location='<?php echo URLROOT; ?>/Taxies/trip'">Back</button>
        <div class="taxi_dash_tripcontainer">
            
           
            
            <div class="taxi_dash_tripview_cont">
                <table class="taxi_dash_tripview_table">
                    <tr>
                        <td>Request by:</td>
                        <td>T5698</td>
                    </tr>

                    <tr>
                        <td>Start:</td>
                        <td>Galle</td>
                    </tr>

                    <tr>
                        <td>Destination:</td>
                        <td>Colombo</td>
                    </tr>

                    <tr>
                        <td>Date</td>
                        <td>18.02.2022</td>
                    </tr>

                    <tr>
                        <td>Start Time</td>
                        <td>9.00 AM</td>
                    </tr>

                    <tr>
                        <td>Vechicle Type:</td>
                        <td>Van</td>
                    </tr>

                    <tr>
                        <td>Special Notes:</td>
                        <td>I want a van for four passengers. We start our trip at 9am and expect to be in Colombo by 11.45am.</td>
                    </tr>
            

                 </table>

                 
            </div>

            <div class="taxi_trip_but_cont">
                <button>Contact</button>
                <button onclick="window.location='<?php echo URLROOT; ?>/Taxies/makeoffers'">Make Offer</button>
                <button>Decline Offer</button>
            </div>
               
        </div>
    </main>
 </div>