<?php
$_SESSION['user_id'];
$_SESSION['user_type'];


if (empty($_SESSION['user_id'])) {
    flash('reg_flash', 'You need to have logged in first...');
    redirect('Users/login');
}
elseif ($_SESSION['user_type']!='Traveler' && $_SESSION['user_type']!='Taxi') {
    flash('reg_flash', 'Access Denied');
    redirect('Pages/home');
}
else {
    ?> 
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
            <a href="<?php echo URLROOT; ?>/Request/GuideRequest" class="menu-item ">Guide Requests</a>
            <a href="<?php echo URLROOT; ?>/Trips/yourtrips/<?php echo $_SESSION['user_id'] ?>" class="menu-item">Your Trips</a>
            <a href="<?php echo URLROOT; ?>/Users/contactus" class="menu-item">Contact Admin</a>
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
            <a href="<?php echo URLROOT; ?>/Request/TaxiRequest" class="menu-item is-active">Trip Requests</a>
            <a href="<?php echo URLROOT; ?>/Offers/taxioffers" class="menu-item">Offers</a>
            <a href="<?php echo URLROOT; ?>/Taxies/bookings" class="menu-item">Bookings</a>
            <a href="<?php echo URLROOT; ?>/Pages/taxies" class="menu-item">Exit Dashboard</a>
        </nav>
        <?php
        }
        ?>
    </aside>

    <main class="right-side-content">
    <div class="dashboad-content">
        <div>
            <h2 class="title" >Taxi Requests</h2>
            <hr>
        </div>  
        <br>
        <div class="request-filter-area">
            <input type="text" placeholder="Search Request..." id="searchInput">
            <select name="request-type" id="request-type">
                <option value="" disabled selected>Request Type</option>
                <option value="all">All</option>
                <option value="In progress">In Progress</option>
                <option value="Completed">Completed</option>
            </select>
        </div>
        <?php flash('taxi_request_flash'); ?>  
        <div class="request-list" id="request-list">

        <?php
            $requests=$data['taxirequests'];
            foreach($requests as $taxirequest):
        ?>

        <div class="request">
            <div class="post-header">Request ID : TR<?php echo $taxirequest->request_id; ?></div>
            <i class="fa-sharp fa-solid fa-timer"></i>
            <div class="post-body">
                <div class="req-slot1">
                    <div class="detail-container" style="margin-right: 20px;">
                        <div class="header-container">
                            <i class="fa-solid fa-calendar-days fa-2xl" style="color: #03002E; margin-right: 10px;"></i>
                            <div class="heading">Date</div>
                        </div>
                        <div class="post-tag post-date description" style="margin-left: 33px">
                            <?php echo $taxirequest->date; ?></span>
                        </div>
                    </div>
                    <div class="detail-container">
                        <div class="header-container">
                            <i class="fa-solid fa-clock fa-2xl" style="color: #03002E; margin-right: 10px;"></i>
                            <div class="heading">Time</div>
                        </div>
                        <div class="post-tag post-date description" style="margin-left: 33px">
                            <?php echo $taxirequest->time; ?></span>
                        </div>
                    </div>
                </div>
                <div class="req-slot2">
                    <div class="detail-container" style="margin-right: 20px;">
                            <div class="header-container">
                                <i class="fa-solid fa-location-pin fa-2xl" style="color: #03002E; margin-right: 10px;"></i>
                                <div class="heading">From</div>
                            </div>
                            <div class="post-tag post-date description" style="margin-left: 33px">
                                <?php echo $taxirequest->pickup_location; ?></span>
                            </div>
                        </div>
                        <div class="detail-container">
                            <div class="header-container">
                                <i class="fa-solid fa-location-pin fa-2xl" style="color: #03002E; margin-right: 10px;"></i>
                                <div class="heading">To</div>
                            </div>
                            <div class="post-tag post-date description" style="margin-left: 33px">
                                <?php echo $taxirequest->destination; ?></span>
                            </div>
                        </div>
                </div>
                <div class="req-slot2">
                        <div class="detail-container" style="margin-right: 20px;">
                            <div class="header-container">
                                <i class="fa-solid fa-person fa-2xl" style="color: #03002E; margin-right: 10px;"></i>
                                <div class="heading">Passengers</div>
                            </div>
                            <div class="post-tag post-date description" style="margin-left: 33px">
                                <?php echo $taxirequest->passengers; ?>
                            </div>
                        </div>
                        <div class="detail-container">
                            <div class="header-container">
                                <i class="fa-solid fa-car fa-2xl" style="color: #03002E; margin-right: 10px;"></i>
                                <div class="heading">Vehicle Type</div>
                            </div>
                            <div class="post-tag post-date description" style="margin-left: 33px">
                                <?php echo $taxirequest->vehicle_type; ?>
                            </div>
                        </div>
                </div>
                <div class="req-slot3">
                        <div class="detail-container" style="margin-right: 20px; width: 97%;">
                            <div class="header-container">
                                    <i class="fa-solid fa-person fa-2xl" style="color: #03002E; margin-right: 10px;"></i>
                                    <div class="heading">Additional Details</div>
                            </div>
                            <div class="post-tag post-date description" style="margin-left: 33px">
                                <?php echo $taxirequest->additional_details; ?>
                            </div>
                        </div>
                </div>
                <div class="post-by-content">
                <?php
                    if ($_SESSION['user_type']=='Taxi') {
                        ?>
                                <div class="post-by"><img src="<?php echo URLROOT; ?>/img/post-user.png" alt="user" class="post-by-img"><span class="post-by-data">: <?php echo $taxirequest->name; ?></span></div>
                                <div class="post-by"><img src="<?php echo URLROOT; ?>/img/phone.png" alt="phone" class="post-by-img"><span class="post-by-data">: <?php echo $taxirequest->contact_no; ?></span></div>
                                <div class="post-by"><img src="<?php echo URLROOT; ?>/img/timer.png" alt="timer" class="post-by-img"><span class="post-by-data">: <?php echo convertTime($taxirequest->post_at); ?></span></div>
                            
                        <?php
                    }
                    elseif ($_SESSION['user_type']=='Traveler') {
                        ?>
                        <div class="post-by" style="margin:auto"><span class="post-by-data">Status: <?php echo $taxirequest->status; ?></span></div>
                        <?php
                    }
                ?>
                </div>
            </div>
            <div class="request-footer">
            <button id="request-offer-btn" type="button" onclick="showRequest('<?php echo $taxirequest->request_id; ?>','<?php echo URLROOT; ?>')">
                <i class="fa-solid fa-circle-info" style="margin-right: 10px;"></i>
                More Details
            </button>
            <?php
            if ($_SESSION['user_type']=='Traveler') {
                ?>
                    <a href="<?php echo URLROOT; ?>/Request/editTaxiRequest/<?php echo $taxirequest->request_id ?>"><button id="request-edit-btn" type="submit">
                        <i class="fa-solid fa-pen" style="margin-right: 10px;"></i>
                        Edit
                    </button></a>
                    <a href="<?php echo URLROOT; ?>/Request/deleteTaxiRequest/<?php echo $taxirequest->request_id ?>">
                        <button id="request-delete-btn" type="submit">
                            <i class="fa-solid fa-xmark" style="margin-right: 10px;"></i>
                            Delete
                        </button>
                    </a>
                    <a href="<?php echo URLROOT; ?>/Offers/taxioffers/<?php echo $taxirequest->request_id ?>"><button id="request-offer-btn" type="submit"><i class="fa-brands fa-buffer" style="margin-right: 10px;"></i>View Offers</button></a>
                <?php
            }
            elseif ($_SESSION['user_type']=='Taxi') {
                ?>
                <a href="<?php echo URLROOT; ?>/Offers/taxiMakeOffers/<?php echo $taxirequest->request_id ?>"><button id="request-offer-btn" type="submit">Make an offer</button></a>
                <?php
            }
            ?>
            </div>
        </div>
        
        <?php
            endforeach;
        ?>
        </div>
    </div>
    <div id="popup" class="request-popup">
                <div id="request-content" class="request-popup-content">
                </div>
    </div>
    </main>
 </div>
 <script type="text/JavaScript" src="<?php echo URLROOT;?>/js/components/search/request_search.js"></script>
 <script type="text/JavaScript" src="<?php echo URLROOT;?>/js/components/popups.js"></script>
 <script type="text/javascript" src="<?php echo AUTO_MAP_URL ?>" defer></script>
 <script>
    var map;
                  function initMap(data) {
                    var start = new google.maps.LatLng(data.p_latitude,data.p_longitude);
                    var destination=new google.maps.LatLng(data.d_latitude,data.d_longitude);
                    map = new google.maps.Map(document.getElementById('map'), {
                      center: start, 
                      zoom: 11
                    });
                  
                    
                    var directionsService = new google.maps.DirectionsService();
                    var directionsRenderer = new google.maps.DirectionsRenderer();
                    directionsRenderer.setMap(map);
                    
                    var request = {
                      origin: start, 
                      destination: destination, 
                      travelMode: 'DRIVING' 
                    };
                    
                    directionsService.route(request, function(result, status) {
                      if (status === 'OK') {
                        directionsRenderer.setDirections(result);
                      }
                    });
                  }
 </script>
<?php
}
?>