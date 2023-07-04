<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Model\Circle;
use App\Model\Triangle;
use App\Service\GeometryCalculator;

class GeometryController
{
    public function __construct()
    {
        $this->geometryCalculator = new GeometryCalculator();
    }

    /**
     * @Route("/circle/{radius}", name="circle")
     */
    public function circle(float $radius): JsonResponse
    {
        $circle = new Circle($radius);

        return new JsonResponse([
            'type' => 'circle',
            'radius' => $radius,
            'surface' => $circle->calculateSurface(),
            'circumference' => $circle->calculateCircumference(),
        ]);
    }

    /**
     * @Route("/triangle/{a}/{b}/{c}", name="triangle")
     */
    public function triangle(float $a, float $b, float $c): JsonResponse
    {
        $triangle = new Triangle($a, $b, $c);

        return new JsonResponse([
            'type' => 'triangle',
            'a' => $a,
            'b' => $b,
            'c' => $c,
            'surface' => $triangle->calculateSurface(),
            'circumference' => $triangle->calculateCircumference(),
        ]);
    }

    /**
     * @Route("/sum-of-areas", name="sumOfAreas")
     */
    public function calculateSumOfAreasAction()
    {
        $circle1 = new Circle(2);
        $circle2 = new Circle(3);
        $triangle1 = new Triangle(3, 4, 5);
        $triangle2 = new Triangle(6, 8, 10);

        $sumOfAreas = $this->geometryCalculator->sumOfAreas($circle1, $circle2);
        $sumOfAreas += $this->geometryCalculator->sumOfAreas($triangle1, $triangle2);

        return new JsonResponse(['sumOfAreas' => $sumOfAreas]);
    }

    /**
     * @Route("/sum-of-diameters", name="sumOfDiameters")
     */
    public function calculateSumOfDiametersAction()
    {
        $circle1 = new Circle(2);
        $circle2 = new Circle(3);

        $sumOfDiameters = $this->geometryCalculator->sumOfDiameters($circle1, $circle2);

        return new JsonResponse(['sumOfDiameters' => $sumOfDiameters]);
    }
}
