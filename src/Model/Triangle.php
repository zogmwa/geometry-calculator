<?php

namespace App\Model;

class Triangle
{
    private $a;
    private $b;
    private $c;

    public function __construct(float $a, float $b, float $c)
    {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }

    public function calculateSurface(): float
    {
        // Using Heron's formula for triangle area calculation
        $s = ($this->a + $this->b + $this->c) / 2;
        return sqrt($s * ($s - $this->a) * ($s - $this->b) * ($s - $this->c));
    }

    public function calculateCircumference(): float
    {
        return $this->a + $this->b + $this->c;
    }

    public function calculateDiameter(): float
    {
        // Will return 0 cause of triangle haven't got diameter
        return 0;
    }
}
