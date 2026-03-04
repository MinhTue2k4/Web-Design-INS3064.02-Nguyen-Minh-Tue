<?php
echo "Enter a number as string: ";
$input = trim(fgets(STDIN));

$floatValue = (float) $input;
$intValue = (int) $floatValue;

echo gettype($floatValue) . "(" . $floatValue . ")" . PHP_EOL;
echo gettype($intValue) . "(" . $intValue . ")";
