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
            <a href="<?php echo URLROOT; ?>/Taxies/offers" class="menu-item">Offers</a>
            <a href="<?php echo URLROOT; ?>/Taxies/bookings" class="menu-item">Bookings</a>
            <a href="#" class="menu-item">Exit Dashboard</a>
        </nav>
    </aside>

    <main class="right-side-content">
        <div class="taxi_pay_cont">
            <div class="taxi_dash_payment">
                <table class="taxi_pay_cont_table">
                    <tr id="tax_off_th">
                        <th>ReservationID</th>
                        <th>VehicleID</th>
                        <th>Date Added</th>
                        <th>Payment Amount(Rs)</th>
                        <th>Payment Method</th>
                        <th>Payment Status</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>R1001</td>
                        <td>V7589</td>
                        <td>02.10.2022</td>
                        <td>10000.00</td>
                        <td>Online</td>
                        <td>Paid</td>
                        <td><button id="tax_off_tb_not">view</button></td>
                    </tr>

                    <tr>
                        <td>R1001</td>
                        <td>V7589</td>
                        <td>02.10.2022</td>
                        <td>10000.00</td>
                        <td>Online</td>
                        <td>Paid</td>
                        <td><button id="tax_off_tb_not">view</button></td>
                    </tr>

                    <tr>
                        <td>R1001</td>
                        <td>V7589</td>
                        <td>02.10.2022</td>
                        <td>10000.00</td>
                        <td>Online</td>
                        <td>Pending</td>
                        <td><button id="tax_off_tb_not">view</button></td>
                    </tr>

                </table>

            </div>
            <button id="tax_dash_paybut">Get Full Report</button>
            

        </div>
    </main>
</div>