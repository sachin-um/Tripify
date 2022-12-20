<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>

<div class="profile" style="margin-top: 300px;">
    <div class="h-title">
        <br>
        <h3 style="color: green;">The rooms you add to your hotel will appear here.</h3>
        <br>
    </div>

    <div class='parent'>
        <?php
            $rooms=$data['allrooms'];
            foreach($rooms as $room):
        ?>
        <div class='child' style="background-color: lightgrey; height: 370px;">
            <h2>Deluxe Room</h2>
            <!-- <img id="hotel-room" style="width: 75px;" src="<?php echo URLROOT; ?>/img/10910023.png" alt="hotel-room">
            <br> -->

            <div class="label-one">
                <div class="label-two">
                    <label for="r-size"><b>Room ID:</b></label><br>
                </div>

                <div class="label-three">
                    <label for="r-size-1"><?php echo $room->RoomID; ?></label><br>
                </div>
            </div>

            <div class="label-one">
                <div class="label-two">
                    <label for="r-size"><b>RoomType :</b></label><br>
                </div>

                <div class="label-three">
                    <label for="r-size-1"><?php echo $room->RoomType; ?></label><br>
                </div>
            </div>

            <div class="label-one">
                <div class="label-two">
                    <label for="r-size"><b>RoomSize :</b></label><br>
                </div>

                <div class="label-three">
                    <label for="r-size-1"><?php echo $room->RoomSize; ?></label><br>
                </div>
            </div>

            <div class="label-one">
                <div class="label-two">
                    <label for="r-size"><b>Price per night(Rs) :</b></label><br>
                </div>

                <div class="label-three">
                    <label for="r-size-1"><?php echo $room->PricePerNight; ?></label><br>
                </div>
            </div>

            <div class="label-one">
                <div class="label-two">
                    <label for="r-size"><b>NoofGuests :</b></label><br>
                </div>

                <div class="label-three">
                    <label for="r-size-1"><?php echo $room->NoofGuests; ?></label><br>
                </div>
            </div>

            <div class="label-one">
                <div class="label-two">
                    <label for="r-size"><b>No of beds :</b></label><br>
                </div>

                <div class="label-three">
                    <label for="r-size-1"><?php echo $room->NoofBeds; ?></label><br>
                </div>
            </div>

            <button class="dash-btn">Edit Info</button>
        </div>
        <?php
            endforeach;
        ?>        
        <br><br>
        <button class="dash-btn" style="width: 30%;" onclick="window.location='<?php echo URLROOT; ?>/HotelRooms/addroom'">Add Room</button>        
    </div>

        

    

        <!-- <div class='right-box'>
                <img src="jeans3.jpg" alt="Denim Jeans" style="width:100%"> 
                <h1>Tailored Jeans</h1>
                <p class="price">$19.99</p>
                <p>Some text about the jeans..</p>
                <p><button>Edit Details</button></p>
        </div> -->
     
</div>