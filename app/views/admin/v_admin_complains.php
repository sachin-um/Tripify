<?php
$_SESSION['user_id'];
$_SESSION['user_type'];


if (empty($_SESSION['user_id'])) {
    flash('reg_flash', 'You need to have logged in first...');
    redirect('Users/login');
}
elseif ($_SESSION['user_type']!='Admin') {
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
            <a href="#" class="menu-item">Admin Profile</a>
            <a href="app/views/traveler/traveler_dashboard2.php" class="menu-item">Messages</a>
            <a href="#" class="menu-item is-active">Complains</a>
            <a href="<?php echo URLROOT; ?>/Trips/trips" class="menu-item">Articles</a>
            <a href="<?php echo URLROOT; ?>/Request/GuideRequest" class="menu-item">User Profiles</a>
            <a href="#" class="menu-item">Exit Dashboard</a>
        </nav>
    </aside>

    <main class="right-side-content">
        <br>
        <br>
        <h2 style="text-align: left; margin-left:8%;">Complains</h1>
        <hr>
        <br>
        <div class="first-container">
            <div class="admin-table-container">
                <table class="message-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Booking ID</th>
                            <th>Traveler ID</th>
                            <th>Service Provider ID</th>
                            <th>Description</th>
                            <th>status</th>
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