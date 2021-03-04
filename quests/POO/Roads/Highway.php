<?php

abstract class Highway
{
    /**
     * @var array
     */
    protected $currentVehicles;
    /**
     * @var integer
     */
    protected $nbLane;
    /**
     * @var integer
     */
    protected $maxSpeed;

    // CONSTRUCTOR
    public function __construct(array $currentVehicles, int $nbLane, int $maxSpeed)
    {
        $this->currentVehicles = $currentVehicles;
        $this->nbLane = $nbLane;
        $this->maxSpeed = $maxSpeed;
    }

    // METHODS
    abstract public function addVehicle(Vehicle $vehicle): void;

    // GET & SET

    // Current vehicles
    /**
     * @return int
     */
    public function getCurrentVehicles(): array
    {
        return $this->currentVehicles;
    }
    /**
     * @param int $currentVehicles
     * @return void
     */
    public function setCurrentVehicles(int $currentVehicles): void
    {
        if ($currentVehicles >= 0) {
            $this->currentVehicles = $currentVehicles;
        }
    }

    // Number of lanes
    /**
     * @return string
     */
    public function getNbLane(): string
    {
        return $this->nbLane;
    }
    /**
     * @param string $nbLane
     */
    public function setNbLane(string $nbLane): void
    {
        $this->nbLane = $nbLane;
    }

    // Max speed
    /**
     * @return string
     */
    public function getMaxSpeed(): string
    {
        return $this->maxSpeed;
    }
    /**
     * @param string $maxSpeed
     */
    public function setMaxSpeed(string $maxSpeed): void
    {
        $this->maxSpeed = $maxSpeed;
    }
}
