<?php
// Connect to database
$servername = "localhost";
$username = "root";  // replace with your MySQL username
$password = "";      // replace with your MySQL password
$dbname = "school";  // replace with your database name

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve selected teacher details
if (isset($_POST['tno'])) {
    $tno = $_POST['tno'];
    $sql = "SELECT * FROM TEACHER WHERE tno = '$tno'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo "Teacher Name: " . $row['tname'] . "<br>";
        echo "Qualification: " . $row['qualification'] . "<br>";
        echo "Salary: " . $row['salary'] . "<br>";
    } else {
        echo "No data found.";
    }
}

// Close database connection
mysqli_close($conn);
?>
