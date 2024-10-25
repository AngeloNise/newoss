document.addEventListener('DOMContentLoaded', function() {
    const addSuggestionButton = document.getElementById('add-suggestion');
    const removeSuggestionButton = document.getElementById('remove-suggestion');
    const suggestionsContainer = document.getElementById('suggestions');

    const addSuggestionForm = () => {
        const newFormGroup = document.createElement('div');
        newFormGroup.classList.add('split', 'suggestion-group'); // Add necessary classes for styling

        newFormGroup.innerHTML = `
            <div class="form-group">
                <select name="section[]" class="form-control" required>
                    <option value="" disabled selected>Select a section</option>
                    <option value="Project Information">Project Information</option>
                    <option value="Items to be Sold">Items to be Sold</option>
                    <option value="Other Income">Other Income</option>
                    <option value="Expenditures">Expenditures</option>
                    <option value="Other Information">Other Information</option>
                </select>
            </div>
            <div class="fra-group">
                <input type="text" name="comment[]" placeholder="Suggestion" class="form-control" required />
            </div>
        `;

        suggestionsContainer.appendChild(newFormGroup); // Append the new form group to the container
    };

    // Event listener for adding a new suggestion
    if (addSuggestionButton) {
        addSuggestionButton.addEventListener('click', function() {
            addSuggestionForm(); // Call to add new suggestion form
            addSuggestionButton.scrollIntoView({ behavior: "smooth", block: "end" }); // Scroll button into view
        });
    }

    // Event listener for removing the last suggestion form group
    if (removeSuggestionButton) {
        removeSuggestionButton.addEventListener('click', function() {
            const addedSuggestions = suggestionsContainer.querySelectorAll('.suggestion-group');
            if (addedSuggestions.length > 0) {
                suggestionsContainer.removeChild(addedSuggestions[addedSuggestions.length - 1]); // Remove the last suggestion
            }
        });
    }

    const submitBothButton = document.getElementById('submit-both');

    if (submitBothButton) {
        submitBothButton.addEventListener('click', function() {
            const statusForm = document.getElementById('status-update-form');
            const suggestionsForm = document.getElementById('suggestions-form');

            if (statusForm.checkValidity() && suggestionsForm.checkValidity()) {
                statusForm.submit();
                setTimeout(() => {
                    suggestionsForm.submit();
                }, 500);
            } else {
                alert('Please fill in all required fields.');
            }
        });
    }
});