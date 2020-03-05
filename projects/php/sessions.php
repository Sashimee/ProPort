<?php

// Session file is stored on the server when you create a session you also create a cookie for further reference
// The values of a session are automatically destroyed when you close the browser so store it

session_start();
if (isset($_SESSION['page_view'])) {
    $_SESSION['page_view'] += 1;
} else {
    $_SESSION['page_view'] = 1;
}

var_dump($_SESSION);
var_dump($_COOKIE);

//Delete session from the script but not from the server

session_unset();

// Remove session from server filesystem

//session_destroy();


// to remove one line of an array unset($array[0]);

// Regenerate the session id

session_regenerate_id();
