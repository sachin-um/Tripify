-<?php require APPROOT.'/views/inc/components/header.php'; ?>
<div class="wrapper">


    <?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>
    <div class="hotel-reg">

    <div class="header-space">

    </div>

    <h2 style="text-align: center;">Fill information below to get registered.</h2>
    <br>
    <form class="form-div" action="<?php echo URLROOT; ?>/Hotels/register'" method="post">
        <div class="flex-2">
            <div class="h-address">
                <h4>Property Name</h4>
                <input type="text" class="info-2" id="line-1" name="line-1">
            </div>
                    
            <div class="h-address">
                <h4>Phone Number</h4>
                <input type="text" class="info-2" id="line-2" name="line-2">
            </div>
                    
        </div>
        <br>
        <h3>Property Address</h3>
            <div class="flex-2">
                <div class="h-address">
                    <h4>Address Line 1</h4>
                    <input type="text" class="info-2" id="line-1" name="line-1">
                </div>
                
                <div class="h-address">
                    <h4>Address Line 2</h4>
                    <input type="text" class="info-2" id="line-2" name="line-2">
                </div>
                
            </div>
            
            <div class="flex-2">
                <div class="h-address">
                    <h4>Address Line 3</h4>
                    <input type="text" class="info-2" id="line-3" name="line-3">
                </div>
                
                <div class="h-address">
                    <h4>City</h4>
                    <input type="text" class="info-2" id="city" name="city">
                </div>
                
            </div>

        <button class="btn-info" type="submit">Register</button>   
    </form>

    <?php require APPROOT.'/views/inc/components/footer.php'; ?>

</div>
            
    