<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Employee Details</title>
</head>
<body>
    <h1>Employee Details</h1>
    <form method="POST" action="Secondpage.php">
        <label for="eno">Employee No:</label>
        <input type="text" id="eno" name="eno"><br><br>

        <label for="ename">Employee Name:</label>
        <input type="text" id="ename" name="ename"><br><br>

        <label for="address">Address:</label>
        <textarea id="address" name="address"></textarea><br><br>

        <input type="submit" value="Next">
    </form>
</body>
</html>

<?php
// Store employee details in session
if (isset($_POST['eno']) && isset($_POST['ename']) && isset($_POST['address'])) {
    $_SESSION['eno'] = $_POST['eno'];
    $_SESSION['ename'] = $_POST['ename'];
    $_SESSION['address'] = $_POST['address'];
}
?>
