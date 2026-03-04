<?php
$numbers = [];

echo "Enter 5 numbers:" . PHP_EOL;

for ($i = 0; $i < 5; $i++) {
    $numbers[] = trim(fgets(STDIN));
}

$reversed = [];

for ($i = count($numbers) - 1; $i >= 0; $i--) {
    $reversed[] = $numbers[$i];
}

print_r($reversed);
