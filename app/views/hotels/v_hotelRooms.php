<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>
<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/hotel-dashboard.php'; ?>


    <div class="profile">
        
    
        <div class="h-title">
            <br>
                <h3>Tell us about your first room. 
                After entering all the necessary info, you can fill in the details of your other rooms.</h3>
        </div>
            
        <br>

        <form class="form-div" action="<?php echo URLROOT; ?>/HotelRooms/addroom" method="post">
            <div class='parent'>
                <div class='child'>
                    <label>Room type :</label><br>
                    <select name="roomtype">  
                        <option>Deluxe</option>  
                        <option>Queen Suite</option>  
                        <option>King Suite</option>  
                        <option>Normal Single Room</option>  
                        <option>Normal Double Room</option>  
                    </select>
                </div>
                <div class='child'>
                    <label for="room-size">Room size :</label><br>
                    <input type="text" id="roomsize" name="roomsize"><br>
                </div>
            </div>

            <div class='parent'>
                <div class='child'>
                    <label for="fname">No of guests :</label><br>
                    <input type="text" id="fname" name="no-of-guests"><br>
                </div>
                <div class='child'>
                    <label for="fname">Price per night :</label><br>
                    <input type="text" id="pricepernight" name="pricepernight"><br>
                </div>
            </div>
            
            <div class='parent'>
            <div class='child'>
                    <label for="fname">No of beds :</label><br>
                    <input type="text" id="no-of-beds" name="no-of-beds"><br>
                </div>

                <div class='child'>
                    <label for="fname">No of rooms of this type :</label><br>
                    <input type="text" id="no-of-rooms" name="no-of-rooms"><br>
                </div>
                
            </div>
            <br><br>
            <button style="text-align: center;" class="rooms-btn" type="submit">Add</button>   
        </form>   
        <br><br><br>    
        <br><br>
            
        

        
    </div>

