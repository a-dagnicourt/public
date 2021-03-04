<?php

require_once 'Vehicles/Skateboard.php';
require_once 'Vehicles/Bicycle.php';
require_once 'Vehicles/Car.php';
require_once 'Vehicles/Truck.php';
require_once 'Vehicles/Speedometer.php';

echo "Distance converted to miles : " . Speedometer::convertKmToMiles(10);
echo "</br>";
echo "Distance converted to kilometers : " . Speedometer::convertMilestoKm(10);

echo "</br>";
echo "</br>";

$skateboard = new Skateboard("red", 0, 4);
var_dump($skateboard);
echo $skateboard->forward();

echo "</br>";
echo "</br>";

$bike = new Bicycle("red", 1, 2, false);
var_dump($bike);
echo $bike->forward();
echo $bike->switchOn();
echo "</br>";
var_dump($bike);

echo "</br>";
echo "</br>";

$car = new Car("white",  5, 4, true, "electric", 42, false);
echo $car->switchOn(true);
var_dump($car);
try {
    echo $car->start();
} catch (Exception $e) {
    echo "Stop ! " . $e->getMessage();
    $car->setParkBrake(false);
    echo "Park brake is off ...";
    echo $car->start();
} finally {
    echo "Ma voiture roule comme un donut !";
};
echo $car->forward();

echo "</br>";
echo "</br>";

$truck = new Truck("white", 5, 8,  "electric", 100, 50, 0, true);
echo $truck->switchOff();
var_dump($truck);
echo $truck->loading(42);
echo $truck->switchOn();
echo $truck->start();
echo $truck->forward();

echo "</br>";
echo "</br>";

require_once 'Roads/Motorway.php';
require_once 'Roads/Pedestrianway.php';
require_once 'Roads/Residentialway.php';

$motorway = new Motorway([], 4, 130);
var_dump($motorway);
$motorway->addVehicle($skateboard);
$motorway->addVehicle($bike);
$motorway->addVehicle($car);
$motorway->addVehicle($truck);
var_dump($motorway->getCurrentVehicles());

echo "</br>";
echo "</br>";

$pedestrianway = new Pedestrianway([], 1, 10);
var_dump($pedestrianway);
$pedestrianway->addVehicle($bike);
$pedestrianway->addVehicle($car);
$pedestrianway->addVehicle($skateboard);
var_dump($pedestrianway->getCurrentVehicles());

echo "</br>";
echo "</br>";

$residentialway = new Residentialway([], 2, 50);
var_dump($residentialway);
$residentialway->addVehicle($skateboard);
$residentialway->addVehicle($bike);
$residentialway->addVehicle($car);
$residentialway->addVehicle($truck);
$residentialway->addVehicle($car);
$residentialway->addVehicle($truck);
$residentialway->addVehicle($truck);
$residentialway->addVehicle($car);
var_dump($residentialway->getCurrentVehicles());
