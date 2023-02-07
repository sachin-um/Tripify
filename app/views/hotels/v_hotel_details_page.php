<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>
<br>
<div class="wrapper"> 
    <div class="content">
        
        <p class="home-title-2" >Hotel Galadari, Colombo</p>
        <hr>
        <div class="hotel-desc-page-div">
            <div class="hotel-disk-1">
                <label>Amenity1</label><br>
                <label>Amenity2</label><br>
                <label>Amenity3</label><br>
                <label>Amenity4</label><br>
                <label>Amenity4</label><br>
            </div>

            <div class="hotel-disk-1">
                <label>Amenity1</label><br>
                <label>Amenity2</label><br>
                <label>Amenity3</label><br>
                <label>Amenity4</label><br>
                <label>Amenity5</label>
            </div>            

            <div class="hotel-disc-1">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.0289869750545!2d79.84089513600121!3d6.931715604596578!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae259251b57a431%3A0x8f44e226d6d20a7e!2sGaladari%20Hotel!5e0!3m2!1sen!2slk!4v1675719620750!5m2!1sen!2slk" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

        <p class="home-title-2" >Overview</p>
        <hr>
        <div class="hotel-home-top-picks">

            <p class="home-title-2" >Our Rooms</p><br>
            <div class="nav-main">
                <div class="hotel-ad-card" onclick="location.href='<?php echo URLROOT?>/Hotels/showRoomDetails'">
                    <div class="hotel-room-card-pic">
                        <img src="<?php echo URLROOT; ?>/img/Galadari3.jpg" alt="nine-arch">
                    </div>                    

                    <div class="hotel-ad-card-desc">
                       <label id="room-type" for="hotel-name"><b>Queen Suite</b></label> <br>
                       
                       <label id="display-hotel-address" for="hotel-address">Size in square feet</label><br>
                       <label id="display-hotel-address" for="hotel-address">No of beds</label><br>
                       <label id="room-price" for="hotel-address"><b>1,234USD Per Night</b></label><br>
                       <label id="room-remain" for="hotel-address">Only 1 room left</label>
                    </div>

                    
                    <button class="reserve-room" for="hotel-price"><b>Reserve Now</b></button>
                    
                </div>

                <div class="hotel-ad-card">
                    <div class="hotel-room-card-pic">
                        <img src="<?php echo URLROOT; ?>/img/Galadari3.jpg" alt="nine-arch">
                    </div>

                    <div class="hotel-ad-card-desc">
                       <label id="room-type" for="hotel-name"><b>Queen Suite</b></label> <br>
                       <label id="display-hotel-address" for="hotel-address">Size in square feet</label><br>
                       <label id="display-hotel-address" for="hotel-address">No of beds</label><br>
                       <label id="room-price" for="hotel-address"><b>1,234USD Per Night</b></label><br>
                       <label id="room-remain" for="hotel-address">Only 1 room left</label> 
                    </div>

                    
                    <button class="reserve-room" for="hotel-price"><b>Reserve Now</b></button>
                    
                </div>

                <div class="hotel-ad-card">
                    <div class="hotel-room-card-pic">
                        <img src="<?php echo URLROOT; ?>/img/Galadari4.jpg" alt="nine-arch">
                    </div>

                    <div class="hotel-ad-card-desc">
                        <label id="room-type" for="hotel-name"><b>Queen Suite</b></label> <br>
                       <label id="display-hotel-address" for="hotel-address">Size in square feet</label><br>
                       <label id="display-hotel-address" for="hotel-address">No of beds</label><br>
                       <label id="room-price" for="hotel-address"><b>1,234USD Per Night</b></label><br>
                       <label id="room-remain" for="hotel-address">Only 1 room left</label> 
                    </div>

                    
                    <button class="reserve-room" for="hotel-price"><b>Reserve Now</b></button>
                    
                </div>
            </div>  
            
            
            <div class="nav-main">
                <div class="hotel-ad-card" onclick="location.href='<?php echo URLROOT?>/Hotels/showHotelDetails'">
                    <div class="hotel-room-card-pic">
                        <img src="<?php echo URLROOT; ?>/img/Galadari3.jpg" alt="nine-arch">
                    </div>                    

                    <div class="hotel-ad-card-desc">
                       <label id="room-type" for="hotel-name"><b>Queen Suite</b></label> <br>
                       <label id="display-hotel-address" for="hotel-address">Size in square feet</label><br>
                       <label id="display-hotel-address" for="hotel-address">No of beds</label><br>
                       <label id="room-price" for="hotel-address"><b>1,234USD Per Night</b></label><br>
                       <label id="room-remain" for="hotel-address">Only 1 room left</label>
                    </div>

                    
                    <button class="reserve-room" for="hotel-price"><b>Reserve Now</b></button>
                    
                </div>

                <div class="hotel-ad-card">
                    <div class="hotel-room-card-pic">
                        <img src="<?php echo URLROOT; ?>/img/Galadari3.jpg" alt="nine-arch">
                    </div>

                    <div class="hotel-ad-card-desc">
                        <label id="room-type" for="hotel-name"><b>Queen Suite</b></label> <br>
                       <label id="display-hotel-address" for="hotel-address">Size in square feet</label><br>
                       <label id="display-hotel-address" for="hotel-address">No of beds</label><br>
                       <label id="room-price" for="hotel-address"><b>1,234USD Per Night</b></label><br>
                       <label id="room-remain" for="hotel-address">Only 1 room left</label> 
                    </div>

                    <button class="reserve-room" for="hotel-price"><b>Reserve Now</b></button>
                
                </div>

                <div class="hotel-ad-card">
                    <div class="hotel-room-card-pic">
                        <img src="<?php echo URLROOT; ?>/img/Galadari4.jpg" alt="nine-arch">
                    </div>

                    <div class="hotel-ad-card-desc">
                       <label id="room-type" for="hotel-name"><b>Queen Suite</b></label> <br>
                       <label id="display-hotel-address" for="hotel-address">Size in square feet</label><br>
                       <label id="display-hotel-address" for="hotel-address">No of beds</label><br>
                       <label id="room-price" for="hotel-address"><b>1,234USD Per Night</b></label><br>
                       <label id="room-remain" for="hotel-address">Only 1 room left</label> 
                    </div>

                    
                    <button class="reserve-room" for="hotel-price"><b>Reserve Now</b></button>
                    
                </div>
            </div>
        
    </div>

</div>

<?php require APPROOT.'/views/inc/components/footer.php'; ?>
