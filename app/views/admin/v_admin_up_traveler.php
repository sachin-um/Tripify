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
            <a href="<?php echo URLROOT; ?>/Admins/unverifiedDrivers" class="menu-item">&nbsp;&nbsp;&nbsp;&nbsp;Drivers</a>
            <a href="<?php echo URLROOT; ?>/Admins/unverifiedVehicles" class="menu-item">&nbsp;&nbsp;&nbsp;&nbsp;Vehicles</a>
            <a href="<?php echo URLROOT; ?>/Pages/home/" class="menu-item" >Exit Dashboard</a>
        </nav>
    </aside>

    <main class="right-side-content">
        <br>
        <br>
        <h2>Traveler Profiles</h2>
        <hr>
        <br>
        <div class="profile-search-area">
            <input type="text" placeholder="Search accounts..." id="searchInput">
            <select name="account-type" id="account-type">
                <option value="" disabled selected>Account Type</option>
                <option value="all account">All Account</option>
                <option value="suspend">Suspend</option>
                <option value="active">Active</option>
            </select>
        </div>
        <?php flash('admin_flash'); ?>
        <div class="first-container">
            <div class="admin-table-container">
                <table class="message-table" id="message-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Contact Number</th>
                            <th>Email</th>
                            <th>Verification status</th>
                            <th>Account status</th>
                            <th>View</th>
                            <th>Suspend Account</th>
                            
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
                            <td data-lable="Email"><?php echo  $traveler->verification_status==1 ? 'Verified' : 'Not Verified'  ?></td>
                            <td data-lable="Email"><?php echo $traveler->acc_status ?></td>
                            <td data-lable="Email"><button class="acc-view-btn" type="button" onclick="location.href = '<?php echo URLROOT; ?>/Pages/profile/<?php echo $traveler->UserID ?>/Traveler'"><i class="fa-solid fa-eye" style="margin-right: 10px"></i>View </button></td>
                            <td data-lable="Email"><a href="<?php echo URLROOT; ?>/Users/suspendaccount/<?php echo $traveler->UserID ?>/Traveler/<?php echo  $traveler->acc_status=='Suspend' ? 'Activate' : 'Suspend'  ?>"><button class=<?php echo $traveler->acc_status=='Suspend' ? 'active-btn' : 'sus-btn'  ?> type="button">
                                <?php 
                                    if ($traveler->acc_status=='Suspend') {
                                        ?>
                                        <i class="fa-solid fa-circle-check" style="margin-right:10px"></i>
                                        
                                        <?php
                                    }
                                    else {
                                        ?>
                                        <i class="fa-solid fa-circle-exclamation" style="margin-right:10px"></i>
                                        <?php
                                    }
                                
                                ?>
                                <?php echo  $traveler->acc_status=='Suspend' ? 'Activate' : 'Suspend'  ?></button></a>
                            </td>
                            <td data-lable="Email" style="display: none;"><?php echo  $traveler->verification_status==1 ? 'Verified' : 'Not Verified'  ?></td>
                            <td data-lable="Email" style="display: none;"><?php echo $traveler->acc_status ?></td>
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
<script src="<?php echo URLROOT;?>/js/components/search/search.js"></script>

 <?php
}
?>