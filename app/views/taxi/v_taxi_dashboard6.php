

<!-- ........OFFERS................. -->


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
            <a href="<?php echo URLROOT; ?>/Taxies/offers" class="menu-item is-active">Offers</a>
            <a href="<?php echo URLROOT; ?>/Taxies/bookings" class="menu-item">Bookings</a>
            <a href="#" class="menu-item">Exit Dashboard</a>
        </nav>
    </aside>

    <main class="right-side-content">
        <p>Confrimed offers will be moved to the bookings section.</p>
        <div class="request-list">
            
            <div class="request">
                 <div class="post-header">Request ID : 8695</div>
                    <div class="post-body">

                        <h5>Offer Details</h5>
                    
                        <div class="post-details">Vehicle Number: PE-5659  </div>
                        <div class="post-details">Vehicle Type: Car </div>
                        <div class="post-details">Driver Name: Karththi </div>
                        <div class="post-date">Price per KM: <span id="request-data">2500.00</span></div>
                        <div class="post-time">PaymentMethod: End of the trip</div>
                        <div class="post-details">Additional Details:N/A </div>
                        <div class="post-by-content">
                            <div class="post-by">Offered By: Karththi</div>
                        <div class="post-by">Contact number: 0778964983 </div>
                        <div class="post-by">Offered at: 12/01/2023 </div>
                        </div>
                        
                </div>
            </div>

            <div class="request">
                 <div class="post-header">Request ID : 8695</div>
                    <div class="post-body">

                        <h5>Offer Details</h5>
                    
                        <div class="post-details">Vehicle Number: PE-5659  </div>
                        <div class="post-details">Vehicle Type: Car </div>
                        <div class="post-details">Driver Name: Karththi </div>
                        <div class="post-date">Price per KM: <span id="request-data">2500.00</span></div>
                        <div class="post-time">PaymentMethod: End of the trip</div>
                        <div class="post-details">Additional Details:N/A </div>
                        <div class="post-by-content">
                            <div class="post-by">Offered By: Karththi</div>
                        <div class="post-by">Contact number: 0778964983 </div>
                        <div class="post-by">Offered at: 12/01/2023 </div>
                        </div>
                        
                </div>
            </div>

            <div class="request">
                 <div class="post-header">Request ID : 8695</div>
                    <div class="post-body">

                        <h5>Offer Details</h5>
                    
                        <div class="post-details">Vehicle Number: PE-5659  </div>
                        <div class="post-details">Vehicle Type: Car </div>
                        <div class="post-details">Driver Name: Karththi </div>
                        <div class="post-date">Price per KM: <span id="request-data">2500.00</span></div>
                        <div class="post-time">PaymentMethod: End of the trip</div>
                        <div class="post-details">Additional Details:N/A </div>
                        <div class="post-by-content">
                            <div class="post-by">Offered By: Karththi</div>
                        <div class="post-by">Contact number: 0778964983 </div>
                        <div class="post-by">Offered at: 12/01/2023 </div>
                        </div>
                        
                </div>
            </div>

            

            
        </div>

        <!-- <div class="taxi_off_cont">
            <p>Confrimed offers will be moved to the bookings section.</p>

            <table class="taxi_off_cont_table">
            <tr id="tax_off_th">
                <th>OfferID</th>
                <th>TravelerID</th>
                <th>Date Added</th>
                <th>Start</th>
                <th>Destination</th>
                <th>Fee</th>
                <th></th>
            </tr>
            <tr>
                <td>1001</td>
                <td>T7589</td>
                <td>02.10.2022</td>
                <td>Colombo</td>
                <td>Kandy</td>
                <td>20000.00</td>
                <td><button id="tax_off_tb_not">pending</button></td>
            </tr>

            <tr>
                <td>1001</td>
                <td>T7589</td>
                <td>02.10.2022</td>
                <td>Colombo</td>
                <td>Kandy</td>
                <td>20000.00</td>
                <td><button id="tax_off_tb_not">pending</button></td>
            </tr>


            <tr>
                <td>1001</td>
                <td>T7589</td>
                <td>02.10.2022</td>
                <td>Colombo</td>
                <td>Kandy</td>
                <td>20000.00</td>
                <td><button id="tax_off_tb">Accepted</button></td>
            </tr>
            
            </table>

        </div> -->
    </main>
 </div>