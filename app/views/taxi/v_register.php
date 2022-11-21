<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?> 




<div class="addtaxiownerinfo">
        
        <img src="Pics/logo1-removebg-preview 1.png" id="taxi_add_own_img">

        <h1 id="taxi_add_own_hed_tex"> Create Your Company</h1>

        <form action="" class="addtaxiownerregform">

                <input type="text" id="taxiownname" placeholder="Owner Name" required><br>

                <input type="text" id="taxiownnic" placeholder="Nic Number" required><br>

                <input type="text" id="taxicomname" placeholder="Company Name If Exist" ><br>

                <input id="taxiowncode" value="+94" disabled>
                <input type="tel" id="taxiownmobile" value="" / placeholder="Business Phone" required ><br>

                <input type="number" id="taxiownnov" placeholder="Number of vehicle" required min="1"><br>

                <label id="add_taxiown_p">Company Address</lable><br>

                <input type="text" id="taxiownsadd" placeholder="Street Address" required><br>

                <input type="text" id="taxiownsl2" placeholder="Address Line 2" required><br>
    
                <input type="text" id="taxiowncity" placeholder="City" required ><br>

        </form>
    </div>

    <div class="taxicreatecom">
       
        <input type="button" id="taxiowncreate" value="Create">

    </div>










<?php require APPROOT.'/views/inc/components/footer.php'; ?>