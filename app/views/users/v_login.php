<?php require APPROOT.'/views/inc/components/header.php'; ?>
<div class="wrapper">


    <?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>

    <div class="content">
        <div class="form-login">
            <div >
                <img id="logo" src="<?php echo URLROOT; ?>/img/updatedLOGO.png" alt="logo">
                <p id="tag">Login</p> 
            </div>
    
            <div >
                <form action="<?php echo URLROOT; ?>/Users/login" method="POST">
                    <input type="email" id="email" name="email" placeholder="Email"  value="<?php echo $data['email']; ?>">
                    <span class="invalid"><?php echo $data['email_err']; ?></span>
                    <input type="password" id="password" name="password" placeholder="Password" value="<?php echo $data['password']; ?>">
                    <p><a href="<?php echo URLROOT; ?>/Users/passwordverify" style="margin-bottom: 15px; display: block; text-align: center; color: #03002E; font-weight: 600;">Forgot Password?</a></p>
                    <p><a href="<?php echo URLROOT; ?>/Users/register" style="margin-bottom: 15px; display: block; text-align: center; color: #03002E; font-weight: 600;">Don't have a account?</a></p>
                    <span class="invalid"><?php echo $data['password_err']; ?></span><br>
                    <input type="hidden" id="usertype" name="usertype" value="Traveler">
                    <button id="sign-up-btn-1" type="submit">Login</button>
                

                </form> 
                <?php flash('reg_flash'); ?>
              
            </div>
        </div>
    </div>
    <?php require APPROOT.'/views/inc/components/footer.php'; ?>  
</div>   






    

