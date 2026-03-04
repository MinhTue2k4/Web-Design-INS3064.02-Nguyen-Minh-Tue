<?php
function fmt($amt, $c = "$")
{
    return $c . number_format($amt, 2);
}

echo "Enter amount: ";
$amount = (float) trim(fgets(STDIN));

echo "Enter currency symbol (press Enter for default): ";
$currency = trim(fgets(STDIN));

if ($currency === "") {
    $result = fmt($amount);
} else {
    $result = fmt($amount, $currency);
}

echo $result;
