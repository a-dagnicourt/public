<?php

require_once 'Highway.php';

final class Motorway extends Highway
{
    // METHODS
    public function addVehicle(Vehicle $vehicle): void
    {
        if ($vehicle instanceof Vehicle) {
            $this->currentVehicles[] = $vehicle;
        }
    }
}
