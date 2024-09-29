<?php

interface Car
{
    public function getModel(): string;

    public function getPrice(): float;
}

class EconomyCar implements Car
{
    private string $model;
    private float $price;

    public function __construct()
    {
        $this->model = 'Toyota Yaris';
        $this->price = 110;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}

class StandardCar implements Car
{
    private string $model;
    private float $price;

    public function __construct()
    {
        $this->model = 'Volkswagen Golf VIII';
        $this->price = 160;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}

class LuxuryCar implements Car
{
    private string $model;
    private float $price;

    public function __construct()
    {
        $this->model = 'Mercedes Maybach';
        $this->price = 240;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}

abstract class TaxiFactory
{
    abstract public function createCar(): Car;
}

class EconomyTaxiFactory extends TaxiFactory
{
    public function createCar(): Car
    {
        return new EconomyCar();
    }
}

class StandardTaxiFactory extends TaxiFactory
{
    public function createCar(): Car
    {
        return new StandardCar();
    }
}

class LuxuryTaxiFactory extends TaxiFactory
{
    public function createCar(): Car
    {
        return new LuxuryCar();
    }
}

function displayCarDetails(TaxiFactory $factory)
{
    $car = $factory->createCar();
    echo "Модель: " . $car->getModel() . "<br>";
    echo "Ціна: ₴" . $car->getPrice() . "<br>";
}

$economyFactory = new EconomyTaxiFactory();
$standardFactory = new StandardTaxiFactory();
$luxuryFactory = new LuxuryTaxiFactory();

echo "Economy taxi:<br>";
displayCarDetails($economyFactory);

echo "<br>Standard taxi:<br>";
displayCarDetails($standardFactory);

echo "<br>Luxury taxi:<br>";
displayCarDetails($luxuryFactory);
