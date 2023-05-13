<?php require APPROOT.'/views/inc/components/header.php'; ?>
<div class="wrapper">


    <?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>

    <div class="content">
        <div class="form-login">
            <div >
                <img id="logo" src="<?php echo URLROOT; ?>/img/updatedLOGO.png" alt="logo">
                <p id="tag">Reset Password</p> 
            </div>
    
            <div >
                <form action="<?php echo URLROOT; ?>/Admins/changepassword/<?php echo $data['otp']; ?>" method="POST">
                    <input type="email" id="email" name="email" placeholder="Enter Your Username"  value="">
                    <span class="invalid"><?php echo $data['email_err']; ?></span>
                    <input type="password" id="password" name="password" placeholder="New Password">
                    <span class="invalid"><?php echo $data['password_err']; ?></span><br>
                    <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm Password">
                    <span class="invalid"><?php echo $data['confirm-password_err']; ?></span><br>
                    <button id="sign-up-btn-1" type="submit">Reset Password</button>
                

                </form> 
                <?php flash('reset_flash'); ?>
              
            </div>
        </div>
    </div>
    <?php require APPROOT.'/views/inc/components/footer.php'; ?>  
</div>