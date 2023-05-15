<?php
$_SESSION['user_id'];
$_SESSION['user_type'];


if (empty($_SESSION['user_id'])) {
    flash('reg_flash', 'You need to have logged in first...');
    redirect('Users/login');
}
elseif ($_SESSION['user_type']!='Hotel') {
    flash('reg_flash', 'Access Denied');
    redirect('Pages/home');
}
else {
    ?> 
<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>

<aside class="sidebar">
    <div class="menu-toggle">
        <div class="hamburger">
            <span></span>
        </div>
    </div>

    <nav class="menu">
        <a href="<?php echo URLROOT; ?>/Hotels/load" class="menu-item">Account</a>
        <a href="<?php echo URLROOT; ?>/HotelRooms/rooms" class="menu-item is-active">Rooms</a>
        <a href="<?php echo URLROOT; ?>/Hotels/loadBooking" class="menu-item">Bookings</a>
        <a href="<?php echo URLROOT; ?>/Hotels/loadMessages" class="menu-item">Payments</a>
        <a href="<?php echo URLROOT; ?>/Hotels/loadReviews" class="menu-item">Reviews</a>
        <a href="<?php echo URLROOT; ?>/Hotels/hotelSupport" class="menu-item">Support</a>
    </nav>
</aside>

<main class="right-side-content">
    <br>
    <p class="home-title-2"><?php 
    echo $data['wantedRoom']->RoomTypeName." ";?>Room</p>
    
    
    <div class="hotel-profile-account-details">
        <form action="<?php echo URLROOT; ?>/HotelRooms/editHotelRoomDetails/<?php echo $data['wantedRoom']->RoomTypeID ?>" method="POST" enctype="multipart/form-data">

            <div class="hotel-profile-1">
                <div class="hotel-profile-accdet">

                    <!-- RoomID -->
                    <div class="sub-description">
                        <div class="sub-sub">
                            <h3>Room ID : </h3>
                        </div>
                        
                        <div class="sub-sub">
                            <h4><?php echo $data['wantedRoom']->RoomTypeID;  ?></h4>
                            <input type="hidden" name="id" id="id" placeholder="<?php echo $data['wantedRoom']->RoomTypeID;?>" value="<?php echo $data['wantedRoom']->RoomTypeID; ?>">
                        </div>
                                                
                    </div>

                    <!-- type of beds -->
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
                        </div>                             -->
                    </div>

                    <!-- price per night -->
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

                    <!-- Room Size -->
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

                    <!-- no of guests -->
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

                    <!-- no of rooms -->
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
            
            <div style="display: flex; justify-content: center; padding: 20px">
                <button style="margin-right: 10px" class="profile-btn-edit" id="edit-room-btn">Edit Info</button>
                
                <!-- class="all-purpose-btn" id="account-details-edit" -->
                <button style="margin-right: 10px" class="profile-btn-cancel" id="cancel-room-btn">
                    Discard
                </button>
                <button style="margin-right: 10px" class="profile-btn-save" id="save-room-btn" type="submit">
                    Save Changes
                </button>      
            </div> 

            <div style="margin: auto; text-align: center;">
            <button class="all-purpose-btn" id="delete-room-btn"
            onclick="window.location='<?php echo URLROOT?>/HotelRooms/deleteRoom/<?php echo $data['wantedRoom']->RoomTypeID?>'">Delete this Room</button>
            </div>
            
        </form>
        <!-- <button class="profile-btn" onclick="<?php echo URLROOT?>/Hotels/editProfileDetails">Edit Property Details</button> -->
        
    </div>

    <br><br>
    <div style="width: 80%; margin: auto; text-align: center;">
        <p class="home-title-2">Upload Images</p>
        <form method="post" action="<?php echo URLROOT ?>/Hotels/uploadRoomPhotos/<?php echo $data['wantedRoom']->RoomTypeID?>" enctype="multipart/form-data">                
            <input id="upload-photo" type="file" name="image[]" multiple>
            <div style="display: flex; justify-content: center;">
                <button class="all-purpose-btn" type="submit" name="submit">Upload</button>
            </div>
        </form>
    </div>
    

    <div class="nav-grid-1">
        <?php
        if(!empty($data['images'])){
        foreach($data['images'] as $imgName):
            // echo gettype($imgName)."<br>" ;
            // print_r($imgName);
        ?>
        <img class="hotel-images" src="<?php echo URLROOT?>/public/img/hotel-room-uploads/<?php echo $imgName->imgName; ?>" >


        <?php
        
    
        endforeach;
        }
        ?>
    </div><br><br>

</main>

<?php
}
?>

<script>
    var editbtn=document.getElementById("edit-room-btn");
    var cancelbtn=document.getElementById("cancel-room-btn");
    var savebtn=document.getElementById("save-room-btn");

    var info = document.getElementsByClassName("info");
    var infoEdit = document.getElementsByClassName("sub-sub-edit");

    function toggeleEdit() {
        // editbtn.onclick=function() {window.location.reload();}; 
        Array.from(info).forEach(function(element) {
            if (element.style.display === "none") {
                element.style.display = "block";
            } else {
                element.style.display = "none";
            }
        });
        
        
        Array.from(infoEdit).forEach(function(element) {
            element.style.display = "block";
        });
        editbtn.style.display="none";
        cancelbtn.style.display="block";
        savebtn.style.display="block";
        event.preventDefault();
    }

    function toggeleReload() {
        window.location.reload();; 
        event.preventDefault();
    }

    editbtn.addEventListener('click', toggeleEdit);
    cancelbtn.addEventListener('click', toggeleReload);
    
</script>