<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>
<br>
<div class="wrapper"> 
    <div class="content">
        
        <p class="home-title-2" >Sunil Shantha</p>
        <hr>
        <div class="hotel-desc-page-div">
            <div class="hotel-disc-2">

                <div id="hotel-address" class="hotel-disc-3">
                    <label id="view-address">
                    COLOMBO,WESTERN PROVINCE
                    </label>
                </div>
                <div class="hotel-disc-3">
                    <div class="hotel-disc-1">
                        <ul>
                           <li><i class="fa-solid fa-person-swimming fa-lg"></i><label>Name</label></li>
                            <li><label>National License</label></li>
                            <li><label>Located At</label></li>
                            <li><label>Phone</label></li>
                            <li><label>Languages</label></li>
                            <li><label>Rating</label></li>
                            <li><label>Rate for Hour</label></li>
                           
                        </ul>
                        
                    </div>

                    <div class="hotel-disc-1">
                        <label><?php echo $data['guideDetails']-> Name ?></label><br>
                        <label>A234554-12</label><br>    // we have to do
                        <label><?php echo $data['guideDetails']->Area ?></label><br>
                        <label><?php echo $data['guideDetails']->phone_number ?></label><br>
                        <label><?php
                            $languages=$data['guidelanguages'];
                            //  print_r($languages);
                            foreach($languages as $key=>$value):
                                 echo $value->language . ' ';
                            endforeach;    
                        ?></label><br>
                        <label><?php echo $data['guideDetails']->Rate ?></label><br> //we have to do
                        <label><?php echo $data['guideDetails']->Rate ?></label>
                    </div>
                </div>


                <div class="review-btns-div" style="margin-left: 30%; margin-top:10%">
                    <a href="<?php echo URLROOT?>/Guides/loadBooking"><button id="guide-book-btn" class="all-purpose-btn" >Book Now</button></a> 
                </div>
                <div id="review-btns-div" class="hotel-disc-3" style="margin-top:5%">
                    <div class="hotel-disc-1">
                        <button id="review-btn" class="all-purpose-btn">Review </button>
                    </div>

                    <div class="hotel-disc-1">
                        <button id="view-review-btn" class="all-purpose-btn">View Reviews</button>
                    </div>                  
                    
                </div>
                <br>
              
                
                        
                                     
                    
            </div>
                
            <div class="hotel-disc-2">
                <img id="guide-profile-pic" src="<?php echo URLROOT?>/img/guidehome.png" style="width:50%">
            </div>     

           
        </div>

        <?php require APPROOT.'/views/inc/components/footer.php'; ?>