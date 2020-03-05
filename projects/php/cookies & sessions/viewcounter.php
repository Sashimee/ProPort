<?php
/*
    Step 1: Create a page that indicates how often it has been visited by the user.
    No need for forms, just the $ _SESSION array

    Step 2: Also post the date of first visit by the client.

    Step 3: Add a 'Reset' submit (in a form, of course)
    When you click on the button, the counter is reset.
 */
if (isset($_POST['submit'])) {
    session_start();
    session_destroy();
}

session_start();

if (isset($_SESSION['page_view'])) {
    $_SESSION['page_view'] += 1;
} else {
    $_SESSION['page_view'] = 1;
    $_SESSION['visit_date'] = date('d-m-Y');
}


var_dump($_SESSION);
?>

<form action="viewcounter.php" method="post">
    <input type="submit" value="Reset" name="submit">
</form>