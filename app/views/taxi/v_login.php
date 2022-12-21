<?php require APPROOT.'/views/inc/components/header.php'; ?>
<div class="wrapper">


    <?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>
    <div class="content">
        <div class="taxi_login_cont">
            
            <div >
                <img id="taxi_login_img" src="<?php echo URLROOT; ?>/img/logo1-removebg-preview.png" alt="logo">
                <p id="taxi_v_login_p">Taxi Login</p> 
                <p id="taxi_v_login_p2">KEEP CLAM DRIVE SAFLEY</p>

            </div>

            <div class="taxi_login_div">
                <form class="taxi_login_form" action="<?php echo URLROOT; ?>/Taxies/login" method="POST">
                    <input type="email" id="email" name="email" placeholder="   Email"  value="<?php echo $data['email']; ?>">
                    <span class="invalid"><?php echo $data['email_err']; ?></span>
                    <input type="password" id="password" name="password" placeholder="   Password" value="<?php echo $data['password']; ?>">
                    <span class="invalid"><?php echo $data['password_err']; ?></span><br>
                    <button id="taxi_login_but" type="submit">Login</button>
                

                </form> 
                <?php flash('reg_flash'); ?>
            
            </div>
        
        </div>
    </div>
    
    <?php require APPROOT.'/views/inc/components/footer.php'; ?>  
</div>   






    

