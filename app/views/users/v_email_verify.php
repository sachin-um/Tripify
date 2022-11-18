<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?> 
<div class="form-login">
        <div >
            <img id="logo" src="<?php echo URLROOT; ?>/img/logo1-removebg-preview.png" alt="logo">
            <p id="tag">Email verification</p> 
        </div>
    
        <div >
            <form action="<?php echo URLROOT; ?>/Users/emailverify" method="POST">
                <input type="text" id="code" name="code" placeholder="Verification Code"  value="<?php echo $data['code']; ?>">
                <span class="invalid"><?php echo $data['code_err']; ?></span>
                
                <button id="sign-up-btn-1" type="submit">Verify</button>
                
              </form> 
              <?php flash('verify_flash'); ?>
        </div>
    </div>
    
<?php require APPROOT.'/views/inc/components/footer.php'; ?>