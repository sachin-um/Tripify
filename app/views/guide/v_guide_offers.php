<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?> 

<?php
$_SESSION['user_id'];


if (!empty($_SESSION['user_id'])) {
    ?>
    <div class="request-list">

        <?php
            $offers=$data['guide_offers'];
            foreach($offers as $guideoffer):
        ?>
        <div class="request">
            <div class="post-header"><?php echo $guideoffer->caption; ?></div>
            <div class="post-body">
                <div class="post-date">HourlyRate: <span id="request-data"><?php echo $guideoffer->hourlyrate; ?></span></div>
                <div class="post-time">PaymentMethod: <?php echo $guideoffer->paymentmethod; ?></div>
                <div class="post-details">Additional Details: <?php echo $guideoffer->additionaldetails; ?></div>
                <div class="post-location">Request By: <?php echo $guideoffer->traveler; ?></div>
                <div class="post-by">Offered By: <?php echo $guideoffer->guidename; ?></div>
                <div class="post-by">Guide contact number: <?php echo $guideoffer->guide_number; ?></div>
                <div class="post-by">Offered at: <?php echo convertTime($guideoffer->offer_at); ?></div>
            </div>
            <div class="request-footer">
                <?php
                    if ($_SESSION['user_type']=='Guide') {
                        ?>
                            <a href="<?php echo URLROOT; ?>/Request/editTaxiRequest/<?php echo $taxirequest->RequestID ?>"><button id="request-edit-btn" type="submit">Edit</button></a>
                            <button id="request-delete-btn" type="submit">Delete</button>
                        <?php
                    }
                    elseif ($_SESSION['user_type']=='Traveler') {
                        ?>
                        <button id="request-offer-btn" type="submit">Accept offer</button>
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
 


<?php require APPROOT.'/views/inc/components/footer.php'; ?>