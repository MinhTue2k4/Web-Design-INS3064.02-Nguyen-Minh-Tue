<?php
echo "Enter x: ";
$x = (int) trim(fgets(STDIN));

echo "Enter y: ";
$y = (int) trim(fgets(STDIN));

$add = $x + $y;
$sub = $x - $y;
$mul = $x * $y;
$div = $x / $y;

echo $add . PHP_EOL;
echo $sub . PHP_EOL;
echo $mul . PHP_EOL;
echo $div . PHP_EOL;
