<?php require APPROOT.'/views/inc/components/header.php'; ?>
<div class="wrapper">


    <?php require APPROOT.'/views/inc/components/navbars/nav_bar.php'; ?>

    <div class="content">
    <div class="white-space">
        <h2 class="title" >Find a Guide for your Trip!</h2>
        <br>
    </div>
    <br>
    <br>
    <div class="search-form">
        <div class="first-fill">
            <input type="text" class="search" id="place" name="place" placeholder="Where your want to travel">
        </div>    
    </div>
    <br>
    <div class="btn-div">
        <button class="btn" type="button">Search</button>
    </div>
    </div>
    <br>
    <hr>
    <div class="white-space">
        <h2 class="title" >Didn't find what you looking for ? Don't Worry you can still get what you want</h2>
    </div>
    <div class="btn-div">
        <button class="reg-btn" type="button">Request a Guide</button>
    </div>
    <br>
    <hr>
    <div class="white-space">
        <h2 class="title" >Join our network today..</h2>
    </div>
    <div class="btn-div">
        <button class="reg-btn" type="button" onclick="window.location='<?php echo URLROOT; ?>/Guides/register'">Register as a Guide</button>
    </div>
    <?php require APPROOT.'/views/inc/components/footer.php'; ?>  
</div>   