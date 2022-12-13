<?php require APPROOT.'/views/inc/components/header.php'; ?>
<div class="wrapper">


    <?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>

    <div class="content">
        <div class="form-login">
            <div >
                <img id="logo" src="<?php echo URLROOT; ?>/img/logo1-removebg-preview.png" alt="logo">
                <p id="tag">Tell Us About Your Need </p> 
            </div>
    
            <div >
                <form action="<?php echo URLROOT; ?>/Users/login" method="POST">
                    <label class="abc"> Request ID: </label><br>
                    <input type="text" id="id" name="id" placeholder="Request ID"  >
                    <!-- <span class="invalid"><?php echo $data['email_err']; ?></span> -->
                    <label class="abc"> Area You Need To Travel: </label><br>
                    <input type="area" id="area" name="area" placeholder="area"  >
                    <label class="abc"> Date From: </label><br>
                    <input type="date" id="date" name="date" placeholder="date From" >
                    <!-- <p><a href="<?php echo URLROOT; ?>/Users/passwordverify" style="margin-bottom: 15px; display: block; text-align: center;">Forgot Password?</a></p> -->
                    <!-- <span class="invalid"><?php echo $data['password_err']; ?></span><br> -->
                    <label class="abc"> Date To: </label><br>
                    <input type="date" id="date" name="date" placeholder="date to" >
                    <label class="abc"> time from: </label><br>
                    <input type="time" id="time" name="time" placeholder="time From" >
                    <label class="abc"> time To: </label><br>
                    <input type="time" id="time" name="time" placeholder="time to" >
                    <label class="abc"> Language preferred: </label><br>
                    <input type="language" id="language" name="language" placeholder="Language prefrred" >
                    <label class="abc"> Additional Information: </label><br>
                    <input type="info" id="info" name="info" placeholder=" " >
                    <input type="hidden" id="usertype" name="usertype" value="Traveler">
                    <button id="sign-up-btn-1" type="submit">Login</button>
                

                </form> 
                <?php flash('reg_flash'); ?>
              
            </div>
        </div>
    </div>
    <?php require APPROOT.'/views/inc/components/footer.php'; ?>  
</div>   






    

