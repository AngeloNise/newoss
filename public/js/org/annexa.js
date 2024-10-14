document.addEventListener('DOMContentLoaded', function() {
    if (window.flashMessage) {
        const messageContainer = document.createElement('div');
        messageContainer.className = `flash-message ${window.flashMessage.type}`; 
        messageContainer.innerText = window.flashMessage.message; 
        document.body.prepend(messageContainer);

        setTimeout(() => {
            messageContainer.classList.add('fade-out'); 
            setTimeout(() => {
                messageContainer.remove(); 
            }, 500); 
        }, 5000);
    }

    const addItemsButton = document.getElementById('add-items');
    const itemsContainer = document.getElementById('items');
    const removeItemsButton = document.getElementById('remove-items');
    const salesContainer = document.getElementById('total-sales-container');
    const addOtherIncomeButton = document.getElementById('add-other-income');
    const otherIncomeContainer = document.getElementById('add-income');
    const totalEstimatedIncomeField = document.getElementById('total_estimated_income');
    const totalBudgetExpensesField = document.getElementById('total_budget_expenses_php');
    const totalEstimatedProceedsInput = document.getElementById('total_estimated_proceeds');

    const updateTotalEstimatedIncome = () => {
        let totalSales = 0;
        let otherIncome = 0;

        document.querySelectorAll('input[name="total_estimate_ticket[]"]').forEach(input => {
            const value = parseFloat(input.value);
            if (!isNaN(value)) {
                totalSales += value;
            }
        });

        document.querySelectorAll('input[name="income_amount[]"]').forEach(input => {
            const value = parseFloat(input.value);
            if (!isNaN(value)) {
                otherIncome += value;
            }
        });

        const totalEstimatedIncome = totalSales + otherIncome;

        if (totalEstimatedIncomeField) {
            totalEstimatedIncomeField.value = totalEstimatedIncome.toFixed(2);
        }

        updateTotalEstimatedProceeds(); // Ensure total proceeds is updated
    };

    const updateTotalBudgetedExpenses = () => {
        let total = 0;
        document.querySelectorAll('input[name="amount[]"]').forEach(input => {
            const value = parseFloat(input.value);
            if (!isNaN(value)) {
                total += value;
            }
        });
        if (totalBudgetExpensesField) {
            totalBudgetExpensesField.value = total.toFixed(2);
        }
        updateTotalEstimatedProceeds(); // Ensure total proceeds is updated
    };

    const updateTotalEstimatedProceeds = () => {
        const totalBudget = parseFloat(totalBudgetExpensesField.value) || 0;
        const totalEstimatedIncome = parseFloat(totalEstimatedIncomeField.value) || 0;
        const totalEstimatedProceeds = totalEstimatedIncome - totalBudget;

        totalEstimatedProceedsInput.value = totalEstimatedProceeds.toFixed(2);
    };

    const defaultCostField = document.querySelector('input[name="amount[]"]');
    if (defaultCostField) {
        defaultCostField.addEventListener('input', updateTotalBudgetedExpenses);
    }

    const updateEstimate = (piecesInput, priceInput, totalEstimateInput) => {
        if (piecesInput.value && priceInput.value) {
            const pieces = parseFloat(piecesInput.value);
            const price = parseFloat(priceInput.value);
            const totalEstimate = pieces * price;
            totalEstimateInput.value = totalEstimate.toFixed(2);
        } else {
            totalEstimateInput.value = '';
        }
        updateTotalEstimatedIncome();
    };

    const addInputListeners = (itemFields, salesFields) => {
        const piecesInput = itemFields.querySelector('input[name="item_pieces[]"]');
        const priceInput = itemFields.querySelector('input[name="price_ticket[]"]');
        const totalEstimateInput = salesFields.querySelector('input[name="total_estimate_ticket[]"]');

        piecesInput.addEventListener('input', () => updateEstimate(piecesInput, priceInput, totalEstimateInput));
        priceInput.addEventListener('input', () => updateEstimate(piecesInput, priceInput, totalEstimateInput));
        
        totalEstimateInput.addEventListener('input', updateTotalEstimatedIncome);
    };

    if (addItemsButton) {
        addItemsButton.addEventListener('click', function() {
            const newItemFields = document.createElement('div');
            newItemFields.classList.add('items-to-be-sold');
            newItemFields.innerHTML = `
                <div class="fra-group">
                    <input type="text" name="items_to_be_sold[]" class="form-control" placeholder="Number of tickets/items to be sold">
                    <div class="error-message" style="color: red; display: none;">Please enter a valid number.</div>
                </div>
                <div class="fra-group">
                    <input type="text" name="item_pieces[]" class="form-control" placeholder="Pieces">
                    <div class="error-message" style="color: red; display: none;">Please enter a valid number.</div>
                </div>
                <div class="fra-group">
                    <input type="text" name="price_ticket[]" class="form-control" placeholder="Price per ticket/item">
                    <div class="error-message" style="color: red; display: none;">Please enter a valid number.</div>
                </div>
            `;
            itemsContainer.appendChild(newItemFields);
    
            const newSalesFields = document.createElement('div');
            newSalesFields.classList.add('total-sales');
            newSalesFields.innerHTML = `
                <div class="fra-group">
                    <input type="text" name="total_estimate_ticket[]" class="form-control" placeholder="Total estimated tickets/items sales (a × b)">
                    <div class="error-message" style="color: red; display: none;">Please enter a valid number.</div>
                </div>
            `;
            salesContainer.appendChild(newSalesFields);
    
            addInputListeners(newItemFields, newSalesFields);
        });
    }

    if (removeItemsButton) {
        removeItemsButton.addEventListener('click', function() {
            const addedItems = itemsContainer.querySelectorAll('.items-to-be-sold');
            const addedSales = salesContainer.querySelectorAll('.total-sales');
            if (addedItems.length > 1) {
                itemsContainer.removeChild(addedItems[addedItems.length - 1]);
                salesContainer.removeChild(addedSales[addedSales.length - 1]);
            }
        });
    }

    const defaultItems = document.querySelector('.items-to-be-sold');
    const defaultSales = document.querySelector('.total-sales');
    if (defaultItems && defaultSales) {
        addInputListeners(defaultItems, defaultSales);
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

    let index2 = otherIncomeContainer.querySelectorAll('.other-income').length;

    const addOtherIncomeInputListeners = () => {
        document.querySelectorAll('input[name="income_amount[]"]').forEach(input => {
            input.addEventListener('input', updateTotalEstimatedIncome);
        });
    };

    addOtherIncomeInputListeners();

    if (addOtherIncomeButton) {
        addOtherIncomeButton.addEventListener('click', function() {
            const newFields = document.createElement('div');
            newFields.classList.add('other-income');
            newFields.innerHTML = `
                <div class="fra-group">
                    <input type="text" name="other_income[]" class="form-control" placeholder="Other Income">
                </div>
                <div class="fra-group">
                    <input type="text" name="income_amount[]" class="form-control" placeholder="Amount">
                </div>
            `;
            otherIncomeContainer.appendChild(newFields);
            index2++;
    
            // Remove error message logic
            const incomeAmountInput = newFields.querySelector('input[name="income_amount[]"]');
            incomeAmountInput.addEventListener('input', updateTotalEstimatedIncome);
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

    const addButton = document.getElementById('add-budget');
    const budgetContainer = document.getElementById('budget-container');
    let index3 = budgetContainer.querySelectorAll('.split').length;  

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
            index3++;

            const amountInput = newFields.querySelector('input[name="amount[]"]');
            amountInput.addEventListener('input', updateTotalBudgetedExpenses);
        });
    }

    const removeBudgetButton = document.getElementById('remove-budget');
    if (removeBudgetButton) {
        removeBudgetButton.addEventListener('click', function() {
            const addedBudgets = budgetContainer.querySelectorAll('.split:not(:first-child)');
            if (addedBudgets.length > 0) {
                budgetContainer.removeChild(addedBudgets[addedBudgets.length - 1]);
                updateTotalBudgetedExpenses();
            }
        });
    }

    // Adding event listeners to update total proceeds when total estimated income or budgeted expenses changes
    totalEstimatedIncomeField.addEventListener('input', updateTotalEstimatedProceeds);
    totalBudgetExpensesField.addEventListener('input', updateTotalEstimatedProceeds);

    updateTotalBudgetedExpenses();
});
