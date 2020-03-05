<?php
// if (file_exists("info.txt")) {
//     // Open a file and save it's location
//     $file_handler =  fopen("info.txt", 'r');
//     //Loop through the whole file (line by line)

//     while (!feof($file_handler)) { // loop until you're at the end of the file
//         $line_of_text = fgets($file_handler);
//         echo $line_of_text . '<br>';
//     }

//     fclose($file_handler); // Close the fopen after U used it
// } 
?>
<table style="width:100%">
    <tr>
        <th>Type</th>
        <th>Timestamp</th>
    </tr>

    <?php

    if (file_exists("transform_to_table.txt")) {
        // Open a file and save it's location
        $file_handler =  fopen("transform_to_table.txt", 'r');
        //Loop through the whole file (line by line)

        while (!feof($file_handler)) { // loop until you're at the end of the file
            echo '<tr>';
            $line_of_text = fgets($file_handler);
            $exploded = explode(' : ', $line_of_text);
            echo '<th>' . $exploded[0] . '</th>' . '<th>' . $exploded[1] . '</th>';
            echo '</tr>';
        }

        fclose($file_handler); // Close the fopen after U used it
    }
    ?>
</table>