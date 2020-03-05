<?php
/*
    Create two pages :

    `create-session.php`
        The page will initialize a session variable 'viewed' to `true`;

    `get-viewed.php`
        The page will display a message 'You have visited the page
        create-session ', if the 'viewed' variable is assigned.

        Otherwise, it will display the message 'You have not visited
        the create-session page '
 */

session_start();
var_dump($_SESSION);

if (isset($_SESSION['viewed'])) {
    echo 'You have visited the page create-session <br>';
} else {
    echo 'You have NOT visited the page create-session <br>';
}
