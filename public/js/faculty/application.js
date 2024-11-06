function filterApplications() {
    const query = document.getElementById("searchBar").value.toLowerCase();

    // Loop through each table (Pending, Returned, Approved) and filter rows
    filterTable("pendingApplicationsTable", query);
    filterTable("returnedApplicationsTable", query);
    filterTable("approvedApplicationsTable", query);
}

// Function to filter each table based on the search query
function filterTable(tableId, query) {
    const table = document.getElementById(tableId);
    const rows = table.getElementsByTagName("tr");

    // Loop through each row and hide those that don't match the search query
    for (let i = 1; i < rows.length; i++) { // Start from 1 to skip the header row
        const row = rows[i];
        const cells = row.getElementsByTagName("td");
        let rowText = "";

        // Concatenate text content from all table cells to search through the whole row
        for (let j = 0; j < cells.length; j++) {
            rowText += cells[j].textContent.toLowerCase();
        }

        // If the row text includes the query, display it, otherwise hide it
        if (rowText.includes(query)) {
            row.style.display = "";
        } else {
            row.style.display = "none";
        }
    }
}