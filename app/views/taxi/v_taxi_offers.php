

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
            <a href="<?php echo URLROOT; ?>/Bookings/TaxiBookings/<?php echo $_SESSION['user_type'] ?>/<?php echo $_SESSION['user_id'] ?>" class="menu-item">Bookings</a>
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
        <div class="offer-filter-area">
            <div class="offer-radio">
                <div class="offer-radio-container" style="margin-right:25px">
                    <input type="radio" id="asc" name="filter" value="asc">
                    <label for="acs">Lowerst Price</label>
                </div>

                <div class="offer-radio-container" style="margin-left:25px">
                    <input type="radio" id="date" name="filter" value="date">
                    <label for="date">Newest Offers</label>
                </div>
            </div>

            
        </div>
        <div class="request-list" id="request-list">
            <?php flash('taxi_offer_flash'); ?>
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
                <div class="post-header">Request ID : TR<?php echo $taxioffer->request_id; ?></div>
                    <div class="post-body" style="padding: 40px 50px;">

                        <h5 style="text-align:center;">Offer ID - TO<?php echo $taxioffer->OfferID ?></h5>
                        <div class="req-slot1" style="margin-top:10px">
                            <div class="detail-container" style="margin-right: 20px;">
                                <div class="header-container">
                                    <i class="fa-solid fa-car fa-2xl" style="color: #03002E; margin-right: 10px;"></i>
                                    <div class="heading">Vehicle Number</div>
                                </div>
                                <div class="post-tag post-date description" style="margin-left: 33px">
                                    <?php echo $taxioffer->vehicle->VehicleID; ?></span>
                                </div>
                            </div>
                            <div class="detail-container">
                                <div class="header-container">
                                    <i class="fa-solid fa-truck-plane fa-2xl" style="color: #03002E; margin-right: 10px;"></i>
                                    <div class="heading">Vehicle Type</div>
                                </div>
                                <div class="post-tag post-date description" style="margin-left: 33px">
                                    <?php echo $taxioffer->vehicle->VehicleType;; ?></span>
                                </div>
                            </div>
                            
                        </div>
                        <div class="req-slot2">
                            <div class="detail-container" style="margin-right: 20px;">
                                <div class="header-container">
                                    <i class="fa-solid fa-coins fa-2xl" style="color: #03002E; margin-right: 10px;"></i>
                                    <div class="heading">Price Per KM</div>
                                </div>
                                <input type="hidden" class="price" value="<?php echo $taxioffer->PricePerKm; ?>">
                                <div class="post-tag post-date description" style="margin-left: 33px" >
                                    <?php echo $taxioffer->PricePerKm; ?></span>
                                </div>
                            </div>
                            <div class="detail-container">
                                <div class="header-container">
                                    <i class="fa-solid fa-money-check-dollar fa-2xl" style="color: #03002E; margin-right: 10px;"></i>
                                    <div class="heading">Payment methods</div>
                                </div>
                                <div class="post-tag post-date description" style="margin-left: 33px">
                                    <?php echo $taxioffer->PaymentMethod; ?></span>
                                </div>
                            </div>
                            
                        </div>
                        <div class="req-slot2">
                            <div class="detail-container" style="width: 46%;">
                                <div class="header-container">
                                    <i class="fa-solid fa-user-large fa-2xl" style="color: #03002E; margin-right: 10px;"></i>
                                    <div class="heading">Driver</div>
                                </div>
                                <div class="post-tag post-date description" style="margin-left: 33px">
                                    <?php echo $taxioffer->driver->Name; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="req-slot3">
                            <div class="detail-container" style="margin-right: 20px; width: 97%;">
                                <div class="header-container">
                                        <i class="fa-solid fa-circle-info fa-2xl" style="color: #03002E; margin-right: 10px;"></i>
                                        <div class="heading">Additional Details</div>
                                </div>
                                <div class="post-tag post-date description" style="margin-left: 33px">
                                    <?php echo $taxioffer->additional_details; ?>
                                </div>
                            </div>
                    
                        </div>
                    
                        <div class="post-by-content">
                            <div class="post-by">Offered By: <a href="<?php echo URLROOT; ?>/Pages/profile/<?php echo $taxioffer->OwnerID; ?>"><?php echo $taxioffer->owner->owner_name ?></a></div>
                            <div class="post-by">Contact number: <?php echo $taxioffer->owner->contact_number ?> </div>
                            <input type="hidden" class="date" value="<?php echo $taxioffer->post_at ?>">
                            <div class="post-by">Offered at: <?php echo convertTime($taxioffer->post_at) ?> </div>
                        </div>
                        

                </div>
                <div class="request-footer">
                    <?php
                    if ($_SESSION['user_type']=='Taxi') {
                        ?>
                            <a href="<?php echo URLROOT; ?>/Request/editTaxiRequest/<?php echo $taxioffer->request_id ?>"><button id="request-edit-btn" type="submit">Edit</button></a>
                            <button id="request-delete-btn" type="submit">Delete</button>
                        <?php
                    }
                    elseif ($_SESSION['user_type']=='Traveler') {
                        ?>
                        
                    
                        <!-- onclick="validation($taxioffer->OfferID)" -->
                        <!-- <a href="<?php echo URLROOT; ?>/Bookings/acceptTaxiOffer/<?php echo $taxioffer->OfferID ?>/<?php echo $taxioffer->request_id ?>"> -->
                        <button class="request-offer-btn-cls" id="request-offer-btn-<?php echo $taxioffer->OfferID?>"  type="submit" onclick="validation('<?php echo $taxioffer->VehicleID?>','<?php echo $taxioffer->request->date ?>','<?php echo $taxioffer->request->time ?>','<?php echo $taxioffer->request->duration?>','<?php echo $taxioffer->OfferID?>','<?php echo $taxioffer->request_id ?>','<?php echo $taxioffer->request->passengers ?>','<?php echo $taxioffer->vehicle->no_of_seats?>')" >
                            <i class="fa-solid fa-check" style="margin-right: 10px;"></i>
                            Accept offer
                        </button>
                        <a href="<?php echo URLROOT; ?>/Offers/rejectTaxiOffer/<?php echo $taxioffer->OfferID ?>/<?php echo $taxioffer->request_id ?>"><button id="request-delete-btn" type="submit">
                            <i class="fa-solid fa-xmark" style="margin-right: 10px;"></i>
                            Reject Offer
                            </button>
                        </a>
                        <?php
                    }
                    ?>
                </div>
            </div>
            
            <?php
            endforeach;
            ?>   
        </div>
    </main>
 </div>


 <script type="text/JavaScript">
                           
    var URLROOT="<?php echo URLROOT;?>";
</script>

 <?php require APPROOT.'/views/inc/components/footer.php'; ?>

 <script type="text/JavaScript" src="<?php echo URLROOT;?>/js/components/search/offer_filter.js"></script>
 <script type="text/JavaScript" src="<?php echo URLROOT;?>/js/components/taxioffervalidation.js"></script>






