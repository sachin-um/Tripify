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
            <a href="<?php echo URLROOT; ?>/Users/contactus" class="menu-item">Support</a>
        </nav>
    </aside>

    <main class="right-side-content">
        <br><br>
        <p class="home-title-2">Reviews</p>

        <div class="hotel-bookings-main-div">
        <?php
        if (empty($data['reviews'])) {
        ?>
        <p style="font-size: 1.2rem; margin: auto;">No Payments</p>
        <?php        
        } else {
        ?>
        <div class="hotel-bookings-main-div">
            <table>
        
                <tr>
                    <th>Traveler ID</th>
                    <th>Rating</th>
                    <th>Discription</th>
                    <th>Date</th>
                    <th>Delete</th>
                </tr>

                <?php
                    
                        foreach ($data['reviews'] as $reviews) : ?>

                            <tr>
                                <td><?php echo $reviews->TravelerID; ?></td>
                                <td><?php echo $reviews->Rating; ?></td>
                                <td><?php echo $reviews->Description; ?></td>
                                <td><?php echo $reviews->Date; ?></td>
                                <td><button class="btn" type="button" style="display: flex; width: 90%; height: 35px; border-radius: 10px;" id="review-remove-btn"> <i class="fa-solid fa-xmark" style="width: 35px;"></i>
                                <a href="<?php echo URLROOT?>/Hotels/deleteReviews/<?php echo $reviews->TravelerID; ?>" style="text-decoration: none; color: white;">Remove</a></button></td>
                            </tr>
                    <?php
                        endforeach;
                    
                ?>
            </table>
        </div>
        
        <?php
        }
        ?>
        <?php flash('review_flash'); ?>
    </main>

<?php
}
?>