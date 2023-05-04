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
            <a href="<?php echo URLROOT; ?>/Hotels/loadBooking" class="menu-item">Bookings</a>
            <a href="<?php echo URLROOT; ?>/Hotels/loadPayments" class="menu-item is-active">Payments</a>
            <a href="<?php echo URLROOT; ?>/Hotels/loadReviews" class="menu-item">Reviews</a>
            <a href="<?php echo URLROOT; ?>/Hotels/hotelSupport" class="menu-item">Support</a>
        </nav>
    </aside>


<main class="right-side-content">
    <br><br>
    <p class="home-title-2">Payments</p>
    <div class="hotel-bookings-main-div">
        <table>
    
            <tr>
                <th>ReservationID</th>
                <th>CustomerID</th>
                <th>Payment Amount</th>
                <th>Payment Date</th>
                <th>Payment Method</th>
                <th>View Details</th>
            </tr>

            <tr>
                <td>B1024</td>
                <td>C12547</td>
                <td>12000.00</td>
                <td>2022.02.12</td>
                <td>Visa</td>
                <td><button>View</button></td>
            </tr>

            <tr>
                <td>B1024</td>
                <td>C12547</td>
                <td>12000.00</td>
                <td>2022.02.12</td>
                <td>Master Card</td>
                <td><button>View</button></td>
            </tr>

            <tr>
                <td>B1024</td>
                <td>C12547</td>
                <td>12000.00</td>
                <td>2022.02.12</td>
                <td>On Site</td>
                <td><button>View</button></td>
            </tr>

        </table>
    </div>
    
</main>

<?php
}
?>