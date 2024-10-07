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
    const budgetContainer = document.getElementById('budget-container');
    let index = budgetContainer.querySelectorAll('.split').length;  

    if (addButton) {
        addButton.addEventListener('click', function() {
            const newFields = document.createElement('div');
            newFields.classList.add('split');
            newFields.innerHTML = `
                <div class="fra-group">
                    <input type="text" name="expenditures[]" class="form-control" placeholder="Expenditure">
                </div>
                <div class="fra-group">
                    <input type="text" name="amount[]" class="form-control" placeholder="Cost">
                </div>
            `;

            budgetContainer.appendChild(newFields);
            index++;
        });
    }

    const removeBudgetButton = document.getElementById('remove-budget');
    if (removeBudgetButton) {
        removeBudgetButton.addEventListener('click', function() {
            const addedBudgets = budgetContainer.querySelectorAll('.split:not(:first-child)');
            if (addedBudgets.length > 0) {
                budgetContainer.removeChild(addedBudgets[addedBudgets.length - 1]);
            }
        });
    }

    // Logic for adding other income fields
    const addOtherIncomeButton = document.getElementById('add-other-income');
    const otherIncomeContainer = document.getElementById('add-income');
    let index1 = otherIncomeContainer.querySelectorAll('.other-income').length;

    if (addOtherIncomeButton) {
        addOtherIncomeButton.addEventListener('click', function() {
            const newFields = document.createElement('div');
            newFields.classList.add('other-income');
            newFields.innerHTML = `
                <div class="fra-group">
                    <input type="text" name="other_income[]" class="form-control" placeholder="Other Income">
                </div>
                <div class="fra-group">
                    <input type="text" name="amount_income[]" class="form-control" placeholder="Amount">
                </div>
            `;
            otherIncomeContainer.appendChild(newFields);
            index1++;
        });
    }

    const removeOtherIncomeButton = document.getElementById('remove-other-income');
    if (removeOtherIncomeButton) {
        removeOtherIncomeButton.addEventListener('click', function() {
            const addedIncome = otherIncomeContainer.querySelectorAll('.other-income:not(:first-child)');
            if (addedIncome.length > 0) {
                otherIncomeContainer.removeChild(addedIncome[addedIncome.length - 1]);
            }
        });
    }

    const addItemsButton = document.getElementById('add-items');
    const itemsContainer = document.getElementById('items');
    let index2 = itemsContainer.querySelectorAll('.items-to-be-sold').length;  

    if (addItemsButton) {
        addItemsButton.addEventListener('click', function() {
            const newFields = document.createElement('div');
            newFields.classList.add('items-to-be-sold');
            newFields.innerHTML = `
                <div class="fra-group">
                    <input type="text" name="estimate_income[]" class="form-control" placeholder="Number of tickets/items to be sold">
                </div>
                <div class="fra-group">
                    <input type="text" name="item_pieces[]" class="form-control" placeholder="Pieces">
                </div>
                <div class="fra-group">
                    <input type="text" name="price_ticket[]" class="form-control" placeholder="Price per ticket/item">
                </div>
            `;
            itemsContainer.appendChild(newFields);
            index2++;
        });
    }

    const removeItemsButton = document.getElementById('remove-items');
    if (removeItemsButton) {
        removeItemsButton.addEventListener('click', function() {
            const addedItems = itemsContainer.querySelectorAll('.items-to-be-sold:not(:first-child)');
            if (addedItems.length > 1) {
                itemsContainer.removeChild(addedItems[addedItems.length - 1]);
            }
        });
    }

    const addSalesButton = document.getElementById('add-item-sales');
    const salesContainer = document.getElementById('add-sales');
    let index3 = salesContainer.querySelectorAll('.total-sales').length;  

    if (addSalesButton) {
        addSalesButton.addEventListener('click', function() {
            const newFields = document.createElement('div');
            newFields.classList.add('total-sales');
            newFields.innerHTML = `
                <div class="fra-group">
                    <input type="text" name="total_estimate_ticket[]" class="form-control" placeholder="Total estimated tickets/items sales (a × b)">
                </div>
            `;
            salesContainer.appendChild(newFields);
            index3++;
        });
    }

    const removeSalesButton = document.getElementById('remove-item-sales');
    if (removeSalesButton) {
        removeSalesButton.addEventListener('click', function() {
            const addedSales = salesContainer.querySelectorAll('.total-sales:not(:first-child)');
            if (addedSales.length > 0) {
                salesContainer.removeChild(addedSales[addedSales.length - 1]);
            }
        });
    }
});
