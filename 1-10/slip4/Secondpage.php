<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Earnings</title>
</head>
<body>
    <h1>Earnings</h1>
    <form method="POST" action="Thirdpage.php">
        <label for="basic">Basic:</label>
        <input type="text" id="basic" name="basic"><br><br>

        <label for="da">DA:</label>
        <input type="text" id="da" name="da"><br><br>

        <label for="hra">HRA:</label>
        <input type="text" id="hra" name="hra"><br><br>

        <input type="submit" value="Next">
    </form>
</body>
</html>

<?php
// Store earnings in session
if (isset($_POST['basic']) && isset($_POST['da']) && isset($_POST['hra'])) {
    $_SESSION['basic'] = $_POST['basic'];
    $_SESSION['da'] = $_POST['da'];
    $_SESSION['hra'] = $_POST['hra'];
}
?>
