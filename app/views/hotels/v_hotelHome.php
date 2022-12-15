<?php require APPROOT.'/views/inc/components/navbars/nav_bar.php'; ?>
<?php require APPROOT.'/views/inc/components/header.php'; ?>

<div class="header-space">

</div>
<br>
<div class="white-space">
    <h2 class="title" >Find accomodation anywhere in Sri Lanka!</h2>
    <br>
</div>

<form class="form-div" action="" method="post">   
    
        <div class="flex-2">
                <div class="h-address">
                    <h4>Where are you going?</h4>
                    <input type="text" class="info-2" id="place" name="place">
                </div>

                <div class="h-address">
                    <h4>Check-in</h4>
                    <input type="text" class="info-2" id="check-in" name="check-in">
                </div>
                
                <div class="h-address">
                    <h4>Check-out</h4>
                    <input type="text" class="info-2" id="check-out" name="check-out">
                </div>
                
        </div>
    </div>
</form>

<div class="btn-div" style="display:flex; flex-direction: row; justify-content: center; align-items: center">
    <button class="btn" type="button">Search</button>
</div>

<br>
<hr>
<br>
<div class="white-space">
    <h2 class="title" >Join our network today..</h2>
</div>

<br>
<br>

<div class="btn-div" style="display:flex; flex-direction: row; justify-content: center; align-items: center">
    <button class="btn" type="button" onclick="window.location='<?php echo URLROOT; ?>/Hotels/register'">Register Hotel</button>
</div>
<br>
<?php require APPROOT.'/views/inc/components/footer.php'; ?>
