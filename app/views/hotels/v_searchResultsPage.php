<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>
<br>
<div class="wrapper"> 
    <div class="content">
        <form action="<?php echo URLROOT?>/Hotels/searchForHotels" method="POST">
            <div class="nav-main">
                <div class="nav-parts">
                    <p class="hotel-labels-1">Where are you going?</p>
                    <input class="hotel-labels-1" type="text" id="place" name="place" placeholder="Your Destination" 
                    value="<?php echo $data['destination']?>" style="background-color: #D9D9D9;">
                </div>
                &nbsp;
                <div class="nav-parts">
                    <p class="hotel-labels-1">Check-In Date</p>
                    <input class="hotel-labels-1" type="date" name="date-1" placeholder="Check-In Date"
                    value="<?php echo $data['check-in']?>" style="background-color: #D9D9D9;">
                </div>
                &nbsp;
                <div class="nav-parts">
                    <p class="hotel-labels-1">Check-Out Date</p> 
                    <input class="hotel-labels-1" type="date" name="date-2" placeholder="Check-Out Date"
                    value="<?php echo $data['check-out']?>" style="background-color: #D9D9D9;">
                </div>
                &nbsp;
                <div class="nav-parts">
                    <p class="hotel-labels-1">No of People</p> 
                    <input class="hotel-labels-1" type="number" name="noofadults" max="100"
                    value="<?php echo $data['noofadults']?>" style="background-color: #D9D9D9;">
                </div>
            </div>

            <div class="home-div-3">
                <span id="reg-form-span"><?php echo $data['sdate_err']; ?></span><br>
                <span id="reg-form-span"><?php echo $data['edate_err']; ?></span><br>
                <button class="all-purpose-btn" onclick="" type="submit">Go</button>
            </div>
            
        </form>
        <br>

        <?php
        $_SESSION['checkin'] = $data['check-in'];
        $_SESSION['checkout'] = $data['check-out'];

        ?>
        <p class="home-title-2" >Results for Your Search</p>
        <br>
        <div class="hotel-home-top-picks" style="background-color: #D9D9D9;">
            <div class="nav-grid">
                    
                <?php 
                $hotelImages=$data['images'];
                $i=0;            
                foreach($data['hotelSearch'] as $search):
                ?>                

                <!-- <a href="<?php echo URLROOT?>/Hotels/hotelProfile/<?php echo $search->HotelID?>" >
                    <div class="hotel-ad-card">     
                        <div class="hotel-ad-card-pic">                        
                            <img id="hotel-img" src="<?php echo URLROOT; ?>/img/new.jpg" alt="nine-arch">                        
                            <span class="dot"><?php echo $search->Rating; ?></span>
                        </div>            
                        
                        <div class="hotel-ad-card-desc">
                            <label id="display-hotel-name" for="hotel-name"><b><?php echo $search->Name; ?></b></label> <br>
                            <label id="display-hotel-address" for="hotel-address"><?php 
                            echo $address; 
                            ?></label>
                        </div>

                        <div class="hotel-ad-card-price">
                            <label id="display-hotel-price" for="hotel-price"><b>View Hotel</b></label>
                        </div>
                    </div>
                </a> -->


                <a href="<?php echo URLROOT?>/Hotels/hotelProfilewithoutrooms/<?php echo $search->HotelID?>" style="text-decoration: none;">
                    <div class="hotel-ad-card">     
                        <div class="hotel-ad-card-pic">                
                            <img id="hotel-img-ad" src="<?php echo URLROOT; ?>/public/img/hotel-uploads/<?php echo $hotelImages[$i]->imgName; ?>" alt="nine-arch">                        
                            <span class="dot"><?php echo $search->Rating; ?></span>
                        </div>            
                        
                        <div class="hotel-ad-card-desc">
                            <label id="display-hotel-name" for="hotel-name"><b><?php echo $search->Name; ?></b></label> <br>
                            <label id="display-hotel-address" for="hotel-address"><?php 
                            echo $search->District;
                            ?></label>
                        </div>

                        <div class="hotel-ad-card-price">
                            <label id="display-hotel-price" for="hotel-price"><b>View Hotel</b></label>
                        </div>
                    </div>
                </a>

                <?php
                $i=$i+1;
                endforeach;
                ?>
            </div>
        </div>
    </div>    

</div>

<?php require APPROOT.'/views/inc/components/footer.php'; ?>