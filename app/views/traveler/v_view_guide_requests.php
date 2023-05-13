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
            <a href="<?php echo URLROOT; ?>/Users/contactus" class="menu-item">Contact Admin</a>
            <a href="<?php echo URLROOT; ?>/Pages/home" class="menu-item">Exit Dashboard</a>
        </nav>
        <?php
        }
        else if ($_SESSION['user_type']=='Guide') {
        ?>
        <nav class="menu">
        <a href="<?php echo URLROOT; ?>/Pages/profile" class="menu-item">User Profile</a>
        <a href="<?php echo URLROOT; ?>/Request/GuideRequest" class="menu-item is-active">Trip Request</a>
        <a href="<?php echo URLROOT; ?>/Offers/guideoffers" class="menu-item">Offers</a>
        <a href="<?php echo URLROOT; ?>/Bookings/GuideBookings/<?php echo $_SESSION['user_type']; ?>/<?php echo $_SESSION['user_id']; ?>" class="menu-item">Bookings</a>
        <a href="<?php echo URLROOT; ?>/Payments/GuidePayments/" class="menu-item">Payments</a>
        <a href="<?php echo URLROOT; ?>/Pages/home" class="menu-item">Exit Dashboard</a>
        </nav>
        <?php
        }
        ?>
    </aside>

    <main class="right-side-content">
    <div class="dashboad-content">
        <div>
            <h2 class="title" >Guide Requests</h2>
            <hr>
        </div>
        <br>
        <div class="request-filter-area">
            <input type="text" placeholder="Search Request..." id="searchInput">
            <select name="request-type" id="request-type">
                <option value="" disabled selected>Request Type</option>
                <option value="all">All</option>
                <option value="In progress">In Progress</option>
                <option value="Completed">Completed</option>
            </select>
        </div>
        <?php flash('guide_request_flash'); ?>
                <?php
                    if (empty($data['guiderequests'])) {
                ?>
                    <p style="font-size: 1.2rem; margin: auto;">No records to show...</p>
                <?php        
                } else {
                ?>
        <div class="request-list" id="request-list">

        <?php
            $requests=$data['guiderequests'];
            foreach($requests as $guiderequest):
        ?>
        <div class="request">
            <div class="post-header">Request ID : GR<?php echo $guiderequest->request_id; ?></div>
            <div class="post-body">
                <div class="req-slot1">
                    <div class="detail-container" style="margin-right: 20px;">
                        <div class="header-container">
                            <i class="fa-solid fa-calendar-days fa-2xl" style="color: #03002E; margin-right: 10px;"></i>
                            <div class="heading">Start Date</div>
                        </div>
                        <div class="post-tag post-date description" style="margin-left: 33px">
                            <?php echo $guiderequest->start_date; ?></span>
                        </div>
                    </div>
                    <div class="detail-container" >
                        <div class="header-container">
                            <i class="fa-solid fa-calendar-days fa-2xl" style="color: #03002E; margin-right: 10px;"></i>
                            <div class="heading">End Date</div>
                        </div>
                        <div class="post-tag post-date description" style="margin-left: 33px">
                            <?php echo $guiderequest->end_date; ?></span>
                        </div>
                    </div>
                    
                </div>
                <div class="req-slot2">
                        <div class="detail-container" style="margin-right: 20px;">
                            <div class="header-container">
                                <i class="fa-solid fa-clock fa-2xl" style="color: #03002E; margin-right: 10px;"></i>
                                <div class="heading">Time</div>
                            </div>
                            <div class="post-tag post-date description" style="margin-left: 33px">
                                <?php echo $guiderequest->time; ?></span>
                            </div>
                        </div>
                        <div class="detail-container" >
                            <div class="header-container">
                                <i class="fa-solid fa-location-pin fa-2xl" style="color: #03002E; margin-right: 10px;"></i>
                                <div class="heading">Pickup Location</div>
                            </div>
                            <div class="post-tag post-date description" style="margin-left: 33px">
                                <?php echo $guiderequest->p_location; ?></span>
                            </div>
                        </div>
                        
                    
                </div>
                <div class="req-slot2">
                        <div class="detail-container">
                            <div class="header-container">
                                <i class="fa-solid fa-location-pin fa-2xl" style="color: #03002E; margin-right: 10px;"></i>
                                <div class="heading">Prefer Languages</div>
                            </div>
                            <div class="post-tag post-date description" style="margin-left: 33px">
                                <?php echo  $guiderequest->p_language; ?></span>
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
                                <?php echo $guiderequest->description; ?>
                            </div>
                        </div>
                    
                </div>
                
                
                <div class="post-by-content">
                <?php
                    if ($_SESSION['user_type']=='Taxi') {
                        ?>
                    <div class="post-by"><img src="<?php echo URLROOT; ?>/img/post-user.png" alt="user" class="post-by-img"><span class="post-by-data">: <?php echo $guiderequest->name; ?></span></div>
                    <div class="post-by"><img src="<?php echo URLROOT; ?>/img/phone.png" alt="phone" class="post-by-img"><span class="post-by-data">: <?php echo $guiderequest->contact_no; ?></span></div>
                    <div class="post-by"><img src="<?php echo URLROOT; ?>/img/timer.png" alt="timer" class="post-by-img"><span class="post-by-data">: <?php echo convertTime($guiderequest->post_at); ?></span></div>
                    <?php
                    }
                    elseif ($_SESSION['user_type']=='Traveler') {
                        ?>
                        <div class="post-by" style="margin:auto"><span class="post-by-data">Status: <?php echo $guiderequest->status; ?></span></div>
                        <?php
                    }
                ?>
                </div>
            </div>
            <div class="request-footer">
                <?php
                    if ($_SESSION['user_type']=='Traveler') {
                        ?>
                            <a href="<?php echo URLROOT; ?>/Request/editGuideRequest/<?php echo $guiderequest->request_id ?>" style="text-decoration:none;cursor:pointer;"><button id="request-edit-btn" type="submit">
                                <i class="fa-solid fa-pen" style="margin-right: 10px;"></i>
                                Edit
                                </button>
                            </a>
                            <a href="<?php echo URLROOT; ?>/Request/deleteGuideRequest/<?php echo $guiderequest->request_id ?>"><button id="request-delete-btn" type="submit">
                                <i class="fa-solid fa-xmark" style="margin-right: 10px;"></i>
                                Delete
                                </button>
                            </a>
                            <a href="<?php echo URLROOT; ?>/Offers/guideoffers/<?php echo $guiderequest->request_id ?>" style="text-decoration:none;cursor:pointer;"><button id="request-offer-btn" type="submit" >
                                <i class="fa-brands fa-buffer" style="margin-right: 10px;"></i>
                                View Offers
                                </button>
                            </a>
                        <?php
                    }
                    elseif ($_SESSION['user_type']=='Guide') {
                        ?>
                        <a href="<?php echo URLROOT; ?>/Offers/addGuideOffer/<?php echo $guiderequest->request_id ?>"><button id="request-offer-btn" type="submit">Make an offer</button></a>
                        
                        <?php
                    }
                ?>
                
                
            </div>
                
            

        </div>
        <?php
            endforeach;
        ?>
        </div>
        <?php
            }
        ?>
        </div>

    </main>
 </div>
 <script type="text/JavaScript" src="<?php echo URLROOT;?>/js/components/search/request_search.js"></script>
<?php
}
?>
