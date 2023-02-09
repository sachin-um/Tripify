<?php
$_SESSION['user_id'];
$_SESSION['user_type'];


if (empty($_SESSION['user_id'])) {
    flash('reg_flash', 'You need to have logged in first...');
    redirect('Users/login');
}
elseif ($_SESSION['user_type']!='Traveler') {
    flash('reg_flash', 'Only the Traveler can have access...');
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

        <nav class="menu">
            <a href="<?php echo URLROOT; ?>/Pages/profile" class="menu-item">User Profile</a>
            <a href="<?php echo URLROOT; ?>/Bookings/HotelBookings/<?php echo $_SESSION['user_type'] ?>/<?php echo $_SESSION['user_id'] ?>" class="menu-item is-active">Hotel Bookings</a>
            <a href="<?php echo URLROOT; ?>/Bookings/TaxiBookings/<?php echo $_SESSION['user_type'] ?>/<?php echo $_SESSION['user_id'] ?>" class="menu-item">Taxi Bookings</a>
            <a href="<?php echo URLROOT; ?>/Bookings/GuideBookings/<?php echo $_SESSION['user_type'] ?>/<?php echo $_SESSION['user_id'] ?>" class="menu-item">Guide Bookings</a>
            <a href="<?php echo URLROOT; ?>/Request/TaxiRequest" class="menu-item">Taxi Requests</a>
            <a href="<?php echo URLROOT; ?>/Request/GuideRequest" class="menu-item">Guide Requests</a>
            <a href="<?php echo URLROOT; ?>/Request/TaxiRequest" class="menu-item ">Complains</a>
            <a href="<?php echo URLROOT; ?>/Pages/home" class="menu-item">Exit Dashboard</a>
        </nav>
    </aside>

    <main class="right-side-content">
        <br>
        <br>
        <h2 style="text-align: left;">Hotel Bookings</h1>
        <hr>
        <br>
        <div class="first-container">
            <div class="admin-table-container">
                <table class="message-table">
                    <thead>
                        <tr>
                            <th>Booking ID</th>
                            <th>Hotel Name</th>
                            <th>Room number-Room type</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                            <th>Payment</th>
                            <th>booking Status</th>
                            <th>Cancel</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $bookings=$data['hotelbookings'];
                            foreach($bookings as $booking):
                        ?>
                        <tr>
                            <!-- <td data-lable="ID"></td> -->
                            <td data-lable="Name"><?php echo $booking->booking_id ?></td>
                            <td data-lable="Name"><?php echo $booking->hotel_id ?></td>
                            <td data-lable="Name"><?php echo $booking->hotel_id ?></td>
                            <td data-lable="Name"><?php echo $booking->booking_start_date ?></td>
                            <td data-lable="Name"><?php echo $booking->booking_end_date ?></td>
                            <td data-lable="Name"><?php echo $booking->payment ?></td>
                            <td data-lable="Name"><?php echo $booking->status ?></td>
                            <td data-lable="Name"><button class="btn" type="button">Cancel</button></td>
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

 <?php
}
?>