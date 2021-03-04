<?php

class Vehicle
{
    /**
     * @var string
     */
    protected $color;
    /**
     * @var integer
     */
    protected $currentSpeed = 0;
    /**
     * @var integer
     */
    protected $nbSeats;
    /**
     * @var integer
     */
    protected $nbWheels;

    // CONSTRUCTOR
    public function __construct(string $color, int $nbSeats, int $nbWheels)
    {
        $this->color = $color;
        $this->nbSeats = $nbSeats;
        $this->nbWheels = $nbWheels;
    }

    // METHODS
    public function forward()
    {
        $this->currentSpeed = 15;

        return "Go !";
    }

    public function brake(): string
    {
        $sentence = "";
        while ($this->currentSpeed > 0) {
            $this->currentSpeed--;
            $sentence .= "Brake !!!";
        }
        $sentence .= "I'm stopped !";
        return $sentence;
    }

    // GET & SET

    // Number of wheels
    /**
     * @return string
     */
    public function getNbWheels(): string
    {
        return $this->nbWheels;
    }

    // Current speed
    /**
     * @return int
     */
    public function getCurrentSpeed(): int
    {
        return $this->currentSpeed;
    }
    /**
     * @param int $currentSpeed
     * @return void
     */
    public function setCurrentSpeed(int $currentSpeed): void
    {
        if ($currentSpeed >= 0) {
            $this->currentSpeed = $currentSpeed;
        }
    }

    // Color
    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }
    /**
     * @param string $color
     */
    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    // Number of seats
    /**
     * @return string
     */
    public function getNbSeats(): string
    {
        return $this->nbSeats;
    }
}
