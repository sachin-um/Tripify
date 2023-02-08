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
            <a href="<?php echo URLROOT; ?>/Pages/profile" class="menu-item is-active">Admin Profile</a>
            <a href="<?php echo URLROOT; ?>/Users/messages" class="menu-item">Messages</a>
            <a href="<?php echo URLROOT; ?>/Complains/viewall" class="menu-item">Complains</a>
            <a href="<?php echo URLROOT; ?>/Articles/articles" class="menu-item">Articles</a>
            <a href="<?php echo URLROOT; ?>/Admins/profiles/Traveler" class="menu-item">User Profiles</a>
            <a href="#" class="menu-item">Exit Dashboard</a>
        </nav>
    </aside>

    <main class="right-side-content">
        <br>
        <br>
        <h2 style="text-align: left; margin-left:8%;">Profile Settings</h1>
        <hr>
        <br>
        <div class="first-container">
            <div class="profile-image" style="width: 450px; text-align: center;">
                <br>
                <img id="pro-picture-2" src="<?php echo URLROOT; ?>/img/Group_profile.png" alt="picture">
                <br>
                <br>
                <button class="profile-btn">Edit</button>
            </div>

            <div class="profile-description">
            <br>
                <div class="sub-description">
                    <div class="sub-sub">
                        <h3>Name : </h3>
                    </div>
                    
                    <div class="sub-sub">
                        <h3><?php echo $data->Name;  ?></h3>

                    </div>
                            
                </div>


                <br> 
                <div class="sub-description">
                    <div class="sub-sub">
                        <h3>Email:</h3>
                    </div>
                 
                    <div class="sub-sub">
                        <h3><?php echo $data->Email;  ?></h3>

                    </div>
                    
                </div>
                <br> 
                <div class="sub-description">
                    <div class="sub-sub">
                        <h3>Assigned Area: </h3>
                    </div>
                        
                    <div class="sub-sub">
                        <h3><?php echo $data->details->AssignedArea ?></h3> 
                    </div>
                        
                </div>
                <br> 
                <div class="sub-description">
                    <div class="sub-sub">
                        <h3>Contact Number: </h3>

                    </div>
                        
                    <div class="sub-sub">
                        <h3>+94 77 123 4567</h3>
                    </div>
                        
                </div>
                <br> 
          
                <br>
                <div style="text-align: center;">
                    <button class="profile-btn">Edit Info</button>
                        
                </div>
            </div>
        </div>
    </main>
 </div>

 <?php
}
?>