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
                    <img src="<?php echo URLROOT?>/public/img/profileImgs/<?php echo $one->profileimg; ?>" alt="Pr" class="card-img">
                </div>

                <div class="review-header-1">
                    <h2><?php echo $one->Name;?></h2>
                    <p>Rating - <?php echo $one->Rating?></p><br>
                </div>

                <div style="width: 25%;">

                </div>

                <div style="margin-top: 1%;">
                <p style="color: #e9b223;">&nbsp;&nbsp;&nbsp;Posted at<?php echo " ".$one->Date?></p>
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
        <button class="all-purpose-btn" onclick="location.href = '<?php echo URLROOT?>/Hotels/addHotelReview/<?php echo $data['hotelID']?>'">Add a Review</button>
    </div>
        

    </div>
</div>

<?php require APPROOT.'/views/inc/components/footer.php'; ?>


