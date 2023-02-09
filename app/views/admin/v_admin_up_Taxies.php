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
        <div class="first-container">
            <div class="admin-table-container">
                <table class="message-table">
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
                            <th>Suspend</th>
                            <th>Remove</th>
                            
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