<?php
echo "Is user online? (1 for true, 0 for false): ";
$isOnline = (bool) trim(fgets(STDIN));

$result = $isOnline ? "User is Online" : "User is Offline";
echo $result;
