<?php
$_SESSION['user_id'];
$_SESSION['user_type'];


if (empty($_SESSION['user_id'])) {
    flash('reg_flash', 'You need to have logged in first...');
    redirect('Users/login');
}
elseif ($_SESSION['user_type']!='Admin') {
    flash('reg_flash', 'Only the Traveler can have access...');
    redirect('Pages/home');
}
else {
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
            <a href="<?php echo URLROOT; ?>/Pages/profile" class="menu-item is-active">Admin Profile</a>
            <a href="<?php echo URLROOT; ?>/Users/messages" class="menu-item">Messages</a>
            <?php

                if($data->details->AssignedArea=='Super Admin'){
                    ?>
                    <a href="<?php echo URLROOT; ?>/Admins/manageadmins" class="menu-item">Manage Admins</a>
                    <?php
                }
                elseif($data->details->AssignedArea=='verification'){
                    ?>
                    <a href="<?php echo URLROOT; ?>/Admins/verification/Guide" class="menu-item">Account Verifcation</a>
                    <?php
                }
            ?>
            
            <a href="<?php echo URLROOT; ?>/Articles/articles" class="menu-item">Articles</a>
            <a href="<?php echo URLROOT; ?>/Admins/profiles/Traveler" class="menu-item">User Profiles</a>
            <a href="#" class="menu-item">Exit Dashboard</a>
        </nav>
    </aside>

    <main class="right-side-content">
        <br>
        <br>
        <h2>Profile Settings</h1>
        <hr>
        <br>
        <div class="first-container">
            <div class="profile-image" >
            <form action="<?php echo URLROOT; ?>/Admins/editAdminDetails/<?php echo $data->UserID ?>" method="POST" enctype="multipart/form-data">
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
                        <h3>Email:</h3>
                    </div>
                 
                    <div class="sub-sub">
                        <h3><?php echo $data->Email;  ?></h3>

                    </div>
                    
                </div>
                <br> 
                <div class="sub-description">
                    <div class="sub-sub">
                        <h3>Assigned Area: </h3>
                    </div>
                        
                    <div class="sub-sub">
                        <h3><?php echo $data->details->AssignedArea ?></h3> 
                    </div>
                        
                </div>
                <br>
                <div class="sub-description">
                    <div class="sub-sub">
                        <h3>NIC Number: </h3>

                    </div>
                        
                    <div class="sub-sub">
                        <h3><?php echo $data->details->nic ?></h3>
                    </div>
                </div>
                <br> 
                <div class="sub-description">
                    <div class="sub-sub">
                        <h3>Contact Number: </h3>

                    </div>
                        
                    <div class="info">
                        <h3><?php echo $data->ContactNo ?></h3>
                    </div>
                    <div class="sub-sub-edit">
                        <input type="text" name="contact-number" id="contact-number" placeholder="<?php echo $data->ContactNo ?>" value="<?php echo $data->ContactNo ?>">

                    </div>
                        
                </div>
                <br> 
          
                <div style="display: flex; justify-content: space-around;">
                    <button class="profile-btn-edit" id="edit-btn">Edit Info</button>
                    <button class="profile-btn-cancel" id="cancel-btn" >Discard</button>
                    <button class="profile-btn-save" id="save-btn" type="submit">Save Changes</button>
                        
                </div>
            </div>
            </form>
        </div>
        <?php flash('img_flash'); ?>
    </main>
 </div>

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