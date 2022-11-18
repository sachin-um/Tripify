<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?> 


<div class="carrentalsearchtaxi">
        <h1>Rent any vehicle for your trip!</h1>
        <form class="carrentaltaxisearchform">
            <section class="taxiownlocation">
                <input type="text" id="carrentalt_pick_l" placeholder="Pick UP"  required>
                <input type="text" id="carrentalt_drop_l" placeholder="Drop Off" required>    

            </section>

            <section class="taxiowndatetime">
                <input type="date" id="carrentalt_pick_d" placeholder="Pick Up Date" required>
                <input type="time" id="carrentalt_pick_t" placeholder="Pick Up Time" required>

                <input type="date" id="carrentalt_drop_d" placeholder="Drop Off Date" required>
                <input type="time" id="carrentalt_drop_t" placeholder="Drop Off Time" required>

            </section>
           

        </form>
        
        <input type="submit" id="taxiowncarrentalsearch" Value="Search">

    </div>

    <hr>



    <div class="carrentalsearchresult">

        <div class="carrentaldriverinfo">
            <img src="/Pics/driver_profile.png" id="carrentaldimg">
            <article class="">
                <p id="carrentaldrivername">Sunil Shantha</p>
                <p id="carrentaladd">Colombo, Western Province</p>
                <p id="carrentalrating">Rating - </p> <p id="carrentalrate">4.5 </p><p></p>
                <p id="carrentalregno">Registration Number -  </p> <p id="carrentalreg">***** </p>
            </article>
        </div>
        
        <div class="carrentaldriverinfo">
            <img src="/Pics/driver_profile.png" id="carrentaldimg">
            <article class="">
                <p id="carrentaldrivername">Sunil Shantha</p>
                <p id="carrentaladd">Colombo, Western Province</p>
                <p id="carrentalrating">Rating - </p> <p id="carrentalrate">4.5 </p><p></p>
                <p id="carrentalregno">Registration Number -  </p> <p id="carrentalreg">***** </p>
            </article>
        </div>

        <div class="carrentaldriverinfo">
            <img src="/Pics/driver_profile.png" id="carrentaldimg">
            <article class="">
                <p id="carrentaldrivername">Sunil Shantha</p>
                <p id="carrentaladd">Colombo, Western Province</p>
                <p id="carrentalrating">Rating - </p> <p id="carrentalrate">4.5 </p><p></p>
                <p id="carrentalregno">Registration Number -  </p> <p id="carrentalreg">***** </p>
            </article>
        </div>

    </div>

    <div class="carrentalsearchresult">

        <div class="carrentaldriverinfo">
            <img src="/Pics/driver_profile.png" id="carrentaldimg">
            <article class="">
                <p id="carrentaldrivername">Sunil Shantha</p>
                <p id="carrentaladd">Colombo, Western Province</p>
                <p id="carrentalrating">Rating - </p> <p id="carrentalrate">4.5 </p><p></p>
                <p id="carrentalregno">Registration Number -  </p> <p id="carrentalreg">***** </p>
            </article>
        </div>
        
        <div class="carrentaldriverinfo">
            <img src="/Pics/driver_profile.png" id="carrentaldimg">
            <article class="">
                <p id="carrentaldrivername">Sunil Shantha</p>
                <p id="carrentaladd">Colombo, Western Province</p>
                <p id="carrentalrating">Rating - </p> <p id="carrentalrate">4.5 </p><p></p>
                <p id="carrentalregno">Registration Number -  </p> <p id="carrentalreg">***** </p>
            </article>
        </div>

        <div class="carrentaldriverinfo">
            <img src="/Pics/driver_profile.png" id="carrentaldimg">
            <article class="">
                <p id="carrentaldrivername">Sunil Shantha</p>
                <p id="carrentaladd">Colombo, Western Province</p>
                <p id="carrentalrating">Rating - </p> <p id="carrentalrate">4.5 </p><p></p>
                <p id="carrentalregno">Registration Number -  </p> <p id="carrentalreg">***** </p>
            </article>
        </div>

    </div>

    <hr>


    <div class="carrentaltaxisignup">

        <p id="carrentaltaxcom"> Want to register your taxi company at Tripify? Register today and find a bigger market!</p>
        <input type="button" id="carrentalregistercom" value="Register">


    </div>

<?php require APPROOT.'/views/inc/components/footer.php'; ?>