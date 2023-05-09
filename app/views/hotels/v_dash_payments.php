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
            <a href="<?php echo URLROOT; ?>/Users/contactus" class="menu-item">Support</a>
        </nav>
    </aside>


<main class="right-side-content">
    <br><br>
    <p class="home-title-2">Payments</p><br>

    
    <form action="<?php echo URLROOT?>/Hotels/generatePDF" method="post">
        <div class="search-payments">
            <input class="input-payments" type="date" name="start-date">
            <input class="input-payments" type="date" name="end-date">

            <button class="input-payments-btn" type="submit">Get Report</button>
        </div>
    </form>

    <div class="hotel-bookings-main-div">
        <?php
        if (empty($data['payments'])) {
    ?>
        <p style="font-size: 1.2rem; margin: auto;">No Payments</p>
    <?php        
    } else {
        ?>
        <table>
    
            <tr>
                <th>Booking ID</th>
                <th>CustomerID</th>
                <th>Payment Amount</th>
                <th>Payment Date</th>
                <th>Payment Method</th>
            </tr>

            <?php
                
                    foreach ($data['payments'] as $payment) : ?>

                        <tr>
                            <td><?php echo $payment->booking_id; ?></td>
                            <td><?php echo $payment->TravelerID; ?></td>
                            <td><?php echo $payment->payment; ?></td>
                            <td><?php echo $payment->date_added; ?></td>
                            <td><?php echo $payment->paymentmethod; ?></td>
                        </tr>
                <?php
                    endforeach;
                }
            ?>

        </table>
    </div>
    
</main>

<?php
    

?>

<?php
}
?>