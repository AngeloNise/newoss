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

    // Handle Cash Receipts
    const addCashReceiptButton = document.getElementById('add-cash-receipt');
    const cashReceiptContainer = document.getElementById('cash-receipt');
    let index = cashReceiptContainer.querySelectorAll('.split-1').length;  
    
    if (addCashReceiptButton) {
        addCashReceiptButton.addEventListener('click', function() {
            const newFields = document.createElement('div');
            newFields.classList.add('split-1');
            newFields.innerHTML = `
                <div class="fra-group">
                    <input type="text" name="date_receipt[]" class="form-control" placeholder="Date">
                </div>
                <div class="fra-group">
                    <input type="text" name="invoice_no_receipt[]" class="form-control" placeholder="O.R./Invoice No.">
                </div>
                <div class="fra-group">
                    <input type="text" name="particulars[]" class="form-control" placeholder="Particulars">
                </div>
                <div class="fra-group">
                    <input type="text" name="amount[]" class="form-control" placeholder="Amount">
                </div>
                <div class="fra-group">
                    <input type="text" name="remarks_receipt[]" class="form-control" placeholder="Remarks">
                </div>
            `;
            cashReceiptContainer.appendChild(newFields);
            index++;
        });
    }

    const removeCashReceiptButton = document.getElementById('remove-cash-receipt');
    if (removeCashReceiptButton) {
        removeCashReceiptButton.addEventListener('click', function() {
            const addedReceipts = cashReceiptContainer.querySelectorAll('.split-1:not(:first-child)');
            if (addedReceipts.length > 0) {
                cashReceiptContainer.removeChild(addedReceipts[addedReceipts.length - 1]);
            }
        });
    }

    // Handle Disbursements
    const addDisbursementsButton = document.getElementById('add-disbursements');
    const disbursementsContainer = document.getElementById('disbursements');
    let index1 = disbursementsContainer.querySelectorAll('.split-2').length;

    if (addDisbursementsButton) {
        addDisbursementsButton.addEventListener('click', function() {
            const newFields = document.createElement('div');
            newFields.classList.add('split-2');
            newFields.innerHTML = `
                <div class="fra-group">
                    <input type="text" name="date_disburse[]" class="form-control" placeholder="Date">
                </div>
                <div class="fra-group">
                    <input type="text" name="invoice_no_disburse[]" class="form-control" placeholder="O.R./Invoice No.">
                </div>
                <div class="fra-group">
                    <input type="text" name="description[]" class="form-control" placeholder="Description">
                </div>
                <div class="fra-group">
                    <input type="text" name="purpose[]" class="form-control" placeholder="Purpose">
                </div>
                <div class="fra-group">
                    <input type="text" name="remarks_disburse[]" class="form-control" placeholder="Remarks">
                </div>
            `;
            disbursementsContainer.appendChild(newFields);
            index1++;
        });
    }

    const removeDisbursementButton = document.getElementById('remove-disbursements');
    if (removeDisbursementButton) {
        removeDisbursementButton.addEventListener('click', function() {
            const addedDisbursements = disbursementsContainer.querySelectorAll('.split-2:not(:first-child)');
            if (addedDisbursements.length > 0) {
                disbursementsContainer.removeChild(addedDisbursements[addedDisbursements.length - 1]);
            }
        });
    }
});
