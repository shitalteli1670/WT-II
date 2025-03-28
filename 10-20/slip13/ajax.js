$(document).ready(function() {
    // Attach an event listener to the name input field
    $('#name').on('input', function() {
        // Get the name entered by the user
        var name = $(this).val();

        // Send an AJAX request to the server
        $.ajax({
            url: 'server.php', // The PHP file that processes the request
            type: 'POST',
            data: { name: name }, // Send the name as data to the server
            success: function(response) {
                // Update the response div with the server's response
                $('#response').html(response);
            }
        });
    });
});
