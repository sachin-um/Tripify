<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>

<div class="wrapper">
    <div class="content" id="taxi-signup">
        <div class="add-taxiowner-info">
            <div class="add_taxi_info_caption"><br><br>
                <!-- <img src="Pics/logo1-removebg-preview 1.png" id="taxi_add_own_img"> -->
                <img id="taxi_add_own_img" src="<?php echo URLROOT; ?>/img/updatedLOGO.png" alt="logo">
                <p class="home-title-2">Become a member of our Community as a Taxi Owner</p>
            </div>

            <div class="addtaxiownerregform">

                <form action="<?php echo URLROOT; ?>/Taxies/register" class="addtaxiownerregform" method="POST" enctype="multipart/form-data">
                    <div class="drag-area">
                        <div class="taxi-pic-cont">
                            <img src="<?php echo URLROOT; ?>/img/360_F_229758328_7x8jwCwjtBMmC6rgFzLFhZoEpLobB6L8.jpg" id="profile-img-placehoder"  alt="Driver image" >
                        </div>

                        <div class="taxi_DriverPro_imgbox"> 
                            <div class="img-description">Upload Taxi Owner Photo</div>
                            <div class="img-upload" style="text-align: center;">
                                <input type="file" id="profile-imgupload" name="profileImg" placeholder="" required accept="image/*" style="display:none;" >
                                Browse
                            </div>  
                        </div>
                    </div>
                    <input type="text" id="taxicomname" name="ownername" placeholder="Owner Name" required><br>
                    <input type="text" id="taxicomname" name="ownernic" placeholder="NIC Number" required><br>
                    <input type="text" id="taxicomname" name="taxicomname" placeholder="Company Name If Exist" ><br>

                    <div class="taxi_own_mob_div">
                        <input id="taxiowncode" name="taxiowncode" type="text" value="+94" disabled >
                        <input type="tel" id="taxiownmobile" name="taxiownmobile" value=""  placeholder="Business Phone"  required ><br>

                    </div>
                    

                    <input type="number" id="taxiownnov" name="taxiownnov" placeholder="Number of vehicle" required min="1"><br>

                    <!-- <label id="add_taxiown_p">Company Address</lable><br> -->

                    <input type="text" id="com_add_dis"  name="com_add_dis" value="Company Address" disabled>
                    <input type="text" id="taxiownsadd" name="taxiownsadd" placeholder="Street Address" required><br>

                    <input type="text" id="taxiownsl2" name="taxiownsl2" placeholder="Address Line 2" ><br>
        
                    <input type="text" id="taxiowncity" name="taxiowncity" placeholder="City" required ><br>
                    
                    <p>Selected services: <span id="service-list"></span></p>
                    <input type="text" name="services" placeholder="Enter up to 4 services separated by commas" onkeyup="showServices()"><br>

                    <input type="submit" id="taxi-register-but" name="taxiowncreate_but" value="Register">


                   
                </form>

                <div class="taxicreatecom">
            
                


                

            </div>


        </div>

    </div>  
</div>   

<script type="text/JavaScript" src="<?php echo URLROOT;?>/js/components/imageUpload/imageUpload.js"></script>
<?php require APPROOT.'/views/inc/components/footer.php'; ?>

<script>
function showServices() {
  var servicesInput = document.getElementById("services");
  var servicesList = document.getElementById("service-list");
  var services = servicesInput.value.split(",");

  if (services.length <= 3) {
    servicesList.innerHTML = services.join(", ");
  } else {
    servicesInput.value = services.slice(0, 3).join(",");
    servicesList.innerHTML = services.slice(0, 3).join(", ");
  }
}

</script>






    
