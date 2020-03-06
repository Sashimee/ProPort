<?php

include_once 'database.php';
// Connect to the database
$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, 'moviedb');
// echo 'Successsss !';

//Retrieve all directors
$query = 'SELECT * FROM directors';
// Execute the query
$results = mysqli_query($connection, $query);

// Retrieve results as an assiociative array :
//$record = mysqli_fetch_assoc($results);

//var_dump($record);

while ($row = mysqli_fetch_assoc($results)) {
    //var_dump($row);
    echo 'Name : ' . $row['name'] . '<br>';
    echo 'Nationality : ' . $row['nationality'] . '<br>';
    echo 'Date of Birth : ' . $row['date_of_birth'] . '<br>';
    echo '<hr>';
}

mysqli_close($connection);
