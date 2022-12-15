<?php require APPROOT.'/views/inc/components/header.php'; ?>

<div class="wrapper">


    <?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>

    
    <div class="content">
        <div class="request-white-space">
            <h2 class="title" >Guide Requests</h2>
        </div>
        <?php
$_SESSION['user_id'];


if (!empty($_SESSION['user_id'])) {
    ?>
    <div class="request-list">

        <?php
            $requests=$data['guiderequests'];
            foreach($requests as $guiderequest):
        ?>
        <div class="request">
            <div class="post-header"><?php echo $guiderequest->caption; ?></div>
            <div class="post-body">
                <div class="post-date">Request Date: <span id="request-data"><?php echo $guiderequest->date; ?></span></div>
                <div class="post-time">Request Time: <?php echo $guiderequest->time; ?></div>
                <div class="post-location">Area Want to Travel: <?php echo $guiderequest->p_location; ?></div>
                <div class="post-details">Additional Details: <?php echo $guiderequest->description; ?></div>
                <div class="post-details">Preffer language: <?php echo $guiderequest->p_language; ?></div>
                <div class="post-by">Post By: <?php echo $guiderequest->name; ?></div>
                <div class="post-by">Post at: <?php echo convertTime($guiderequest->post_at); ?></div>
            </div>
            <div class="request-footer">
                <?php
                    if ($_SESSION['user_type']=='Traveler') {
                        ?>
                            <a href="<?php echo URLROOT; ?>/Request/editTaxiRequest/<?php echo $taxirequest->RequestID ?>"><button id="request-edit-btn" type="submit">Edit</button></a>
                            <button id="request-delete-btn" type="submit">Delete</button>
                        <?php
                    }
                    elseif ($_SESSION['user_type']=='Guide') {
                        ?>
                        <a href="<?php echo URLROOT; ?>/Offers/addGuideOffer/<?php echo $guiderequest->request_id ?>"><button id="request-offer-btn" type="submit">Make an offer</button></a>
                        
                        <?php
                    }
                ?>
                
                
            </div>
                
            

        </div>
        <?php
            endforeach;
        ?>
    </div>
    
    <?php
}
else {
    flash('reg_flash', 'You need to have logged in first...');
    redirect('Users/login');
}

?>
    


    


    
    </div>
    <?php require APPROOT.'/views/inc/components/footer.php'; ?>  
</div> 