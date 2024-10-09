document.addEventListener('DOMContentLoaded', function() {
    if (window.flashMessage) {
        const messageContainer = document.createElement('div');
        messageContainer.className = `flash-message ${window.flashMessage.type}`;
        messageContainer.innerText = window.flashMessage.message;
        document.body.prepend(messageContainer);

        // Remove message after a few seconds
        setTimeout(() => {
            messageContainer.classList.add('fade-out');
            setTimeout(() => {
                messageContainer.remove();
            }, 500);
        }, 5000);
    }


    const addReceiptForEquipmentButton = document.getElementById('add-receipt-for-equipment');
    const ReceiptForEquipmentContainer = document.getElementById('receipt-for-equipment'); // Fixed ID
    let index = ReceiptForEquipmentContainer.querySelectorAll('.equipment').length; 

    if (addReceiptForEquipmentButton) {
        addReceiptForEquipmentButton.addEventListener('click', function() {
            const newFields = document.createElement('div');
            newFields.classList.add('equipment');
            newFields.innerHTML = `
                <div class="fra-group">
                    <input type="text" name="qty[]" class="form-control" placeholder="Qty">
                </div>
                <div class="fra-group">
                    <input type="text" name="unit[]" class="form-control" placeholder="Unit">
                </div>
                <div class="fra-group">
                    <input type="text" name="item_description[]" class="form-control" placeholder="Item/Description">
                </div>
                <div class="fra-group">
                    <input type="text" name="serial_no[]" class="form-control" placeholder="Serial No.">
                </div>
                <div class="fra-group">
                    <input type="text" name="property_no[]" class="form-control" placeholder="Property No.">
                </div>
                <div class="fra-group">
                    <input type="text" name="unit_cost[]" class="form-control" placeholder="Unit Cost">
                </div>
                <div class="fra-group">
                    <input type="text" name="total_amount[]" class="form-control" placeholder="Total Amount">
                </div>
            `;
            ReceiptForEquipmentContainer.appendChild(newFields);
            index++;
        });
    }

    const removeReceiptForEquipmentButton = document.getElementById('remove-receipt-for-equipment');
    if (removeReceiptForEquipmentButton) {
        removeReceiptForEquipmentButton.addEventListener('click', function() {
            const addedEquipment = ReceiptForEquipmentContainer.querySelectorAll('.equipment:not(:first-child)');
            if (addedEquipment.length > 0) {
                ReceiptForEquipmentContainer.removeChild(addedEquipment[addedEquipment.length - 1]);
            }
        });
    }
});
