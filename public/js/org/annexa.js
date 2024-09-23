document.addEventListener('DOMContentLoaded', function() {
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

    const addButton2 = document.getElementById('add-cash-receipt');
    const container2 = document.getElementById('cash-receipt');
    let index2 = container2.querySelectorAll('.split-1').length;

    if (addButton2) {
        addButton2.addEventListener('click', function() {
            const newFields = document.createElement('div');
            newFields.classList.add('split-1');
            newFields.innerHTML = `
                <div class="fra-group">
                    <input type="text" id="date_receipt_${index2}" name="date_receipt[]" class="form-control" placeholder="Date Receipt">
                </div>
                <div class="fra-group">
                    <input type="text" id="invoice_no_receipt_${index2}" name="invoice_no_receipt[]" class="form-control" placeholder="Invoice No">
                </div>
                <div class="fra-group">
                    <input type="text" id="particulars_${index2}" name="particulars[]" class="form-control" placeholder="Particulars">
                </div>
                <div class="fra-group">
                    <input type="text" id="amount_${index2}" name="amount[]" class="form-control" placeholder="Amount">
                </div>
                <div class="fra-group">
                    <input type="text" id="remarks_receipt_${index2}" name="remarks_receipt[]" class="form-control" placeholder="Remarks">
                </div>
            `;

            container2.appendChild(newFields);
            index2++;
        });
    }
});
