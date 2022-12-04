<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?> 

<?php
$_SESSION['user_id'];


if (!empty($_SESSION['user_id'])) {
    ?>
    <div class="request-list">

        <?php
            $requests=$data['taxirequests'];
            foreach($requests as $taxirequest):
        ?>
        <div class="request">
            <div class="post-header"><?php echo $taxirequest->caption; ?></div>
            <div class="post-body">
                <div class="post-date">Request Date: <span id="request-data"><?php echo $taxirequest->date; ?></span></div>
                <div class="post-time">Request Time: <?php echo $taxirequest->time; ?></div>
                <div class="post-location">Request PickUp Location: <?php echo $taxirequest->pickup_location; ?></div>
                <div class="post-details">Additional Details: <?php echo $taxirequest->additional_details; ?></div>
                <div class="post-by">Post By: <?php echo $taxirequest->name; ?></div>
                <div class="post-by">Post at: <?php echo convertTime($taxirequest->post_at); ?></div>
            </div>
            <div class="request-footer">
                <button id="request-offer-btn" type="submit">Make an offer</button>
                <button id="request-edit-btn" type="submit">Edit</button>
                <button id="request-delete-btn" type="submit">Delete</button>
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
 


<?php require APPROOT.'/views/inc/components/footer.php'; ?>