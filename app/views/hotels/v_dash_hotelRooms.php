<?php
$_SESSION['user_id'];
$_SESSION['user_type'];


if (empty($_SESSION['user_id'])) {
    flash('reg_flash', 'You need to have logged in first...');
    redirect('Users/login');
}
elseif ($_SESSION['user_type']!='Hotel') {
    flash('reg_flash', 'Only the Hotel Owners can add Rooms');
    redirect('Pages/home');
}
else {
    ?> 
<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>
<?php require APPROOT.'/views/inc/components/sidebars/hotel_sidebar.php'; ?>

<script>
    function add(){
        let v1 = Number(document.getElementById("v1").value); 
        let v2 = Number(document.getElementById("v2").value); 
        let v3 = Number(document.getElementById("v3").value); 
        let v4 = Number(document.getElementById("v4").value); 
        let v5 = Number(document.getElementById("v5").value); 
        let sum = v1 + v2 + v3 + v4 + v5;
        document.getElementById("total-beds").value=sum;
    }

</script>

<main class="right-side-content">
   
    <br>
    <div class="hotel-profile-modified">        

        <form action="<?php echo URLROOT; ?>/HotelRooms/addroom" method="post">
            <div id="add-room-enclosed">
                
                <p class="home-title-2" style="margin-top: 10px;">Enter Room Details Here</p>
                <br>
                <div class="add-room-form">
                    <div class="add-room-part-1">
                        <p id="room-form-font">Room Name : </p>
                    </div>

                    <div class="add-room-part-2">
                        <input class="room-form-input" type="text" name="roomName">
                    </div>
                </div>

                <div class="add-room-form">
                    <div class="add-room-part-1">
                        <p id="room-form-font">Room Size (square meters) : </p>
                    </div>

                    <div class="add-room-part-2">
                    <input class="room-form-input" type="number" name="roomSize" value="10" min="10" max="1000">
                    </div>
                </div>

                <div class="add-room-form">
                    <div class="add-room-part-1">
                        <p id="room-form-font">No of People : </p>
                    </div>

                    <div class="add-room-part-2">
                    <input class="room-form-input" type="number" name="noofpeople" value="1" min="1" max="15">
                    </div>
                </div>

                <div class="add-room-form">
                    <div class="add-room-part-1">
                        <p id="room-form-font">Price per night (LKR) : </p>
                    </div>

                    <div class="add-room-part-2">
                    <input class="room-form-input" type="number" name="pricepernight" value="1000" min="1000">
                    </div>
                </div>

                <div class="add-room-form">
                    <div class="add-room-part-1">
                        <p id="room-form-font">No of rooms of this type : </p>
                    </div>

                    <div class="add-room-part-2">
                    <input class="room-form-input" type="number" name="noofrooms" value="1" min="1" max="100">
                    </div>
                </div>

                <p class="home-title-2" style="margin-top: 3%;">Bed Options</p>
                <br>
                <div class="add-room-form">
                    <div class="add-room-part-1">
                        <p id="room-form-font">Twin Bed (1 Adult) : </p>
                    </div>

                    <div class="add-room-part-2">
                    <input class="room-form-input" id="v1" type="number" name="bed1" value="0" onkeyup="add()">
                    </div>
                </div>

                <div class="add-room-form">
                    <div class="add-room-part-1">
                        <p id="room-form-font">Double Bed (2 Adults) : </p>
                    </div>

                    <div class="add-room-part-2">
                    <input class="room-form-input" id="v2" type="number" name="bed2" value="0" onkeyup="add()">
                    </div>
                </div>

                <div class="add-room-form">
                    <div class="add-room-part-1">
                        <p id="room-form-font">Queen Bed (2 Adults) : </p>
                    </div>

                    <div class="add-room-part-2">
                    <input class="room-form-input" id="v3" type="number" name="bed3" value="0" onkeyup="add()">
                    </div>
                </div>

                <div class="add-room-form">
                    <div class="add-room-part-1">
                        <p id="room-form-font">King Bed (2 Adults) : </p>
                    </div>

                    <div class="add-room-part-2">
                    <input class="room-form-input" id="v4" type="number" name="bed4" value="0" onkeyup="add()">
                    </div>
                </div>

                <div class="add-room-form">
                    <div class="add-room-part-1">
                        <p id="room-form-font">Bunk Bed (2 Adults) : </p>
                    </div>

                    <div class="add-room-part-2">
                    <input class="room-form-input" id="v5" type="number" name="bed5" value="0" onkeyup="add()">
                    </div>
                </div>

                <div class="add-room-form">
                    <div class="add-room-part-1">
                        <p id="room-form-font">Total : </p>
                    </div>

                    <div class="add-room-part-2">
                        <input class="room-form-input" id="total-beds" type="number" name="total-beds" readonly>
                    </div>
                </div>

                <br>
                <p class="home-title-2" style="margin-top: 3%;">Select All Facilities</p>

                <div class="part-all">
                    <div class="sub-part">

                        <div class="sub-description">
                            <div class="sub-sub" style="width: 25%;">
                                <input type="checkbox" style="transform: scale(0.6)" name="facilities[]" value="Hair Dryer">
                            </div>
                            
                            <div class="info" style="width: 75%;">
                                <p>Hair Dryer</p>
                            </div>                          
                        </div>

                        <div class="sub-description">
                            <div class="sub-sub" style="width: 25%;">
                                <input type="checkbox" style="transform: scale(0.6)" name="facilities[]" value="Mini Bar">
                            </div>
                            
                            <div class="info" style="width: 75%;">
                                <p>Mini Bar</p>
                            </div>                          
                        </div>

                        <div class="sub-description">
                            <div class="sub-sub" style="width: 25%;">
                                <input type="checkbox" style="transform: scale(0.6)" name="facilities[]" value="Television">
                            </div>
                            
                            <div class="info" style="width: 75%;">
                                <p>Television</p>
                            </div>                          
                        </div>

                        <div class="sub-description">
                            <div class="sub-sub" style="width: 25%;">
                                <input type="checkbox" style="transform: scale(0.6)" name="facilities[]" value="Coffeemaker">
                            </div>
                            
                            <div class="info" style="width: 75%;">
                                <p>Coffeemaker</p>
                            </div>                          
                        </div>

                    </div>

                    <div class="sub-part">

                        <div class="sub-description">
                            <div class="sub-sub" style="width: 25%;">
                                <input type="checkbox" style="transform: scale(0.6)" name="facilities[]" value="Refrigerator">
                            </div>
                            
                            <div class="info" style="width: 75%;">
                                <p>Refrigerator</p>
                            </div>                          
                        </div>

                        <div class="sub-description">
                            <div class="sub-sub" style="width: 25%;">
                                <input type="checkbox" style="transform: scale(0.6)" name="facilities[]" value="Kitchen">
                            </div>
                            
                            <div class="info" style="width: 75%;">
                                <p>Kitchen</p>
                            </div>                          
                        </div>

                        <div class="sub-description">
                            <div class="sub-sub" style="width: 25%;">
                                <input type="checkbox" style="transform: scale(0.6)" name="facilities[]" value="Towels">
                            </div>
                            
                            <div class="info" style="width: 75%;">
                                <p>Towels</p>
                            </div>                          
                        </div>                        
                    </div>


                    <!-- Third set -->
                    <div class="sub-part">

                        <div class="sub-description">
                            <div class="sub-sub" style="width: 25%;">
                                <input type="checkbox" style="transform: scale(0.6)" name="facilities[]" value="Toiletries">
                            </div>
                            
                            <div class="info" style="width: 75%;">
                                <p>Toiletries</p>
                            </div>                          
                        </div>

                        <div class="sub-description">
                            <div class="sub-sub" style="width: 25%;">
                                <input type="checkbox" style="transform: scale(0.6)" name="facilities[]" value="Bathrobes">
                            </div>
                            
                            <div class="info" style="width: 75%;">
                                <p>Bathrobes</p>
                            </div>                          
                        </div>

                        <div class="sub-description">
                            <div class="sub-sub" style="width: 25%;">
                                <input type="checkbox" style="transform: scale(0.6)" name="facilities[]" value="Free Breakfast">
                            </div>
                            
                            <div class="info" style="width: 75%;">
                                <p>Free Breakfast</p>
                            </div>                          
                        </div>
                    </div>

                </div>

                <br>

                <!-- Uploading room photographs -->
                <button class="all-purpose-btn">Submit</button>
                &nbsp;<br>
            </div>           
    
        </form>


    </div>       
    &nbsp;<br>
    &nbsp;<br>
    
</div>


<?php
}
?>
