<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>
<div class="wrapper">

    <div class="content">
        <div class="form-login">
            <img id="taxi_add_v_form_img" src="<?php echo URLROOT; ?>/img/logo1-removebg-preview.png" alt="logo">


            <h1 id="taxi_add_v_p">Add Your Driver</h1>

            <form action="<?php echo URLROOT; ?>/Taxi_Driver/adddriver" class="taxi_add_v_form" method="POST" enctype="multipart/form-data">

                <div class="drag-area">
                    <div class="icon">
                        <img src="<?php echo URLROOT; ?>/img/Group_profile.png" id="profile-img-placehoder"  alt="Driver image" >
                    </div>

                    <div class="taxi_DriverPro_imgbox"> 
                        <div class="img-description">Upload Driver Photo</div>
                        <div class="img-upload">
                            <input type="file" id="profile-imgupload" name="profileImg" placeholder="" required accept="image/*" style="display:none;" >
                            Browse
                        </div>  
                    </div>
                </div>

                <div class="taxi_add_v_form">
                    <input name="name" type="text" id="taxi_add_v_model" placeholder="Driver Name" required><br>
                </div>
                
                <div class="taxi_add_v_form">
                    <input name="age" type="number" id="taxi_add_v_year" placeholder="Age" required ><br>
                </div>
                
                <div class="taxi_add_v_form">
                    <input name="licenseno" type="text" id="taxi_add_v_number" placeholder="License Number" required ><br>
                </div>
                
                <!-- <div class="taxi_dri_mob_div">
                    <input id="taxidricode" type="text" value="+94" disabled >
                    <input type="tel" id="taxidrimobile" name="taxiownmobile" value="" / placeholder="Business Phone"  required ><br>
                </div> -->
                <div class="taxi_dri_mob_div">
                        <input id="taxiowncode" name="taxiowncode" type="text" value="+94" disabled >
                        <input type="tel" id="taxiownmobile" name="contact_number"  value=""  placeholder="Business Phone"  required ><br>
                </div>
                
                

                
                            
                <input type="submit" id="taxi_add_v_but" value="Add Driver">
            </form>

        </div>
    </div>

    <script type="text/JavaScript" src="<?php echo URLROOT;?>/js/components/imageUpload/imageUpload.js"></script>
    <?php require APPROOT.'/views/inc/components/footer.php'; ?>  
</div>   
