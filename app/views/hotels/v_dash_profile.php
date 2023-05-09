<?php
$_SESSION['user_id'];
$_SESSION['user_type'];


if (empty($_SESSION['user_id'])) {
    flash('reg_flash', 'You need to have logged in first...');
    redirect('Users/login');
}
else{
    ?>
<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>
<div class="app">
    <aside class="sidebar">

        <div class="menu-toggle">
            <div class="hamburger">
                <span></span>
            </div>
        </div>

        <nav class="menu">
            <a href="<?php echo URLROOT; ?>/Hotels/load" class="menu-item is-active">Account</a>
            <a href="<?php echo URLROOT; ?>/HotelRooms/rooms" class="menu-item">Rooms</a>
            <a href="<?php echo URLROOT; ?>/Hotels/loadBooking" class="menu-item">Bookings</a>
            <a href="<?php echo URLROOT; ?>/Hotels/loadPayments" class="menu-item">Payments</a>
            <a href="<?php echo URLROOT; ?>/Hotels/loadReviews" class="menu-item">Reviews</a>
            <a href="<?php echo URLROOT; ?>/Hotels/hotelSupport" class="menu-item">Support</a>
        </nav>
    </aside>

    <main class="right-side-content">
        <br>
        <!-- <div class="hotel-profile-completing-notice">
            <br>
            <p><b>Thank you for registering your property with Tripify. 
            Please upload two or more photographs to complete your profile
            and get verified.</b>
            </p>
            <br><br>
        </div> -->

        <!-- Account details start here - Photo upload doesn't work -->
        <div class="hotel-profile-account-details">
            <p id="hotel-profile-title-1">Account Details</p>
            <form action="<?php echo URLROOT; ?>/Users/editHotelDetails/<?php echo $data['hotelaccountdetails']->UserID ?>" method="POST" enctype="multipart/form-data">
            <div style="display: flex; flex-direction: row;">
                <div class="profile-div-1" style="width: 50%; text-align: center;">
                    
                    <div class="drag-area">
                        <div class="icon">
                            <img id="profile-img-placehoder" src="<?php echo URLROOT; ?>/img/profileImgs/<?php echo  $data['hotelaccountdetails']->profileimg ?>" alt="picture">
                        </div>
                    </div>

                    <div class="sub-sub-edit" style="margin-left: 25%;">
                        <div class="img-description">Drag & Drop to upload File</div>
                        <div class="img-upload">
                            <input type="file" name="profile-imgupload" id="profile-imgupload" style="display:none;">Browse File
                        </div>
                        <div class="img-validation">
                            <img src="<?php echo URLROOT; ?>/img/tick.png" alt="tick" width="25px" height="20px">
                            <span style="vertical-align:top;" class="img-select">Select a Profile picture</span>
                        </div>    
                    </div>
                    
                </div>

                <div class="profile-div-2" style="width: 50%;text-align: left;">
                    
                    <br>
                    <div class="sub-description">
                        <div class="sub-sub">
                            <h3>Name : </h3>
                        </div>
                        
                        <div class="info">
                            <p><?php echo $data['hotelaccountdetails']->Name;  ?></p>
                        </div>

                        <div class="sub-sub-edit">
                            <input type="text" name="name" id="name" placeholder="<?php echo $data['hotelaccountdetails']->Name; ?>" value="<?php echo $data['hotelaccountdetails']->Name; ?>">
                        </div>                            
                    </div>


                    <br> 
                    <div class="sub-description">
                        <div class="sub-sub">
                            <h3>Email:</h3>
                        </div>
                    
                        <div class="sub-sub">
                            <p><?php echo $data['hotelaccountdetails']->Email;  ?></p>
                        </div>                    
                    </div>

                    <br> 
                    <div class="sub-description">
                        <div class="sub-sub">
                            <h3>Verification Status: </h3>
                        </div>
                            
                        <div class="sub-sub">
                            <?php if ($data['hotelaccountdetails']->verification_status ==1) {
                                ?><p>Verified</p><?php
                            }else {
                                ?><p>Not Verified </p><?php
                            } ?>
                        </div>                        
                    </div>
                    <br> 

                    <div class="sub-description">
                        <div class="sub-sub">
                            <h3>Contact Number: </h3>
                        </div>
                            
                        <div class="info">
                            <p><?php echo $data['hotelaccountdetails']->ContactNo ?></p>
                        </div>

                        <div class="sub-sub-edit">
                            <input type="text" name="contact-number" id="contact-number" placeholder="<?php echo $data['hotelaccountdetails']->ContactNo ?>" value="<?php echo $data['hotelaccountdetails']->ContactNo ?>">
                        </div>                            
                    </div>

                </div>
            </div>

            <?php 
            if ($data['hotelaccountdetails']->UserID== $_SESSION['user_id']) {
                ?>
                    <div style="display: flex; justify-content: center; padding: 20px">
                        <button style="margin-right: 10px" class="profile-btn-edit" id="edit-btn">Edit Info</button>
                        
                        <button style="margin-right: 10px" class="profile-btn-cancel" id="cancel-btn">
                            Discard
                        </button>
                        <button style="margin-right: 10px" class="profile-btn-save" id="save-btn" type="submit">
                            Save Changes
                        </button>      
                    </div>
                <?php
            }
            else {
                ?>
                    <div style="display: flex; justify-content: space-around;">
                        <button id="chatopenbtn" class="chat-btn" type="button" onclick="showChat()">Chat</button>    
                    </div>
                <?php
            }
            ?>        
            </form>       
        </div>       
        
        <br><br>
            
        <!-- Edit Hotel Details -->
        <div class="hotel-profile-account-details">
            <p id="hotel-profile-title-1">Property Details</p>
            <form action="<?php echo URLROOT; ?>/Users/editHotelProfileDetails/<?php echo $data['hoteldetails']->HotelID ?>" method="POST" enctype="multipart/form-data">

                <div class="hotel-profile-1">
                    <div class="hotel-profile-accdet">
                        <div class="sub-description">
                            <div class="sub-sub">
                                <h3>Hotel ID : </h3>
                            </div>
                            
                            <div class="sub-sub">
                                <p><?php echo $data['hoteldetails']->HotelID;  ?></p>
                            </div>
                                                    
                        </div>

                        <div class="sub-description">
                            <div class="sub-sub">
                                <h3>Address : </h3>
                            </div>
                            
                            <div class="info1">
                                <p><?php echo $data['hoteldetails']->Line1.",".$data['hoteldetails']->Line2.",".$data['hoteldetails']->District;  ?></p>
                            </div>

                            <div class="sub-sub-edit-1">
                                <input type="text" name="line1" id="line1" placeholder="<?php echo $data['hoteldetails']->Line1; ?>" value="<?php echo $data['hoteldetails']->Line1; ?>">
                                <input type="text" name="line2" id="line2" placeholder="<?php echo $data['hoteldetails']->Line2; ?>" value="<?php echo $data['hoteldetails']->Line2; ?>">
                                <input type="text" name="district" id="district" placeholder="<?php echo $data['hoteldetails']->District; ?>" value="<?php echo $data['hoteldetails']->District; ?>">
                            </div>                            
                        </div>

                        <div class="sub-description">
                            <div class="sub-sub">
                                <h3>Category : </h3>
                            </div>
                            
                            <div class="info1">
                                <p><?php echo $data['hoteldetails']->Category;  ?></p>
                            </div>

                            <div class="sub-sub-edit-1">
                                <select name="category" id="category" name="category" placeholder="<?php echo $data['hoteldetails']->Category; ?>" value="<?php echo $data['hoteldetails']->Category; ?>">
                                    <option value="Resort">Resort</option>
                                    <option value="Villa">Villa</option>
                                    <option value="Hostel">Hostel</option>
                                    <option value="Inn">Inn</option>
                                    <option value="Boutique">Boutique</option>
                                    <option value="Bread and Breakfast">Bread and Breakfast</option>
                                </select>
                                <!-- <input type="text" name="category" id="category" placeholder="<?php echo $data['hoteldetails']->Category; ?>" value="<?php echo $data['hoteldetails']->Category; ?>"> -->
                            </div>                            
                        </div>

                        <div class="sub-description">
                            <div class="sub-sub">
                                <h3>Check in : </h3>
                            </div>
                            
                            <div class="info1">
                                <p><?php echo $data['hoteldetails']->Check_in;  ?></p>
                            </div>

                            <div class="sub-sub-edit-1">
                                <select type="text" name="checkin" id="checkin" value="<?php echo $data['hoteldetails']->Check_in; ?>">
                                    <option value="2.00 PM" selected>02.00 PM</option>
                                    <option value="3.00 AM">03.00 PM</option>
                                    <option value="4.00 AM">04.00 PM</option>
                                </select>
                                <!-- <input  placeholder="<?php echo $data['hoteldetails']->Check_in; ?>" value="<?php echo $data['hoteldetails']->Check_in; ?>"> -->
                            </div>                            
                        </div>

                        <div class="sub-description">
                            <div class="sub-sub">
                                <h3>SLTDA Reg No : </h3>
                            </div>
                            
                            <div class="info1">
                                <p><?php echo $data['hoteldetails']->reg_number;  ?></p>
                            </div>

                            <div class="sub-sub-edit-1">
                                <input type="text" name="regNo" id="regNo" placeholder="<?php echo $data['hoteldetails']->reg_number; ?>" value="<?php echo $data['hoteldetails']->reg_number; ?>">
                            </div>                            
                        </div>

                    </div>

                    <div class="hotel-profile-accdet">

                        <div class="sub-description">
                            <div class="sub-sub">
                                <h3>Hotel Name : </h3>
                            </div>
                            
                            <div class="info1">
                                <p><?php echo $data['hoteldetails']->Name;  ?></p>
                            </div>

                            <div class="sub-sub-edit-1">
                                <input type="text" name="name" id="name" placeholder="<?php echo $data['hoteldetails']->Name; ?>" value="<?php echo $data['hoteldetails']->Name; ?>">
                            </div>                            
                        </div>

                        <div class="sub-description">
                            <div class="sub-sub">
                                <h3>Rating : </h3>
                            </div>
                            
                            <div class="info1">
                                <p><?php echo $data['hoteldetails']->Rating;  ?></p>
                            </div>

                            <div class="sub-sub-edit-1">
                                <input type="text" name="rating" id="rating" placeholder="<?php echo $data['hoteldetails']->Rating; ?>" value="<?php echo $data['hoteldetails']->Rating; ?>">
                            </div>                            
                        </div>

                        <div class="sub-description">
                            <div class="sub-sub">
                                <h3>Pets : </h3>
                            </div>
                            
                            <div class="info1">
                                <p><?php 
                                if($data['hoteldetails']->Pets==1){
                                    echo "Yes";
                                }else{
                                    echo "No";
                                };  
                                ?></p>
                            </div>

                            <div class="sub-sub-edit-1">
                                <select name="pets">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                <!-- <input type="text" name="pets" id="pets" placeholder="<?php echo $data['hoteldetails']->Pets; ?>" value="<?php echo $data['hoteldetails']->Pets; ?>"> -->
                            </div>                            
                        </div>

                        <div class="sub-description">
                            <div class="sub-sub">
                                <h3>Check out : </h3>
                            </div>
                            
                            <div class="info1">
                                <p><?php echo $data['hoteldetails']->Check_out;  ?></p>
                            </div>

                            <div class="sub-sub-edit-1">
                                <select type="text" name="checkout" id="checkout" type="text" value="<?php echo $data['hoteldetails']->Check_out; ?>">
                                    <option value="9.00 AM" selected>9.00 AM</option>
                                    <option value="10.00 AM">10.00 AM</option>
                                    <option value="11.00 AM">11.00 AM</option>
                                    <option value="12.00 PM">12.00 PM</option>
                                </select>
                                <!-- <input type="text" name="checkout" id="checkout" placeholder="<?php echo $data['hoteldetails']->Check_out; ?>" value="<?php echo $data['hoteldetails']->Check_out; ?>"> -->
                            </div>                            
                        </div>

                        <div class="sub-description">
                            <div class="sub-sub">
                                <h3>Contact Number : </h3>
                            </div>
                            
                            <div class="info1">
                                <p><?php echo $data['hoteldetails']->contact_number;  ?></p>
                            </div>

                            <div class="sub-sub-edit-1">
                                <input type="text" name="contact" id="contact" placeholder="<?php echo $data['hoteldetails']->contact_number; ?>" value="<?php echo $data['hoteldetails']->contact_number; ?>">

                                <!-- <input type="text" name="checkout" id="checkout" placeholder="<?php echo $data['hoteldetails']->Check_out; ?>" value="<?php echo $data['hoteldetails']->Check_out; ?>"> -->
                            </div>                            
                        </div>
                        
                    </div>   
                                
                    
                </div>
                <br>
                <div class="hotel-profile-1" id="extra-2">
                    <div class="sub-description" style="width: 100%;">
                            <div class="sub-sub" style="width: 25%;">
                                <h3>Description : </h3>
                            </div>
                            
                            <div class="info1" style="width: 75%; padding-right: 5%;">
                                <p><?php echo $data['hoteldetails']->Description;  ?></p>
                            </div>

                            <div class="sub-sub-edit-1">
                                <textarea type="text" rows="5" name="description" id="description" placeholder="<?php echo $data['hoteldetails']->Description; ?>" 
                                value="<?php echo $data['hoteldetails']->Description; ?>">
                                </textarea>
                            </div>                            
                        </div>
                </div>       
                
                <?php 
                if ($data['hotelaccountdetails']->UserID== $_SESSION['user_id']) {
                ?>

                <br>
                <div style="display: flex; justify-content: center; padding: 20px">
                    <button style="margin-right: 10px" class="profile-btn-edit" id="edit-hotel-btn">Edit Info</button>
                    <!-- class="all-purpose-btn" id="account-details-edit" -->
                    <button style="margin-right: 10px" class="profile-btn-cancel" id="cancel-hotel-btn">
                        Discard
                    </button>
                    <button style="margin-right: 10px" class="profile-btn-save" id="save-hotel-btn" type="submit">
                        Save Changes
                    </button>      
                </div>

                <?php
                }
                else {
                    ?>
                        <div style="display: flex; justify-content: space-around;">
                            <button id="chatopenbtn" class="chat-btn" type="button" onclick="showChat()">Chat</button>    
                        </div>
                    <?php
                }
                ?>  
            </form>
            <!-- <button class="profile-btn" onclick="<?php echo URLROOT?>/Hotels/editProfileDetails">Edit Property Details</button> -->
            <br>&nbsp;
        </div>

        <br><br>


        <!-- Edit hotel facilities -->
        <div class="hotel-profile-account-details">
            <p id="hotel-profile-title-1">Hotel Facilities</p>
            <br>

            
            <?php if (empty($data['hoteldetails']->Facilities)) { ?>
                <p style="text-align: center; font-size: 1.2rem;">No Facilities are Listed</p>
            <?php } 
            else { 
                    $farray = explode(",",$data['hoteldetails']->Facilities);
                    $indentation = str_repeat("\t", 3);
                    $i=0;?>
                    <div class="nav-grid">
                        <?php
                        foreach($farray as $element){
                            $i=$i+1;
                            ?>
                            <div style="text-align: center;"><?php echo $element."<br>";?></div>
                        
                        <?php                            
                        }
                        ?>
                    </div>
            <?php } ?>
            <br>

            <?php 
            if ($data['hotelaccountdetails']->UserID== $_SESSION['user_id']) {
            ?>
            <!-- button -->
            <div style="display: flex; justify-content: center; padding: 20px">
                <button class="all-purpose-btn" id="account-details-edit"
                onclick="location.href='<?php echo URLROOT?>/Hotels/addFacilities'">Edit
                </button>
            </div>

            <?php
            }
            else {
                ?>
                    <div style="display: flex; justify-content: space-around;">
                        <button id="chatopenbtn" class="chat-btn" type="button" onclick="showChat()">Chat</button>    
                    </div>
                <?php
            }
            ?>  
            
            <br>
        </div><br><br>

        <!-- Upload photos -->
        <div class="hotel-profile-account-details">
            <p id="hotel-profile-title-1">Property Images</p>
            <?php 
            if ($data['hotelaccountdetails']->UserID== $_SESSION['user_id']) {
            ?>
            
                <form method="post" action="<?php echo URLROOT ?>/Hotels/uploadPhotos/<?php echo $data['hoteldetails']->HotelID?>" enctype="multipart/form-data">                
                    <input type="file" name="image[]" multiple>
                    <div style="display: flex; justify-content: center;">
                        <button class="all-purpose-btn" type="submit" name="submit">Upload</button>
                    </div>
                </form>
            <br><br>

            <div class="nav-grid-1">
                <?php
                if(!empty($data['images'])){
                foreach($data['images'] as $imgName):
                    // echo gettype($imgName)."<br>" ;
                    // print_r($imgName);
                ?>
                <img class="hotel-images" src="<?php echo URLROOT?>/public/img/hotel-uploads/<?php echo $imgName->imgName; ?>" >


                <?php
                
            
                endforeach;
                }
                ?>
            </div>

            <?php
            }
            else {
            ?>

            <div class="nav-grid-1">
                <?php
                if(!empty($data['images'])){
                foreach($data['images'] as $imgName):
                    // echo gettype($imgName)."<br>" ;
                    // print_r($imgName);
                ?>
                <img class="hotel-images" src="<?php echo URLROOT?>/public/img/hotel-uploads/<?php echo $imgName->imgName; ?>" >


                <?php
                
            
                endforeach;
                }
                ?>
            </div>
            <?php
            }
            ?>
            <!-- <button class="all-purpose-btn" id="account-details-edit"
                onclick="location.href='<?php echo URLROOT?>/Hotels/addFacilities'">Edit>Refresh</button> -->

            <!-- <img src="C:/xampp/htdocs/Tripify/public/img/hotel-uploads/echo $fetch['imgName'];" width="100px" height="100px"> -->
   
        </div><br><br>

        </div>

        <div id="popup" class="trip-popup">
                        <div id="popup-content" class="profile-popup-content"></div>
        </div>
        <script type="text/JavaScript" src="<?php echo URLROOT;?>/js/components/showprofile.js"></script>
        <!-- <?php require APPROOT.'/views/inc/components/footer.php'; ?> -->




    </main>
</div>

<?php
}
?>


