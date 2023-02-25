<?php
$_SESSION['user_id'];
$_SESSION['user_type'];


if (empty($_SESSION['user_id'])) {
    flash('reg_flash', 'You need to have logged in first...');
    redirect('Users/login');
}
elseif ($_SESSION['user_type']!='Guide') {
    flash('reg_flash', 'Only the Guides can have access...');
    redirect('Pages/home');
}
else {
    ?>
<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>
<?php require APPROOT.'/views/inc/components/sidebars/guide_sidebar.php'; ?>

<main class="right-side-content">
    <br><br>
    <h2>Profile Information</h1>
    <hr>
    <br>
    <div class="first-container">
    <div class="profile-image" >
            <form action="<?php echo URLROOT; ?>/Users/editTravelerDetails/<?php echo $data->UserID ?>" method="POST" enctype="multipart/form-data">
                <br>
                <div class="drag-area">
                    <div class="icon">
                        <img id="profile-img-placehoder" src="<?php echo URLROOT; ?>/img/profileImgs/<?php echo  $_SESSION['user_profile_image']; ?>" alt="picture">
                    </div>
                </div>
                <br>
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
        
        <div class="profile-description">
        <form action="<?php echo URLROOT; ?>/Users/editTravelerDetails/<?php echo $data->UserID ?>" method="POST">
         <br>
        
            <div class="sub-description">
                <div class="sub-sub">
                    <h3>Name : </h3>
                </div>
                
                
                <div class="info">
                    <h3><?php echo $data->Name;  ?></h3>
                </div>
                <div class="sub-sub-edit">
                        <input type="text" name="name" id="name" placeholder="<?php echo $data->Name; ?>" value="<?php echo $data->Name; ?>">

                    </div>
                        
            </div>


            <br> 
            <div class="sub-description">
                <div class="sub-sub">
                    <h3>Email :</h3>
                </div>
                
                <div class="sub-sub">
                    <h3><?php echo $data->Email;  ?></h3>
                </div>
                
            </div>
            <br> 
            <div class="sub-description">
                <div class="sub-sub">
                    <h3>verificaion Status: </h3>
                </div>
                    
                <div class="sub-sub">
                <?php if ($data->verification_status ==1) {
                        ?><h3>Verified </h3><?php
                    }else {
                        ?><h3>Not Verified </h3><?php
                    } ?>
                </div>
                    
            </div>
            <br> 
            <div class="sub-description">
                <div class="sub-sub">
                    <h3>Available Area: </h3>
                </div>
                    
                <div class="info">
                <h3><?php echo $data->guideDetails->Area;  ?></h3>
                    
                </div>
                <div class="sub-sub-edit">
                        <input type="text" name="Available-Area" id="Available-Area" placeholder="<?php echo $data->travelerDetails->contact_number ?>" value="<?php echo $data->guideDetails->Area; ?>">

                    </div>
             
            </div>
            <br> 
            <div class="sub-description">
                <div class="sub-sub">
                    <h3>Contact Number: </h3>
                </div>
                    
                <div class="info">
                <h3><?php echo $data->guideDetails->phone_number;  ?></h3>
                </div>

                <div class="sub-sub-edit">
                        <input type="text" name="contact-number" id="contact-number" placeholder="<?php echo $data->travelerDetails->contact_number ?>" value="<?php echo $data->guideDetails->phone_number?>">

                    </div>
             
            </div>
            <br>
            <div class="sub-description">
                <div class="sub-sub">
                    <h3>Languages: </h3>
                </div>
                    
                <div class="info">
                <h3>
                        <?php
                            $languages=$data->guideLanguages;
                            // print_r($languages);
                            foreach($languages as $language):
                                echo $language->language.",";
                            endforeach;    
                        ?>
                </h3>
                </div>
                <div class="sub-sub-edit" >
                <select class="guide-reg-select" multiple="mutiple" name="languages[]">
                    <option value='sinhala'>Sinhala</option>
                    <option value='english'>English</option>
                    <option value='tamil'>Tamil</option>
                    <option value='chinese'>Chinese</option>
                    <option value='japanese'>Japanese</option>
                    <option value='russian'>Russian</option>
                    <option value='french'>French</option>
                    <option value='artabic'>Arabic</option>
                    <option value='spanish'>Spanish</option>
                </select>
                </div>
             
            </div>
            <br>
            <div class="sub-description">
                <div class="sub-sub">
                    <h3>Price per Hour: </h3>
                </div>
                    
                <div class="info">
                <h3><?php echo $data->guideDetails->Rate;  ?></h3>
                </div>
                <div class="sub-sub-edit">
                        <input type="text" name="Rate" id="Rate" placeholder="<?php echo $data->travelerDetails->contact_number ?>" value="<?php echo $data->guideDetails->Rate?>">

                    </div>
             
            </div>
            <br> 
            <br>
            <div style="display: flex; justify-content: space-around;">
                    <button class="profile-btn-edit" id="edit-btn">Edit Info</button>
                    <button class="profile-btn-cancel" id="cancel-btn" >Discard</button>
                    <button class="profile-btn-save" id="save-btn" type="submit">Save Changes</button>
                        
            </div>
        </div>
    </div>
        <br><br>
    </div>

<!-- <?php require APPROOT.'/views/inc/components/footer.php'; ?> -->
<script type="text/JavaScript" src="<?php echo URLROOT;?>/js/components/imageUpload/imageUpload.js"></script>
<script>
    var editbtn=document.getElementById("edit-btn");
    var cancelbtn=document.getElementById("cancel-btn");
    var savebtn=document.getElementById("save-btn");
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

   
<?php
}
?>


    

