document.addEventListener('DOMContentLoaded', function() {
    if (window.flashMessage) {
        const messageContainer = document.createElement('div');
        messageContainer.className = `flash-message ${window.flashMessage.type}`; // Add class for type (success/error)

        messageContainer.innerText = window.flashMessage.message; // Set the message text
        document.body.prepend(messageContainer); // Display it at the top of the body

        // Optionally, add code to remove the message after a few seconds
        setTimeout(() => {
            messageContainer.classList.add('fade-out'); // Start fade-out animation
            setTimeout(() => {
                messageContainer.remove(); // Remove from DOM after fade-out
            }, 500); // Match the timing with the CSS transition duration
        }, 5000); // Show message for 5 seconds
    }

    const addButton = document.getElementById('add-budget');
    const container = document.getElementById('budget-container');
    let index = container.querySelectorAll('.split').length;  

    if (addButton) {
        addButton.addEventListener('click', function() {
            const newFields = document.createElement('div');
            newFields.classList.add('split');
            newFields.innerHTML = `
                <div class="fra-group">
                    <input type="text" id="expenditures_${index}" name="expenditures[]" class="form-control" placeholder="EXPENDITURES">
                </div>
                <div class="fra-group">
                    <input type="text" id="amount_${index}" name="amount[]" class="form-control" placeholder="AMOUNT">
                </div>
            `;

            container.appendChild(newFields);
            index++;
        });
    }

    // Logic for adding other income fields
    const addButton1 = document.getElementById('add-other-income');
    const container1 = document.getElementById('add-income');
    let index1 = container1.querySelectorAll('.other-income').length;

    if (addButton1) {
        addButton1.addEventListener('click', function() {
            const newFields = document.createElement('div');
            newFields.classList.add('other-income');
            newFields.innerHTML = `
                <div class="fra-group">
                    <input type="text" id="other_income_${index1}" name="other_income[]" class="form-control" placeholder="OTHER INCOME">
                </div>
            `;

            container1.appendChild(newFields);
            index1++;
        });
    }
    
    const addButton2 = document.getElementById('add-items');
    const container2 = document.getElementById('items');
    let index2 = container.querySelectorAll('.items-to-be-sold').length;  

    if (addButton2) {
        addButton2.addEventListener('click', function() {
            const newFields = document.createElement('div');
            newFields.classList.add('items-to-be-sold');
            newFields.innerHTML = `
                <div class="fra-group">
                    <input type="text" id="estimate_income_${index2}" name="estimate_income" class="form-control" placeholder="Number of tickets/items to be sold">
                </div>

                <div class="fra-group">
                    <input type="text" id="price_ticket_${index2}" name="price_ticket" class="form-control" placeholder="Php" >
                </div>
            `;

            container2.appendChild(newFields);
            index2++;
        });
    }

    const addButton3 = document.getElementById('add-item-sales');
    const container3 = document.getElementById('add-sales');
    let index3 = container.querySelectorAll('.total-sales').length;  

    if (addButton3) {
        addButton3.addEventListener('click', function() {
            const newFields = document.createElement('div');
            newFields.classList.add('total-sales');
            newFields.innerHTML = `
                <div class="fra-group">
                    <input type="text" id="total_estimate_ticket_${index3}" name="total_estimate_ticket" class="form-control" placeholder="Total estimated tickets/items sales (a × b)">
                </div>
            `;

            container3.appendChild(newFields);
            index3++;
        });
    }
});