<script type="text/JavaScript" src="<?php echo URLROOT;?>/js/components/imageUpload/imageUpload.js"></script>
<script type="text/JavaScript" src="<?php echo URLROOT;?>/js/components/popups.js"></script>

<script>
    var editbtn=document.getElementById("edit-btn");
    var cancelbtn=document.getElementById("cancel-btn");
    var savebtn=document.getElementById("save-btn");

    var edithotelbtn=document.getElementById("edit-hotel-btn");
    var cancelhotelbtn=document.getElementById("cancel-hotel-btn");
    var savehotelbtn=document.getElementById("save-hotel-btn");

    var info = document.getElementsByClassName("info");
    var infoEdit = document.getElementsByClassName("sub-sub-edit");

    var info1 = document.getElementsByClassName("info1");
    var infoEdit1 = document.getElementsByClassName("sub-sub-edit-1");

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

    function toggeleEditHotel() {
        // editbtn.onclick=function() {window.location.reload();}; 
        Array.from(info1).forEach(function(element) {
            if (element.style.display === "none") {
                element.style.display = "block";
            } else {
                element.style.display = "none";
            }
        });
        
        
        Array.from(infoEdit1).forEach(function(element) {
            element.style.display = "block";
        });
        edithotelbtn.style.display="none";
        cancelhotelbtn.style.display="block";
        savehotelbtn.style.display="block";
        event.preventDefault();
    }

    function toggeleReload() {
        window.location.reload();; 
        event.preventDefault();
    }

    editbtn.addEventListener('click', toggeleEdit);
    cancelbtn.addEventListener('click', toggeleReload);
    edithotelbtn.addEventListener('click', toggeleEditHotel);
    cancelhotelbtn.addEventListener('click', toggeleReload);
    
</script>


    
<!-- var slidePosition = 1;
    SlideShow(slidePosition);

    // forward/Back controls
    function plusSlides(n) {
    SlideShow(slidePosition += n);
    }

    //  images controls
    function currentSlide(n) {
    SlideShow(slidePosition = n);
    }

    function SlideShow(n) {
    var i;
    var slides = document.getElementsByClassName("Containers");
    var circles = document.getElementsByClassName("beads");
    if (n > slides.length) {slidePosition = 1}
    if (n < 1) {slidePosition = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < circles.length; i++) {
        circles[i].className = circles[i].className.replace(" enable", "");
    }
    slides[slidePosition-1].style.display = "block";
    circles[slidePosition-1].className += " enable";
    }  -->
