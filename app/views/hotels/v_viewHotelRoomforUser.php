<?php
$_SESSION['user_id'];
$_SESSION['user_type'];


if (empty($_SESSION['user_id'])) {
    flash('reg_flash', 'You need to have logged in first...');
    redirect('Users/login');
}
else {
    ?> 
<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>

<div class="wrapper">
    <div class="img-container">
        <p class="home-title-2"><?php 
        echo $data['wantedRoom']->RoomTypeName." ";?>Room</p><br>

        <!-- <div class="hotel-profile-account-details">

            <div class="hotel-profile-1">
                <div class="hotel-profile-accdet">

                    RoomID 
                    <div class="sub-description">
                        <div class="sub-sub">
                            <h3>Room ID : </h3>
                        </div>
                        
                        <div class="sub-sub">
                            <h4><?php echo $data['wantedRoom']->RoomTypeID;  ?></h4>
                            <input type="hidden" name="id" id="id" placeholder="<?php echo $data['wantedRoom']->RoomTypeID;?>" value="<?php echo $data['wantedRoom']->RoomTypeID; ?>">
                        </div>
                                                
                    </div>

                    type of beds
                    <div class="sub-description">
                        <div class="sub-sub">
                            <h3>Type of Beds : </h3>
                        </div>
                        
                        <div class="sub-sub">
                            <h4><?php 
                            foreach($data['beds'] as $bed):
                                echo $bed->bedType."\t\t";
                                echo $bed->noofbeds."<br>";
                            endforeach;
                            ?></h4>
                        </div>

                        <!-- make edit beddings  -->

                        <!-- <div class="sub-sub-edit">
                            <input type="text" name="line1" id="line1" placeholder="<?php echo $data['hoteldetails']->Line1; ?>" value="<?php echo $data['hoteldetails']->Line1; ?>">
                            <input type="text" name="line2" id="line2" placeholder="<?php echo $data['hoteldetails']->Line2; ?>" value="<?php echo $data['hoteldetails']->Line2; ?>">
                            <input type="text" name="district" id="district" placeholder="<?php echo $data['hoteldetails']->District; ?>" value="<?php echo $data['hoteldetails']->District; ?>">
                        </div>                             
                    </div>

                    price per night
                    <div class="sub-description">
                        <div class="sub-sub">
                            <h3>Price per Night : </h3>
                        </div>
                        
                        <div class="info">
                            <h4><?php echo $data['wantedRoom']->PricePerNight;  ?></h4>
                        </div> 
                        
                        <div class="sub-sub-edit">
                            <input type="text" name="price" id="price" placeholder="<?php echo $data['wantedRoom']->PricePerNight; ?>" value="<?php echo $data['wantedRoom']->PricePerNight; ?>">
                        </div>
                    </div>

                </div>

                <div class="hotel-profile-accdet">

                    Room Size
                    <div class="sub-description">
                        <div class="sub-sub">
                            <h3>Room Size : </h3>
                        </div>
                        
                        <div class="info">
                            <h4><?php echo $data['wantedRoom']->RoomSize." ";?>Square Meters</h4>
                        </div>

                        <div class="sub-sub-edit">
                            <input type="text" name="size" id="size" placeholder="<?php echo $data['wantedRoom']->RoomSize; ?>" value="<?php echo $data['wantedRoom']->RoomSize;?>">
                        </div>                            
                    </div>

                    no of guests
                    <div class="sub-description">
                        <div class="sub-sub">
                            <h3>No of guests : </h3>
                        </div>
                        
                        <div class="info">
                            <h4><?php echo $data['wantedRoom']->NoofGuests;  ?></h4>
                        </div>

                        <div class="sub-sub-edit">
                            <input type="text" name="guests" id="guests" placeholder="<?php echo $data['wantedRoom']->NoofGuests; ?>" value="<?php echo $data['wantedRoom']->NoofGuests; ?>">
                        </div>                            
                    </div>

                    no of rooms
                    <div class="sub-description">
                        <div class="sub-sub">
                            <h3>No of rooms of <br>this type : </h3>
                        </div>
                        
                        <div class="info">
                            <h4><?php echo $data['wantedRoom']->no_of_rooms;?></h4>

                        </div>

                        <div class="sub-sub-edit">
                            <input type="text" name="noofrooms" id="noofrooms" placeholder="<?php echo $data['wantedRoom']->no_of_rooms; ?>" value="<?php echo $data['wantedRoom']->no_of_rooms; ?>"> 
                        </div>                            
                    </div>
                    
                </div>   
                            
                
            </div> 
        
        </div> -->

        <div class="nav-grid-2">
            <?php
            if(!empty($data['images'])){
            foreach($data['images'] as $imgName):
                // echo gettype($imgName)."<br>" ;
                // print_r($imgName);
            ?>
            <img class="room-images" src="<?php echo URLROOT?>/public/img/hotel-room-uploads/<?php echo $imgName->imgName; ?>" >


            <?php
            
        
            endforeach;
            }
            ?>
        </div>      
    </div> 

    <div class="popup-img">
        <!-- <br><br><br><br><br><br><br><br> -->
        <span>&times;</span>
        <?php
            // if(!empty($data['images'])){
            // foreach($data['images'] as $imgName):

            $imga= $data['images'];
            $imgb = $imga[0];
            ?>
            <img class="room-images" src="<?php echo URLROOT?>/public/img/hotel-room-uploads/<?php echo $imgb->imgName; ?>" >
            <!-- <?php               
        
            // endforeach;
            // }
        ?> -->
    </div>
    
    
    

</div>

<?php
}
?>

<script>
    document.querySelector('.img-container img').foreach(image =>{
        image.onclick = () =>{
            document.querySelector('.popup-img').style.display = 'block';
            document.querySelector('.popup-img img').src = image.getAttribute('src');
        }
    });

    document.querySelector('.popup-img span').onclick = () =>{
        document.querySelector('.popup-img').style.display = 'none';
    }
</script>
