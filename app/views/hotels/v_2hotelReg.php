<?php require APPROOT.'/views/inc/components/navbars/hotel_nav.php'; ?>
<?php require APPROOT.'/views/inc/components/header.php'; ?>

<div class="header-space">

</div>

<div class="hotel-page">
    <div class="main-flex">
        <div class="first-info">
            <br>
            <h4>What is the name of your property?</h4>
            <input type="text" class="info" id="name" name="name">

            <h4>Star Rating</h4>
            <input type="text" class="info" id="rating" name="rating">
        </div>

        <div class="scnd-info">
            <br>
            <h4>Contact name</h4>
            <input type="text" class="info" id="contact" name="contact">

            <h4>Phone number</h4>
            <input type="text" class="info" id="phone" name="phone">
        </div>
    </div>
    
    <br>
    <br>
    <div class="thrd-info">
        <br>
        <h2>Property Address</h2>
        <br>
        <div class="flex-2">
            <div class="h-address">
                <h4>Address Line 1</h4>
                <input type="text" class="info-2" id="line-1" name="line-1">
            </div>
            
            <div class="h-address">
                <h4>Address Line 2</h4>
                <input type="text" class="info-2" id="line-2" name="line-2">
            </div>
            
        </div>
        
        <div class="flex-2">
            <div class="h-address">
                <h4>Address Line 3</h4>
                <input type="text" class="info-2" id="line-3" name="line-3">
            </div>
            
            <div class="h-address">
                <h4>City</h4>
                <input type="text" class="info-2" id="city" name="city">
            </div>
            
        </div>
        
    </div>

    <br>
    <div class="btn-info">
        <button class="btn">Continue</button>
    </div>
    


</div>

<?php require APPROOT.'/views/inc/components/footer.php'; ?>