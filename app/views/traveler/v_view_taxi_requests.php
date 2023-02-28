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
            <a href="<?php echo URLROOT; ?>/Request/TaxiRequest" class="menu-item ">Complains</a>
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
        <?php flash('request_flash'); ?>  
        <div class="request-list">

        <?php
            $requests=$data['taxirequests'];
            foreach($requests as $taxirequest):
        ?>

        <div class="request">
            <div class="post-header"><?php echo $taxirequest->caption; ?></div>
            <div class="post-body">
            <div class="post-content">
            <div class="spandiv">
                <div class="post-tag">Request Date</div>
                <div class="colon">:</div>
                <div class="result"><?php echo $taxirequest->date; ?></div>
                    <!-- <label for="request-data">Request-data</label>
                    <label for="colon">:</label>
                    <label for="result"><?php echo $taxirequest->date; ?></label> -->
                </div>
                <!-- <div><span id="request-data"><span>:</span><?php echo $taxirequest->date; ?></span></div>
                 -->
            </div>
            <div class="post-content">
                <div class="post-tag">Request Time</div>
                <div ><span id="request-data"><span>:</span><?php echo $taxirequest->time; ?></span></div>
                
            </div>
            <div class="post-content">
                <div class="post-tag">PickUp Location</div>
                <div ><span id="request-data"><span>:</span><?php echo $taxirequest->pickup_location; ?></span></div>
                
            </div>
            <div class="post-content">
                <div class="post-tag">Destination</div>
                <div><span id="request-data"><span>:</span><?php echo $taxirequest->destination; ?></span></div>
                
            </div>
            <div class="post-content">
                <div class="post-tag">Additional Details</div>
                <div><span id="request-data"><span>:</span><?php echo $taxirequest->additional_details; ?></span></div>
                
            </div>

            <div class="post-by-content">
                <div class="post-by">Post By: <?php echo $taxirequest->name; ?></div>
                <div class="post-by">Post at: <?php echo convertTime($taxirequest->post_at); ?></div>
            </div>
            </div>
            <div class="request-footer">
            <?php
            if ($_SESSION['user_type']=='Traveler') {
                ?>
                    <a href="<?php echo URLROOT; ?>/Request/editTaxiRequest/<?php echo $taxirequest->request_id ?>"><button id="request-edit-btn" type="submit">Edit</button></a>
                    <a href="<?php echo URLROOT; ?>/Request/deleteTaxiRequest/<?php echo $taxirequest->request_id ?>"><button id="request-delete-btn" type="submit">Delete</button></a>
                    <a href="<?php echo URLROOT; ?>/Offers/taxioffers/<?php echo $taxirequest->request_id ?>"><button id="request-offer-btn" type="submit">View Offers</button></a>
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

    </main>
 </div>
<?php
}
?>