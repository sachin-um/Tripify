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
            <a href="<?php echo URLROOT; ?>/Admins/profiles/Guide" class="menu-item is-active">Guides</a>
            <a href="<?php echo URLROOT; ?>/Admins/profiles/Hotel" class="menu-item">Hotels</a>
            <a href="<?php echo URLROOT; ?>/Admins/profiles/Taxi" class="menu-item">Taxies</a>
            <a href="#" class="menu-item">Exit Dashboard</a>
        </nav>
    </aside>

    <main class="right-side-content">
        <br>
        <br>
        <h2>Guides Profiles</h1>
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
                            <th>NIC</th>
                            <th>Area</th>
                            <th>Rate</th>
                            <th>Account status</th>
                            <?php
                                if ($_SESSION['admin_type']=='verification' || $_SESSION['admin_type']=='Super Admin') {
                                    ?>
                                    
                                    <th>View </th>
                                    <th>Verify</th>
                                    
                                    <th>Suspend</th>
                                    <?php
                                } elseif ($_SESSION['admin_type']=='management') {
                                    ?>
                                    <th>Suspend</th>
                                    <?php
                                }
                                
                            ?>
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $guides=$data['UserData'];
                            foreach($guides as $guide):
                        ?>
                        <tr>
                            <td data-lable="ID"><?php echo $guide->UserID ?></td>
                            <td data-lable="Name"><?php echo $guide->Name ?></td>
                            <td data-lable="Contact Number"><?php echo $guide->moreDetails->phone_number ?></td>
                            <td data-lable="Email"><?php echo $guide->Email ?></td>
                            <td data-lable="Status"><?php echo $guide->moreDetails->NIC ?></td>
                            <td data-lable="Status"><?php echo $guide->moreDetails->Area ?></td>
                            <td data-lable="Status"><?php echo $guide->moreDetails->Rate ?></td>
                            <td data-lable="Status"><?php echo $guide->acc_status ?></td>
                            
                            <?php
                            if ($_SESSION['admin_type']=='verification' || $_SESSION['admin_type']=='Super Admin') {
                                    ?>
                                    
                                    <td data-lable="Email"><button class="acc-view-btn" type="button">View </button></td>
                                    <td data-lable="Email">
                                        <?php
                                            if ($guide->verification_status==2) {
                                                ?>
                                                <a href="<?php echo URLROOT; ?>/Users/verifyaccount/<?php echo $guide->UserID ?>/Guide">
                                                    <button class="verify-btn" type="button">Verify</button>
                                                </a>
                                                <?php
                                            }
                                            elseif($guide->verification_status==3)
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
                                    
                                    
                                    <td data-lable="Email"><a href="<?php echo URLROOT; ?>/Users/suspendaccount/<?php echo $guide->UserID ?>/Guide/<?php echo  $guide->acc_status=='Suspended' ? 'Activate' : 'Suspend'  ?>"><button class=<?php echo $guide->acc_status=='Suspended' ? 'active-btn' : 'sus-btn'  ?> type="button"><?php echo  $guide->acc_status=='Suspended' ? 'Activate' : 'Suspend'  ?></button></a></td>
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
            
        </div>
    </main>
 </div>

 <?php
}
?>