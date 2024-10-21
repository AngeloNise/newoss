function filterApplications() {
    const searchInput = document.getElementById('searchBar').value.toLowerCase();
    const table = document.getElementById('applicationsTable');
    const rows = table.getElementsByTagName('tr');

    for (let i = 1; i < rows.length; i++) { // Start at 1 to skip the header row
        const cells = rows[i].getElementsByTagName('td');
        let rowVisible = false;

        for (let j = 0; j < cells.length; j++) {
            const cell = cells[j];
            if (cell) {
                const cellText = cell.textContent || cell.innerText;
                if (cellText.toLowerCase().indexOf(searchInput) > -1) {
                    rowVisible = true; // If a match is found, set rowVisible to true
                    break; // No need to check other cells in this row
                }
            }
        }

        // Show or hide the row based on search input
        rows[i].style.display = rowVisible ? '' : 'none';
    }
}
