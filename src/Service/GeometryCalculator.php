<?php

namespace App\Service;

use App\Model\Circle;
use App\Model\Triangle;

class GeometryCalculator
{
    public function sumOfAreas($shape1, $shape2)
    {
        if ($shape1 instanceof Circle && $shape2 instanceof Circle) {
            return $shape1->calculateSurface() + $shape2->calculateSurface();
        } elseif ($shape1 instanceof Triangle && $shape2 instanceof Triangle) {
            return $shape1->calculateSurface() + $shape2->calculateSurface();
        }

        return null; // Incompatible shapes
    }

    public function sumOfDiameters($shape1, $shape2)
    {
        if ($shape1 instanceof Circle && $shape2 instanceof Circle) {
            return $shape1->calculateDiameter() + $shape2->calculateDiameter();
        }

        return null; // Incompatible shapes or not applicable
    }
}
