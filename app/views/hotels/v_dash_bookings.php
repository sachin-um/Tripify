<?php
$_SESSION['user_id'];
$_SESSION['user_type'];


if (empty($_SESSION['user_id'])) {
    flash('reg_flash', 'You need to have logged in first...');
    redirect('Users/login');
}
elseif ($_SESSION['user_type']!='Hotel') {
    flash('reg_flash', 'Access Denied');
    redirect('Pages/home');
}
else {
?> 

<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>
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
    <p class="home-title-2">Your Bookings</p>
    <div class="hotel-bookings-main-div">
        <table>
    
            <tr>
                <th>BookingID</th>
                <th>Customer Name</th>
                <th>Date Added</th>
                <th>Payment Amount</th>
                <th>Room ID</th>
                <th>Payment Status</th>
                <th>View Details</th>
            </tr>

            <?php
            // foreach():
            ?>
            <tr>
                <td>B1045</td>
                <td>Danapala Gunasekara</td>
                <td>2023.02.10</td>
                <td>17850.00</td>
                <td>R2424</td>
                <td>Unpaid</td>
                <td><button>View</button></td>
            </tr>
            <?php
            // endforeach;
            ?>

        </table>
    </div>
    
</main>

<?php
}
?>