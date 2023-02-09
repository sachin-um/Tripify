<?php
$_SESSION['user_id'];
$_SESSION['user_type'];


if (empty($_SESSION['user_id'])) {
    flash('reg_flash', 'You need to have logged in first...');
    redirect('Users/login');
}
elseif ($_SESSION['user_type']!='Guide') {
    flash('reg_flash', 'Only the Guides can have access...');
    redirect('Pages/home');
}
else {
    ?>
<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>
<?php require APPROOT.'/views/inc/components/sidebars/guide_sidebar.php'; ?>

<main class="right-side-content">
    <br><br>
    <h2 style="text-align: left; margin-left:8%;">Profile Information</h1>
    <hr>
    <br>
    <div class="profile-image" style="width: 450px; text-align: center;">
        <br>
        <img id="pro-picture-2" src="<?php echo URLROOT; ?>/img/Group_profile.png" alt="picture">
        <br>
        <br>
        <button class="profile-btn">Edit</button>
    </div>
        
    <div class="first-container">
        <br>
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
                    <h3>Email :</h3>
                </div>
                
                <div class="sub-sub">
                    <h3><?php echo $data->Email;  ?></h3>
                </div>
                
            </div>
            <br> 
            <div class="sub-description">
                <div class="sub-sub">
                    <h3>verificaion Status: </h3>
                </div>
                    
                <div class="sub-sub">
                <?php if ($data->verification_status ==1) {
                        ?><h3>Verified </h3><?php
                    }else {
                        ?><h3>Not Verified </h3><?php
                    } ?>
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
        <br><br>
    </div>

<!-- <?php require APPROOT.'/views/inc/components/footer.php'; ?> -->
<?php
}
?>


    

