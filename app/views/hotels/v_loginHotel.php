<?php require APPROOT.'/views/inc/components/header.php'; ?>
<div class="wrapper">


    <?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>

    <div class="content">
        <div class="left-side-bar">
            <img id="logo" src="<?php echo URLROOT; ?>/img/logo1-removebg-preview.png" alt="logo">
        </div>

        <div class="vertical">
            
        </div>

        <div class="side-bar">   
            <h2>Travel Sri Lanka the easy way!</h2>
            <h4>Login to join the biggest exclusive platform for travelers in Sri Lanka.</h4>

            <form action="login.php" method="post">
                <h4>Email</h4>
                <input type="text" class="login-info" id="email" name="email">  
                    <h4>Password</h4>
                    <input type="password" class="login-info" id="password" name="password">
                    <button class="start-btn" type="submit">Log in</button>
                    <br><br>
                    <a href="signup.html"><button class="start-btn" type="submit">Sign up</button></a>     
            </form>
                
                <br><br><br><br>
        </div>
    </div>
    <?php require APPROOT.'/views/inc/components/footer.php'; ?>  
</div>   






    









    