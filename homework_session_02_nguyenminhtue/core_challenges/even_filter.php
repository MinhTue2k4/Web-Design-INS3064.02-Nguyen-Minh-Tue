<?php
echo "Enter a number limit: ";
$limit = (int) trim(fgets(STDIN));

for ($i = 1; $i <= $limit; $i++) {
    if ($i % 2 == 0) {
        echo $i . " ";
    }
}
