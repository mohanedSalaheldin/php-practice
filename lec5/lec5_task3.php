<?php

$array  = [-5, 0, -3, -4, 12];
printEven($array);
printOdd($array);
printPositive($array);
printNegative($array);


function printEven($array)
{
    $count = 0;
    foreach ($array as $num) {
        if ($num % 2 == 0) {
            $count++;
        }
    }
    echo "Even: $count";
    echo '<br>';
}
function printOdd($array)
{
    $count = 0;
    foreach ($array as $num) {
        if (!($num % 2 == 0)) {
            $count++;
        }
    }
    echo "Odd: $count";
    echo '<br>';
}
function printPositive($array)
{
    $count = 0;
    foreach ($array as $num) {
        if ($num > 0) {
            $count++;
        }
    }
    echo "Positive: $count";
    echo '<br>';
}
function printNegative($array)
{
    $count = 0;
    foreach ($array as $num) {
        if ($num < 0) {
            $count++;
        }
    }
    echo "Negative: $count";
    echo '<br>';
}
