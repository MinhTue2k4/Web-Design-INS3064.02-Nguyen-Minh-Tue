<?php
$scores = [];

echo "How many scores? ";
$count = (int) trim(fgets(STDIN));

for ($i = 0; $i < $count; $i++) {
    echo "Enter score " . ($i + 1) . ": ";
    $scores[] = (int) trim(fgets(STDIN));
}

$sum = 0;
$max = $scores[0];
$min = $scores[0];

foreach ($scores as $score) {
    $sum = $sum + $score;

    if ($score > $max) {
        $max = $score;
    }

    if ($score < $min) {
        $min = $score;
    }
}

$average = $sum / count($scores);

$topScores = [];
foreach ($scores as $score) {
    if ($score > $average) {
        $topScores[] = $score;
    }
}

echo "Average: " . $average . PHP_EOL;
echo "Max: " . $max . PHP_EOL;
echo "Min: " . $min . PHP_EOL;
echo "Above Average Scores: ";
print_r($topScores);
