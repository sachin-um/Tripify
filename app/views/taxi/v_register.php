<?php require APPROOT.'/views/inc/components/header.php'; ?>

<div class="wrapper">

    <?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>

    <div class="content">
        <div class="addtaxiownerinfo">
            <div class="add_taxi_info_caption">
                <!-- <img src="Pics/logo1-removebg-preview 1.png" id="taxi_add_own_img"> -->
                <img id="taxi_add_own_img" src="<?php echo URLROOT; ?>/img/logo1-removebg-preview.png" alt="logo">
                <h1 id="taxi_add_own_hed_tex"> Join with us </h1>

            </div>

            <div class="addtaxiownerregform">

                <form action="" class="addtaxiownerregform" method="POST">

                    <input type="text" id="taxiownname" name="ownername" placeholder="Owner Name" required><br>
                    <input type="text" id="taxiownnic" name="ownernic" placeholder="NIC Number" required><br>
                    <input type="text" id="taxicomname" name="taxicomname" placeholder="Company Name If Exist"  ><br>

                    <div class="taxi_own_mob_div">
                        <input id="taxiowncode" type="text" value="+94" disabled >
                        <input type="tel" id="taxiownmobile" name="taxiownmobile" value="" / placeholder="Business Phone"  required ><br>
                    </div>
                    

                    <input type="number" id="taxiownnov" name="taxiownnov" placeholder="Number of vehicle" required min="1"><br>

                    <!-- <label id="add_taxiown_p">Company Address</lable><br> -->
                    <input type="text" id="com_add_dis" value="Company Address" disabled>
                    <input type="text" name="taxiownsadd" id="taxiownsadd" placeholder="Street Address" required><br>

                    <input type="text" name="taxiownsl2" id="taxiownsl2" placeholder="Address Line 2" required><br>
        
                    <input type="text" name="taxiowncity" id="taxiowncity" placeholder="City" required ><br>

                    <div class="taxicreatecom">
            
                         <input type="submit" id="taxiowncreate_but" value="Create">

                     </div>

                </form>

                

            </div>


         </div>

    </div>
    <?php require APPROOT.'/views/inc/components/footer.php'; ?>  
</div>   






    
