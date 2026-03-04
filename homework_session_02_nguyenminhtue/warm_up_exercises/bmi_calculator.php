<?php
function calculateBMI($kg, $m)
{
    $bmi = $kg / ($m * $m);

    if ($bmi < 18.5) {
        $category = "Underweight";
    } elseif ($bmi < 25) {
        $category = "Normal";
    } else {
        $category = "Overweight";
    }

    return "BMI: " . round($bmi, 1) . " (" . $category . ")";
}

echo "Enter weight (kg): ";
$weight = (float) trim(fgets(STDIN));

echo "Enter height (meters): ";
$height = (float) trim(fgets(STDIN));

$result = calculateBMI($weight, $height);
echo $result;
