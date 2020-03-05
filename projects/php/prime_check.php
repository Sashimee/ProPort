<?php

// function primeCheck($numberToCheck)
// {
//     for ($x = 2; $x < $numberToCheck; $x++) {
//         if ($numberToCheck % $x == 0) {
//             return 'Nope';
//         }
//     }
//     return 'Yup';
// }

// echo 'Is That number a prime number ? ' . primeCheck(6);

// // https://www.w3resource.com/php-exercises/php-function-exercise-2.php


$iWantReverseThis = array('Bob', 'John', 'Nico', 'Alfonso', 'Banana', 'Boy George');

function reverseIt($input)
{
    foreach ($input as $key => $value) {
        $input[$key] = $input[(count($input) - $key) - 1];
        $input[(count($input) - $key) - 1] = $value;
        if (($key + 1) >= (count($input) / 2)) {
            break;
        }
    }
    return $input;
}

var_dump(reverseIt($iWantReverseThis));
