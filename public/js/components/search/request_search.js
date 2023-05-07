// Select the input field and the table
const searchInput = document.getElementById("searchInput");
const div = document.getElementById("request-list");
const filterselect=document.getElementById("request-type");


    searchInput.addEventListener('input', () => {
    
        const searchTerm = searchInput.value.toLowerCase();

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
    });

    filterselect.addEventListener('change',()=>{
        const searchTerm = filterselect.value.toLowerCase();

        if (searchTerm=="all") {
            Array.from(div.children).forEach(item => {
                item.style.display = '';
            });   
            // for (let i = 1; i < div.children.length; i++) {
            //     const row = table.rows[i];
            //     row.style.display = '';
            // }
        }
        else{
            // for (let i = 1; i < table.rows.length; i++) {
            //     const row = table.rows[i];
            //     const cells = row.cells;
            //     let matchesSearch = false;
        
                
            //     for (let j = 0; j < cells.length; j++) {
            //     const cell = cells[j];
                
            //     if (cell.textContent.toLowerCase().includes(searchTerm)) {
            //         matchesSearch = true;
            //         break;
            //     }
            //     }
        
                
            //     if (matchesSearch) {
            //     row.style.display = '';
            //     } else {
            //     row.style.display = 'none';
            //     }
            // }
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