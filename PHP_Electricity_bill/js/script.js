$(document).ready(function() {
    $('#billingForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: 'api/create_billing.php',
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify({
                consumer_id: $('#consumer_id').val(),
                units: $('#units').val(),
                billing_date: $('#billing_date').val()
            }),
            success: function(response) {
                if (response.success) {
                    $('#billResult').text(`Bill Amount: ₹${response.bill_amount.toFixed(2)}`).show();
                    setTimeout(() => location.reload(), 2000);
                } else {
                    $('#billResult').text('Error: ' + response.error).show();
                }
            }
        });
    });
});
