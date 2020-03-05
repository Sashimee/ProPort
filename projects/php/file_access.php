<?php

// $fileContent = readfile("movies.txt");

// echo $fileContent;

// if (file_exists("movies.txt")) {
//     $fileContent = file_get_contents("movies.txt");
//     echo $fileContent;
// }


if (file_exists("movies.txt")) {
    // Open a file and save it's location
    $file_handler =  fopen("movies.txt", 'r');
    //Loop through the whole file (line by line)

    while (!feof($file_handler)) { // loop until you're at the end of the file
        $line_of_text = fgets($file_handler);
        echo $line_of_text . '<br>';
    }

    fclose($file_handler); // Close the fopen after U used it

    // Retrieve content
    // echo fgets($file_handler);
    // echo fgets($file_handler);
    // echo fgets($file_handler);
    // echo fgets($file_handler);
}
