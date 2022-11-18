<?php require APPROOT.'/views/inc/components/header.php'; ?>


 <div class="taxi_login_cont">
        <div class="taxi_login_img_div">
            <img src="Pics/logo1-removebg-preview 1.png" id="taxi_login_img">
    
    
        </div>
    
        <div class="taxi_login_div">
            <form action="" method="post" class="taxi_login_form">
                <input type="text" name="" id="taxi_login_user" placeholder="User Name" required ><br>
                <input type="password" name="" id="taxi_login_password" placeholder="Password" required>

            </form>

            <input type="button" id="taxi_login_but" value="Login">
            
        </div>

    </div>

    <?php require APPROOT.'/views/inc/components/footer.php'; ?>