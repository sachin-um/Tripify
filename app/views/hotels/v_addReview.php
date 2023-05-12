<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>

<div class="wrapper">
    <div class="content">

        <p class="home-title-2">Your reviews help us do better..</p><br>

        <div class="side-bar"> 
            <br><br> 
            <form action="<?php echo URLROOT?>/Hotels/addHotelReview/<?php echo $data['hotelID']?>" method="post">

                <p style="font-size: 1.1rem;">Rating</p>
                <select name="hotel_rating">
                    <option value="1">1 star</option>
                    <option value="2">2 stars</option>
                    <option value="3">3 stars</option>
                    <option value="4">4 stars</option>
                    <option value="5">5 stars</option>
                </select>  
                <span class="invalid"><?php echo $data['rating_err']; ?></span>

                <p style="font-size: 1.1rem;">Review</p>
                <textarea name="review" id="" cols="30" rows="10"></textarea>
                <span class="invalid"><?php echo $data['review_err']; ?></span>

                <button class="start-btn" type="submit">Submit</button>
            </form><br>
                
        </div>
        
        
    </div>
</div>

<?php require APPROOT.'/views/inc/components/footer.php'; ?>
