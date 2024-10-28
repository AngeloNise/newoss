document.addEventListener('DOMContentLoaded', function() {
    const addSuggestionButton = document.getElementById('add-suggestion');
    const removeSuggestionButton = document.getElementById('remove-suggestion');
    const suggestionsContainer = document.getElementById('suggestions');

    const addSuggestionForm = () => {
        const newFormGroup = document.createElement('div');
        newFormGroup.classList.add('split', 'suggestion-group');

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

        suggestionsContainer.appendChild(newFormGroup);

        // Scroll to the newly added suggestion
        newFormGroup.scrollIntoView({ behavior: "smooth", block: "start" });
    };

    if (addSuggestionButton) {
        addSuggestionButton.addEventListener('click', function() {
            // Check if the form is valid before adding a new suggestion
            const form = document.getElementById('suggestions-form');
            if (form.checkValidity()) {
                addSuggestionForm();
            } else {
                // Optionally, you can highlight or show a message about invalid fields
                form.reportValidity(); // This will show validation messages
            }
        });
    }

    if (removeSuggestionButton) {
        removeSuggestionButton.addEventListener('click', function() {
            const addedSuggestions = suggestionsContainer.querySelectorAll('.suggestion-group');
            if (addedSuggestions.length > 0) {
                suggestionsContainer.removeChild(addedSuggestions[addedSuggestions.length - 1]);
            }
        });
    }
});
