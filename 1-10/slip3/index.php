<?php
session_start();

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $correct_username = 'myusername';
    $correct_password = 'mypassword';

    if ($username == $correct_username && $password == $correct_password) {
        $_SESSION['loggedin'] = true;
        header('Location: index.php');
        exit;
    } else {
        if (isset($_SESSION['attempts'])) {
            $_SESSION['attempts']--;
        } else {
            $_SESSION['attempts'] = 3;
        }

        if ($_SESSION['attempts'] <= 0) {
            echo "Maximum login attempts exceeded. Please try again later.";
        } else {
            echo "Invalid username or password. You have " . $_SESSION['attempts'] . " attempt(s) left.";
        }
    }
}

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    echo "<h1>Welcome to the secure page!</h1>";
    echo "<p>You have successfully logged in.</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>

    <h2>Login Page</h2>

    <form method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" name="submit" value="Log In">
    </form>

</body>
</html>
