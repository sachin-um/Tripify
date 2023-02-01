<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>
<br><br>
<div class="wrapper"> 
    <div class="content">
        <br>
        <?php flash('reg_flash'); ?>
        <p class="home-title" ><b>Plan your dream Sri Lankan vacation cost free!</b></p>

        <p class="home-title-2">No Agencies. No Cost. No Hassle.</p>
        <br>
        <div class="home-div-3">
            <button class="all-purpose-btn">Start planning</button>
        </div>
        
        <br>
        <!-- <h2 class="title">Select what you want to search!</h2>
        <br>        
        <div class="user-btns" style="display:flex; flex-direction: row; justify-content: center; align-items: center">
            <button id="btn-1" class="btns" onclick="window.location='<?php echo URLROOT; ?>/Pages/hotels'">
                <span class="button__icon">
                    <ion-icon name="bed-outline"></ion-icon>
                </span>
                <br>
                <span class="button__text">Hotels</span>
            </button>&nbsp;&nbsp;&nbsp;&nbsp;
            
            <button id="#2" class="btns" onclick="window.location='<?php echo URLROOT; ?>/Pages/taxies'">
                <span class="button__icon">
                    <ion-icon name="car-outline"></ion-icon>
                </span>
                <br>
                <span class="button__text">Taxis</span>
            </button>&nbsp;&nbsp;&nbsp;&nbsp;        
            
            <button id="#3" class="btns" onclick="window.location='<?php echo URLROOT; ?>/Pages/guides'">
                <span class="button__icon">
                    <ion-icon name="accessibility-outline"></ion-icon>
                </span>
                <br>
                <span class="button__text">Guides</span>
            </button>&nbsp;&nbsp;&nbsp;&nbsp;
            
            <button id="#4" class="btns">
                <span class="button__icon">
                    <ion-icon name="map-outline"></ion-icon>
                </span>
                <br>
                <span class="button__text">Plan a Trip</span>
            </button>
        </div> -->

        <hr class="divider">
        <br>
        <p class="home-title-2" ><b>Explore popular destinations across the island.</b></p>
        <br>
        <!-- <div class="scroll-bar">
            <img id="logo" src="<?php echo URLROOT; ?>/img/211689_left_arrow_icon.png" alt="logo">
            
            <img id="logo" style="height: 100px;width:auto" src="<?php echo URLROOT; ?>/img/25.jpg" alt="logo">
            &nbsp;&nbsp;
            <img id="logo" style="height: 200px;width:auto" src="<?php echo URLROOT; ?>/img/new.jpg" alt="nine-arch">
            &nbsp;&nbsp;
            <img id="logo" style="height: 100px;width:auto" src="<?php echo URLROOT; ?>/img/sigiriya-459197_1920.jpg" alt="sigiriya">
            &nbsp;&nbsp;
            <img id="logo" src="<?php echo URLROOT; ?>/img/211607_right_arrow_icon.png" alt="sigiriya">
        </div>

        <div class="three-dots" style="display:flex; flex-direction: row; justify-content: center; align-items: center">
        <img id="logo" style="height: 60px;width:auto" src="<?php echo URLROOT; ?>/img/2205199_dot_hide_menu_more_icon.png" alt="scroll">
        </div> -->

        <div class="home-carousal-body">
            <br>
            <div class="carousal">
                <input type="radio" name="slider" id="item-1" checked>
                <input type="radio" name="slider" id="item-2">
                <input type="radio" name="slider" id="item-3">

                <div class="cards">
                    <label class="card" for="item-1" id="song-1">
                        <img src="<?php echo URLROOT; ?>/img/25.jpg" alt="yala">
                    </label>
                    <label class="card" for="item-2" id="song-2">
                        <img src="<?php echo URLROOT; ?>/img/mike-swigunski-zDDQZgZjFtM-unsplash.jpg" alt="sigiriya">
                    </label>
                    <label class="card" for="item-3" id="song-3">
                        <img src="<?php echo URLROOT; ?>/img/nine-arch-bridge-demodara-sri-lanka.jpg" alt="ninearch">
                    </label>
                    <label class="card" for="item-4" id="song-4">
                        <img src="<?php echo URLROOT; ?>/img/edward-arnold-eAW5l7nB5ao-unsplash.jpg" alt="Buddha statue">
                    </label>
                </div>

                <div class="player">
                    <div class="upper-part">
                        <!-- <div class="play-icon">
                            <svg width="20" height="20" fill="#2992dc" stroke="#2992dc" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="feather feather-play" viewBox="0 0 24 24">
                                <defs/>
                                <path d="M5 3l14 9-14 9V3z"/>
                            </svg>
                        </div> -->

                        <div class="info-area" id="test">
                            <label class="song-info" id="song-info-1">
                            <div class="title">Yala National Park</div>
                                <div class="sub-line">
                                    <div class="subtitle">Kataragama, Hambantota</div>
                                </div>
                            </label>

                            <label class="song-info" id="song-info-2">
                                <div class="title">Sigiriya</div>
                                <div class="sub-line">
                                    <div class="subtitle">Dambulla, Matale</div>
                                </div>
                            </label>

                            <label class="song-info" id="song-info-3">
                                <div class="title">Nine Arch Bridge</div>
                                <div class="sub-line">
                                    <div class="subtitle">Demodara, Kandy</div>
                                </div>
                            </label>

                            <label class="song-info" id="song-info-4">
                                <div class="title">Buddha Statues</div>
                                <div class="sub-line">
                                    <div class="subtitle">Colombo, Sri Lanka</div>
                                </div>
                            </label>
                        </div>
                    </div>

                </div>
            </div>
        
            
  
        </div>  
       
        <?php require APPROOT.'/views/inc/components/footer.php'; ?>
    </div>
      
</div> 





    

