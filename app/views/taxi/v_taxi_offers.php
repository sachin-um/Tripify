

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
        <?php
        if ($_SESSION['user_type']=='Traveler') {
        ?>

        <nav class="menu">
            <a href="<?php echo URLROOT; ?>/Pages/profile" class="menu-item">User Profile</a>
            <a href="<?php echo URLROOT; ?>/Bookings/HotelBookings/<?php echo $_SESSION['user_type'] ?>/<?php echo $_SESSION['user_id'] ?>" class="menu-item">Hotel Bookings</a>
            <a href="<?php echo URLROOT; ?>/Bookings/TaxiBookings/<?php echo $_SESSION['user_type'] ?>/<?php echo $_SESSION['user_id'] ?>" class="menu-item">Taxi Bookings</a>
            <a href="<?php echo URLROOT; ?>/Bookings/GuideBookings/<?php echo $_SESSION['user_type'] ?>/<?php echo $_SESSION['user_id'] ?>" class="menu-item">Guide Bookings</a>
            <a href="<?php echo URLROOT; ?>/Request/TaxiRequest" class="menu-item is-active">Taxi Requests</a>
            <a href="<?php echo URLROOT; ?>/Request/GuideRequest" class="menu-item">Guide Requests</a>
            <a href="<?php echo URLROOT; ?>/Request/TaxiRequest" class="menu-item">Complains</a>
            <a href="<?php echo URLROOT; ?>/Pages/home" class="menu-item">Exit Dashboard</a>
        </nav>
        <?php
        }
        else if ($_SESSION['user_type']=='Taxi') {
        ?>
        <nav class="menu">
            <a href="<?php echo URLROOT; ?>/Pages/profile" class="menu-item">User Profile</a>
            <!-- <a href="#" class="menu-item is-active">Company</a> -->
            <a href="<?php echo URLROOT; ?>/Taxi_Driver/viewdrivers" class="menu-item">Drivers</a>
            <a href="<?php echo URLROOT; ?>/Taxi_Vehicle/viewvehicles" class="menu-item">Vehicles</a>
            <a href="<?php echo URLROOT; ?>/Taxies/payments" class="menu-item">Payments</a>
            <a href="<?php echo URLROOT; ?>/Request/TaxiRequest" class="menu-item">Trip Requests</a>
            <a href="<?php echo URLROOT; ?>/Offers/taxioffers" class="menu-item is-active">Offers</a>
            <a href="<?php echo URLROOT; ?>/Taxies/bookings" class="menu-item">Bookings</a>
            <a href="#" class="menu-item">Exit Dashboard</a>
        </nav>
        <?php
        }
        ?>
    </aside>

    <main class="right-side-content">
        <div>
            <h2 class="title"  style="margin-top:2%">Taxi Offers</h2>
            <hr>
        </div>
        <div class="request-list">
            
            <?php
            $offers=$data['taxioffers'];
            // foreach($offers as $key => $value)
            // {
            //     echo $key." has the value". $value;
            // }
            foreach($offers as $taxioffer):
                // echo $taxioffer->RequestID;
            ?>
            <div class="request">
                <div class="post-header">Request ID : <?php echo $taxioffer->request_id; ?></div>
                    <div class="post-body">

                        <h5>Offer Details</h5>
                    
                        <div class="post-details">Vehicle Number: <?php echo $taxioffer->vehicle->VehicleID ?> </div>
                        <div class="post-details">Vehicle Type: <?php echo $taxioffer->vehicle->VehicleType ?> </div>
                        <div class="post-date">Price per KM: <span id="request-data"><?php echo $taxioffer->PricePerKm ?></span></div>
                        <div class="post-time">PaymentMethod: <?php echo $taxioffer->PaymentMethod ?></div>
                        <div class="post-details">Driver Name: <?php echo $taxioffer->vehicle->driver_name ?> </div>
                        <div class="post-details">Additional Details: <?php echo $taxioffer->additional_details ?> </div>
                        <div class="post-by-content">
                            <div class="post-by">Offered By: <?php echo $taxioffer->owner->owner_name ?></div>
                            <div class="post-by">Contact number: <?php echo $taxioffer->owner->contact_number ?> </div>
                            <div class="post-by">Offered at: <?php echo $taxioffer->post_at ?> </div>
                        </div>
                        
                </div>
                <div class="request-footer">
                    <?php
                    if ($_SESSION['user_type']=='Taxi') {
                        ?>
                            <a href="<?php echo URLROOT; ?>/Request/editTaxiRequest/<?php echo $taxirequest->RequestID ?>"><button id="request-edit-btn" type="submit">Edit</button></a>
                            <button id="request-delete-btn" type="submit">Delete</button>
                        <?php
                    }
                    elseif ($_SESSION['user_type']=='Traveler') {
                        ?>
                        <button id="request-offer-btn" type="submit">Accept offer</button>
                        <button id="request-delete-btn" type="submit">Reject Offer</button>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <?php
            endforeach;
            ?>

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