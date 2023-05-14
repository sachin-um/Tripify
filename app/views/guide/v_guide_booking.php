<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>


<?php 
$guidedetails= $data['guidedetails'];
$guidelanguages= $data['guideLanguages'] 
?>


<div class="wrapper">
    <div class="content">
        <div class="hotel-booking-title">

            <p id="hotel-booking-title-1" class="home-title-2" style="text-transform:uppercase;" ><b><?php echo $guidedetails->Name ?></b></p>    
        
        </div>
        <div class="hotel-room-top-picks">
            <div class="hotel-desc-page-div">
                <div class="taxi-disc-2">                
                    <br>
                    <div class="taxi-disc-3">
                        <table>
                            <tbody>
                                <tr>
                                    <td>Name</td>
                                    <td>:</td>
                                    <td><?php echo $guidedetails-> Name ?></td>
                                </tr>
                                <!-- <tr>
                                    <td>Reg No</td>
                                    <td>:</td>
                                    <td><?php echo $guidedetails-> guideRegNo ?></td>
                                </tr> -->
                                <tr>
                                    <td>Area</td>
                                    <td>:</td>
                                    <td><?php echo $guidedetails->Area ?></td>
                                </tr>
                                <tr>
                                    <td>Phone No</td>
                                    <td>:</td>
                                    <td><?php echo $guidedetails->phone_number ?></td>
                                </tr>
                                <tr>
                                    <td>Languages</td>
                                    <td>:</td>
                                    <td><?php
                                        $languages = $guidelanguages;
                                        foreach ($languages as $key => $value) {
                                        echo $value->language;
                                        if ($key < count($languages) - 1) {
                                        echo ', ';
                                        }
                                        }
                                        ?>
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>
        
                    </div>
                
                </div>        

                <div class="hotel-disc-2">
                    <div class="Containers">
                        <img src="<?php echo URLROOT?>/img/profileImgs/<?php echo $data['guideimg']?>" style="width:100%">
                        <div class="H-Room-Info"></div>
                    </div>

                    <br>
                </div>             

               
            </div>

            <div id="hotel-booking-form" class="hotel-room-top-picks">
                    

                <p class="home-title-2" >Check Availability</p>
                <hr>
                <br><br>
                <form id="gide-booking-form" action="<?php echo URLROOT; ?>/Bookings/GuideBooking/<?php echo $data['guidedetails']->GuideID?>" method="POST">
                    <div class="hotel-reg-form">
                        <div class="hotel-reg-form-div-2">
                            <div class="hotel-reg-elements">
                                <p class="home-title-4">Start Date<sup> *</sup> :</p>
                                <input class="hotel-labels-2" type="date" id="bookingDate" name="sdate"  required>
                                <span id="start_validate"></span>
                            </div>
                            

                            <div class="hotel-reg-elements">
                                <p class="home-title-4">End Date<sup> *</sup> :</p>
                                <input class="hotel-labels-2" type="date" id="bookingEndDate"  name="endDate" required>
                                <span id="end_validate"></span>
                            </div>

                            <div class="hotel-reg-elements">
                                <p class="home-title-4">Payment option<sup> *</sup> :</p>
                                <select class="search" id="payment-option" name="payment_option" style="background: white;">
                                    <option value="" disabled selected hidden>Payment Option</option>
                                    <option value="Cash">Cash</option>
                                    <option value="Online">Online</option>
                                    <option value="Cash or Online">Cash or Online</option>
                                </select>
                            </div>

                            <div class="hotel-reg-elements">
                                <p class="home-title-4">Location<sup> *</sup> :</p>
                                <input class="hotel-labels-2" type="text" id="G_book_loc"  name="G_book_location" placeholder="Location" required>
                                <span id="end_validate"></span>
                            </div>

                            <input class="hotel-labels-2" type="hidden" id="guide_payment" name="total" >
                            
                        </div>

                        
                    </div><br>
                    <span id="older"></span><br>
                    <span id="avail"></span><br>
                    <div class="hotel-reg-form-div-2">
                        <button id="book-now-btn" class="all-purpose-btn" onclick="validate()" type="submit">Check</button>
                    </div>
                </form>
                <br>
                <script type="text/JavaScript">

                    var URLROOT="<?php echo URLROOT;?>";
                    var GuideID =  '<?php echo $data['guidedetails']->GuideID?>';
                    var guideRate = '<?php echo $data['guidedetails']->Rate?>';
                    
                </script>
                       
                        
                   


                    
                </div>


                <div id="guide-booking-cont" style="display:none;">
            
                            <p class="home-title-3"><u>Price Details</u></p>
                            <br>
                            <div class="price-details-1">
                                <div class="hotel-price-check">
                                    <label><b>Trip Start :</b></label><br>
                                    <label ><b>  <p id="startDate"></p>  </b></label>
                                    
                                </div>
                                <div class="hotel-price-check">
                                    <label><p><b>Trip End</b></p></label>
                                    <label><b> <p id="endDate"></p>  </b></label>
                                </div>
                                <div class="hotel-price-check">
                                    <label><b>Location :</b></label><br>
                                    <label ><b>  <p id="g_location"></p>  </b></label>
                                    
                                </div>

                                <div class="hotel-price-check">
                                    <label><b>Payment Method :</b></label><br>
                                    <label ><b>  <p id="G_payment_mrthod"></p>  </b></label>
                                    
                                </div>
                               
                            </div>
                            <br>
                            <div class="price-details-2">
                                <div class="hotel-price-details">
                                    <label id="No-of-rooms"><p id="days"></p></label>
                                    <label id="X">X</label>
                                    <label id="No-of-nights"><?php echo $data['guidedetails']->Rate?></label>
                                    <label id="hotel-taxes-1"><b><p id="total"></p></b></label>
                                </div>

                                

                                <hr id="prices-hr">
                                
                                <div class="hotel-price-details">
                                    <label id="hotel-taxes">Total</label>
                                    <label id="hotel-taxes-1"><b><p id="g_total"></p></b></label>
                                </div>
                            </div>


                            <div class="hotel-reg-form-div-2">
                                <button  onclick="sentcontroller()"  id="confirm-booking-btn" class="all-purpose-btn" type="submit"  >Book Now</button>
                            </div>
                            <br>
                            <div class="hotel-reg-form-div-2">
                                <button onclick="window.location.href='<?php echo URLROOT; ?>/Pages/guides';" id="confirm-booking-btn" class="taxi_all-purpose-btn" type="submit">Cancel</button>
                            </div>
                            
                        
                </div>

            
        </div>

        
        
    </div>
</div>



<script>
    var slidePosition = 1;
    SlideShow(slidePosition);

    // forward/Back controls
    function plusSlides(n) {
    SlideShow(slidePosition += n);
    }

    //  images controls
    function currentSlide(n) {
    SlideShow(slidePosition = n);
    }

    function SlideShow(n) {
    var i;
    var slides = document.getElementsByClassName("Containers");
    var circles = document.getElementsByClassName("beads");
    if (n > slides.length) {slidePosition = 1}
    if (n < 1) {slidePosition = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < circles.length; i++) {
        circles[i].className = circles[i].className.replace(" enable", "");
    }
    slides[slidePosition-1].style.display = "block";
    circles[slidePosition-1].className += " enable";
    } 


</script>
<script type="text/JavaScript" src="<?php echo URLROOT;?>/js/components/guidedateValidation.js"></script>
<?php require APPROOT.'/views/inc/components/footer.php'; ?>





    
    
 


