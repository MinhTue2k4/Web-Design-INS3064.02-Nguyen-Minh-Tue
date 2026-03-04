<?php
function add($a, $b)
{
    return $a + $b;
}

echo "Enter first number: ";
$x = (int) trim(fgets(STDIN));

echo "Enter second number: ";
$y = (int) trim(fgets(STDIN));

$result = add($x, $y);
echo $result;
