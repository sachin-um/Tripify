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
            <a href="<?php echo URLROOT; ?>/Admins/profiles/Hotel" class="menu-item is-active">Hotels</a>
            <a href="<?php echo URLROOT; ?>/Admins/profiles/Taxi" class="menu-item">Taxies</a>
            <a href="#" class="menu-item">Exit Dashboard</a>
        </nav>
    </aside>

    <main class="right-side-content">
        <br>
        <br>
        <h2 >Hotels Profiles</h1>
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
                            <th>Owner Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Registration Number</th>
                            <th>Account status</th>
                            <?php
                                if ($_SESSION['admin_type']=='verification' || $_SESSION['admin_type']=='Super Admin') {
                                    ?>
                                    
                                    <th>View </th>
                                    <th>Verify</th>
                                    
                                    <th>Suspend</th>
                                    <th>Remove</th>
                                    <?php
                                } elseif ($_SESSION['admin_type']=='management') {
                                    ?>
                                    <th>Suspend</th>
                                    <th>Remove</th>
                                    <?php
                                }
                                
                            ?>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $hotels=$data['UserData'];
                            foreach($hotels as $hotel):
                        ?>
                        <tr>
                            <td data-lable="ID"><?php echo $hotel->UserID ?></td>
                            <td data-lable="Name"><?php echo $hotel->moreDetails->Name ?></td>
                            <td data-lable="Contact Number"><?php echo $hotel->moreDetails->contact_number ?></td>
                            <td data-lable="Owner Name"><?php echo $hotel->Name ?></td>
                            <td data-lable="Email"><?php echo $hotel->Email ?></td>
                            <td data-lable="Address"><?php echo $hotel->moreDetails->Address ?></td>
                            <td data-lable="Status"><?php echo $hotel->moreDetails->reg_number ?></td>
                            <td data-lable="Status"><?php echo $hotel->acc_status ?></td>
                            <?php
                            if ($_SESSION['admin_type']=='verification' || $_SESSION['admin_type']=='Super Admin') {
                                    ?>
                                    
                                    <td data-lable="Email"><button class="acc-view-btn" type="button">View </button></td>
                                    <td data-lable="Email">
                                        <?php
                                            if ($hotel->verification_status==2) {
                                                ?>
                                                <button class="verify-btn" type="button">Verify</button>
                                                <?php
                                            }
                                            elseif($hotel->verification_status==3)
                                            {
                                                ?>
                                                <img src="<?php echo URLROOT; ?>/img/done.png" alt="user" class="post-by-img">
                                                <?php
                                            }
                                        ?>
                                        
                                    </td>
                                    
                                    <td data-lable="Email"><button class="sus-btn" type="button">Suspend</button></td>
                                    <td data-lable="Email"><button class="btn" type="button">Remove</button></td>
                                    <?php
                            } elseif ($_SESSION['admin_type']=='management' || $_SESSION['admin_type']=='Super Admin') {
                                    ?>
                                    
                                    
                                    <td data-lable="Email"><button class="sus-btn" type="button">Suspend</button></td>
                                    <td data-lable="Email"><button class="btn" type="button">Remove</button></td>
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