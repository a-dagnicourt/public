<?php

$presentTime = new DateTimeImmutable('now');
$destinationTime = new DateTimeImmutable('21 October 2055');

$interval = $presentTime->diff($destinationTime);

echo $presentTime->format('m-d-Y A g:i');
echo '<br/>';
echo $destinationTime->format('m-d-Y A g:i');
echo '<br/>';
echo $interval->format('%Y years %m months %d days %h hours aaaaand %i minutes.');
echo '<br/>';

// Fuel consumption is 100L/day (the DeLorean is thirsty af)
$fuel = 100;

$intervalMinutes = $interval->days;

$fuelCons = $fuel * $intervalMinutes;
echo "Fuel needed : " . $fuelCons . " liters !";

// Mega flemme de faire du CSS à 1h de la fin du taf, sry.