<?php
$students = [];

echo "How many students? ";
$count = (int) trim(fgets(STDIN));

for ($i = 0; $i < $count; $i++) {
    echo "Enter student name: ";
    $name = trim(fgets(STDIN));

    echo "Enter grade: ";
    $grade = (int) trim(fgets(STDIN));

    $students[] = [
        "name" => $name,
        "grade" => $grade
    ];
}

echo "<table border='1'>";
echo "<tr><th>Name</th><th>Grade</th></tr>";

foreach ($students as $student) {
    echo "<tr>";
    echo "<td>" . $student["name"] . "</td>";
    echo "<td>" . $student["grade"] . "</td>";
    echo "</tr>";
}

echo "</table>";
