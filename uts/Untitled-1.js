// script.js
$(document).ready(function() {
    $('#ticketForm').on('submit', function(e) {
        var tickets = $('#tickets').val();
        if (tickets <= 0) {
            alert('Jumlah tiket harus lebih dari 0.');
            e.preventDefault();
        }
    });
});
