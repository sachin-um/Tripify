<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>
<?php require APPROOT.'/views/inc/components/header.php'; ?>

<div class="header-space">

</div>
<br>
<div class="white-space">
    <h2 class="title" >Find accomodation anywhere in Sri Lanka!</h2>
    <br>
</div>
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

<div class="btn-div" style="display:flex; flex-direction: row; justify-content: center; align-items: center">
    <button class="btn" type="button">Search</button>
</div>

<br>
<hr>
<br>
<div class="white-space">
    <h2 class="title" >Join our network today..</h2>
    <br>
</div>

<div class="btn-div" style="display:flex; flex-direction: row; justify-content: center; align-items: center">
    <button class="btn" type="button">Register Hotel</button>
</div>
<br>
<div class="white-space">
    <h2 class="title" >Discover popular destinations across Sri Lanka!</h2>
</div>

<div class="scroll-bar" style="display:flex; flex-direction: row; justify-content: center; align-items: center">
    <img id="logo" src="<?php echo URLROOT; ?>/img/211689_left_arrow_icon.png" alt="logo">
        
    <img id="logo" style="height: 100px;width:auto" src="<?php echo URLROOT; ?>/img/25.jpg" alt="logo">
    &nbsp;&nbsp;
    <img id="logo" style="height: 200px;width:auto" src="<?php echo URLROOT; ?>/img/new.jpg" alt="nine-arch">
    &nbsp;&nbsp;
    <img id="logo" style="height: 100px;width:auto" src="<?php echo URLROOT; ?>/img/sigiriya-459197_1920.jpg" alt="sigiriya">
    &nbsp;&nbsp;
    <img id="logo" src="<?php echo URLROOT; ?>/img/211607_right_arrow_icon.png" alt="sigiriya">
</div>

<?php require APPROOT.'/views/inc/components/footer.php'; ?>
