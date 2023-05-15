<?php
$_SESSION['user_id'];
$_SESSION['user_type'];


if (empty($_SESSION['user_id'])) {
    flash('reg_flash', 'You need to have logged in first...');
    redirect('Users/login');
}
elseif ($_SESSION['user_type']!='Traveler') {
    flash('reg_flash', 'Only the Traveler can have access...');
    redirect('Pages/home');
}
else {
    ?>
<?php require APPROOT.'/views/inc/components/header.php'; ?>
<div class="wrapper">


    <?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>

    <div class="content" id="trip-plan-content">
        <div class="trip-details" id="trip-details">
            <div class="white-space">
                <h3 class="home-title-2">Plan Your Trip With <br><img src="<?php echo URLROOT?>/img/logo_processed.png" alt=""></h3>
                <br>
                <br>
            </div>
            <form class="form-div" action="<?php echo URLROOT; ?>/Trips/tripplan" method="post">   
            
                    <div class="flex-trip">
                        <div class="trip-name">
                            <input type="text" class="info-2" id="trip_name" name="trip_name" placeholder="Name your Trip">
                        </div>
                        <div class="trip-location">
                            <input type="text" class="info-2" id="trip_location" name="trip_location" placeholder="Where do you plan to go ?">
                        </div>

                        <div class="trip-startdate">
                            <input type="text" id="trip_startdate" name="trip_startdate" placeholder="When does your trip begin ?" onfocus="(this.type='date')" value="<?php  ?>" min="<?php echo date('Y-m-d'); ?>">
                        </div>
                        
                        <div class="trip_enddate">
                            <input type="text" id="trip_enddate" name="trip_enddate" placeholder="When does your trip end ?" onfocus="(this.type='date')" value="<?php   ?>" min="<?php echo date('Y-m-d'); ?>">
                        </div>
                        
                    </div>
                    <div style="text-align: center;">
                        <span class="invalid"><?php echo $data['trip_err']; ?></span>
                    </div>
                    
                    <div class="btn-div">
                        <button class="create-plan-btn" type="submit"><i class="fa-solid fa-map" style="margin-right:10px"></i>Create Your Trip</button>
                    </div>
                </form>
        </div>
        <div class="trip-details-view" id="trip-details-view">
            
            <form class="form-div" action="<?php echo URLROOT; ?>/Trips/editTripPlan/<?php echo$data['trip_id'] ?>" method="post">   
            <div class="white-space">
                <p class="home-title-2"><span class="edit-trip-visible" id="edit-trip-visible"><?php echo $data['trip_name'] ?></p></span><input type="text"  name="trip_name" placeholder="<?php echo $data['trip_name'] ?>" value="<?php echo $data['trip_name'] ?>"  class="edit-trip" id="edit-trip" style="width:30%; text-align:center;">
                <br>
                <br>
            </div>
                    <div class="flex-2">
                        <div class="trip-name">
                            <h3>Trip ID : TP<?php echo$data['trip_id'] ?>
                            </h3>
                        </div>
                        <div class="trip-location">
                            <h3>Area : <span class="edit-trip-visible" id="edit-trip-visible"><?php echo $data['trip_location'] ?></span><input type="text" name="trip_location" placeholder="<?php echo $data['trip_location'] ?>" value="<?php echo $data['trip_location'] ?>"  class="edit-trip" id="edit-trip">
                        </div>

                        <div class="trip-startdate">
                            <h3>Starting Date : <span class="edit-trip-visible" id="edit-trip-visible"><?php echo $data['start_date'] ?></span></h3><input type="text" name="trip_startdate"  onfocus="(this.type='date')" placeholder="<?php echo $data['start_date'] ?>" value="<?php echo $data['start_date'] ?>"  class="edit-trip" id="edit-trip">
                        </div>
                        
                        <div class="trip_enddate">
                            <h3>End Date : <span class="edit-trip-visible" id="edit-trip-visible"><?php echo $data['end_date'] ?></span></h3><input type="text" name="trip_enddate" onfocus="(this.type='date')" placeholder="<?php echo $data['end_date'] ?>" value="<?php echo $data['end_date'] ?>"  class="edit-trip" id="edit-trip">
                        </div>
                        <div class="trip_edit_button">
                            <button class="profile-btn-edit" style="width: 70%;" id="editbtn">
                                <i class="fa-solid fa-pen-to-square" style="margin-right: 10px;"></i>
                                Edit
                            </button> 
                            <button class="profile-btn-edit" type="submit" style="width: 70%; display:none;" id="edit-trip-save" >
                                <i class="fa-solid fa-pen-to-square" style="margin-right: 10px;"></i>
                                Save
                            </button>
                            <button class="profile-btn-edit" style="width: 70%; display:none;" id="edit-trip-cancel" >
                                <i class="fa-solid fa-pen-to-square" style="margin-right: 10px;"></i>
                                Cancel
                            </button>   
                        </div>
                    </div>
                </form>  
        </div>
        <br>
        <?php flash('trip_flash'); ?>
        <div class="plan-div" id="plan-div">
                <div class="plan-table-container">
                    <!-- <table class="plan-table">
                        <thead>
                            <tr>
                                <th>Hotels</th>
                                <th>Taxi</th>
                                <th>Guide</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td id="hotel-column" data-lable="ID">
                                  
                                  <button class="plan-item-add-button" type="button">Add Stays</button>  
                                
                                </td>
                                <td id="taxi-column" data-lable="Name">
                                    <button class="plan-item-add-button" type="button">Add a Ride</button>
                                </td>
                                <td id="guide-column" data-lable="Email">
                                    <button class="plan-item-add-button" type="button">Add a Guide</button>
                                </td>
                            </tr>
                        </tbody>
                    </table> -->
                    <div class="plan-container">
                        <div class="column">
                            <div class="header">Stays</div>
                            <?php
                                $hotel_bookings=$data['hotel_bookings'];
                                if (!empty($hotel_bookings)) {
                                    foreach($hotel_bookings as $hotel_booking):
                                        ?>
                                            
                                            <div class="main-container">
                                                <i class="fa-solid fa-hotel fa-2xl" style="display: flex; align-items: center"></i>
                                                <div style="margin-right: 20px;">
                                                    <div class="header-container">
                                                        <div class="trip-heading">Stays</div>
                                                    </div>
                                                    <div class="post-tag post-date trip-description">
                                                        <?php echo $hotel_booking->hotel_id ?>
                                                    </div>
                                                </div>
                                                <div style="margin-right: 20px;">
                                                    <div class="header-container">
                                                        <div class="trip-heading">Checking Date</div>
                                                    </div>
                                                    <div class="post-tag post-date trip-description">
                                                        <?php echo $hotel_booking->checkin_date ?>
                                                    </div>
                                                </div>
                                                <div style="margin-right: 20px;">
                                                    <div class="header-container">
                                                        <div class="trip-heading">Checkout Date</div>
                                                    </div>
                                                    <div class="post-tag post-date trip-description">
                                                        <?php echo $hotel_booking->checkout_date ?>
                                                    </div>
                                                </div>
                                                <a href="<?php echo URLROOT; ?>/Trips/removeFromTripPlan/<?php echo $data['trip_id'] ?>/<?php echo $hotel_booking->booking_id ?>/hotel" style="display: flex; align-items: center; color:red; text-decoration:none"><i class="fa-solid fa-xmark fa-xl" style="display: flex; align-items: center; color:red" title="Remove"></i></a>
                                            </div>
                                        <?php
                                            endforeach;
                                        ?>
                                            <a href="<?php echo URLROOT; ?>/Bookings/HotelBookings/<?php echo $_SESSION['user_type'] ?>/<?php echo $_SESSION['user_id'] ?>" style="text-decoration:none">
                                                <button class="plan-item-add-another-button" type="button">
                                                    <i class="fa-solid fa-plus"></i>
                                                    Add another Hotel
                                                </button>
                                            </a>
                                        <?php
                                } else {
                                    ?>
                                    <a href="<?php echo URLROOT; ?>/Bookings/HotelBookings/<?php echo $_SESSION['user_type'] ?>/<?php echo $_SESSION['user_id'] ?>" style="text-decoration:none">
                                        <button class="plan-item-add-button" type="button">
                                            <i class="fa-solid fa-plus"></i>
                                            Add a Hotel
                                        </button>
                                    </a>
                                    <?php
                                }
                            ?>
                                
                                
                            
                        </div>
                        <div class="column">
                            <div class="header">Taxies</div>
                            <?php
                                $taxi_bookings=$data['taxi_bookings'];
                                if (!empty($taxi_bookings)) {
                                    foreach($taxi_bookings as $taxi_booking):
                                        ?>
                                            
                                            <div class="main-container">
                                                <i class="fa-solid fa-car fa-2xl" style="display: flex; align-items: center"></i>
                                                <div style="margin-right: 20px;">
                                                    <div class="header-container">
                                                        <div class="trip-heading">Taxi</div>
                                                    </div>
                                                    <div class="post-tag post-date trip-description">
                                                        <?php echo $taxi_booking->vehicle->vehicle_number ?>
                                                    </div>
                                                </div>
                                                <div style="margin-right: 20px;">
                                                    <div class="header-container">
                                                        <div class="trip-heading">Booking Date</div>
                                                    </div>
                                                    <div class="post-tag post-date trip-description">
                                                        <?php echo $taxi_booking->booking_date ?>
                                                    </div>
                                                </div>
                                                <div style="margin-right: 20px;">
                                                    <div class="header-container">
                                                        <div class="trip-heading">Booking Time</div>
                                                    </div>
                                                    <div class="post-tag post-date trip-description">
                                                        <?php echo $taxi_booking->booking_time ?>
                                                    </div>
                                                </div>
                                                <a href="<?php echo URLROOT; ?>/Trips/removeFromTripPlan/<?php echo $data['trip_id'] ?>/<?php echo $taxi_booking->ReservationID ?>/taxi" style="display: flex; align-items: center; color:red; text-decoration:none"><i class="fa-solid fa-xmark fa-xl" style="display: flex; align-items: center; color:red" title="Remove"></i></a>
                                            </div>
                                        <?php
                                            endforeach;
                                        ?>
                                            <a href="<?php echo URLROOT; ?>/Bookings/TaxiBookings/<?php echo $_SESSION['user_type'] ?>/<?php echo $_SESSION['user_id'] ?>" style="text-decoration:none">
                                                <button class="plan-item-add-another-button" type="button">
                                                <i class="fa-solid fa-plus"></i>
                                                Add another Taxi</button>
                                            </a>
                                        <?php
                                } else {
                                    ?>
                                    <a href="<?php echo URLROOT; ?>/Bookings/TaxiBookings/<?php echo $_SESSION['user_type'] ?>/<?php echo $_SESSION['user_id'] ?>" style="text-decoration:none">
                                        <button class="plan-item-add-button" type="button">
                                        <i class="fa-solid fa-plus"></i>
                                        Add a Taxi</button>
                                    </a>
                                    <?php
                                }
                            ?>
                        </div>
                        <div class="column">
                            <div class="header">Guides</div>
                            <?php
                                $guide_bookings=$data['guide_bookings'];
                                if (!empty($guide_bookings)) {
                                    
                                    foreach($guide_bookings as $guide_booking):
                                        
                                        ?>
                                            <div class="main-container">
                                                <i class="fa-solid fa-person-walking fa-2xl" style="display: flex; align-items: center"></i>
                                                <div style="margin-right: 20px;">
                                                    <div class="header-container">
                                                        <div class="trip-heading">Guide</div>
                                                    </div>
                                                    <div class="post-tag post-date trip-description">
                                                        <?php echo $guide_booking->guide_name ?>
                                                    </div>
                                                </div>
                                                <div style="margin-right: 20px;">
                                                    <div class="header-container">
                                                        <div class="trip-heading">Starting Date</div>
                                                    </div>
                                                    <div class="post-tag post-date trip-description">
                                                    <?php echo $guide_booking->StartDate ?>
                                                    </div>
                                                </div>
                                                <div style="margin-right: 20px;">
                                                    <div class="header-container">
                                                        <div class="trip-heading">End Date</div>
                                                    </div>
                                                    <div class="post-tag post-date trip-description">
                                                        <?php echo $guide_booking->EndDate ?>
                                                    </div>
                                                </div>
                                                <a href="<?php echo URLROOT; ?>/Trips/removeFromTripPlan/<?php echo $data['trip_id'] ?>/<?php echo $guide_booking->BookingID ?>/guide" style="display: flex; align-items: center; color:red; text-decoration:none"><i class="fa-solid fa-xmark fa-xl" style="display: flex; align-items: center; color:red" title="Remove"></i></a>
                                            </div>
                                        <?php
                                            endforeach;
                                        ?>
                                            <a href="<?php echo URLROOT; ?>/Bookings/GuideBookings/<?php echo $_SESSION['user_type'] ?>/<?php echo $_SESSION['user_id'] ?>" style="text-decoration:none">
                                                <button class="plan-item-add-another-button" type="button">
                                                <i class="fa-solid fa-plus"></i>
                                                Add another Guide</button>
                                            </a>    
                                        <?php
                                } else {
                                    ?>
                                    <a href="<?php echo URLROOT; ?>/Bookings/GuideBookings/<?php echo $_SESSION['user_type'] ?>/<?php echo $_SESSION['user_id'] ?>" style="text-decoration:none">
                                        <button class="plan-item-add-button" type="button">
                                        <i class="fa-solid fa-plus"></i>
                                        Add a Guide</button>
                                    </a>    
                                    <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
        </div>
    
    </div>
    <?php require APPROOT.'/views/inc/components/footer.php'; ?>
    
        
        <script>
            const add=document.getElementById("trip-details");
            const view=document.getElementById("trip-details-view");
            const plan=document.getElementById("plan-div");
            const editbtn=document.getElementById('editbtn');
            const savebtn=document.getElementById('edit-trip-save');
            const cancelbtn=document.getElementById('edit-trip-cancel');
            if (<?php echo $data['view'] ?>==1) {
                add.style.display="none";
                view.style.display="block";
                plan.style.display="block";
            }

            function toggeleEdit() {
                event.preventDefault();
                const elements = document.getElementsByClassName('edit-trip');
                const elementinfo = document.getElementsByClassName('edit-trip-visible');
                    Array.from(elements).forEach(function(element) {
                        // console.log(element);
                        if (element.style.display === "block") {
                            
                            element.style.display = "none";
                        } else {
                            console.log(element);
                            element.style.display = "block";
                        }
                });
                    Array.from(elementinfo).forEach(function(element) {
                        if (element.style.display === "none") {
                            element.style.display = "block";
                        } else {
                            element.style.display = "none";
                        }
                });

                    if (editbtn.style.display === "none") {
                        editbtn.style.display = "block";
                    } else {
                        editbtn.style.display = "none";
                    }

                    if (savebtn.style.display === "none") {
                        savebtn.style.display = "block";
                    } else {
                        savebtn.style.display = "none";
                    }

                    if (cancelbtn.style.display === "none") {
                        cancelbtn.style.display = "block";
                    } else {
                        cancelbtn.style.display = "none";
                    }
                    
            }
            
            editbtn.addEventListener('click',toggeleEdit);
            cancelbtn.addEventListener('click',toggeleEdit);
        </script> 
</div>  

<?php
}
?>