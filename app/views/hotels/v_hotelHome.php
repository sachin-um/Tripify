<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>
<br>
<div class="wrapper"> 
    <div class="content">
        <p class="home-title-2" >Find Accomodation Anywhere in Sri Lanka!</p>
        

        <form action="<?php echo URLROOT?>/Hotels/searchForHotels" method="post">
            <div class="nav-main">
                <div class="nav-parts">
                    <p class="hotel-labels-1">Where are you going?</p>
                    <input class="hotel-labels-1" type="text" name="place" placeholder="Your Destination">
                </div>
                &nbsp;
                <div class="nav-parts">
                    <p class="hotel-labels-1">Check-In Date</p>
                    <input class="hotel-labels-1" type="date" name="date-1" placeholder="Check-In Date">
                </div>
                &nbsp;
                <div class="nav-parts">
                    <p class="hotel-labels-1">Check-Out Date</p> 
                    <input class="hotel-labels-1" type="date" name="date-2" placeholder="Check-Out Date">
                </div>
                &nbsp;
                <div class="nav-parts">
                    <p class="hotel-labels-1">No of People</p> 
                    <input class="hotel-labels-1" type="number" name="noofadults" value="1" max="100">
                </div>
            </div>

            <div class="home-div-3">
                <button class="all-purpose-btn" type="submit">Go</button>
            </div>
            
        </form>

        <div class="hotel-home-join-network">

            <p class="home-title-2" style="margin-bottom: 10px;">Join Our Network Today.</p>
            <div class="home-div-3">
                
                <button class="all-purpose-btn" onclick="location.href='<?php echo URLROOT?>/Hotels/register'">Register Hotel</button>               
                
            </div>
        </div>


        <p class="home-title-2" >Top Picks From Around The Island</p>

        <?php
        $current_date = date("m-d-Y");
        $tomorrow = date('m-d-Y', strtotime('+1 day'));
        $_SESSION['checkin'] = $current_date;
        $_SESSION['checkout'] = $tomorrow;

        // echo $_SESSION['checkin'];
        ?>

        <div class="hotel-home-top-picks">
            <div class="nav-grid">
                
                <?php
                
                foreach($data['allhotels'] as $hotel):
                ?>
                <!-- $hotels=$data['allhotels']; -->

                <a href="<?php echo URLROOT?>/Hotels/hotelProfile/<?php echo $hotel->HotelID?>" >
                    <div class="hotel-ad-card">     
                        <div class="hotel-ad-card-pic">                        
                            <img id="hotel-img" src="<?php echo URLROOT; ?>/img/new.jpg" alt="nine-arch">                        
                            <span class="dot"><?php echo $hotel->Rating; ?></span>
                        </div>            
                        
                        <div class="hotel-ad-card-desc">
                            <label id="display-hotel-name" for="hotel-name"><b><?php echo $hotel->Name; ?></b></label> <br>
                            <label id="display-hotel-address" for="hotel-address"><?php 
                            $address = $hotel->Line1.", ".$hotel->Line2.", ".$hotel->District;
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

</div>


<?php require APPROOT.'/views/inc/components/footer.php'; ?>
