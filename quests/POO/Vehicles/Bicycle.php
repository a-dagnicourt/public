<?php

require_once 'Vehicle.php';
require_once 'Interfaces/LightableInterface.php';

class Bicycle extends Vehicle implements LightableInterface
{
    // VAR    
    /**
     * @var boolean
     */
    private $light;

    // CONSTRUCTOR
    public function __construct(string $color, int $nbSeats, int $nbWheels, bool $light)
    {
        parent::__construct($color, $nbSeats, $nbWheels);
        $this->setLight($light);
    }

    // METHODS
    public function switchOn(): void
    {
        if ($this->currentSpeed > 10) {
            $this->light = true;
        }
    }

    public function switchOff(): void
    {
        $this->light = false;
    }

    // GET & SET

    // Light
    /**
     * @return bool
     */
    public function getLight(): bool
    {
        return $this->light;
    }
    /**
     * @param bool $Light
     */
    public function setLight(bool $light): void
    {
        $this->light = $light;
    }
}
