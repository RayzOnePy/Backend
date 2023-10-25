<?php

abstract class AbstractClass
{
    abstract public function getValue();

    public function printValue(): void
    {
        echo("Значение {$this->getValue()}");
    }
}

class ClassA extends AbstractClass
{
    private string $value;

    public function getValue(): string
    {
        return $this->value;
    }

    public function __construct(string $value)
    {
        $this->value = $value;
    }
}

$objectA = new ClassA('kek');
$objectA->printValue();