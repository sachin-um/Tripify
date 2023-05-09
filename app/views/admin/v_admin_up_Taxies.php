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
            <a href="<?php echo URLROOT; ?>/Admins/profiles/Traveler" class="menu-item">Travelers</a>
            <a href="<?php echo URLROOT; ?>/Admins/profiles/Guide" class="menu-item">Guides</a>
            <a href="<?php echo URLROOT; ?>/Admins/profiles/Hotel" class="menu-item">Hotels</a>
            <a href="<?php echo URLROOT; ?>/Admins/profiles/Taxi" class="menu-item is-active">Taxies</a>
            <a href="#" class="menu-item">Exit Dashboard</a>
        </nav>
    </aside>

    <main class="right-side-content">
        <br>
        <br>
        <h2>Taxies Profiles</h1>
        <hr>
        <br>
        <div class="profile-search-area">
            <input type="text" placeholder="Search accounts..." id="searchInput">
            <select name="account-type" id="account-type">
                <option value="" disabled selected>Account Type</option>
                <option value="all account">All Account</option>
                <option value="suspened">Suspended</option>
                <option value="active">Active</option>
                <option value="verified">Verified</option>
                <option value="not-verified">Not Verified</option>
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
                            <th>NIC </th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Company Name</th>
                            <th>No of Vehicles</th>
                            <th>status</th>
                            <th style="display: none;">Verification status</th>
                            <th>View </th>
                            <?php
                                if ($_SESSION['admin_type']=='verification' || $_SESSION['admin_type']=='Super Admin') {
                                    ?>
                                    
                                    <th>Verify</th>
                                    
                                    <th>Suspend</th>
                                    <?php
                                }
                                elseif ($_SESSION['admin_type']=='management' ||  $_SESSION['admin_type']=='Super Admin') {
                                    ?>
                                    <th>Suspend</th>
                                    <?php
                                }
                                
                            ?>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $taxies=$data['UserData'];
                            foreach($taxies as $taxi):
                        ?>
                        <tr>
                            <td data-lable="ID"><?php echo $taxi->UserID ?></td>
                            <td data-lable="Name"><?php echo $taxi->moreDetails->owner_name ?></td>
                            <td data-lable="Contact Number"><?php echo $taxi->moreDetails->contact_number ?></td>
                            <td data-lable="No of Vehicles"><?php echo $taxi->moreDetails->nic_no ?></td>
                            <td data-lable="No of Vehicles"><?php echo $taxi->Email ?></td>
                            <td data-lable="No of Vehicles"><?php echo $taxi->moreDetails->address ?></td>
                            <td data-lable="No of Vehicles"><?php echo $taxi->moreDetails->company_name ?></td>
                            <td data-lable="No of Vehicles"><?php echo $taxi->moreDetails->NoOfVehicles ?></td>
                            <td data-lable="No of Vehicles"><?php echo $taxi->acc_status ?></td>
                            <td data-lable="Email"><button class="acc-view-btn" type="button" onclick="location.href = '<?php echo URLROOT; ?>/Pages/profile/<?php echo $taxi->UserID ?>/Taxi'"><i class="fa-solid fa-eye" style="margin-right: 10px"></i>View </button></td>
                            <td style="display: none;"><?php echo $taxi->verification_status==2 ? 'Not Verified' : 'Verified'  ?>"</td>
                            <?php
                            if ($_SESSION['admin_type']=='verification' || $_SESSION['admin_type']=='Super Admin') {
                                    ?>
                                    
                                    
                                    <td data-lable="Email">
                                        <?php
                                            if ($taxi->verification_status==2) {
                                                ?>
                                                <img src="<?php echo URLROOT; ?>/img/cancel.png" alt="user" class="post-by-img">
                                                <?php
                                            }
                                            elseif($taxi->verification_status==3)
                                            {
                                                ?>
                                                <img src="<?php echo URLROOT; ?>/img/done.png" alt="user" class="post-by-img">
                                                <?php
                                            }
                                        ?>
                                        
                                    </td>
                                    
                                    <?php
                            } 
                            if ($_SESSION['admin_type']=='management' || $_SESSION['admin_type']=='Super Admin') {
                                ?>
                                
                                
                                <td data-lable="Email"><a href="<?php echo URLROOT; ?>/Users/suspendaccount/<?php echo $taxi->UserID ?>/Guide/<?php echo  $taxi->acc_status=='Suspended' ? 'Activate' : 'Suspend'  ?>"><button class=<?php echo $taxi->acc_status=='Suspended' ? 'active-btn' : 'sus-btn'  ?> type="button">
                                        <?php 
                                            if ($taxi->acc_status=='Suspended') {
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
                                        <?php echo  $taxi->acc_status=='Suspended' ? 'Activate' : 'Suspend'  ?></button></a>
                                    </td>
                                
                                <?php
                            }
                            ?>
                        </tr>
                        <?php
                            endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
            <div id="popup" class="trip-popup">
                <div id="popup-content" class="profile-popup-content"></div>
            </div>
        </div>
    </main>
 </div>
 <script src="<?php echo URLROOT;?>/js/components/search/search.js"></script>
 <script type="text/JavaScript" src="<?php echo URLROOT;?>/js/components/showprofile.js"></script>
 <?php
}
?>