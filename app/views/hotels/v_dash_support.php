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
<?php require APPROOT.'/views/inc/components/sidebars/hotel_sidebar.php'; ?>


<main class="right-side-content">
    <div class="hotel-bookings-main-div">
        <p class="home-title-2">Send Your Message to the Tripify Team</p>

        <form id="hotel-support-form" action="post">
            <!-- <label>Topic</label><br>
            <input type="text">

            <label>Description</label><br>
            <input type="text">

            <button class="all-purpose-btn">Submit</button> -->
            <div class="hotel-reg-elements">
                <p class="home-title-4">Topic :</p>
                <input class="hotel-labels-2" type="text" id="contact" name="contact">
            </div>

            <div class="hotel-reg-elements">
                <p class="home-title-4">Description :</p>
                <input class="hotel-support-desc" type="text" id="contact" name="contact">
            </div>
        </form>
    </div>
    
</main>

<?php
}
?>