<?php
function area($w, $h)
{
    return $w * $h;
}

echo "Enter width: ";
$width = (float) trim(fgets(STDIN));

echo "Enter height: ";
$height = (float) trim(fgets(STDIN));

$result = area($width, $height);
echo $result;
