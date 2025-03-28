<?php
$xml = simplexml_load_file("book.xml") or die("Error: Cannot load XML file.");
foreach ($xml->children() as $category => $books) {
    echo "<h2>$category</h2>";
    foreach ($books->Book as $book) {
        echo "<strong>Title:</strong> " . $book->Book_Title . "<br>";
        echo "<strong>Author:</strong> " . $book->Book_Author . "<br>";
        echo "<strong>Price:</strong> $" . $book->Book_Price . "<br><br>";
    }
}
?>
