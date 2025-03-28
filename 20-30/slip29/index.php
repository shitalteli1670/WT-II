<!DOCTYPE html>
<html>
<head>
    <title>Number Operations</title>
</head>
<body>
    <h1>Number Operations</h1>

    <?php
    // Define variables and set to empty values
    $num = $op = $result = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num = test_input($_POST["num"]);
        $op = test_input($_POST["op"]);

        // Perform operation based on user’s choice
        switch ($op) {
            case "fib":
                $result = fibonacci($num);
                echo "<p>The Fibonacci series of $num numbers is: $result</p>";
                break;

            case "sum":
                $result = sumOfDigits($num);
                echo "<p>The sum of digits in $num is: $result</p>";
                break;

            default:
                echo "<p>Invalid operation selected</p>";
        }
    }

    // Function to sanitize input
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Function to generate Fibonacci series
    function fibonacci($num) {
        $first = 0;
        $second = 1;
        $result = "$first, $second";

        for ($i = 2; $i < $num; $i++) {
            $third = $first + $second;
            $result .= ", $third";
            $first = $second;
            $second = $third;
        }

        return $result;
    }

    // Function to calculate the sum of digits of a number
    function sumOfDigits($num) {
        $sum = 0;
        while ($num > 0) {
            $sum += $num % 10;
            $num = (int)($num / 10);
        }
        return $sum;
    }
    ?>

    <!-- Form for user input -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="num">Enter a number:</label>
        <input type="number" name="num" id="num" required><br><br>

        <label for="op">Select an operation:</label>
        <select name="op" id="op" required>
            <option value="">--Select--</option>
            <option value="fib">Fibonacci Series</option>
            <option value="sum">Sum of Digits</option>
        </select>
        <br><br>

        <input type="submit" value="Submit">
    </form>

</body>
</html>
