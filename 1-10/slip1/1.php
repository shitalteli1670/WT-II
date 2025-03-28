<?php
session_start();
if (isset($_SESSION['pcount'])) {
    $_SESSION['pcount'] += 1;
} else {
    $_SESSION['pcount'] = 1;
}
echo "You have visited this page " . $_SESSION['pcount'] . " time(s).";
?>
