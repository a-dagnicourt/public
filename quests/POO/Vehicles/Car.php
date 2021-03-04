<?php

require_once 'Vehicle.php';
require_once 'Interfaces/LightableInterface.php';

class Car extends Vehicle implements LightableInterface
{
    // CONST
    const ALLOWED_ENERGIES = [
        'fuel', 'electric'
    ];

    // VAR
    /**
     * @var boolean
     */
    private $hasParkBrake;
    /**
     * @var string
     */
    private $energyType;
    /**
     * @var integer
     */
    private $energyLevel;
    /**
     * @var boolean
     */
    private $light;

    // CONSTRUCTOR
    public function __construct(string $color, int $nbSeats, int $nbWheels, bool $hasParkBrake, string $energyType, int $energyLevel, bool $light)
    {
        parent::__construct($color, $nbSeats, $nbWheels);
        $this->setHasParkBrake($hasParkBrake);
        $this->setEnergyType($energyType);
        $this->setEnergyLevel($energyLevel);
        $this->setLight($light);
    }

    // METHODS
    public function setParkBrake($bool)
    {
        $this->hasParkBrake = $bool;
    }

    public function start()
    {
        if (
            $this->hasParkBrake == true
        ) {
            throw new Exception("Park brake is on...");
        }
        return "Engine started !";
    }

    public function switchOn(): void
    {
        $this->light = true;
    }

    public function switchOff(): void
    {
        $this->light = false;
    }

    // GET & SET

    // Park Brake
    /**
     * @return bool
     */
    public function getHasParkBrake(): bool
    {
        return $this->hasParkBrake;
    }
    /**
     * @param bool $parkBrake
     */
    public function setHasParkBrake(bool $hasParkBrake): void
    {
        $this->hasParkBrake = $hasParkBrake;
    }

    // Energy type
    /**
     * @return string
     */
    public function getEnergyType(): string
    {
        return $this->energyType;
    }
    /**
     * @param string $energyType
     */
    public function setEnergyType(string $energyType): void
    {
        if (in_array($energyType, self::ALLOWED_ENERGIES)) {
            $this->energyType = $energyType;
        }
    }

    // Energy level
    /**
     * @return string
     */
    public function getEnergyLevel(): string
    {
        return $this->energyLevel;
    }
    /**
     * @param string $energyLevel
     */
    public function setEnergyLevel(string $energyLevel): void
    {
        $this->energyLevel = $energyLevel;
    }

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
};
