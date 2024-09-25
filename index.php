<?php

class Product
{
    public string $name;
    public int $price;
    public int $quantity;

    public function __construct(string $name, int $price, int $quantity)
    {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }

    public function totalCost(): int
    {
        return $this->price * $this->quantity;
    }

    public function applyDiscount(float $discount_percentage): void
    {
        $this->price -= $this->price * ($discount_percentage / 100);
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function isAvailable(): bool
    {
        return $this->quantity > 0;
    }

    public function increaseQuantity(int $amount): void
    {
        $this->quantity += $amount;
    }

    public function decreaseQuantity(int $amount): void
    {
        if ($this->quantity >= $amount) {
            $this->quantity -= $amount;
        } else {
            echo 'Not enough quantity<br>';
        }
    }

    public function displayProductInfo(): void
    {
        echo 'Name: ' . $this->name . '<br>';
        echo 'Price: ' . $this->price . '<br>';
        echo 'Quantity: ' . $this->quantity . '<br>';
        echo 'Total cost: ' . $this->totalCost() . '<br>';
        echo $this->isAvailable() ? 'We have this<br>' : 'We don\'t have this<br>';
    }
}

$product = new Product("Phone", 10000, 511);
$product->displayProductInfo();

$product->applyDiscount(10);
echo "Price after discount: " . $product->getPrice() . "<br>";

$product->increaseQuantity(10);
$product->displayProductInfo();

$product->decreaseQuantity(5);
$product->displayProductInfo();
