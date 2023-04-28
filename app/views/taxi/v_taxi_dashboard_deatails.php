


<!-- ............ Update or View Driver Info .......................... -->



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
            <a href="<?php echo URLROOT; ?>/Pages/profile" class="menu-item is-active">User Profile</a>
            <!-- <a href="#" class="menu-item is-active">Company</a> -->
            <a href="<?php echo URLROOT; ?>/Taxi_Driver/viewdrivers" class="menu-item">Drivers</a>
            <a href="<?php echo URLROOT; ?>/Taxi_Vehicle/viewvehicles" class="menu-item ">Vehicles</a>
            <a href="<?php echo URLROOT; ?>/Taxies/payments" class="menu-item">Payments</a>
            <a href="<?php echo URLROOT; ?>/Request/TaxiRequest" class="menu-item">Trip Requests</a>
            <a href="<?php echo URLROOT; ?>/Offers/taxioffers" class="menu-item">Offers</a>
            <a href="<?php echo URLROOT; ?>/Bookings/TaxiBookings/<?php echo $_SESSION['user_type'] ?>/<?php echo $_SESSION['user_id'] ?>" class="menu-item">Bookings</a>
            <a href="<?php echo URLROOT; ?>/Pages/taxies" class="menu-item">Exit Dashboard</a>
        </nav>
    </aside>

    <main class="right-side-content">
        <div class="taxi_off_cont">
            <button id="tax_book_backBut" onclick="window.location='<?php echo URLROOT; ?>/Pages/profile'">Back</button>

            <div class="tax_vech_view_cont">

                <div class="tax-vec-sp-cont">
                    <form class="tax-vec-sp-cont" action="<?php echo URLROOT; ?>/Taxies/OwnerDeatails"  method="POST" enctype="multipart/form-data">
                        <div class="taxi_veh_grid_edit_cont">
                            <div class="drag-area">
                                <div class="taxi-pic-cont">
                                <img src="<?php echo URLROOT; ?>/img/profileImgs/<?php echo $data['profileImg']?>" id="profile-img-placehoder"  alt="Driver image" >
                                </div>
                                <br>
                                <div class="taxi_DriverPro_imgbox"> 
                                    <div class="img-description">Change Profile Picture</div>
                                        <div class="img-upload" style="text-align: center;">
                                            <input type="file" id="profile-imgupload" name="profileImg" placeholder=""  accept="image/*" style="display:none;" >
                                            Browse
                                        </div>  
                                    </div>
                                </div>
                        
                            <div>
                            
                                
                                <table class="tax_book_viewTable">
                                
                                    <tr>
                                        <td>Owner ID:</td>
                                        <td><?php echo $data['ownerID']?></td>
                                    </tr>

                                    <tr>
                                        <td>Owner Name:</td>
                                        <td><input name="name" type="text" value="<?php echo $data['name']?>"></td>
                                    </tr>

                                    <tr>
                                        <td>Company Name:</td>
                                        <td><input name="company_name" type="text" value="<?php echo $data['company_name']?>"></td>
                                    </tr>

                                    <tr>
                                        <td>NIC:</td>
                                        <td><?php echo $data['nic']?></td>
                                    </tr>
                                    
                                    <tr>
                                        <td>Contact Number:</td>
                                        <td><input name="contact_number"id="tax-dash-vec-editBut"  type="tel"  value="<?php echo $data['contact_number']?>"></td>
                                    </tr>

                                    
                                    <tr>
                                        <td>Address:</td>
                                        <td><input name='address'type="text" value="<?php echo $data['address']?>">
                                        </td>
                                        <!-- <td><textarea name="address" id="" cols="20" rows="5" value=""><?php echo $data['address']?></textarea></td> -->
                                    </tr>

                                    <tr>
                                        <td><p>Selected services:<br><span id="service-list" ></span></p></td>
                                        <td><input type="text" id="services" name="services" placeholder="Enter up to 4 services separated by commas" value="<?php echo $data['services']?>" onkeyup="showServices()">
                                        </td>
                                    </tr>

                                    


                                
                                </table>
                            </div>
                        </div>

                        <div class="taxi_veh_editBut_cont">
                            <input type="submit" id="taxi_add_v_but" value="UPDATE">
                        </div>
                    </form>
                </div>
                
                

            </div>  
        

        </div>    
    </main>
 </div>

 <script type="text/JavaScript" src="<?php echo URLROOT;?>/js/components/imageUpload/imageUpload.js"></script>

 
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

