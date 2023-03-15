<?php
$_SESSION['user_id'];
$_SESSION['user_type'];


if (empty($_SESSION['user_id'])) {
    flash('reg_flash', 'You need to have logged in first...');
    redirect('Users/login');
}

elseif ($_SESSION['user_type']!='Taxi' || $_SESSION['user_type']!='Admin') {
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
            <a href="<?php echo URLROOT; ?>/Pages/profile" class="menu-item is-active">User Profile</a>
            <!-- <a href="#" class="menu-item">Company</a> -->
            <a href="<?php echo URLROOT; ?>/Taxi_Driver/viewdrivers" class="menu-item">Drivers</a>
            <a href="<?php echo URLROOT; ?>/Taxi_Vehicle/viewvehicles" class="menu-item">Vehicles</a>
            <a href="<?php echo URLROOT; ?>/Taxies/payments" class="menu-item">Payments</a>
            <a href="<?php echo URLROOT; ?>/Request/TaxiRequest" class="menu-item">Trip Requests</a>
            <a href="<?php echo URLROOT; ?>/Offers/taxioffers" class="menu-item">Offers</a>
            <a href="<?php echo URLROOT; ?>/Taxies/bookings" class="menu-item">Bookings</a>
            <a href="<?php echo URLROOT; ?>Pages/taxies" class="menu-item">Exit Dashboard</a>
        </nav>
    </aside>

        <main class="right-side-content">
        <br><br>
        <div>
            <h2 class="title" >Settings</h2>
            <hr>
        </div> 
        <br>
        <div class="taxi-first-container">
            <div class="profile-image" style="width: 450px; text-align: center;">
                <br>
                <img id="pro-picture-2" src="<?php echo URLROOT; ?>/img/Group_profile.png" alt="picture">
                <br>
                <br>
                <!-- <button class="profile-btn">Edit</button> -->
            </div>
    
            <div class="profile-description">
                 <br>
                <div class="sub-description">
                    <div class="sub-sub">
                        <h3>Name : </h3>
                    </div>
                    
                    <div class="sub-sub">
                        <h3><?php echo $data->details->owner_name;  ?></h3>
                    </div>
                            
                </div>

                <br>


                <div class="sub-description" id="taxi-hide-cont">
                    <div class="sub-sub">
                        <h3>Company Name : </h3>
                    </div>
                    
                    <div class="sub-sub">
                        <h3><?php echo $data->details->company_name;  ?></h3>
                    </div>
                            
                </div>

                <br>

                <?php 
                    if(!$data->details->company_name){
                ?>
                    <script type="text/javascript">document.getElementById('taxi-hide-cont').style.display = 'none';</script>
                <?php
                    }
                ?>
                
                <div class="sub-description" id="taxi-hide-cont">
                    <div class="sub-sub">
                        <h3>NIC: </h3>
                    </div>
                    
                    <div class="sub-sub">
                        <h3><?php echo $data->details->nic_no;  ?></h3>
                    </div>
                            
                </div>

                <br>
                
                
                
                <div class="sub-description" id="taxi-hide-cont">
                    <div class="sub-sub">
                        <h3>Number of Vehicles: </h3>
                    </div>
                    
                    <div class="sub-sub">
                        <h3><?php echo $data->details->NoOfVehicles;  ?></h3>
                    </div>
                            
                </div>

                <br>

                <div class="sub-description">
                    <div class="sub-sub">
                        <h3>Email : </h3>
                    </div>
                        
                    <div class="sub-sub">
                        <h3><?php echo $data->Email;  ?></h3>
                    </div>
                        
                </div>
                <br>

                


                <div class="sub-description">
                    <div class="sub-sub">
                        <h3>Account ID :</h3>
                    </div>
                 
                    <div class="sub-sub">
                        <h3><?php echo $data->UserID;  ?></h3>
                    </div>
                    
                </div>
                <br> 
                
                <div class="sub-description">
                    <div class="sub-sub">
                        <h3>Phone : </h3>
                    </div>
                        
                    <div class="sub-sub">
                        <h3> <h3><?php echo $data->details->contact_number;  ?></h3></h3>
                    </div>
                        
                </div>
                <br> 


                <!-- <div class="sub-description">
                    <div class="sub-sub">
                        <h3>Owner ID : </h3>
                    </div>
                        
                    <div class="sub-sub">
                        <h3> <h3><?php echo $data->details->OwnerID;  ?></h3></h3>
                    </div>
                        
                </div>
                <br> -->

                <div class="sub-description">
                    <div class="sub-sub">
                        <h3>Owner Address : </h3>
                    </div>
                        
                    <div class="sub-sub">
                        <h3> <h3><?php echo $data->details->address;  ?></h3></h3>
                    </div>
                        
                </div>
                <br>
                <div class="sub-description">
                    <div class="sub-sub">
                        <h3>verificaion Status: </h3>
                    </div>
                        
                    <div class="sub-sub">
                        <?php if ($data->verification_status ==2) {
                            ?><h3>Verified</h3><?php
                        }else {
                            if ($_SESSION['admin_type']=='verification' || $_SESSION['admin_type']=='Super Admin') {
                                ?>
                                <button class="acc-view-btn" type="button" onclick="showProfile('<?php echo $data->UserID; ?>','Taxi','<?php echo URLROOT; ?>')">Verification Details</button>
                                <a href="<?php echo URLROOT; ?>/Users/verifyaccount/<?php echo $data->UserID ?>/Guide">
                                                    <button class="verify-btn" type="button">Verify</button>
                                                </a>
                                <?php
                            }
                            else {
                                ?><h3>Not Verified</h3><?php
                            }
                        } ?>
                    </div>
                        
                </div>
                <div style="text-align: center;">
                    <button onclick="window.location.href='<?php echo URLROOT; ?>/Taxies/OwnerDeatails'" class="profile-btn">Edit Info</button>
                        
                </div>
            </div>


            
        </div>
        <br><br>
   

    </main>
 </div>
 <div id="popup" class="trip-popup">
                <div id="popup-content" class="profile-popup-content"></div>
</div>
<script type="text/JavaScript" src="<?php echo URLROOT;?>/js/components/showprofile.js"></script>
<?php
}
else {
    flash('reg_flash', 'Access Denied');
    redirect('Pages/home');
}
?>
