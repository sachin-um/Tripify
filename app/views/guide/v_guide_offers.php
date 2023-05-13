<?php
$_SESSION['user_id'];
$_SESSION['user_type'];


if (empty($_SESSION['user_id'])) {
    flash('reg_flash', 'You need to have logged in first...');
    redirect('Users/login');
}
elseif ($_SESSION['user_type']!='Traveler' && $_SESSION['user_type']!='Guide') {
    flash('reg_flash', 'Access Denied');
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
        <?php
        if ($_SESSION['user_type']=='Traveler') {
        ?>

        <nav class="menu">
            <a href="#" class="menu-item">User Profile</a>
            <a href="app/views/traveler/traveler_dashboard2.php" class="menu-item">Hotel Bookings</a>
            <a href="#" class="menu-item">Taxi Bookings</a>
            <a href="<?php echo URLROOT; ?>/Request/TaxiRequest" class="menu-item">Taxi Request</a>
            <a href="<?php echo URLROOT; ?>/Request/GuideRequest" class="menu-item is-active">Guide Request</a>
            <a href="<?php echo URLROOT; ?>/Pages/home/" class="menu-item" >Exit Dashboard</a>
        </nav>
        <?php
        }
        else if ($_SESSION['user_type']=='Guide') {
        ?>
        <nav class="menu">
        <a href="<?php echo URLROOT; ?>/Pages/profile" class="menu-item">User Profile</a>
        <a href="<?php echo URLROOT; ?>/Request/GuideRequest" class="menu-item">Trip Request</a>
        <a href="<?php echo URLROOT; ?>/Offers/guideoffers" class="menu-item is-active">Offers</a>
        <a href="<?php echo URLROOT; ?>/Guides/viewGuideBookings" class="menu-item">Bookings</a>
        <a href="#" class="menu-item">Payments</a>
        <a href="<?php echo URLROOT; ?>/Pages/home/" class="menu-item" >Exit Dashboard</a>
        </nav>
        <?php
        }
        ?>
    </aside>

    <main class="right-side-content">
    <div class="guide-content">
        <div>
            <h2 class="title" >Guide Offers</h2>
            <hr>
            <?php flash('guide_offer_flash'); ?>
        </div>
        <div class="request-list">

        <?php
            $offers=$data['guideoffers'];
            foreach($offers as $guideoffer):
        ?>
        <div class="request">
            <div class="post-header">Request ID : <?php echo $guideoffer->request_id; ?></div>
            <div class="post-body">

                <h5>Offer Details :</h5>
                <div class="post-date">HourlyRate: <span id="request-data"><?php echo $guideoffer->hourlyrate; ?></span></div>
                <div class="post-time">PaymentMethod: <?php echo $guideoffer->paymentmethod; ?></div>
                <div class="post-details">Additional Details: <?php echo $guideoffer->additionaldetails; ?></div>
                <div class="post-by-content">
                    <div class="post-by">Offered By: <?php echo $guideoffer->guidename; ?></div>
                    <div class="post-by">Guide contact number: <?php echo $guideoffer->guide_number; ?></div>
                    <div class="post-by">Offered at: <?php echo convertTime($guideoffer->offer_at); ?></div>
                </div>
                
            </div>
            <div class="request-footer">
                <?php
                    if ($_SESSION['user_type']=='Guide') {
                        ?>
                            <a href="<?php echo URLROOT; ?>/Request/editTaxiRequest/<?php echo $taxirequest->RequestID ?>"><button id="request-edit-btn" type="submit">Edit</button></a>
                            <button id="request-delete-btn" type="submit">Delete</button>
                        <?php
                    }
                    elseif ($_SESSION['user_type']=='Traveler') {
                        ?>
                        <button id="request-offer-btn" type="submit">Accept offer</button>
                        <?php
                    }
                ?>
                
                
            </div>
                
            

        </div>
        <?php
            endforeach;
        ?>
        </div>
    </div>
    </main>
 </div>
<?php
}
?>