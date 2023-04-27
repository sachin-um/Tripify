<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>
<br>
<div class="wrapper"> 
    <div class="content">
        <form action="<?php echo URLROOT?>/Hotels/showHotels" method="post">
            <div class="nav-main">
                <div class="nav-parts">
                    <p class="hotel-labels-1">Where are you going?</p>
                    <input class="hotel-labels-1" type="text" id="place" name="place" placeholder="Your Destination" 
                    value="<?php echo $data['destination']?>">
                </div>
                &nbsp;
                <div class="nav-parts">
                    <p class="hotel-labels-1">Check-In Date</p>
                    <input class="hotel-labels-1" type="date" id="date-1" placeholder="Check-In Date"
                    value="<?php echo $data['check-in']?>">
                </div>
                &nbsp;
                <div class="nav-parts">
                    <p class="hotel-labels-1">Check-Out Date</p> 
                    <input class="hotel-labels-1" type="date" id="date-2" placeholder="Check-Out Date"
                    value="<?php echo $data['check-out']?>">
                </div>
                &nbsp;
                <div class="nav-parts">
                    <p class="hotel-labels-1">No of People</p> 
                    <input class="hotel-labels-1" type="number" name="noofadults" max="100"
                    value="<?php echo $data['noofadults']?>">
                </div>
            </div>

            <div class="home-div-3">
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
        <div class="nav-grid">
                
            <?php   
            
            
            foreach($data['hotelSearch'] as $search):
            ?>                

            <a href="<?php echo URLROOT?>/Hotels/hotelProfile/<?php echo $search->HotelID?>" >
                <div class="hotel-ad-card">     
                    <div class="hotel-ad-card-pic">                        
                        <img id="hotel-img" src="<?php echo URLROOT; ?>/img/new.jpg" alt="nine-arch">                        
                        <span class="dot"><?php echo $search->Rating; ?></span>
                    </div>            
                    
                    <div class="hotel-ad-card-desc">
                        <label id="display-hotel-name" for="hotel-name"><b><?php echo $search->Name; ?></b></label> <br>
                        <label id="display-hotel-address" for="hotel-address"><?php 
                        $address = $search->Line1.", ".$search->Line2.", ".$search->District;
                        echo $address; 
                        ?></label>
                    </div>

                    <div class="hotel-ad-card-price">
                        <label id="display-hotel-price" for="hotel-price"><b>View Hotel</b></label>
                    </div>
                </div>
            </a>
            <?php
            endforeach;
            ?>
        </div>
    </div>    

</div>

<?php require APPROOT.'/views/inc/components/footer.php'; ?>