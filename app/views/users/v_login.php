<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?> 
<div class="form-login">
        <div >
            <img id="logo" src="<?php echo URLROOT; ?>/img/logo1-removebg-preview.png" alt="logo">
            <p id="tag">Login</p> 
        </div>
    
        <div >
            <form action="<?php echo URLROOT; ?>/Users/login" method="POST">
                <input type="email" id="email" name="email" placeholder="   Email"  value="<?php echo $data['email']; ?>">
                <span class="invalid"><?php echo $data['email_err']; ?></span>
                <input type="password" id="password" name="password" placeholder="   Password" value="<?php echo $data['password']; ?>">
                <span class="invalid"><?php echo $data['password_err']; ?></span><br>
                <input type="hidden" id="usertype" name="usertype" value="Traveler">
                <button id="sign-up-btn-1" type="submit">Login</button>
                

              </form> 
              <?php flash('reg_flash'); ?>
              
        </div>
    </div>
    
<?php require APPROOT.'/views/inc/components/footer.php'; ?>