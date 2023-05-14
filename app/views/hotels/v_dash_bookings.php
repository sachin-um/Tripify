<?php
$_SESSION['user_id'];
$_SESSION['user_type'];


if (empty($_SESSION['user_id'])) {
    flash('reg_flash', 'You need to have logged in first...');
    redirect('Users/login');
} elseif ($_SESSION['user_type'] != 'Hotel') {
    flash('reg_flash', 'Access Denied');
    redirect('Pages/home');
} else {
?>

    <?php require APPROOT . '/views/inc/components/header.php'; ?>
    <?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>
    <aside class="sidebar">

        <div class="menu-toggle">
            <div class="hamburger">
                <span></span>
            </div>
        </div>

        <nav class="menu">
            <a href="<?php echo URLROOT; ?>/Hotels/load" class="menu-item">Account</a>
            <a href="<?php echo URLROOT; ?>/HotelRooms/rooms" class="menu-item">Rooms</a>
            <a href="<?php echo URLROOT; ?>/Hotels/loadBooking" class="menu-item is-active">Bookings</a>
            <a href="<?php echo URLROOT; ?>/Hotels/loadPayments" class="menu-item">Payments</a>
            <a href="<?php echo URLROOT; ?>/Hotels/loadReviews" class="menu-item">Reviews</a>
            <a href="<?php echo URLROOT; ?>/Hotels/hotelSupport" class="menu-item">Support</a>
        </nav>
    </aside>


    <main class="right-side-content">
        <br><br>
        <p class="home-title-2">Your Bookings</p><br>

        <!-- Filter bookings -->
        <!-- <form action="<?php echo URLROOT?>/Hotels/filterBooking" method="post">
            <div class="search-payments">            
                <input class="input-payments" type="date" name="start-date">
                <input class="input-payments" type="date" name="end-date">

                <button class="input-payments-btn" type="submit">Search</button>
            </div>            
        </form><br> -->
        <div style="margin: auto; text-align: center;">
            <button class="input-payments-btn"
            onclick="window.location.href='<?php echo URLROOT?>/Hotels/generatePDF/<?php echo $data['startdate']?>/<?php echo $data['enddate']?>'">
            Get Report</button>
        </div><br>
        

        <div class="booking-btns">
            <?php 
            if($data['status']=='In progress'){
                $_SESSION['status']='In progress';
                ?>
                <button class="view-booking-btns is-active" onclick="location.href='<?php echo URLROOT?>/Hotels/loadBooking'">Current Bookings</button>
                <button class="view-booking-btns" onclick="location.href='<?php echo URLROOT?>/Hotels/loadBooking/completed'">Past Bookings</button>
                <button class="view-booking-btns" onclick="location.href='<?php echo URLROOT?>/Hotels/loadBooking/Canceled'">Canceled Bookings</button>
            <?php
            }else if($data['status']=='completed'){
                $_SESSION['status']='completed';
                ?>
                <button class="view-booking-btns" onclick="location.href='<?php echo URLROOT?>/Hotels/loadBooking'">Current Bookings</button>
                <button class="view-booking-btns is-active" onclick="location.href='<?php echo URLROOT?>/Hotels/loadBooking/completed'">Past Bookings</button>
                <button class="view-booking-btns" onclick="location.href='<?php echo URLROOT?>/Hotels/loadBooking/Canceled'">Canceled Bookings</button>
            <?php
            }else if($data['status']=='Canceled'){
                $_SESSION['status']='Canceled';
                ?>
                <button class="view-booking-btns" onclick="location.href='<?php echo URLROOT?>/Hotels/loadBooking'">Current Bookings</button>
                <button class="view-booking-btns" onclick="location.href='<?php echo URLROOT?>/Hotels/loadBooking/completed'">Past Bookings</button>
                <button class="view-booking-btns is-active" onclick="location.href='<?php echo URLROOT?>/Hotels/loadBooking/Canceled'">Canceled Bookings</button>
            <?php
            }
            ?>
            
        </div>
        <hr id="booking-header-hr">
        <div class="hotel-bookings-main-div" style="margin-left: 6%;">

            <table>

                <tr>
                    <th>BookingID</th>
                    <th>CustomerID</th>
                    <th>Date Added</th>
                    <th>Booked Rooms</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Payment Amount</th>
                </tr>

                <?php
                foreach ($data['bookings'] as $booking) : ?>
                    <tr>
                        <td><?php echo $booking->booking_id; ?></td>
                        <td><?php echo $booking->TravelerID; ?></td>
                        <td><?php echo $booking->date_added; ?></td>
                        <td><?php
                        // $bookedrooms = explode(",",$booking->roomTypes);
                        // echo gettype($bookedrooms);
                        // $allroomtypes = $data['allroomtypes'];
                        // $arr = array(); 
                        // foreach($allroomtypes as $type){
                        //     for($j=0;$j<count($bookedrooms);$j+2){
                        //         echo "test";
                        //         if($type == $bookedrooms[$j]){
                        //             echo $type->RoomTypeName." - ";
                        //             echo $bookedrooms[$j+1]."<br>";
                        //         }
                        //     }
                        // }


                        // for($j=0;$j<count($bookedrooms);$j+2){
                        //     echo $bookedrooms[$j]." - ";
                        //     echo $bookedrooms[$j+1]."<br>";
                        // }
                        
                        // ?>
                        </td>
                        <td><?php echo $booking->checkin_date; ?></td>
                        <td><?php echo $booking->checkout_date; ?></td>
                        <td><?php echo $booking->payment; ?></td>
                    </tr>
                <?php
                    endforeach;
                ?>

            </table>
            <br><br>
        </div>

    </main>

    

<?php
}
?>