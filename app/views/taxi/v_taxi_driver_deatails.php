


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
            <a href="<?php echo URLROOT; ?>/Pages/profile" class="menu-item">User Profile</a>
            <!-- <a href="#" class="menu-item is-active">Company</a> -->
            <a href="<?php echo URLROOT; ?>/Taxi_Driver/viewdrivers" class="menu-item is-active">Drivers</a>
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
            <button id="taxi_veh_view" onclick="window.location='<?php echo URLROOT; ?>/Taxi_Driver/viewdrivers'">Back</button>

            <div class="tax_vech_view_cont">

                <div class="tax-vec-sp-cont">
                    <form class="tax-vec-sp-cont" action="<?php echo URLROOT; ?>/Taxi_Driver/editdrivers/<?php echo $data['ID']?>"  method="POST" enctype="multipart/form-data">
                        <div class="taxi_veh_grid_edit_cont">
                            <div class="drag-area">
                                <div class="taxi-pic-cont">
                                    <img src="<?php echo URLROOT; ?>/img/driver_profileImgs/<?php echo $data['profileImg']?>" id="profile-img-placehoder"  alt="Driver image" >
                                </div>

                                <div class="taxi_DriverPro_imgbox"> 
                                    <div class="img-description">Upload Driver Photo</div>
                                    <div class="img-upload" style="text-align: center;">
                                        <input type="file" id="profile-imgupload" name="profileImg" placeholder=""  accept="image/*" style="display:none;" >
                                        Browse
                                    </div>  
                                </div>
                            </div>
                        
                            <div>
                            
                                
                                <table class="tax_book_viewTable">
                                
                                    <tr>
                                        <td>Driver ID:</td>
                                        <td><?php echo $data['ID']?></td>
                                    </tr>

                                    <tr>
                                        <td>Driver Name:</td>
                                        <td><input name="name" type="text" value="<?php echo $data['name']?>"></td>
                                    </tr>

                                    <tr>
                                        <td>Age:</td>
                                        <td><input name="age" id="tax-dash-vec-editBut"  type="number" value="<?php echo $data['age']?>"></td>
                                    </tr>
                                    
                                    <tr>
                                        <td>License Number:</td>
                                        <td><input name="LicenseNo"id="tax-dash-vec-editBut"   type="text" value="<?php echo $data['licenseno']?>"></td>
                                    </tr>

                                    
                                    <tr>
                                        <td>Contact Number:</td>
                                        <td><input name="contact_number"id="tax-dash-vec-editBut"  type="tel"  value="<?php echo $data['contact_number']?>"></td>
                                    </tr>


                                
                                </table>
                            </div>
                        </div>

                        <div class="taxi_veh_editBut_cont">
                            <input type="submit" id="taxi_veh_view" style="text-align:center;" value="Edit Info">
                        </div>
                    </form>
                </div>
                
                

            </div>  
        

        </div>    
    </main>
 </div>

 <script type="text/JavaScript" src="<?php echo URLROOT;?>/js/components/imageUpload/imageUpload.js"></script>

