<?php
function safeDiv($a, $b)
{
    if ($b == 0) {
        return null;
    }

    return $a / $b;
}

echo "Enter first number: ";
$a = (float) trim(fgets(STDIN));

echo "Enter second number: ";
$b = (float) trim(fgets(STDIN));

$result = safeDiv($a, $b);
var_export($result);
