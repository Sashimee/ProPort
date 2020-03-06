<?php

include_once 'database.php';

// Connect to the database
$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, 'moviedb');
// echo 'Successsss !';

//Retrieve all directors
$query = "INSERT INTO directors(name, nationality, date_of_birth) VALUES ('Martin Scorcese','USA','1942-11-17')";
// Execute the query
$results = mysqli_query($connection, $query);

if ($results)
    echo "Insert successfull";
else
    echo "Insert went wrong";

// Close the connections
mysqli_close($connection);
