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
            <a href="<?php echo URLROOT; ?>/Admins/profiles/Taxi" class="menu-item">Taxies</a>
            <a href="<?php echo URLROOT; ?>/Admins/unverifiedDrivers" class="menu-item is-active">&nbsp;&nbsp;&nbsp;&nbsp;Drivers</a>
            <a href="<?php echo URLROOT; ?>/Admins/unverifiedVehicles" class="menu-item">&nbsp;&nbsp;&nbsp;&nbsp;Vehicles</a>
            <a href="<?php echo URLROOT; ?>/Pages/home/" class="menu-item" >Exit Dashboard</a>
        </nav>
    </aside>

    <main class="right-side-content">
        <br>
        <br>
        <h2>Unverified Drivers</h1>
        <hr>
        <br>
        <?php flash('admin_driver_verify_flash'); ?>
        <div class="first-container">
            <div class="admin-table-container">
                <table class="message-table" id="message-table">
                    <thead>
                        <tr>
                            <th>Driver ID</th>
                            <th>Age</th>
                            <th>Name</th>
                            <th>License No </th>
                            <th>Owner ID</th>
                            <th>Contact No</th>
                            <th>View</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $drivers=$data['driverData'];
                            foreach($drivers as $driver):
                        ?>
                                <tr>
                                <td data-lable="ID"><?php echo $driver->TaxiDriverID ?></td>
                                <td data-lable="Name"><?php echo $driver->Age ?></td>
                                <td data-lable="Contact Number"><?php echo $driver->Name ?></td>
                                <td data-lable="No of Vehicles"><?php echo $driver->LicenseNo ?></td>
                                <td data-lable="No of Vehicles"><?php echo $driver->OwnerID ?></td>
                                <td data-lable="No of Vehicles"><?php echo $driver->contact_number ?></td>
                                <td data-lable="Email"><button class="acc-view-btn" type="button" onclick="location.href = '<?php echo URLROOT; ?>/Taxi_Driver/viewdrivers/<?php echo $driver->OwnerID ?>'"><i class="fa-solid fa-eye" style="margin-right: 10px"></i>View </button></td>
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
    <br><br>
</div>

<?php
}
?>

<script>
    var userProfilesLink = document.getElementById('user-profiles-link');
    var driversLink = document.getElementById('drivers-link');
    var vehiclesLink = document.getElementById('vehicles-link');

    userProfilesLink.addEventListener('click', () => {
        if (driversLink.style.display === 'none') {
            driversLink.style.display = 'block';
            vehiclesLink.style.display = 'block';
        } else {
            driversLink.style.display = 'none';
            vehiclesLink.style.display = 'none';
        }
   });

</script>