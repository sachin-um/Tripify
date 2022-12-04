<?php require APPROOT.'/views/inc/components/navbars/hotel_nav.php'; ?>
<?php require APPROOT.'/views/inc/components/header.php'; ?>

<div class="header-space">

</div>
<br>

<div class="amenities-page">
    <br>
    <div class="thrd-info">
        <br>
        <h2>Tell us about your amenities!</h2>
        <br>

        <div class="flex-2">
            <div class="h-address">
                <input type="checkbox" id="AC" name="AC">
                <label for="AC"><b>Air Conditioning</b></label><br>
            </div>
            
            <div class="h-address">
                <input type="checkbox" id="pool" name="pool">
                <label for="pool"><b>Swimming Pool</b></label><br>
            </div>

            <div class="h-address">
                <input type="checkbox" id="wifi" name="wifi">
                <label for="wifi"><b>Free WiFi</b></label><br>
            </div>

            <div class="h-address">
                <input type="checkbox" id="parking" name="parking">
                <label for="parking"><b>Parking</b></label><br>
            </div>
            
        </div>
        <br>
        <br>
        <div class="flex-2">
            <div class="h-address">
                <input type="checkbox" id="breakfast" name="breakfast">
                <label for="breakfast"><b>Breakfast</b></label><br>
            </div>
            
            <div class="h-address">
                <input type="checkbox" id="service" name="service">
                <label for="service"><b>Room Service</b></label><br>
            </div>

            <div class="h-address">
                <input type="checkbox" id="gym" name="gym">
                <label for="gym"><b>Gym Area</b></label><br>
            </div>

            <div class="h-address">
                <input type="checkbox" id="view" name="view">
                <label for="view"><b>View</b></label><br>
            </div>
            
        </div>
    </div>

    <br>
    <div class="btn-info">
        <button class="btn">Continue</button>
    </div>
</div>

<?php require APPROOT.'/views/inc/components/footer.php'; ?>