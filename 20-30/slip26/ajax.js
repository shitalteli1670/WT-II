$(document).ready(function() {
    // Add event listener to the employee dropdown
    $('#employee-list').change(function() {
        var selectedEmployee = $(this).val();

        // Make an Ajax request to fetch employee details
        $.ajax({
            url: 'empdetails.php',
            type: 'POST',
            data: { employeeName: selectedEmployee },
            dataType: 'json',
            success: function(response) {
                // Parse the JSON response and display employee details
                var detailsHtml = 'Employee Name: ' + response.ename + '<br>' +
                                  'Designation: ' + response.designation + '<br>' +
                                  'Salary: ' + response.salary;
                $('#employee-details').html(detailsHtml);
            },
            error: function(xhr, status, error) {
                console.log('Error:', error);
            }
        });
    });
});
