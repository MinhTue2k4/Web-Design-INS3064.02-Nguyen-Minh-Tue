<?php
function greet($name)
{
    return "Hello, " . $name . "!";
}

echo "Enter your name: ";
$name = trim(fgets(STDIN));

$result = greet($name);
echo $result;
