
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
            <a href="<?php echo URLROOT; ?>/Bookings/HotelBookings/<?php echo $_SESSION['user_type'] ?>/<?php echo $_SESSION['user_id'] ?>" class="menu-item">Hotel Bookings</a>
            <a href="<?php echo URLROOT; ?>/Bookings/TaxiBookings/<?php echo $_SESSION['user_type'] ?>/<?php echo $_SESSION['user_id'] ?>" class="menu-item">Taxi Bookings</a>
            <a href="<?php echo URLROOT; ?>/Bookings/GuideBookings/<?php echo $_SESSION['user_type'] ?>/<?php echo $_SESSION['user_id'] ?>" class="menu-item">Guide Bookings</a>
            <a href="<?php echo URLROOT; ?>/Request/TaxiRequest" class="menu-item">Taxi Requests</a>
            <a href="<?php echo URLROOT; ?>/Request/GuideRequest" class="menu-item">Guide Requests</a>
            <a href="<?php echo URLROOT; ?>/Trips/yourtrips/<?php echo $_SESSION['user_id'] ?>" class="menu-item is-active">Your Trips</a>
            <a href="<?php echo URLROOT; ?>/Users/contactus" class="menu-item">Contact Admin</a>
            <a href="<?php echo URLROOT; ?>/Pages/home" class="menu-item">Exit Dashboard</a>
        </nav>
    </aside>

    <main class="right-side-content">
        <br>
        <br>
        <h2 style="text-align: left;">Your Trips</h1>
        <hr>
        <br>
        <div class="booking-filter-area">
            <input type="text" placeholder="Search trips..." id="searchInput">
        </div>
        <?php flash('trip_list_flash'); ?>
        <div class="first-container">
            <div class="admin-table-container">
                        <?php
                    if (empty($data['trips'])) {
                ?>
                    <p style="font-size: 1.2rem; margin: auto;">No records to show.. Start to plan a Trip....</p>
                <?php        
                } else {
                    ?>
                <table class="message-table" id="message-table">
                    <thead>
                        <tr>
                            <th>Trip ID</th>
                            <th>Trip Name</th>
                            <th>Area</th>
                            <th>Starting Date</th>
                            <th>End Date</th>
                            <th>View</th>
                            <th>Remove</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $trips=$data['trips'];
                            foreach($trips as $trip):
                        ?>
                        <tr>
                            <!-- <td data-lable="ID"></td> -->
                            <td data-lable="Name">TP<?php echo $trip->TourPlanID ?></td>
                            <td data-lable="Name"><?php echo $trip->trip_name ?></td>
                            <td data-lable="Name"><?php echo $trip->location ?></td>
                            <td data-lable="Name"><?php echo $trip->start_date ?></td>
                            <td data-lable="Name"><?php echo $trip->end_date ?></td>
                            <td data-lable="Email"><a href="<?php echo URLROOT; ?>/Trips/viewTripPlan/<?php echo $trip->TourPlanID?>"><button class="acc-view-btn" type="button"> <i class="fa-solid fa-eye" style="margin-right: 10px"></i>View </button></a></td>
                            <td data-lable="Email"><a href="<?php echo URLROOT; ?>/Trips/removeTripPlan/<?php echo $trip->TourPlanID?>"><button class="btn" type="button"> <i class="fa-solid fa-xmark" style="margin-right: 10px;"></i>Remove</button></a></td>
                        </tr>
                        <?php
                            endforeach;
                        ?>
                    </tbody>
                </table>
                <?php
                }
                ?>
            </div>
            
        </div>
    </main>
 </div>
 <script type="text/JavaScript" src="<?php echo URLROOT;?>/js/components/search/booking_search.js"></script>