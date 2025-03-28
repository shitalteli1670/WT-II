<?php
// Load the XML file into a SimpleXML object
$xml = simplexml_load_file("book.xml");

// Display the attributes of the SimpleXML object
echo "Book attributes:<br>";
echo "ISBN: " . $xml['isbn'] . "<br>";
echo "Publisher: " . $xml['publisher'] . "<br><br>";

// Display the elements of the SimpleXML object
echo "Book elements:<br>";
echo "Title: " . $xml->title . "<br>";
echo "Author: " . $xml->author . "<br>";
echo "Description: " . $xml->description . "<br>";
?>
