<?php

// COOKIES (max size 4kb)

// Once created all pages of the same domain share it

setcookie('username', 'Alex', time() + 100);

var_dump($_COOKIE);

echo '<br>' . $_COOKIE['username'];
