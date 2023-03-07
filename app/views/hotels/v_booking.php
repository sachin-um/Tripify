<?php require APPROOT.'/views/inc/components/header.php'; ?>
<!-- <?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?> -->

<div class="wrapper">
    
    <div class="content">
        <div class="hotel-booking-title">
            <p id="hotel-booking-title-1" class="home-title-2" ><b><?php echo $data['wantedRoom']->RoomTypeName." "; ?> Room</b></p>
        </div>
        <div class="hotel-room-top-picks">
            <div class="hotel-desc-page-div">
                <div class="hotel-disc-2">

                    <div id="hotel-address" class="hotel-disc-3">
                        <label id="view-address">
                        <?php echo $data['wantedRoom']->NoofBeds." "; ?> Beds
                        </label><br>
                        
                    </div>

                    <div class="hotel-disc-3">
                        <label id="view-address">
                        3 Adults
                        </label><br>

                        <label id="view-address">
                        0 children
                        </label><br>
                        
                    </div>
                    <br>
                    <div class="hotel-disc-3">
                        <div class="hotel-disc-1">
                            <ul style="list-style: circle;">
                            <li><i class="fa-solid fa-person-swimming fa-lg"></i><label>Coffee Maker</label></li>
                                <li><label>Air Conditioning</label></li>
                                <li><label>Free Wifi</label></li>
                            </ul>
                            
                        </div>

                        <div class="hotel-disc-1">
                            <ul style="list-style: circle;">
                                <li><label>24/7 Room Service</label></li>
                                <li><label>TV</label></li>
                                <li><label>Mini Fridge</label></li>
                            </ul>
                        </div>
                    </div>
                    
                </div>        

                <div class="hotel-disc-2">
                    <div id="booking-slideshow" class="slideshow-container fade">
                        <div class="Containers">
                            <div class="MessageInfo">1 / 4</div>
                            <img src="<?php echo URLROOT?>/img/Galadari3.jpg" style="width:100%">
                        </div>

                        <div class="Containers">
                            <div class="MessageInfo">2 / 4</div>
                            <img src="<?php echo URLROOT?>/img/Galadari4.jpg" style="width:100%">
                        </div>

                        <div class="Containers">
                            <div class="MessageInfo">3 / 4</div>
                            <img src="<?php echo URLROOT?>/img/Galadari3.jpg" style="width:100%">
                        </div>

                        <div class="Containers">
                            <div class="MessageInfo">4 / 4</div>
                            <img src="<?php echo URLROOT?>/img/Galadari4.jpg" style="width:100%">
                        </div>

                        <!-- Back and forward buttons -->
                        <a class="Back" onclick="plusSlides(-1)">&#10094;</a>
                        <a class="forward" onclick="plusSlides(1)">&#10095;</a>
                        </div>
                        <br>

                        <!-- The circles/beads -->
                        <div style="text-align:center">
                            <span class="beads" onclick="currentSlide(1)"></span>
                            <span class="beads" onclick="currentSlide(2)"></span>
                            <span class="beads" onclick="currentSlide(3)"></span>
                            <span class="beads" onclick="currentSlide(4)"></span>
                        </div> 
                    </div>

                </div>

                <div id="hotel-booking-form" class="hotel-room-top-picks">                    
                
                    <p class="home-title-2" >Check Availability</p>
                    <hr>

                    
                    <form action="<?php echo URLROOT?>/HotelBookings/checkAvailability/<?php echo $data['wantedRoom']->RoomTypeID?>" method="post">
                        
                        <br>
                        <!-- <input type="hidden" name="hotel_id" value="<?php echo $data['wantedRoom']->HotelID; ?>">
                        <input type="hidden" name="roomTypeID" value="<?php echo $data['wantedRoom']->RoomTypeID; ?>"> -->
                        <div class="hotel-reg-form">
                            <div class="hotel-reg-form-div-2">
                                <div class="hotel-reg-elements">
                                    <p class="home-title-4">Check-In<sup> *</sup> :</p>
                                    <input class="hotel-labels-2" type="date" name="check_in">
                                </div>

                                <div class="hotel-reg-elements">
                                    <p class="home-title-4">Check-Out<sup> *</sup> :</p>
                                    <input class="hotel-labels-2" type="date" name="check_out">
                                </div>
                            </div>

                            <div class="hotel-reg-form-div-2">
                                <div class="hotel-reg-elements">
                                    <p class="home-title-4">No of rooms of this type<sup> *</sup> :</p>
                                    
                                    <input class="hotel-labels-2" type="number" id="noofrooms" name="noofrooms" min = "1" max="<?php echo $data['wantedRoom']->no_of_rooms?>" value="1">
                                </div>

                                <div class="hotel-reg-elements">
                                    <p class="home-title-4">No of nights<sup> *</sup> :</p>
                                    <label classid="noofnights" name="noofnights" min = "1" value="1"></label>
                                </div>

                
                            </div>
                        </div>

                        <div class="hotel-reg-form-div-2">
                            <button name="confirm-booking-btn" class="all-purpose-btn" type="submit">Continue</button>
                        </div>
                    </form>

                    <!-- modal -->

                    <!-- <button data-modal-target="#modal">Open Modal</button> -->
                    <div class="modal" id="modal">
                        <div class="modal-header">
                            <div class="title">Sorry</div>
                            <button data-close-button class="close-button">&times;</button>
                        </div>

                        <div class="modal-body">
                            Only ..... rooms left
                        </div>
                    </div>

                    <div id="overlay">

                    </div>
                    
                    <!-- <?php flash('reg_flash'); ?> -->
                    <?php flash('checkAvailability');?>
                    <!-- <p class="home-title-3"><u>Price Details</u></p>
               
                    <div class="price-details-2">
                        <div class="hotel-price-details">
                            <label id="No-of-rooms">1 Room</label>
                            <label id="X">X</label>
                            <label id="No-of-nights">1 Night</label>
                            <label id="Priceofroom"><b>11,000LKR</b></label>
                        </div>

                        <div class="hotel-price-details">
                            <label id="hotel-taxes">Taxes</label>
                            <label id="hotel-taxes-1"><b>1,000LKR</b></label>
                        </div>

                        <hr id="prices-hr">
                        
                        <div class="hotel-price-details">
                            <label id="hotel-taxes">Total</label>
                            <label id="hotel-taxes-1"><b>12,000LKR</b></label>
                        </div>
                    </div> -->

                    
                </div>
            </div>

            
        </div>

        
        
    </div>

    
