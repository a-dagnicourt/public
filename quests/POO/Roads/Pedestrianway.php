<?php

require_once 'Highway.php';

final class Pedestrianway extends Highway
{
    /// METHODS
    public function addVehicle(Vehicle $vehicle): void
    {
        if ($vehicle instanceof Bicycle || $vehicle instanceof Skateboard) {
            $this->currentVehicles[] = $vehicle;
        }
    }
}
