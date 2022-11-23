<?php require APPROOT.'/views/inc/components/header.php'; ?>
<div class="wrapper">


    <?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>

    <div class="content">
        <div class="form-login">
            <div >
                <img id="logo" src="<?php echo URLROOT; ?>/img/logo1-removebg-preview.png" alt="logo">
                <p id="tag">Reset Password</p> 
            </div>
    
            <div >
                <form action="<?php echo URLROOT; ?>/Users/login" method="POST">
                    <input type="text" id="reset_code" name="reset_code" placeholder="Enter the Verification Code..."  value="">
                    <span class="invalid"><?php echo $data['reset_err']; ?></span>
                    <input type="password" id="password" name="password" placeholder="New Password" value="<?php echo $data['password']; ?>">
                    <span class="invalid"><?php echo $data['password_err']; ?></span><br>
                    <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm Password" value="<?php echo $data['confirm-password']; ?>">
                    <span class="invalid"><?php echo $data['confirm-password_err']; ?></span><br>
                    <input type="hidden" id="email" name="email" value="Traveler">
                    <button id="sign-up-btn-1" type="submit">Reset Password</button>
                

                </form> 
                <?php flash('reset_flash'); ?>
              
            </div>
        </div>
    </div>
    <?php require APPROOT.'/views/inc/components/footer.php'; ?>  
</div>