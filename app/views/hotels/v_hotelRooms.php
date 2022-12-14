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

        <form class="form-div" action="" method="post">
            <div class='parent'>
                <div class='child'>
                    <label for="fname">Room type :</label><br>
                    <input type="text" id="fname" name="fname"><br>
                </div>
                <div class='child'>
                    <label for="fname">Room size :</label><br>
                    <input type="text" id="fname" name="fname"><br>
                </div>
            </div>

            <div class='parent'>
                <div class='child'>
                    <label for="fname">No of rooms of this type :</label><br>
                    <input type="text" id="fname" name="fname"><br>
                </div>
                <div class='child'>
                    <label for="fname">Price per night :</label><br>
                    <input type="text" id="fname" name="fname"><br>
                </div>
            </div>
            <br>
            <h2 style="text-align: center;">Bed Options</h2>

            <div class='parent'>
                <div class='child'>
                    <label for="fname">Type of beds available :</label><br>
                    <input type="text" id="fname" name="fname"><br>
                </div>
                <div class='child'>
                    <label for="fname">No of beds :</label><br>
                    <input type="text" id="fname" name="fname"><br>
                </div>
            </div>
            <br><br>
            <button style="text-align: center;" class="rooms-btn" type="submit">Add</button>   
        </form>   
        <br><br><br>    
        <br><br>
            
        

        
    </div>

