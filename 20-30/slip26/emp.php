<?php
// Establish database connection
$conn = pg_connect("host=localhost dbname=your_database_name user=your_username password=your_password");
if (!$conn) {
    die('Connection failed: ' . pg_last_error());
}

// Get the selected employee name from the Ajax request
$employeeName = $_POST['employeeName'];

// Query the EMP table for the details of the selected employee
$sql = "SELECT * FROM EMP WHERE ename = '$employeeName'";
$result = pg_query($conn, $sql);

if (pg_num_rows($result) > 0) {
    // Build a JSON object with employee details
    $employee = pg_fetch_assoc($result);
    $response = array(
        'ename' => $employee['ename'],
        'designation' => $employee['designation'],
        'salary' => $employee['salary']
    );
    echo json_encode($response);
} else {
    echo "Employee not found";
}

// Close the database connection
pg_close($conn);
?>
