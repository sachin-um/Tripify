// Select the input field and the table
const searchInput = document.getElementById("searchInput");
const table = document.getElementById("message-table");
const filterselect=document.getElementById("account-type");


    searchInput.addEventListener('input', () => {
    
    const searchTerm = searchInput.value.toLowerCase();

    
    for (let i = 1; i < table.rows.length; i++) {
        const row = table.rows[i];
        const cells = row.cells;
        let matchesSearch = false;

        
        for (let j = 0; j < cells.length; j++) {
        const cell = cells[j];
        
        if (cell.textContent.toLowerCase().includes(searchTerm)) {
            matchesSearch = true;
            break;
        }
        }

        
        if (matchesSearch) {
        row.style.display = '';
        } else {
        row.style.display = 'none';
        }
    }
    });

    filterselect.addEventListener('change',()=>{
        const searchTerm = filterselect.value.toLowerCase();

    
        for (let i = 1; i < table.rows.length; i++) {
            const row = table.rows[i];
            const cells = row.cells;
            let matchesSearch = false;
    
            
            for (let j = 0; j < cells.length; j++) {
            const cell = cells[j];
            
            if (cell.textContent.toLowerCase().includes(searchTerm)) {
                matchesSearch = true;
                break;
            }
            }
    
            
            if (matchesSearch) {
            row.style.display = '';
            } else {
            row.style.display = 'none';
            }
        }
    });