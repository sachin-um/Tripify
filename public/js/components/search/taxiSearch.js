$(document).ready(function() {
    
    // Add event listener to input element
    // if ($('#gobackBut').length) {
    //     $('#gobackBut').on('click', function() {
    //         // $('#goback').hide();
    //         // document.getElementById("hide-div").style.display = "block";
      
    //       });
    // }
   
    // if ($('input').length) {
    //     $('input').on('click change', function() {
    //         // Hide the div with id 'hide-div'
    //         $('#hide-div').hide();
    //         // if ($('#gobackBut').length) {
    //         //     document.getElementById("goback").style.display = "block";
    //         // }
      
    //       });
    // }
    

    // $('select').on('click change', function() {
    //     // Hide the div with id 'hide-div'
    //     $('#hide-div').hide();
    //     // if ($('#gobackBut').length) {
    //     //     document.getElementById("goback").style.display = "block";
    //     // }
        

    //   });
  });
  



const div = document.getElementById("vehicle-list");
const filterselect=document.getElementById("vehicle-type");
const filterselectdis=document.getElementById("select-district");

// Add an event listener to the search input

// Get the search input element
if ($('input').length) {
    const searchInput = document.getElementById('searchInput');
    searchInput.addEventListener('input', function() {
        // Get the search term
        const searchTerm = searchInput.value.toLowerCase();
      
        // Get all the taxi view containers
        const taxiViewContainers = document.querySelectorAll('.taxi_view_v_dash');
      
        // Loop through each container
        taxiViewContainers.forEach(function(container) {
          // Get the owner name and company name elements in the container
          const ownerNameElement = container.querySelector('.owner label:first-child');
          const companyNameElement = container.querySelector('.owner label:first-child');
      
          // Get the owner name and company name values
          const ownerName = ownerNameElement.textContent.toLowerCase();
          const companyName = companyNameElement.textContent.toLowerCase();
      
          // Check if the search term matches the owner name or company name
          if (ownerName.includes(searchTerm) || companyName.includes(searchTerm)) {
            // Show the container
            container.style.display = 'block';
          } else {
            // Hide the container
            container.style.display = 'none';
          }
        });
      });
}

filterselect.addEventListener('change',()=>{
    const searchTerm = filterselect.value.toLowerCase();

    if (searchTerm=="all") {
        Array.from(div.children).forEach(item => {
            item.style.display = '';
        });   
        
    }
    else{
        
        Array.from(div.children).forEach(item => {
            let matchesSearch = false;

            Array.from(item.children).forEach(child => {
            if (child.textContent.toLowerCase().includes(searchTerm)) {
                matchesSearch = true;
            }
            });
            if (matchesSearch) {
            item.style.display = '';
            } else {
            item.style.display = 'none';
            }
        });
    }
    
});

filterselectdis.addEventListener('change',()=>{
    const searchTerm = filterselectdis.value.toLowerCase();

    if (searchTerm=="all") {
        Array.from(div.children).forEach(item => {
            item.style.display = '';
        });   
        
    }
    else{
        
        Array.from(div.children).forEach(item => {
            let matchesSearch = false;

            Array.from(item.children).forEach(child => {
            if (child.textContent.toLowerCase().includes(searchTerm)) {
                matchesSearch = true;
            }
            });
            if (matchesSearch) {
            item.style.display = '';
            } else {
            item.style.display = 'none';
            }
        });
    }
    
});