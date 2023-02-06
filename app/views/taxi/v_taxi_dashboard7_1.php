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
            <a href="<?php echo URLROOT; ?>/Taxies/trip" class="menu-item">Trip Requests</a>
            <a href="<?php echo URLROOT; ?>/Taxies/offers" class="menu-item">Offers</a>
            <a href="<?php echo URLROOT; ?>/Taxies/bookings" class="menu-item is-active">Bookings</a>
            <a href="#" class="menu-item">Exit Dashboard</a>
        </nav>
    </aside>

    <main class="right-side-content">
    
    
    <div class="taxi_off_cont">
        <button id="tax_book_backBut" onclick="window.location='<?php echo URLROOT; ?>/Taxies/bookings'">Back</button>

        <div class="tax_book_view_cont">
            <div class="tax_book_view_innerCont">

                <table class="tax_book_viewTable">
                
                    <tr>
                        <td>Booking ID:</td>
                        <td>B1025</td>
                    </tr>

                    <tr>
                        <td>Traveler ID:</td>
                        <td>T1025</td>
                    </tr>

                    <tr>
                        <td>Trip Date:</td>
                        <td>12.10.2022</td>
                    </tr>

                    <tr>
                        <td>Start:</td>
                        <td>Colombo</td>
                    </tr>

                    <tr>
                        <td>Destination:</td>
                        <td>Kandy</td>
                    </tr>

                    <tr>
                        <td>Paymnet method:</td>
                        <td>At the end of the trip</td>
                    </tr>

                    <tr>
                        <td>Payment amount:</td>
                        <td>20,000.00</td>
                    </tr>

                    <tr>
                        <td>Payment made:</td>
                        <td>No</td>
                    </tr>
                
                </table>
            </div>
            
            <div>
                <button id="tax_book_comBut">Complain</button>
            </div>

        </div>
        

        </div>
    </main>
 </div>