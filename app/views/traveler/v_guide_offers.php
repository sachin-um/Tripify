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
            <a href="<?php echo URLROOT; ?>/Pages/profile" class="menu-item">User Profile</a>
            <a href="<?php echo URLROOT; ?>/Bookings/HotelBookings/<?php echo $_SESSION['user_type'] ?>/<?php echo $_SESSION['user_id'] ?>" class="menu-item">Hotel Bookings</a>
            <a href="<?php echo URLROOT; ?>/Bookings/TaxiBookings/<?php echo $_SESSION['user_type'] ?>/<?php echo $_SESSION['user_id'] ?>" class="menu-item">Taxi Bookings</a>
            <a href="<?php echo URLROOT; ?>/Bookings/GuideBookings/<?php echo $_SESSION['user_type'] ?>/<?php echo $_SESSION['user_id'] ?>" class="menu-item">Guide Bookings</a>
            <a href="<?php echo URLROOT; ?>/Request/TaxiRequest" class="menu-item">Taxi Requests</a>
            <a href="<?php echo URLROOT; ?>/Request/GuideRequest" class="menu-item is-active">Guide Requests</a>
            <a href="<?php echo URLROOT; ?>/Trips/yourtrips/<?php echo $_SESSION['user_id'] ?>" class="menu-item">Your Trips</a>
            <a href="<?php echo URLROOT; ?>/Request/TaxiRequest" class="menu-item">Complains</a>
            <a href="<?php echo URLROOT; ?>/Pages/home" class="menu-item">Exit Dashboard</a>
        </nav>
        <?php
        }
        else if ($_SESSION['user_type']=='Guide') {
        ?>
        <nav class="menu">
        <a href="<?php echo URLROOT; ?>/Pages/profile ?>" class="menu-item">User Profile</a>
        <a href="<?php echo URLROOT; ?>/Request/GuideRequest" class="menu-item">Trip Request</a>
        <a href="<?php echo URLROOT; ?>/Offers/guideoffers" class="menu-item is-active">Offers</a>
        <a href="<?php echo URLROOT; ?>hotels/v_hotel_dashboard4.php" class="menu-item">Bookings</a>
        <a href="<?php echo URLROOT; ?>hotels/v_hotel_dashboard2.php" class="menu-item">Payments</a>
        <a href="<?php echo URLROOT; ?>hotels/v_hotel_dashboard2.php" class="menu-item">Exit Dashboard</a>
        </nav>
        <?php
        }
        ?>
    </aside>

    <main class="right-side-content">
    <div class="dashboad-content">
        <div>
            <h2 class="title" >Guide Offers</h2>
            <hr>
        </div>
        <div class="request-list">
        <?php flash('guide_offer_flash'); ?>
        <?php
            $offers=$data['guideoffers'];
            foreach($offers as $guideoffer):
        ?>
        <div class="request">
            <div class="post-header">Offer ID : <?php echo $guideoffer->offer_id; ?></div>
            <div class="post-body">

                <h5 style="text-align:center;">Offer Details</h5>
                <div class="req-slot1" style="margin-top:10px">
                    <div class="detail-container" style="margin-right: 20px;">
                            <div class="header-container">
                                    <i class="fa-solid fa-coins fa-2xl" style="color: #03002E; margin-right: 10px;"></i>
                                    <div class="heading">Rate</div>
                            </div>
                            <div class="post-tag post-date description" style="margin-left: 33px">
                                Rs:<?php echo $guideoffer->hourlyrate; ?></span>
                            </div>
                    </div>
                    <div class="detail-container">
                            <div class="header-container">
                                    <i class="fa-solid fa-money-check-dollar fa-2xl" style="color: #03002E; margin-right: 10px;"></i>
                                    <div class="heading">Payment methods</div>
                            </div>
                            <div class="post-tag post-date description" style="margin-left: 33px">
                                Rs:<?php echo $guideoffer->paymentmethod;; ?></span>
                            </div>
                    </div>
                </div>
                <div class="req-slot3">
                    <div class="detail-container" style="margin-right: 20px; width: 97%;">
                        <div class="header-container">
                            <i class="fa-solid fa-circle-info fa-2xl" style="color: #03002E; margin-right: 10px;"></i>
                            <div class="heading">Additional Details</div>
                        </div>
                        <div class="post-tag post-date description" style="margin-left: 33px">
                            <?php echo $guideoffer->additionaldetails; ?>
                        </div>
                    </div>    
                
                </div>
                <div class="post-by-content">
                    <div class="post-by"><img src="<?php echo URLROOT; ?>/img/post-user.png" alt="user" class="post-by-img"><span class="post-by-data">: <a href="<?php echo URLROOT; ?>/Pages/profile/<?php echo $guideoffer->guide_id; ?>"><?php echo $guideoffer->guidename; ?></a></span></div>
                    <div class="post-by"><img src="<?php echo URLROOT; ?>/img/phone.png" alt="phone" class="post-by-img"><span class="post-by-data">: <?php echo $guideoffer->guide_number; ?></span></div>
                    <div class="post-by"><img src="<?php echo URLROOT; ?>/img/timer.png" alt="timer" class="post-by-img"><span class="post-by-data">: <?php echo convertTime($guideoffer->offer_at); ?></span></div>
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
                        <a href="<?=URLROOT;?>/Bookings/acceptGuideOffer/<?=$guideoffer->offer_id;?>/<?=$guideoffer->request_id;?>"><button id="request-offer-btn" type="submit">Accept offer</button></a>
                        <a href="<?php echo URLROOT; ?>/Offers/rejectGuideOffer/<?=$guideoffer->offer_id;?>/<?=$guideoffer->request_id;?>"><button id="request-delete-btn" type="submit">Reject Offer</button></a>
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