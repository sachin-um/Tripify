<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>
<div class="wrapper">
    <div class="content">
    <div class="white-space">
        <h2 class="title" >Rent any vehicle for your trip!</h2>
        <br>
    </div>
    <br>
    <br>
    <div class="search-form">
        <div class="first-fill">
            <input type="text" class="search" id="place" name="place" placeholder="Pick up location">
        </div>    
    
        <div class="scnd-fill">
            <select class="search" id="vehicle-type" name="vehicle-type">
            <option value="" disabled selected hidden>Vehicle Type</option>
                <option value="car">Car</option>
                <option value="van">Van</option>
                <option value="fiat">Fiat</option>
                <option value="audi">Audi</option>
            </select>
        </div>
    
        <div class="thrd-fill">
            <input type="text" class="search" id="destination" name="destination" placeholder="Destination">
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
        <button class="reg-btn" type="button" onclick="window.location='<?php echo URLROOT; ?>/Request/addTaxiRequest'">Request a Ride</button>
    </div>
    <br>
    <hr>
    <div class="white-space">
        <h2 class="title" >Join our network today..</h2>
    </div>
    <div class="btn-div">
        <button class="reg-btn" type="button" onclick="window.location='<?php echo URLROOT; ?>/Taxies/register'">Register a Taxi Owner</button>
    </div>
    <?php require APPROOT.'/views/inc/components/footer.php'; ?>  
</div>   
