<?php
$_SESSION['user_id'];
$_SESSION['user_type'];


if (empty($_SESSION['user_id'])) {
    flash('reg_flash', 'You need to have logged in first...');
    redirect('Users/login');
}
elseif ($_SESSION['user_type']!='Traveler' && $_SESSION['user_type']!='Taxi') {
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
            <a href="<?php echo URLROOT; ?>/Request/TaxiRequest" class="menu-item is-active">Taxi Request</a>
            <a href="<?php echo URLROOT; ?>/Request/GuideRequest" class="menu-item">Guide Request</a>
            <a href="#" class="menu-item">Exit Dashboard</a>
        </nav>
        <?php
        }
        else if ($_SESSION['user_type']=='Guide') {
        ?>
        <nav class="menu">
        <a href="#" class="menu-item">User Profile</a>
        <a href="app/views/traveler/traveler_dashboard2.php" class="menu-item">Hotel Bookings</a>
        <a href="#" class="menu-item">Taxi Bookings</a>
        <a href="<?php echo URLROOT; ?>/Request/TaxiRequest" class="menu-item is-active">Taxi Request</a>
        <a href="#" class="menu-item">Guides</a>
        <a href="#" class="menu-item">Exit Dashboard</a>
        </nav>
        <?php
        }
        ?>
    </aside>

    <main class="right-side-content">
    <div class="dashboad-content">
        <div>
            <h2 class="title" >Taxi Requests</h2>
        </div>    
        <div class="request-list">

        <?php
            $requests=$data['taxirequests'];
            foreach($requests as $taxirequest):
        ?>

        <div class="request-wrapper">
        <div class="request">
            <div class="post-header"><?php echo $taxirequest->caption; ?></div>
            <div class="post-body">
            <div class="post-date">Request Date: <span id="request-data"><?php echo $taxirequest->date; ?></span></div>
            <div class="post-time">Request Time: <?php echo $taxirequest->time; ?></div>
            <div class="post-location">Request PickUp Location: <?php echo $taxirequest->pickup_location; ?></div>
            <div class="post-details">Additional Details: <?php echo $taxirequest->additional_details; ?></div>
            <div class="post-by">Post By: <?php echo $taxirequest->name; ?></div>
            <div class="post-by">Post at: <?php echo convertTime($taxirequest->post_at); ?></div>
            </div>
            <div class="request-footer">
            <?php
            if ($_SESSION['user_type']=='Traveler') {
                ?>
                    <a href="<?php echo URLROOT; ?>/Request/editTaxiRequest/<?php echo $taxirequest->RequestID ?>"><button id="request-edit-btn" type="submit">Edit</button></a>
                    <button id="request-delete-btn" type="submit">Delete</button>
                <?php
            }
            elseif ($_SESSION['user_type']=='Taxi') {
                ?>
                <button id="request-offer-btn" type="submit">Make an offer</button>
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