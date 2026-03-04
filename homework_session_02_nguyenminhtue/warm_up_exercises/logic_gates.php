<?php
echo "Enter age: ";
$age = (int) trim(fgets(STDIN));

echo "Has ticket? (1 for true, 0 for false): ";
$hasTicket = (bool) trim(fgets(STDIN));

if ($age > 18 && $hasTicket) {
    echo "Enter";
} else {
    echo "Deny";
}
