function confirmChanges() {
    const confirmation = confirm("Are you sure you want to commit these changes?");
    if (confirmation) {
        document.getElementById('applicationForm').submit();
    }
}
