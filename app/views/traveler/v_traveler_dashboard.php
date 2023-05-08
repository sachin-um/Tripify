<?php
$_SESSION['user_id'];
$_SESSION['user_type'];


if (empty($_SESSION['user_id'])) {
    flash('reg_flash', 'You need to have logged in first...');
    redirect('Users/login');
}
else {
    ?>
<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>
<div class="app">
    <aside class="sidebar">

        <div class="menu-toggle">
            <div class="hamburger">
                <span></span>
            </div>
        </div>

        <nav class="menu">
            <a href="<?php echo URLROOT; ?>/Pages/profile" class="menu-item is-active">User Profile</a>
            <a href="<?php echo URLROOT; ?>/Bookings/HotelBookings/<?php echo $_SESSION['user_type'] ?>/<?php echo $_SESSION['user_id'] ?>" class="menu-item">Hotel Bookings</a>
            <a href="<?php echo URLROOT; ?>/Bookings/TaxiBookings/<?php echo $_SESSION['user_type'] ?>/<?php echo $_SESSION['user_id'] ?>" class="menu-item">Taxi Bookings</a>
            <a href="<?php echo URLROOT; ?>/Bookings/GuideBookings/<?php echo $_SESSION['user_type'] ?>/<?php echo $_SESSION['user_id'] ?>" class="menu-item">Guide Bookings</a>
            <a href="<?php echo URLROOT; ?>/Request/TaxiRequest" class="menu-item">Taxi Requests</a>
            <a href="<?php echo URLROOT; ?>/Request/GuideRequest" class="menu-item ">Guide Requests</a>
            <a href="<?php echo URLROOT; ?>/Trips/yourtrips/<?php echo $_SESSION['user_id'] ?>" class="menu-item">Your Trips</a>
            <a href="<?php echo URLROOT; ?>/Users/contactust" class="menu-item">Contact Admin</a>
            <a href="<?php echo URLROOT; ?>/Pages/home" class="menu-item">Exit Dashboard</a>
        </nav>
    </aside>

    <main class="right-side-content">
        <br>
        <br>
        <h2 style="text-align: left;">Profile Settings</h1>
        <hr>
        <br>
        <div class="first-container">
            <div class="profile-image" >
            
            <form style="margin-top: 58px" action="<?php echo URLROOT; ?>/Users/editTravelerDetails/<?php echo $data->UserID ?>" method="POST" enctype="multipart/form-data">
                <br>
                
                <div class="drag-area">
                    <div class="icon">
                        <img id="profile-img-placehoder" src="<?php echo URLROOT; ?>/img/profileImgs/<?php echo  $data->profileimg ?>" alt="picture">
                    </div>
                    <div><?php echo $data->Name;  ?></div>
                </div>
                <br>
                <div class="sub-sub-edit" style="margin-left: 25%;">
                    <div class="img-description">Drag & Drop to upload File</div>
                    <div class="img-upload">
                        <input type="file" name="profile-imgupload" id="profile-imgupload" style="display:none;">Browse File
                    </div>
                    <div class="img-validation">
                        <img src="<?php echo URLROOT; ?>/img/tick.png" alt="tick" width="25px" height="20px">
                        <span style="vertical-align:top;" class="img-select">Select a Profile picture</span>
                    </div>    
                </div>
                
            </div>
            

            <div class="profile-description">
            
            <br>
                <div class="sub-description">
                    <div class="sub-sub">
                        <h3>Name : </h3>
                    </div>
                    
                    <div class="info">
                        <h3><?php echo $data->Name;  ?></h3>

                    </div>

                    <div class="sub-sub-edit">
                        <input type="text" name="name" id="name" placeholder="<?php echo $data->Name; ?>" value="<?php echo $data->Name; ?>">

                    </div>
                            
                </div>


                <br> 
                <div class="sub-description">
                    <div class="sub-sub">
                        <h3>Email:</h3>
                    </div>
                 
                    <div class="sub-sub">
                        <h3><?php echo $data->Email;  ?></h3>

                    </div>
                    
                </div>
                <br> 
                <div class="sub-description">
                    <div class="sub-sub">
                        <h3>Verificaion Status: </h3>
                    </div>
                        
                    <div class="sub-sub">
                        <?php if ($data->verification_status ==1) {
                            ?><h3>Verified</h3><?php
                        }else {
                            ?><h3>Not Verified </h3><?php
                        } ?>
                    </div>
                        
                </div>
                <br> 
                <div class="sub-description">
                    <div class="sub-sub">
                        <h3>Contact Number: </h3>

                    </div>
                        
                    <div class="info">
                        <h3><?php echo $data->ContactNo ?></h3>
                    </div>

                    <div class="sub-sub-edit">
                        <input type="text" name="contact-number" id="contact-number" placeholder="<?php echo $data->ContactNo ?>" value="<?php echo $data->ContactNo ?>">

                    </div>
                        
                </div>
                <br> 
                <div class="sub-description">
                    <div class="sub-sub">
                        <h3>Country: </h3>

                    </div>
                        
                    <div class="info">
                    <h3><?php echo $data->travelerDetails->country ?></h3>
                    </div>

                    <div class="sub-sub-edit">
                            <select id="country" name="country">
                                <option value="<?php echo $data->travelerDetails->country ?>" selected><?php echo $data->travelerDetails->country ?></option>
                                <option value="Afghanistan">Afghanistan</option>
                                <option value="Aland Islands">Åland Islands</option>
                                <option value="Albania">Albania</option>
                                <option value="Algeria">Algeria</option>
                                <option value="American Samoa">American Samoa</option>
                                <option value="Andorra">Andorra</option>
                                <option value="Angola">Angola</option>
                                <option value="Anguilla">Anguilla</option>
                                <option value="Antarctica">Antarctica</option>
                                <option value="Antigua and Barbuda">Antigua & Barbuda</option>
                                <option value="Argentina">Argentina</option>
                                <option value="Armenia">Armenia</option>
                                <option value="Aruba">Aruba</option>
                                <option value="Australia">Australia</option>
                                <option value="Austria">Austria</option>
                                <option value="Azerbaijan">Azerbaijan</option>
                                <option value="Bahamas">Bahamas</option>
                                <option value="Bahrain">Bahrain</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="Barbados">Barbados</option>
                                <option value="Belarus">Belarus</option>
                                <option value="Belgium">Belgium</option>
                                <option value="Belize">Belize</option>
                                <option value="Benin">Benin</option>
                                <option value="Bermuda">Bermuda</option>
                                <option value="Bhutan">Bhutan</option>
                                <option value="Bolivia">Bolivia</option>
                                <option value="Bonaire, Sint Eustatius and Saba">Caribbean Netherlands</option>
                                <option value="Bosnia and Herzegovina">Bosnia & Herzegovina</option>
                                <option value="Botswana">Botswana</option>
                                <option value="Bouvet Island">Bouvet Island</option>
                                <option value="Brazil">Brazil</option>
                                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                <option value="Brunei Darussalam">Brunei</option>
                                <option value="Bulgaria">Bulgaria</option>
                                <option value="Burkina Faso">Burkina Faso</option>
                                <option value="Burundi">Burundi</option>
                                <option value="Cambodia">Cambodia</option>
                                <option value="Cameroon">Cameroon</option>
                                <option value="Canada">Canada</option>
                                <option value="Cape Verde">Cape Verde</option>
                                <option value="Cayman Islands">Cayman Islands</option>
                                <option value="Central African Republic">Central African Republic</option>
                                <option value="Chad">Chad</option>
                                <option value="Chile">Chile</option>
                                <option value="China">China</option>
                                <option value="Christmas Island">Christmas Island</option>
                                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                <option value="Colombia">Colombia</option>
                                <option value="Comoros">Comoros</option>
                                <option value="Congo">Congo - Brazzaville</option>
                                <option value="Congo, Democratic Republic of the Congo">Congo - Kinshasa</option>
                                <option value="Cook Islands">Cook Islands</option>
                                <option value="Costa Rica">Costa Rica</option>
                                <option value="Cote D'Ivoire">Côte d’Ivoire</option>
                                <option value="Croatia">Croatia</option>
                                <option value="Cuba">Cuba</option>
                                <option value="Curacao">Curaçao</option>
                                <option value="Cyprus">Cyprus</option>
                                <option value="Czech Republic">Czechia</option>
                                <option value="Denmark">Denmark</option>
                                <option value="Djibouti">Djibouti</option>
                                <option value="Dominica">Dominica</option>
                                <option value="Dominican Republic">Dominican Republic</option>
                                <option value="Ecuador">Ecuador</option>
                                <option value="Egypt">Egypt</option>
                                <option value="El Salvador">El Salvador</option>
                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                <option value="Eritrea">Eritrea</option>
                                <option value="Estonia">Estonia</option>
                                <option value="Ethiopia">Ethiopia</option>
                                <option value="Falkland Islands (Malvinas)">Falkland Islands (Islas Malvinas)</option>
                                <option value="Faroe Islands">Faroe Islands</option>
                                <option value="Fiji">Fiji</option>
                                <option value="Finland">Finland</option>
                                <option value="France">France</option>
                                <option value="French Guiana">French Guiana</option>
                                <option value="French Polynesia">French Polynesia</option>
                                <option value="French Southern Territories">French Southern Territories</option>
                                <option value="Gabon">Gabon</option>
                                <option value="Gambia">Gambia</option>
                                <option value="Georgia">Georgia</option>
                                <option value="Germany">Germany</option>
                                <option value="Ghana">Ghana</option>
                                <option value="Gibraltar">Gibraltar</option>
                                <option value="Greece">Greece</option>
                                <option value="Greenland">Greenland</option>
                                <option value="Grenada">Grenada</option>
                                <option value="Guadeloupe">Guadeloupe</option>
                                <option value="Guam">Guam</option>
                                <option value="Guatemala">Guatemala</option>
                                <option value="Guernsey">Guernsey</option>
                                <option value="Guinea">Guinea</option>
                                <option value="Guinea-Bissau">Guinea-Bissau</option>
                                <option value="Guyana">Guyana</option>
                                <option value="Haiti">Haiti</option>
                                <option value="Heard Island and Mcdonald Islands">Heard & McDonald Islands</option>
                                <option value="Holy See (Vatican City State)">Vatican City</option>
                                <option value="Honduras">Honduras</option>
                                <option value="Hong Kong">Hong Kong</option>
                                <option value="Hungary">Hungary</option>
                                <option value="Iceland">Iceland</option>
                                <option value="India">India</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="Iran, Islamic Republic of">Iran</option>
                                <option value="Iraq">Iraq</option>
                                <option value="Ireland">Ireland</option>
                                <option value="Isle of Man">Isle of Man</option>
                                <option value="Israel">Israel</option>
                                <option value="Italy">Italy</option>
                                <option value="Jamaica">Jamaica</option>
                                <option value="Japan">Japan</option>
                                <option value="Jersey">Jersey</option>
                                <option value="Jordan">Jordan</option>
                                <option value="Kazakhstan">Kazakhstan</option>
                                <option value="Kenya">Kenya</option>
                                <option value="Kiribati">Kiribati</option>
                                <option value="Korea, Democratic People's Republic of">North Korea</option>
                                <option value="Korea, Republic of">South Korea</option>
                                <option value="Kosovo">Kosovo</option>
                                <option value="Kuwait">Kuwait</option>
                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                <option value="Lao People's Democratic Republic">Laos</option>
                                <option value="Latvia">Latvia</option>
                                <option value="Lebanon">Lebanon</option>
                                <option value="Lesotho">Lesotho</option>
                                <option value="Liberia">Liberia</option>
                                <option value="Libyan Arab Jamahiriya">Libya</option>
                                <option value="Liechtenstein">Liechtenstein</option>
                                <option value="Lithuania">Lithuania</option>
                                <option value="Luxembourg">Luxembourg</option>
                                <option value="Macao">Macao</option>
                                <option value="Macedonia, the Former Yugoslav Republic of">North Macedonia</option>
                                <option value="Madagascar">Madagascar</option>
                                <option value="Malawi">Malawi</option>
                                <option value="Malaysia">Malaysia</option>
                                <option value="Maldives">Maldives</option>
                                <option value="Mali">Mali</option>
                                <option value="Malta">Malta</option>
                                <option value="Marshall Islands">Marshall Islands</option>
                                <option value="Martinique">Martinique</option>
                                <option value="Mauritania">Mauritania</option>
                                <option value="Mauritius">Mauritius</option>
                                <option value="Mayotte">Mayotte</option>
                                <option value="Mexico">Mexico</option>
                                <option value="Micronesia, Federated States of">Micronesia</option>
                                <option value="Moldova, Republic of">Moldova</option>
                                <option value="Monaco">Monaco</option>
                                <option value="Mongolia">Mongolia</option>
                                <option value="Montenegro">Montenegro</option>
                                <option value="Montserrat">Montserrat</option>
                                <option value="Morocco">Morocco</option>
                                <option value="Mozambique">Mozambique</option>
                                <option value="Myanmar">Myanmar (Burma)</option>
                                <option value="Namibia">Namibia</option>
                                <option value="Nauru">Nauru</option>
                                <option value="Nepal">Nepal</option>
                                <option value="Netherlands">Netherlands</option>
                                <option value="Netherlands Antilles">Curaçao</option>
                                <option value="New Caledonia">New Caledonia</option>
                                <option value="New Zealand">New Zealand</option>
                                <option value="Nicaragua">Nicaragua</option>
                                <option value="Niger">Niger</option>
                                <option value="Nigeria">Nigeria</option>
                                <option value="Niue">Niue</option>
                                <option value="Norfolk Island">Norfolk Island</option>
                                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                <option value="Norway">Norway</option>
                                <option value="Oman">Oman</option>
                                <option value="Pakistan">Pakistan</option>
                                <option value="Palau">Palau</option>
                                <option value="Palestinian Territory, Occupied">Palestine</option>
                                <option value="Panama">Panama</option>
                                <option value="Papua New Guinea">Papua New Guinea</option>
                                <option value="Paraguay">Paraguay</option>
                                <option value="Peru">Peru</option>
                                <option value="Philippines">Philippines</option>
                                <option value="Pitcairn">Pitcairn Islands</option>
                                <option value="Poland">Poland</option>
                                <option value="Portugal">Portugal</option>
                                <option value="Puerto Rico">Puerto Rico</option>
                                <option value="Qatar">Qatar</option>
                                <option value="Reunion">Réunion</option>
                                <option value="Romania">Romania</option>
                                <option value="Russian Federation">Russia</option>
                                <option value="Rwanda">Rwanda</option>
                                <option value="Saint Barthelemy">St. Barthélemy</option>
                                <option value="Saint Helena">St. Helena</option>
                                <option value="Saint Kitts and Nevis">St. Kitts & Nevis</option>
                                <option value="Saint Lucia">St. Lucia</option>
                                <option value="Saint Martin">St. Martin</option>
                                <option value="Saint Pierre and Miquelon">St. Pierre & Miquelon</option>
                                <option value="Saint Vincent and the Grenadines">St. Vincent & Grenadines</option>
                                <option value="Samoa">Samoa</option>
                                <option value="San Marino">San Marino</option>
                                <option value="Sao Tome and Principe">São Tomé & Príncipe</option>
                                <option value="Saudi Arabia">Saudi Arabia</option>
                                <option value="Senegal">Senegal</option>
                                <option value="Serbia">Serbia</option>
                                <option value="Serbia and Montenegro">Serbia</option>
                                <option value="Seychelles">Seychelles</option>
                                <option value="Sierra Leone">Sierra Leone</option>
                                <option value="Singapore">Singapore</option>
                                <option value="Sint Maarten">Sint Maarten</option>
                                <option value="Slovakia">Slovakia</option>
                                <option value="Slovenia">Slovenia</option>
                                <option value="Solomon Islands">Solomon Islands</option>
                                <option value="Somalia">Somalia</option>
                                <option value="South Africa">South Africa</option>
                                <option value="South Georgia and the South Sandwich Islands">South Georgia & South Sandwich Islands</option>
                                <option value="South Sudan">South Sudan</option>
                                <option value="Spain">Spain</option>
                                <option value="Sri Lanka">Sri Lanka</option>
                                <option value="Sudan">Sudan</option>
                                <option value="Suriname">Suriname</option>
                                <option value="Svalbard and Jan Mayen">Svalbard & Jan Mayen</option>
                                <option value="Swaziland">Eswatini</option>
                                <option value="Sweden">Sweden</option>
                                <option value="Switzerland">Switzerland</option>
                                <option value="Syrian Arab Republic">Syria</option>
                                <option value="Taiwan, Province of China">Taiwan</option>
                                <option value="Tajikistan">Tajikistan</option>
                                <option value="Tanzania, United Republic of">Tanzania</option>
                                <option value="Thailand">Thailand</option>
                                <option value="Timor-Leste">Timor-Leste</option>
                                <option value="Togo">Togo</option>
                                <option value="Tokelau">Tokelau</option>
                                <option value="Tonga">Tonga</option>
                                <option value="Trinidad and Tobago">Trinidad & Tobago</option>
                                <option value="Tunisia">Tunisia</option>
                                <option value="Turkey">Turkey</option>
                                <option value="Turkmenistan">Turkmenistan</option>
                                <option value="Turks and Caicos Islands">Turks & Caicos Islands</option>
                                <option value="Tuvalu">Tuvalu</option>
                                <option value="Uganda">Uganda</option>
                                <option value="Ukraine">Ukraine</option>
                                <option value="United Arab Emirates">United Arab Emirates</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="United States">United States</option>
                                <option value="United States Minor Outlying Islands">U.S. Outlying Islands</option>
                                <option value="Uruguay">Uruguay</option>
                                <option value="Uzbekistan">Uzbekistan</option>
                                <option value="Vanuatu">Vanuatu</option>
                                <option value="Venezuela">Venezuela</option>
                                <option value="Viet Nam">Vietnam</option>
                                <option value="Virgin Islands, British">British Virgin Islands</option>
                                <option value="Virgin Islands, U.s.">U.S. Virgin Islands</option>
                                <option value="Wallis and Futuna">Wallis & Futuna</option>
                                <option value="Western Sahara">Western Sahara</option>
                                <option value="Yemen">Yemen</option>
                                <option value="Zambia">Zambia</option>
                                <option value="Zimbabwe">Zimbabwe</option>
                            </select>

                    </div>
                        
                </div>
                <?php 
                    if ($data->UserID== $_SESSION['user_id']) {
                        ?>
                            <div style="display: flex; justify-content: center; padding: 20px">
                                <button style="margin-right: 10px" class="profile-btn-edit" id="edit-btn">
                                    <i class="fa-solid fa-pen-to-square" style="margin-right: 10px;"></i>
                                    Edit Info
                                </button>
                                  
                                <button style="margin-right: 10px" class="profile-btn-cancel" id="cancel-btn">
                                    <i class="fa-solid fa-xmark" style="margin-right: 10px;"></i>
                                    Discard
                                </button>
                                <button style="margin-right: 10px" class="profile-btn-save" id="save-btn" type="submit">
                                    <i class="fa-solid fa-check" style="margin-right: 10px;"></i>
                                    Save Changes
                                </button>      
                            </div>
                        <?php
                    }
                    else {
                        ?>
                            <div style="display: flex; justify-content: space-around;">
                                <button id="chatopenbtn" class="chat-btn" type="button" onclick="showChat()">Chat</button>    
                            </div>
                        <?php
                    }
                ?>   
            </div>
            </form>
            <?php 
                    if ($data->UserID!= $_SESSION['user_id']) {
                         require APPROOT.'/views/inc/components/chat/chatarea.php'; 
                    }  
            ?>
            
        </div>
        <?php flash('img_flash'); ?>
    </main>
    
 </div>
 
 <script type="text/JavaScript" src="<?php echo URLROOT;?>/js/components/imageUpload/imageUpload.js"></script>
 <script type="text/JavaScript" src="<?php echo URLROOT;?>/js/components/popups.js"></script>
 

 <script>
    var editbtn=document.getElementById("edit-btn");
    var cancelbtn=document.getElementById("cancel-btn");
    var savebtn=document.getElementById("save-btn");
    var info = document.getElementsByClassName("info");
    var infoEdit = document.getElementsByClassName("sub-sub-edit");
    function toggeleEdit() {
        // editbtn.onclick=function() {window.location.reload();}; 
        Array.from(info).forEach(function(element) {
            if (element.style.display === "none") {
                element.style.display = "block";
            } else {
                element.style.display = "none";
            }
        });
        
        
        Array.from(infoEdit).forEach(function(element) {
            element.style.display = "block";
        });
        editbtn.style.display="none";
        cancelbtn.style.display="block";
        savebtn.style.display="block";
        event.preventDefault();
    }
    
    function toggeleReload() {
        window.location.reload();; 
        event.preventDefault();
    }

    editbtn.addEventListener('click', toggeleEdit);
    cancelbtn.addEventListener('click', toggeleReload);
 </script>

 <?php
}
?>