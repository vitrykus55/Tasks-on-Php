<?php

interface Eat
{
    public function eat();
}

interface Fly
{
    public function fly();
}

class Swallow implements Eat, Fly
{
    public function eat()
    {
        echo 'Swallow is eating insects.';
    }

    public function fly()
    {
        echo 'wallow is flying high in the sky.';
    }

}

class Ostrich implements Eat
{
    public function eat()
    {
        echo 'Ostrich is eating plants and seeds.';
    }
}

$swallow = new Swallow();
$swallow->eat();
$swallow->fly();

$ostrich = new Ostrich();
$ostrich->eat();