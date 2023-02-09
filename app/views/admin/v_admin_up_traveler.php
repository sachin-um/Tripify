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
            <a href="<?php echo URLROOT; ?>/Pages/profile" class="menu-item">Back</a>
            <a href="<?php echo URLROOT; ?>/Admins/profiles/Traveler" class="menu-item is-active">Travelers</a>
            <a href="<?php echo URLROOT; ?>/Admins/profiles/Guide" class="menu-item">Guides</a>
            <a href="<?php echo URLROOT; ?>/Admins/profiles/Hotel" class="menu-item">Hotels</a>
            <a href="<?php echo URLROOT; ?>/Admins/profiles/Taxi" class="menu-item">Taxies</a>
            <a href="#" class="menu-item">Exit Dashboard</a>
        </nav>
    </aside>

    <main class="right-side-content">
        <br>
        <br>
        <h2>Traveler Profiles</h2>
        <hr>
        <br>
        <div class="first-container">
            <div class="admin-table-container">
                <table class="message-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Contact Number</th>
                            <th>Email</th>
                            <th>Verification status</th>
                            <th>Account status</th>
                            <th>Suspend Account</th>
                            <th>Remove Account</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $travelers=$data['UserData'];
                            foreach($travelers as $traveler):
                        ?>
                        <tr>
                            <td data-lable="ID"><?php echo $traveler->UserID ?></td>
                            <td data-lable="Name"><?php echo $traveler->Name ?></td>
                            <td data-lable="Contact Number"><?php echo $traveler->ContactNo ?></td>
                            <td data-lable="Email"><?php echo $traveler->Email ?></td>
                            <td data-lable="Email"><?php echo $traveler->verification_status ?></td>
                            <td data-lable="Email"><?php echo $traveler->acc_status ?></td>
                            <td data-lable="Email"><button class="sus-btn" type="button">Suspend</button></td>
                            <td data-lable="Email"><button class="btn" type="button">Remove</button></td>
                        </tr>
                        <?php
                            endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
            
        </div>
    </main>
 </div>

 <?php
}
?>