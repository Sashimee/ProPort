<?php

/*
		1. Create two files : 'signin.php' & 'home.php'

		2. In the 'signin.php' file, create a form with two input : email & password.
		This form will redirect to 'home.php'

		3. In 'home.php', you'll have to check :
			- If this user actually exists.
			- If he exists, check that both email/password are matching.
			- Display a message for both validations.

		For this part, you'll use the 'users.txt' file.
		TIPS : you can read the file and create an array of all the users...
	 */

if (isset($_POST['submit'])) { // If submit check if the input is ordered
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (file_exists("users.txt")) {
        // Open a file and save it's location
        $file_handler =  fopen("users.txt", 'r');
        //Loop through the whole file (line by line)

        while (!feof($file_handler)) { // loop until you're at the end of the file
            $line_of_text = fgets($file_handler);
            $exploded = explode(';', $line_of_text);
            $explodedPwd = explode('=', $exploded[1]);
            $explodedUsr = explode('=', $exploded[0]);
            $userArray[] = array($explodedUsr[0] => $explodedUsr[1], $explodedPwd[0] => trim($explodedPwd[1]));
        }

        fclose($file_handler); // Close the fopen after U used it
        $found = false;
        foreach ($userArray as $value) {
            if ((in_array($email, $value)) && (in_array($password, $value))) {
                echo 'Wew lad, you logged in';
                $found = true;
                break;
            }
        }
        if (!$found) {
            echo 'You didn\'t log in';
        }
    }
} else {
    echo 'You opened this page the wrong way ...';
}
