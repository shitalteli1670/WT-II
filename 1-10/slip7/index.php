<?php
// Load the XML file
$xml = new DOMDocument();
$xml->load('Movie.xml');

// Get all the movie nodes
$movies = $xml->getElementsByTagName('MovieInfo');

// Loop through each movie node and print the movie title and actor name
foreach ($movies as $movie) {
    echo "Movie Title: " . $movie->getElementsByTagName('MovieTitle')[0]->textContent . ", ";
    echo "Actor Name: " . $movie->getElementsByTagName('ActorName')[0]->textContent . "<br>";
}
?>
