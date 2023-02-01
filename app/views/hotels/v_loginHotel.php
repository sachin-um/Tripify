<?php require APPROOT.'/views/inc/components/header.php'; ?>
<div class="wrapper">


    <?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>

    <div class="content">
        <br><br><br><br><br><br>
        <div class="left-side-bar">
            <img id="logo" src="<?php echo URLROOT; ?>/img/logo1-removebg-preview.png" alt="logo">
            <br>
            <h2>Login to join the biggest exclusive platform for travelers in Sri Lanka.</h2>
        </div>


        <div class="side-bar"> 
            <br><br>  
            <h2>Travel Sri Lanka the easy way!</h2>

            <form action="<?php echo URLROOT; ?>/Hotels/login" method="post">
                <br>
                <h2>Email</h2>
                <input type="text" class="login-info" id="email" name="email">  
                <span class="invalid"><?php echo $data['email_err']; ?></span>
                    <h2>Password</h2>
                    <input type="password" class="login-info" id="password" name="password">
                    <span class="invalid"><?php echo $data['password_err']; ?></span><br>
                    <button class="start-btn" type="submit"><h2>Log in</h2></button> 
                </form>
                <?php flash('reg_   flash'); ?>

                <br><br><br><br>
        </div>
    </div>
    <?php require APPROOT.'/views/inc/components/footer.php'; ?>  
</div>   






    









    