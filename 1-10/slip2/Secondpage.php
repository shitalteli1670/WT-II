<?php
if (isset($_POST['submit'])) {
    $fontstyle = $_POST['fontstyle'];
    $fontsize = $_POST['fontsize'];
    $fontcolor = $_POST['fontcolor'];
    $bgcolor = $_POST['bgcolor'];

    // Set the cookie values
    setcookie('fontstyle', $fontstyle, time() + 86400);
    setcookie('fontsize', $fontsize, time() + 86400);
    setcookie('fontcolor', $fontcolor, time() + 86400);
    setcookie('bgcolor', $bgcolor, time() + 86400);

    // Redirect to the next page
    header('Location: thirdpage.php');
    exit();
}
?>
