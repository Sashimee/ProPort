<?php

// Open a file in writing mode, if it don't exist it'll create it

$file_handle = fopen('last_access.log', 'w'); // You could use 'a' to append at the end of you file
$file_content = time() . "\r\n";

for ($i = 0; $i < 1; $i++) { //1500 new lines :)
    fwrite($file_handle, $file_content);
}
fclose($file_handle);
