<?php

class A
{
    public function sayHello(): string
    {
        return 'Hello, i am A';
    }
}

class B extends A
{
    public function sayHello(): string
    {
        return parent::sayHello() . '. It was joke, I am B';
    }
}

$a = new A();
$b = new B();

echo $a->sayHello();
echo '<br>';
echo $b->sayHello();