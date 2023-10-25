<?php

abstract class HumanAbstract
{
    private string $name;

    public function getName(): string
    {
        return $this->name;
    }

    abstract public function getGreetings(): string;

    abstract public function getMyNameIs(): string;

    public function introduceYourself(): string
    {
        return $this->getGreetings() . '! ' . $this->getMyNameIs() . ' ' . $this->getName() . '.';
    }

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}

class RussianHuman extends HumanAbstract
{
    public function getGreetings(): string
    {
        return 'Привет';
    }

    public function getMyNameIs(): string
    {
        return 'Меня зовут';
    }
}

class EnglishHuman extends HumanAbstract
{
    public function getGreetings(): string
    {
        return 'Hello';
    }

    public function getMyNameIs(): string
    {
        return 'My name is';
    }
}

$russianHuman = new RussianHuman('Иван');
$englishHuman = new EnglishHuman('Robbin');

echo($russianHuman->introduceYourself());
echo('<br>');
echo($englishHuman->introduceYourself());