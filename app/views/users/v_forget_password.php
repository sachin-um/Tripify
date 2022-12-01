<?php require APPROOT.'/views/inc/components/header.php'; ?>
<div class="wrapper">


    <?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>

    <div class="content">
        <div class="form-login">
            <div >
                <img id="logo" src="<?php echo URLROOT; ?>/img/logo1-removebg-preview.png" alt="logo">
                <p id="tag">Forgot Password..?</p> 
                <span class="caption">don't worry we still got you...</span>
            </div>
    
            <div >
                <form action="<?php echo URLROOT; ?>/Users/passwordverify" method="POST">
                    <input type="email" id="email" name="email" placeholder="Enter Your Email Address"  value="<?php echo $data['email']; ?>">
                    <span class="invalid"><?php echo $data['email_err']; ?></span>
                
                    <button id="sign-up-btn-1" type="submit">Send Verification Code</button>
                
                </form> 
                <?php flash('verify_flash'); ?>
            </div>
        </div>
    </div>
    <?php require APPROOT.'/views/inc/components/footer.php'; ?>  
</div>   