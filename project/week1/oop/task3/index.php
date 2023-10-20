<?php
const PI = 3.1416;

interface CalculateSquare
{
    public function calculateSquare(): float;
}

class Circle implements CalculateSquare
{

    private float $r;

    public function __construct(float $r)
    {
        $this->r = $r;
    }

    public function calculateSquare(): float
    {
        return PI * ($this->r ** 2);
    }
}

class Rectangle
{
    private float $x;
    private float $y;

    public function calculateSquare(): float
    {
        return $this->x * $this->y;
    }

    public function __construct(float $x, float $y)
    {
        $this->x = $x;
        $this->y = $y;
    }
}

class Square implements CalculateSquare
{
    private float $x;

    public function calculateSquare(): float
    {
        return $this->x ** 2;
    }

    public function __construct(float $x)
    {
        $this->x = $x;
    }
}

$objects = [
    new Square(5),
    new Rectangle(2, 4),
    new Circle(5),
];

foreach ($objects as $object) {
    if ($object instanceof CalculateSquare) {
        echo("Обьект реализует интерфейс CalculateSquare. Площадь {$object->calculateSquare()}" . ', Обьект класса - ' . get_class($object));
        echo("<br>");
    } else {
        echo('Обьект класса ' . get_class($object) . ' не реализует интерфейс CalculateSquare.');
        echo("<br>");
    }
}