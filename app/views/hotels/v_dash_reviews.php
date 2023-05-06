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
        <a href="<?php echo URLROOT; ?>/Hotels/loadPayments" class="menu-item">Payments</a>
        <a href="<?php echo URLROOT; ?>/Hotels/loadReviews" class="menu-item is-active">Reviews</a>
        <a href="<?php echo URLROOT; ?>/Hotels/hotelSupport" class="menu-item">Support</a>
    </nav>
</aside>


<main class="right-side-content">
    <br><br>
    <p class="home-title-2">Reviews</p>
    <div class="hotel-bookings-main-div">
        <table>
    
            <tr>
                <th>UserID</th>
                <th>Rating</th>
                <th style="width:50%">Review</th>
                <th>Delete</th>
            </tr>

            <tr>
                <td>U1024</td>
                <td>4.0</td>
                <td>Great Hotel. Good Customer Service plus good food.</td>
                <td><button>Delete</button></td>
            </tr>

            <tr>
                <td>U4254</td>
                <td>3.5</td>
                <td>Great Hotel. Good Customer Service plus good food.</td>
                <td><button>Delete</button></td>
            </tr>

            <tr>
                <td>U1324</td>
                <td>3.0</td>
                <td>Great Hotel. Good Customer Service plus good food.</td>
                <td><button>Delete</button></td>
            </tr>

        </table>
    </div>
    
</main>

<?php
}
?>