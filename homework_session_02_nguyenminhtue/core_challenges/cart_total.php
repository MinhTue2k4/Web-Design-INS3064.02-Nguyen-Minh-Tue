<?php
$prices = [];
$total = 0;

echo "How many items? ";
$count = (int) trim(fgets(STDIN));

for ($i = 0; $i < $count; $i++) {
    echo "Enter price of item " . ($i + 1) . ": ";
    $prices[] = (int) trim(fgets(STDIN));
}

foreach ($prices as $price) {
    $total = $total + $price;
}

echo "Total: " . $total;
