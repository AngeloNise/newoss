document.addEventListener('DOMContentLoaded', function() {
    const addButton = document.getElementById('add-cash-receipt');
    const container = document.getElementById('cash-receipt');
    let index = container.querySelectorAll('.split-1').length;

    if (addButton) {
        addButton.addEventListener('click', function() {
            const newFields = document.createElement('div');
            newFields.classList.add('split-1');
            newFields.innerHTML = `
                <div class="fra-group">
                    <input type="text" id="date_receipt_${index}" name="date_receipt[]" class="form-control" placeholder="Date Receipt">
                </div>
                <div class="fra-group">
                    <input type="text" id="invoice_no_receipt_${index}" name="invoice_no_receipt[]" class="form-control" placeholder="Invoice No">
                </div>
                <div class="fra-group">
                    <input type="text" id="particulars_${index}" name="particulars[]" class="form-control" placeholder="Particulars">
                </div>
                <div class="fra-group">
                    <input type="text" id="amount_${index}" name="amount[]" class="form-control" placeholder="Amount">
                </div>
                <div class="fra-group">
                    <input type="text" id="remarks_receipt_${index}" name="remarks_receipt[]" class="form-control" placeholder="Remarks">
                </div>
            `;

            container.appendChild(newFields);
            index++;
        });
    }

    const addButton1 = document.getElementById('add-disbursements');
    const container1 = document.getElementById('disbursements');
    let index1 = container.querySelectorAll('.split-2').length;

    if (addButton1) {
        addButton1.addEventListener('click', function() {
            const newFields = document.createElement('div');
            newFields.classList.add('split-2');
            newFields.innerHTML = `
                <div class="fra-group">
                        <input type="text" id="date_disburse_${index}" name="date_disburse[]" class="form-control" placeholder="Date">
                    </div>

                    <div class="fra-group">
                        <input type="text" id="invoice_no_disburse_${index}" name="invoice_no_disburse[]" class="form-control" placeholder="O.R./Invoice No">
                    </div>

                    <div class="fra-group">
                        <input type="text" id="description_${index}" name="description[]" class="form-control" placeholder="Description">
                    </div>

                    <div class="fra-group">
                        <input type="text" id="purpose_${index}" name="purpose[]" class="form-control" placeholder="Purpose">
                    </div>

                    <div class="fra-group">
                        <input type="text" id="remarks_disburse_${index}" name="remarks_disburse[]" class="form-control" placeholder="Remarks">
                    </div>
            `;

            container1.appendChild(newFields);
            index1++;
        });
    }
});
