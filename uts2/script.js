$(document).ready(function() {
    $('#ticketForm').on('submit', function(e) {
        e.preventDefault();
        var movie = $('#movie').val();
        var tickets = $('#tickets').val();

        $.ajax({
            type: 'POST',
            url: 'process.php',
            data: {
                movie: movie,
                tickets: tickets
            },
            success: function(response) {
                $('#response').html(response);
            }
        });
    });
});
