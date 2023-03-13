function showProfile(button,type,baseurl) {
    // get the table row
          const row = button.parentNode.parentNode;
          // get the data from the table row
          const userid = row.cells[0].textContent;
          
          
          // popupContent.innerHTML = content;
          const popup = document.getElementById("popup");
          const popupContent = document.getElementById("popup-content");
          $.ajax({
              url: baseurl+"/Users/getuser/"+type+"/"+userid,
              method: 'GET',
              dataType: 'json',
              success: function(data) {
                console.log(data.languages);
                if (type=="Guide") {
                    console.log(data.bio);
                    let languages='';
                    $.each(data.languages, function(index, item) {
                        languages+=item.language
                        languages+=' '
                    })+
                    $('#popup-content').append('<p>Review '+type+' Details</p>');
                    $('#popup-content').append(`
                    <div class="form">
                    <div >
                        <form action="<?php echo URLROOT; ?>/Guides/register" method="POST">
                            <label class="abc"> Name</label><br>
                            <input type="text" id="name" name="name" placeholder="" value="`+row.cells[1].textContent+`" disabled>
                            <br>
                            
                            <label class="abc"> Phone Number</label><br>
                            <input type="text" id="number" name="number" placeholder="" value="`+row.cells[2].textContent+`" disabled>
                            <br>
                            <label class="abc"> area you choose to guide</label><br>
                            <input type="text" id="area" name="area" placeholder="" value="`+row.cells[5].textContent+`" disabled>
                            
                            <br>
                            <label class="abc"> Price per hour</label><br>
                            <input type="text" id="price" name="price" placeholder="" value="`+row.cells[6].textContent+`" disabled>
                            
                            <br>
                            
            
                            <label class="abc"> NIC</label><br>
                            <input type="text" id="nic" name="nic" placeholder="" value="`+row.cells[4].textContent+`" disabled>
                            
                            <br>
                            <!-- <label class="abc"> National Tourist Licence</label><br>
                            <input type="text" id="NTL" name="NTL" placeholder="" value="<?php echo $data['NTL']; ?>">
                            <span class="invalid"><?php echo $data['NTL_err']; ?></span> -->
            
                            <label class="abc"> Languages that you know </label><br>
                            <input type="text" id="nic" name="nic" placeholder="" value="`+languages+`" disabled>
                            <br>
                            <label class="abc"> Bio </label><br>
                            <textarea class="guide-reg-textarea" name="bio" id="bio" cols="52" rows="10" placeholder="`+data.bio+`" value="" disabled></textarea>    
                          </form>
                          
                    </div>
            </div>
            <br>
            <button id="sign-up-btn-1" type="submit" style="margin:auto;" onclick="document.getElementById('popup').style.display = 'none';">Close</button> 
            `);  
                }
                else if (type=="Hotel") {
                    $('#popup-content').append('<p>Review '+type+' Details</p>');
                    $('#popup-content').append(`
                    <div class="form">
                    <div >
                        <form action="<?php echo URLROOT; ?>/Guides/register" method="POST">
                            <label class="abc"> Name</label><br>
                            <input type="text" id="name" name="name" placeholder="   Eg: Saman Kumara" value="<?php echo $data['name']; ?>">
                            <span class="invalid"><?php echo $data['name_err']; ?></span>
                            <br>
                            
                            <label class="abc"> Phone Number</label><br>
                            <input type="text" id="number" name="number" placeholder="Eg: 0761234567" value="<?php echo $data['phone_number']; ?>">
                            <span class="invalid"><?php echo $data['number_err']; ?></span>
                            <br>
                            <label class="abc"> area you choose to guide</label><br>
                            <input type="text" id="area" name="area" placeholder="Eg: Anuradhapura" value="<?php echo $data['area']; ?>">
                            <span class="invalid"><?php echo $data['area_err']; ?></span>
                            <br>
                            <label class="abc"> Price per hour</label><br>
                            <input type="text" id="price" name="price" placeholder="Eg: 5000.00" value="<?php echo $data['price_per_hour']; ?>">
                            <span class="invalid"><?php echo $data['price_err']; ?></span>
                            <br>
                            <label class="abc"> More Information</label><br>
            
                            <label class="abc"> NIC</label><br>
                            <input type="text" id="nic" name="nic" placeholder="Eg: 981033017V" value="<?php echo $data['nic']; ?>">
                            <span class="invalid"><?php echo $data['nic_err']; ?></span>
                            <br>
                            <!-- <label class="abc"> National Tourist Licence</label><br>
                            <input type="text" id="NTL" name="NTL" placeholder="" value="<?php echo $data['NTL']; ?>">
                            <span class="invalid"><?php echo $data['NTL_err']; ?></span> -->
            
                            <label class="abc"> Languages that you know </label><br>
                            <select class="guide-reg-select" multiple="mutiple" name="languages[]">
                                <option value='sinhala'>Sinhala</option>
                                <option value='english'>English</option>
                                <option value='tamil'>Tamil</option>
                                <option value='chinese'>Chinese</option>
                                <option value='japanese'>Japanese</option>
                                <option value='russian'>Russian</option>
                                <option value='french'>French</option>
                                <option value='artabic'>Arabic</option>
                                <option value='spanish'>Spanish</option>
                            </select>
                            <span class="invalid"><?php echo $data['languages_err']; ?></span>
                            <br>
                            <label class="abc"> Bio </label><br>
                            <textarea class="guide-reg-textarea" name="bio" id="bio" cols="52" rows="10" placeholder="Tell us about you"></textarea>    
                            <button id="sign-up-btn-1" type="submit" >Register as Guide</button>
                            <input type="hidden" id="id" name="id" value="<?php echo $_SESSION['user_id']; ?>">
                          </form> 
                    </div>
            </div>`);
                }
                else if (type=="Taxi") {
                    $('#popup-content').append('<p>Review '+type+' Details</p>');
                    $('#popup-content').append(`
                    <div class="form">
                    <div >
                        <form action="<?php echo URLROOT; ?>/Guides/register" method="POST">
                            <label class="abc"> Name</label><br>
                            <input type="text" id="name" name="name" placeholder="" value="<?php echo $data['name']; ?>">
                            
                            <br>
                            
                            <label class="abc"> Phone Number</label><br>
                            <input type="text" id="number" name="number" placeholder="Eg: 0761234567" value="<?php echo $data['phone_number']; ?>">
                            <span class="invalid"><?php echo $data['number_err']; ?></span>
                            <br>
                            <label class="abc"> area you choose to guide</label><br>
                            <input type="text" id="area" name="area" placeholder="Eg: Anuradhapura" value="<?php echo $data['area']; ?>">
                            <span class="invalid"><?php echo $data['area_err']; ?></span>
                            <br>
                            <label class="abc"> Price per hour</label><br>
                            <input type="text" id="price" name="price" placeholder="Eg: 5000.00" value="<?php echo $data['price_per_hour']; ?>">
                            <span class="invalid"><?php echo $data['price_err']; ?></span>
                            <br>
                            <label class="abc"> More Information</label><br>
            
                            <label class="abc"> NIC</label><br>
                            <input type="text" id="nic" name="nic" placeholder="Eg: 981033017V" value="<?php echo $data['nic']; ?>">
                            <span class="invalid"><?php echo $data['nic_err']; ?></span>
                            <br>
                            <!-- <label class="abc"> National Tourist Licence</label><br>
                            <input type="text" id="NTL" name="NTL" placeholder="" value="<?php echo $data['NTL']; ?>">
                            <span class="invalid"><?php echo $data['NTL_err']; ?></span> -->
            
                            <label class="abc"> Languages that you know </label><br>
                            <select class="guide-reg-select" multiple="mutiple" name="languages[]">
                                <option value='sinhala'>Sinhala</option>
                                <option value='english'>English</option>
                                <option value='tamil'>Tamil</option>
                                <option value='chinese'>Chinese</option>
                                <option value='japanese'>Japanese</option>
                                <option value='russian'>Russian</option>
                                <option value='french'>French</option>
                                <option value='artabic'>Arabic</option>
                                <option value='spanish'>Spanish</option>
                            </select>
                            <span class="invalid"><?php echo $data['languages_err']; ?></span>
                            <br>
                            <label class="abc"> Bio </label><br>
                            <textarea class="guide-reg-textarea" name="bio" id="bio" cols="52" rows="10" placeholder="Tell us about you"></textarea>    
                            <button id="sign-up-btn-1" type="submit" >Register as Guide</button>
                            <input type="hidden" id="id" name="id" value="<?php echo $_SESSION['user_id']; ?>">
                          </form> 
                    </div>
            </div>`);
                }
                              
                // display the popup
                
                popup.style.display = "block";
              },
              error: function() {
                alert("Error fetching data from server.");
              }
              
          });
  
          document.addEventListener('click', function(event) {
          // check if the click event target is outside of the popup window
          if (!popupContent.contains(event.target)) {
              // remove the popup window from the DOM
              popup.style.display = "none";
              $('#popup-content').empty();
          }
          },2000);

          
}

function closepop() {
    const popup = document.getElementById("popup");
    popup.style.display = "none";
}
          
  