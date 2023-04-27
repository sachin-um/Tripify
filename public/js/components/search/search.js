// Select the input field and the table
const searchInput = document.getElementById("searchInput");
const table = document.getElementById("message-table");

// Listen for input changes
    searchInput.addEventListener('input', () => {
    // Get the search term
    const searchTerm = searchInput.value.toLowerCase();

    // Loop through the table rows starting from the second row
    for (let i = 1; i < table.rows.length; i++) {
        const row = table.rows[i];
        const cells = row.cells;
        let matchesSearch = false;

        // Loop through the cells in the row
        for (let j = 0; j < cells.length; j++) {
        const cell = cells[j];
        // Check if the cell content matches the search term
        if (cell.textContent.toLowerCase().includes(searchTerm)) {
            matchesSearch = true;
            break;
        }
        }

        // Show or hide the row based on whether it matches the search term
        if (matchesSearch) {
        row.style.display = '';
        } else {
        row.style.display = 'none';
        }
    }
    });