<?php require APPROOT.'/views/inc/components/header.php'; ?>


<div class="taxi_sign_cont">
        <div class="taxi_sign_left">
            <img src="Pics/logo1-removebg-preview 1.png" id="taxi_sign_img">
            <p>Sign Up is Fast and Easy</p>
    
    
        </div>
    
        <div class="taxi_sign_ryt">
            <form action="" method="post" class="taxi_sign_form">
                <input type="text" name="" id="taxi_sign_user" placeholder="Name" required><br>
                <input type="email" name="" id="taxi_sign_email" placeholder="Email" required><br>
                <input type="password" name="" id="taxi_sign_password" placeholder="Password" required><br>
                <input type="password" name="" id="taxi_sign_con_password" placeholder="Confirm Password" required><br>
                <input type="button" id="taxi_sign_but" value="Sign Up">

            </form>
            
            
        </div>

    </div>


    <?php require APPROOT.'/views/inc/components/footer.php'; ?>