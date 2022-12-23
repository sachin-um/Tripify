-<?php require APPROOT . '/views/inc/components/header.php'; ?>
<div class="wrapper">


    <?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>
    <div class="hotel-reg">

        <h2 style="text-align: center;">Fill information below to get registered.</h2>
        <br>
        <form class="form-div" action="<?php echo URLROOT; ?>/Hotels/register" method="post">
            <div class="flex-2">
                <div class="h-address">
                    <h4>Property Name<sup> *</sup></h4>
                    <input type="text" id="name" name="name" class="form-control form-control-lg">
                    <span class="error-span" style="padding-left: 5%;color:red"><?php echo $data['property_name_err'] ?></span>
                </div>

                <div class="h-address">
                    <h4>Phone Number<sup> *</sup></h4>
                    <input type="text" class="info-2" id="contact_number" name="contact_number">
                    <span class="error-span" style="padding-left: 5%;color:red"><?php echo $data['contact_number_err'] ?></span>
                </div>

            </div>
            <br>

            <div class="flex-2">
                <div class="h-address">
                    <h4>Hotel Registration No :<sup> *</sup></h4>
                    <input type="text" class="info-2" id="reg_number" name="reg_number">
                    <span class="error-span" style="padding-left: 5%;color:red"><?php echo $data['reg_number_err'] ?></span>

                </div>

                <div class="h-address">
                    <!-- <h4>Phone Number</h4>
                <input type="text" class="info-2" id="contact_number" name="contact_number"> -->
                </div>

            </div>

            <br>

            <h3>Property Address</h3>
            <div class="flex-2">
                <div class="h-address">
                    <h4>Address Line 1<sup> *</sup></h4>
                    <input type="text" class="info-2" id="line1" name="line1">
                </div>

                <div class="h-address">
                    <h4>Address Line 2<sup> *</sup></h4>
                    <input type="text" class="info-2" id="line2" name="line2">
                </div>

            </div>

            <div class="flex-2">

                <div class="h-address">
                    <h4>City<sup> *</sup></h4>
                    <input type="text" class="info-2" id="city" name="city">
                </div>

            </div>
            <span class="error-span" style="padding-left: 5%;color:red;position: absolute;
    top: 98%;
    left: 15%;"><?php echo $data['property_address_err'] ?></span>

            <button class="btn-info" type="submit">Register</button>
        </form>

        <?php require APPROOT . '/views/inc/components/footer.php'; ?>

    </div>