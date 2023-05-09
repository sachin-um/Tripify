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

        <div class="search-payments">
            <input class="input-payments" type="date" name="start-date">
            <input class="input-payments" type="date" name="end-date">
            <button class="input-payments-btn">Get Report</button>
        </div><br><br>

        <div class="booking-btns">
            <button class="view-booking-btns is-active">Current Bookings</button>
            <button class="view-booking-btns">Past Bookings</button>
            <button class="view-booking-btns">Canceled Bookings</button>
        </div>
        <hr id="booking-header-hr">
        <div class="hotel-bookings-main-div" style="margin-left: 6%;">

            <table>

                <tr>
                    <th>BookingID</th>
                    <th>CustomerID</th>
                    <th>Date Added</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Payment Amount</th>
                    <th>View</th>
                </tr>

                <?php
                if (empty($data['bookings'])) {
                    echo "its empty";
                } else {
                    foreach ($data['bookings'] as $booking) : ?>


                        <tr>
                            <td><?php echo $booking->booking_id; ?></td>
                            <td><?php echo $booking->TravelerID; ?></td>
                            <td><?php echo $booking->date_added; ?></td>
                            <td><?php echo $booking->checkin_date; ?></td>
                            <td><?php echo $booking->checkout_date; ?></td>
                            <td><?php echo $booking->payment; ?></td>
                            <td><button>View</button></td>
                        </tr>
                <?php
                    endforeach;
                }
                ?>

            </table>
            <br><br>
        </div>

    </main>

<?php
}
?>