<?php
$fruits = [];

echo "Enter first fruit: ";
$fruits[] = trim(fgets(STDIN));

echo "Enter second fruit: ";
$fruits[] = trim(fgets(STDIN));

echo "Enter third fruit: ";
$fruits[] = trim(fgets(STDIN));

echo $fruits[1];
