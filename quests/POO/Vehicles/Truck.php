<?php

class Truck extends Vehicle
{
    // CONST
    const ALLOWED_ENERGIES = [
        'fuel', 'electric'
    ];

    // VAR
    /**
     * @var string
     */
    private $energyType;
    /**
     * @var integer
     */
    private $energyLevel;
    /**
     * @var integer
     */
    private $capacity;
    /**
     * @var integer
     */
    private $load = 0;
    /**
     * @var boolean
     */
    private $light;

    // CONSTRUCTOR
    public function __construct(string $color, int $nbSeats, int $nbWheels, string $energyType, int $energyLevel, int $capacity, int $load, bool $light)
    {
        parent::__construct($color, $nbSeats, $nbWheels);
        $this->setEnergyType($energyType);
        $this->setEnergyLevel($energyLevel);
        $this->setCapacity($capacity);
        $this->setLoad($load);
        $this->setLight($light);
    }

    // METHODS
    public function start()
    {
        return "Engine started !";
    }

    public function loading($stuff)
    {
        $this->load += $stuff;
        if ($this->load < $this->capacity && $this->load >= 0) {
            return "In filling ...";
        } elseif ($this->load == $this->capacity) {
            return "Full !";
        } else {
            return "Please stop overfilling the truck or trying to load it negatively with antimatter.";
        }
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

    // Capacity
    /**
     * @return string
     */
    public function getCapacity(): string
    {
        return $this->capacity;
    }
    /**
     * @param string $capacity
     */
    public function setCapacity(string $capacity): void
    {
        $this->capacity = $capacity;
    }

    // Load
    /**
     * @return string
     */
    public function getLoad(): string
    {
        return $this->load;
    }
    /**
     * @param string $load
     */
    public function setLoad(string $load): void
    {
        $this->load = $load;
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
