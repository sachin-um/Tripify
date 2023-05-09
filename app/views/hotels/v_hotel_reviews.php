<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>
<br>
<div class="wrapper"> 
    <div class="content">

        <p class="home-title-2">Customer Reviews</p><br>

        <?php
        $reviews = $data['reviewSet'];
        if(!empty($reviews)){
        foreach($reviews as $one):
        ?>
        <div class="review-wrapper">
            <div class="review-body" style="background-color: #03002E;" id="review-body-1">
                <div class="card-image">
                    <img src="<?php echo URLROOT?>/public/img/Group_profile.png" alt="Pr" class="card-img">
                </div>

            <div class="review-header-1">
                <h2><?php 
                foreach($data['travelerInfo'] as $info){
                
                    if($one->TravelerID == $info->UserID){
                        echo $info->Name;
                    }
                
                } 
                
                ?></h2>
                <p>Rating - <?php echo $one->Rating?></p><br>
                <p>Posted at<?php echo " ".$one->Date?></p>
            </div>
            </div>
            <div class="review-body">
                <?php echo $one->Description; ?>
            </div>
        </div><br><br>
        <?php
        endforeach;
        }
        ?>
        
        
        <br>
        <div style="display: flex; justify-content: center; padding: 20px">
        <button class="all-purpose-btn">Add a Review</button>
    </div>
        

    </div>
</div>

<?php require APPROOT.'/views/inc/components/footer.php'; ?>


<!-- <div class="card-wrapper">
            <div class="review-card">
                <div class="image-content">
                    <span class="overlay"></span>

                    <div class="card-image">
                        <img src="<?php echo URLROOT?>/public/img/Group_profile.png" alt="Pr" class="card-img">
                    </div>
                </div>

                <div class="card-content">
                    <h2 class="review-name">David Silva</h2>
                    <p class="review-description">Very good place! Excellent food, clean rooms, great room service. 10/10 recommend.</p>
                
                    <button class="review-button">View More</button>
                </div>
            </div>
        </div> -->