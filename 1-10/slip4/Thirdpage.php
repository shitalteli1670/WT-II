<?php
session_start();
// Calculate total earnings
$total = $_SESSION['basic'] + $_SESSION['da'] + $_SESSION['hra'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Employee Information</title>
</head>
<body>
    <h1>Employee Information</h1>
    <p><strong>Employee No:</strong> <?php echo $_SESSION['eno']; ?></p>
    <p><strong>Employee Name:</strong> <?php echo $_SESSION['ename']; ?></p>
    <p><strong>Address:</strong> <?php echo $_SESSION['address']; ?></p>
    <p><strong>Basic:</strong> <?php echo $_SESSION['basic']; ?></p>
    <p><strong>DA:</strong> <?php echo $_SESSION['da']; ?></p>
    <p><strong>HRA:</strong> <?php echo $_SESSION['hra']; ?></p>
    <p><strong>Total Earnings:</strong> <?php echo $total; ?></p>
</body>
</html>
