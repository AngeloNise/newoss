document.addEventListener("DOMContentLoaded", function() {
    // Existing functionality for dropdowns and alerts
    var dropdownToggles = document.querySelectorAll('.dropdown-toggle');

    dropdownToggles.forEach(function(toggle) {
        toggle.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default anchor behavior
            var targetId = this.getAttribute('data-target');
            var dropdown = document.getElementById(targetId);

            if (dropdown) {
                // Toggle the visibility of the dropdown
                if (dropdown.style.display === 'block') {
                    dropdown.style.display = 'none';
                } else {
                    // Close any open dropdowns
                    document.querySelectorAll('.dropdown').forEach(function(dd) {
                        dd.style.display = 'none';
                    });
                    dropdown.style.display = 'block';
                }
            }
        });
    });

    const alertBox = document.querySelector('.alert');
    if (alertBox) {
        setTimeout(() => {
            alertBox.style.opacity = '0';
            setTimeout(() => {
                alertBox.remove();
            }, 500);
        }, 3000);
    }
});
