<?php
$_SESSION['user_id'];
$_SESSION['user_type'];


if (empty($_SESSION['user_id'])) {
    flash('reg_flash', 'You need to have logged in first...');
    redirect('Users/login');
}
elseif ($_SESSION['user_type']!='Traveler') {
    flash('reg_flash', 'Only the Traveler can have access...');
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

        <nav class="menu">
            <a href="<?php echo URLROOT; ?>/Pages/profile" class="menu-item">User Profile</a>
            <a href="app/views/traveler/traveler_dashboard2.php" class="menu-item">Hotel Bookings</a>
            <a href="#" class="menu-item">Taxi Bookings</a>Guide Bookings</a>
            <a href="<?php echo URLROOT; ?>/Request/TaxiRequest" class="menu-item">Taxi Requests</a>
            <a href="<?php echo URLROOT; ?>/Request/GuideRequest" class="menu-item is-active">Guide Requests</a>
            <a href="<?php echo URLROOT; ?>/Request/TaxiRequest" class="menu-item">Messages</a>
            <a href="<?php echo URLROOT; ?>/Pages/home" class="menu-item">Exit Dashboard</a>
        </nav>
    </aside>

    <main class="right-side-content">
        <br>
        <br>
        <h2 style="text-align: left; margin-left:8%;">Messages</h1>
        <hr>
        <br>
        <div class="first-container">
            <div class="admin-table-container">
                <table class="message-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Message</th>
                            <th>Reply</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td data-lable="ID"><?php echo $message->id ?></td>
                            <td data-lable="Name"><?php echo $message->name ?></td>
                            <td data-lable="Email"><?php echo $message->email ?></td>
                            <td data-lable="Message"><?php echo $message->message ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
        </div>
    </main>
 </div>

 <?php
}
?>