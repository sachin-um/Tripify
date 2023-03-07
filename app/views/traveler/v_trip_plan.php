<?php require APPROOT.'/views/inc/components/header.php'; ?>
<div class="wrapper">


    <?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>

    <div class="content">
        <div class="trip-details" id="trip-details">
            <div class="white-space">
                <p class="home-title-2">Plan Your Trip</p>
                <br>
                <br>
            </div>
            <form class="form-div" action="<?php echo URLROOT; ?>/Trips/tripplan" method="post">   
            
                    <div class="flex-2">
                        <div class="trip-name">
                            <input type="text" class="info-2" id="trip_name" name="trip_name" placeholder="Name your Trip">
                        </div>
                        <div class="trip-location">
                            <input type="text" class="info-2" id="trip_location" name="trip_location" placeholder="Where you plant to go ?">
                        </div>

                        <div class="trip-startdate">
                            <input type="text" id="trip_startdate" name="trip_startdate" placeholder="When your trip begin ?" onfocus="(this.type='date')" value="<?php  ?>" min="<?php echo date('Y-m-d'); ?>">
                        </div>
                        
                        <div class="trip_enddate">
                            <input type="text" id="trip_enddate" name="trip_enddate" placeholder="When your trip begin ?" onfocus="(this.type='date')" value="<?php   ?>" min="<?php echo date('Y-m-d'); ?>">
                        </div>
                        
                    </div>
                    <div style="text-align: center;">
                        <span class="invalid"><?php echo $data['trip_err']; ?></span>
                    </div>
                    
                    <div class="btn-div">
                        <button class="create-plan-btn" type="submit">Create Your Trip</button>
                    </div>
                </form>
                <?php flash('trip_flash'); ?>
        </div>
        <div class="trip-details-view" id="trip-details-view">
            <div class="white-space">
                <p class="home-title-2"><?php echo $data['trip_name'] ?></p>
                <br>
                <br>
            </div>
            <form class="form-div" action="<?php echo URLROOT; ?>/Trips/tripplan" method="post">   
            
                    <div class="flex-2">
                        <div class="trip-name">
                            <h3>Trip ID : <?php echo$data['trip_id'] ?></h3>
                        </div>
                        <div class="trip-location">
                            <h3>Area : <?php echo $data['trip_location'] ?></h3>
                        </div>

                        <div class="trip-startdate">
                            <h3>Starting Date : <?php echo $data['start_date'] ?></h3>
                        </div>
                        
                        <div class="trip_enddate">
                            <h3>End Date : <?php echo $data['end_date'] ?></h3>
                        </div>
                        <div class="trip_edit_button">
                            <button class="trip-edit-btn" type="submit">Edit</button>    
                        </div>
                        
                    </div>
                </form>
                <?php flash('trip_flash'); ?>
        </div>
        <br>
        <div class="plan-div" id="plan-div">
                <div class="plan-table-container">
                    <table class="plan-table">
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
                    </table>
                </div>
        </div>
    
    </div>
    <?php require APPROOT.'/views/inc/components/footer.php'; ?>
    
        
        <script>
            const add=document.getElementById("trip-details");
            const view=document.getElementById("trip-details-view");
            const plan=document.getElementById("plan-div");
            if (<?php echo $data['view'] ?>==1) {
                add.style.display="none";
                view.style.display="block";
                plan.style.display="block";
            }
        </script> 
</div>   