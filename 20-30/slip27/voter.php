<?php
// Get the POST data
$name = $_POST['name'];
$age = $_POST['age'];
$nationality = $_POST['nationality'];

// Validate the name (should be in uppercase)
if (preg_match('/[^A-Z]/', $name)) {
    echo 'Name should be in uppercase letters only.';
}
// Validate age (should be at least 18)
elseif ($age < 18) {
    echo 'Age should not be less than 18 years.';
}
// Validate nationality (should be Indian)
elseif (strcasecmp($nationality, 'Indian') != 0) {
    echo 'Nationality should be Indian.';
} else {
    // If all validations pass
    echo 'Validation successful. Voter details:<br>';
    echo 'Name: ' . $name . '<br>';
    echo 'Age: ' . $age . '<br>';
    echo 'Nationality: ' . $nationality;
}
?>
