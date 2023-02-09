<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/nav_bar.php'; ?> 

    <div class="contact-form">
        <div >
            <img id="logo" src="<?php echo URLROOT; ?>/img/logo1-removebg-preview.png" alt="logo">
            <p id="tag">Contact Us...</p> 
        </div>
    
        <div >
            <form class="contact-content" action="<?php echo URLROOT; ?>/Users/contactus" method="POST">
                

                <input type="text" id="name" name="name" placeholder="Name" value="<?php echo $data['name']; ?>">
                <span class="invalid"><?php echo $data['name_err']; ?></span>
                <input type="email" id="email" name="email" placeholder="Email" value="<?php echo $data['email']; ?>">
                <span class="invalid"><?php echo $data['email_err']; ?></span>
                <textarea name="message" id="message" cols="52" rows="10" placeholder="Type your message here"></textarea>
                <span class="invalid"><?php echo $data['message_err']; ?></span>
                <button id="sign-up-btn-1" type="submit">Contact Us</button>
              </form> 
              <?php flash('reg_flash'); ?>
        </div>
    </div>

<?php require APPROOT.'/views/inc/components/footer.php'; ?>

