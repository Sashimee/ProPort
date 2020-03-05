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
$_SESSION['viewed'] = true;

var_dump($_SESSION);

?>

<a href="get-viewed.php">Clicky clicky</a>