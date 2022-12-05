<?php require APPROOT.'/views/inc/components/navbars/nav_bar.php'; ?>
<?php require APPROOT.'/views/inc/components/header.php'; ?>

<div class="header-space">

</div>
<br>
<div class="white-space">
    <h2 class="title" >Find accomodation anywhere in Sri Lanka!</h2>
    <br>
</div>
<br>
<br>
<div class="search-form" style="display:flex; flex-direction: row; justify-content: center; align-items: center">
    <div class="first-fill">
        <input type="text" class="search" id="place" name="place" placeholder="Where are you going?">
    </div>    
    
    <div class="scnd-fill">
        <input type="text" class="search" id="check-in" name="check-in" placeholder="Check-in">
    </div>
    
    <div class="thrd-fill">
        <input type="text" class="search" id="check-out" name="check-out" placeholder="Check-out">
    </div>
</div>

<br>

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
    <button class="btn" type="button">Register Hotel</button>
</div>
<br>
<?php require APPROOT.'/views/inc/components/footer.php'; ?>
