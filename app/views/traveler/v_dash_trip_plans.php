
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
            <a href="<?php echo URLROOT; ?>/Request/TaxiRequest" class="menu-item ">Complains</a>
            <a href="<?php echo URLROOT; ?>/Pages/home" class="menu-item">Exit Dashboard</a>
        </nav>
    </aside>

    <main class="right-side-content">
        <br>
        <br>
        <h2 style="text-align: left;">Your Trips</h1>
        <hr>
        <br>
        <div class="first-container">
            <div class="admin-table-container">
                <table class="message-table">
                    <thead>
                        <tr>
                            <th>Trip ID</th>
                            <th>Trip Name</th>
                            <th>Area</th>
                            <th>Starting Date</th>
                            <th>End Date</th>
                            <th>View</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $trips=$data['trips'];
                            foreach($trips as $trip):
                        ?>
                        <tr>
                            <!-- <td data-lable="ID"></td> -->
                            <td data-lable="Name"><?php echo $trip->TourPlanID ?></td>
                            <td data-lable="Name"><?php echo $trip->trip_name ?></td>
                            <td data-lable="Name"><?php echo $trip->location ?></td>
                            <td data-lable="Name"><?php echo $trip->start_date ?></td>
                            <td data-lable="Name"><?php echo $trip->end_date ?></td>
                            <td data-lable="Email"><a href="<?php echo URLROOT; ?>/Trips/viewTripPlan/<?php echo $trip->TourPlanID?>"><button class="acc-view-btn" type="button">View </button></a></td>
                        </tr>
                        <?php
                            endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
            
        </div>
    </main>
 </div>
