<?php
echo "Enter first word: ";
$sentence = trim(fgets(STDIN));

echo "Enter second word: ";
$sentence .= " " . trim(fgets(STDIN));

echo "Enter third word: ";
$sentence .= " " . trim(fgets(STDIN));

echo $sentence;
