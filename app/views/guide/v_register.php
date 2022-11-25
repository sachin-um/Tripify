<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?> 
 
<div class="form">
        <div >
            <img id="logo" src="<?php echo URLROOT; ?>/img/logo1-removebg-preview.png" alt="logo">
            <p id="tag">Sign Up is fast and easy!</p> 
        </div>
    
        <div >
            <form action="<?php echo URLROOT; ?>/Users/register" method="POST">
                <input type="text" id="name" name="name" placeholder="   Name" value="<?php echo $data['name']; ?>">
                <span class="invalid"><?php echo $data['name_err']; ?></span>
                <input type="email" id="email" name="email" placeholder="   Email"  value="<?php echo $data['email']; ?>">
                <span class="invalid"><?php echo $data['email_err']; ?></span>
                <input type="password" id="password" name="password" placeholder="   Password" value="<?php echo $data['password']; ?>">
                <span class="invalid"><?php echo $data['password_err']; ?></span>
                <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm Password" value="<?php echo $data['confirm-password']; ?>">
                <span class="invalid"><?php echo $data['confirm-password_err']; ?></span><br>
                <button id="sign-up-btn-1" type="submit">Sign Up</button>

              </form> 
        </div>
    </div>

<?php require APPROOT.'/views/inc/components/footer.php'; ?>