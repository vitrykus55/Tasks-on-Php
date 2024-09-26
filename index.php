<?php

class Product
{
    private string $name;
    private string $value;

    public function __construct(string $name, string $value)
    {
        $this->name = $name;
        $this->value = $value;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setValue(string $value): void
    {
        $this->value = $value;
    }
}

class ProductProcessor
{
    public function save(Product $product): void
    {
        echo 'Product' . $product->getName() . ' saved!';
    }

    public function update(Product $product): void
    {
        echo 'Product' . $product->getName() . ' updated!';
    }

    public function delete(Product $product): void
    {
        echo 'Product' . $product->getName() . ' deleted!';
    }
}

class ProductPresenter
{
    public function show(Product $product):void
    {
        echo 'Product name'. $product->getName() . ' <br>';
        echo 'Product value'. $product->getValue() . '<br>';
    }

    public function print(Product $product):void
    {
        echo 'Printing Product:'. print_r($product->getName()) . '<br>';
    }

}

$product = new Product("Laptop", 1500);

$processor = new ProductProcessor();
$processor->save($product);

$presenter = new ProductPresenter();
$presenter->show($product);
$presenter->print($product);
