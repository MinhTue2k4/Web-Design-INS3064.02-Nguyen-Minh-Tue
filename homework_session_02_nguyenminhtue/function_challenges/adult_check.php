<?php
function isAdult($age)
{
    if ($age === null) {
        return false;
    }

    if ($age >= 18) {
        return true;
    }

    return false;
}

echo "Enter age (leave empty for null): ";
$input = trim(fgets(STDIN));

if ($input === "") {
    $age = null;
} else {
    $age = (int) $input;
}

$result = isAdult($age);
var_export($result);
