<?php
$_SESSION['user_id'];
$_SESSION['user_type'];


if ($_SESSION['user_id']!=1) {
    flash('reg_flash', 'You need to have logged in first...');
    redirect('Users/login');
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
            <a href="<?php echo URLROOT; ?>/Pages/profile" class="menu-item is-active">Back</a>
            <!-- <a href="<?php echo URLROOT; ?>/Admins/profiles/Traveler" class="menu-item is-active">Travelers</a>
            <a href="<?php echo URLROOT; ?>/Admins/profiles/Guide" class="menu-item">Guides</a>
            <a href="<?php echo URLROOT; ?>/Admins/profiles/Hotel" class="menu-item">Hotels</a>
            <a href="<?php echo URLROOT; ?>/Admins/profiles/Taxi" class="menu-item">Taxies</a> -->
            <a href="#" class="menu-item">Exit Dashboard</a>
        </nav>
    </aside>

    <main class="right-side-content">
        <br>
        <br>
        <h2>Admin Management</h2>
        <hr>
        <br>
        <div class="btn-div">
        <a href="<?php echo URLROOT; ?>/Admins/register"><button  class="add-admin-btn"><i class="fa-solid fa-plus" style="margin-right:10px"></i>Add New Admin</button></a>
        <!-- <a ><button class="add-admin-btn" type="button">Add New Admin </button></a> -->
        </div>
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
                            <th>Assigned Area</th>
                            <th>Account status</th>
                            <th>Suspend Account</th>
                            <th>Remove Account</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $admins=$data['AdminData'];
                            foreach($admins as $admin):
                        ?>
                        <tr>
                            <td data-lable="ID"><?php echo $admin->AdminID ?></td>
                            <td data-lable="Name"><?php echo $admin->details->Name ?></td>
                            <td data-lable="Contact Number"><?php echo $admin->details->ContactNo ?></td>
                            <td data-lable="Email"><?php echo $admin->details->Email ?></td>
                            <td data-lable="Email"><?php echo $admin->nic ?></td>
                            <td data-lable="Email"><?php echo $admin->AssignedArea ?></td>
                            <td data-lable="Email"><?php echo $admin->details->acc_status ?></td>
                            <td data-lable="Email"><button class="sus-btn" type="button"><i class="fa-solid fa-circle-exclamation" style="margin-right:10px"></i>Suspend</button></td>
                            <td data-lable="Email"><button class="btn" type="button"><i class="fa-solid fa-xmark" style="margin-right:10px; color:red"></i>Remove</button></td>
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