</div>

<?php require APPROOT.'/views/inc/components/footer.php'; ?>



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

    const input1 = document.getElementById('date1');
    const input2 = document.getElementById('date2');
    const resultLabel = document.getElementById('noofnights');
  
    input1.addEventListener('input', calculate);
    input2.addEventListener('input', calculate);
  
  function calculate() {
    const value1 = parseFloat(input1.value);
    const value2 = parseFloat(input2.value);
    const result = value1 + value2; // Replace this with your calculation
    resultLabel.innerHTML = result;
  }


//   const openModalButtons = document.querySelectorAll('[data-modal-target]');
//   const closeModalButtons = document.querySelectorAll('[data-close-button]');
//   const overlay = document.getElementById('overlay')

//   openModalButtons.foreach(button=>{
//     button.addEventListener('click' , () => {
//         const modal = document.querySelector(button.dataset.modalTarget)
//         openModal(modal)
//     })
//   })

//   closeModalButtons.foreach(button=>{
//     button.addEventListener('click' , () => {
//         const modal = button.closest('.modal')
//         closeModal(modal)
//     })
//   })

//   function openModal(modal){
//     if(modal == null) return
//     modal.classList.add('active')
//     overlay.classList.add('active')
//   }


//   function closeModal(modal){
//     if(modal == null) return
//     modal.classList.remove('active')
//     overlay.classList.remove('active')
//   }

</script>
