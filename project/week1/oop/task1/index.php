<?php 
    class Cat
    {
        private string $name;
        private string $color;
        private float $weight;

        public function sayHello() : void
        {
            echo("Привет! меня зовут {$this->name}, мой цвет {$this->color} <br>");
        }

        public function setColor(string $color) : void
        {
            $this->color = $color;
        }

        public function getColor() : string
        {
            return $this->color;
        }

        public function __construct(string $name, string $color, ?float $weight = 1)
        {
            $this->name = $name;
            $this->color = $color;
            $this->weight = $weight;
        }
    }

    $cat1 = new Cat('Снежок', 'Белый');
    $cat2 = new Cat('Барсик', 'Рыжий');

    $cat1->sayHello();
    $cat2->sayHello();
?>