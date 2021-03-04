<?php

require_once 'Highway.php';

final class Residentialway extends Highway
{
    // METHODS
    public function addVehicle(Vehicle $vehicle): void
    {
        if ($vehicle instanceof Vehicle) {
            $this->currentVehicles[] = $vehicle;
        }
    }
}
