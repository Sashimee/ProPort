<?php

// Exercices from Function_Exercise_2.php
function recursiveCount($number) //Exercice1 
{
    echo $number . '<br>';
    if ($number != 50) {
        $number++;
        recursiveCount($number);
    }
};

// recursiveCount(3);


function multiply($a, $b) // Exercice2
{
    if ($b > 0) {
        return $a + multiply($a, $b - 1);
    }
}

// echo multiply(6, 8);

function factorialStyle($a) // Exercice3
{
    if ($a > 0) {
        echo '<br> Now $a is : ' . $a;
        return $a * factorialStyle($a - 1);
        // return multiply($a, factorialStyle($a - 1)); Works too but nesting error if $a > 6
    } else {
        return 1;
    }
}

echo '<br>' . factorialStyle(6);
