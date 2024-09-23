<?php

class Color
{
    private int $red;
    private int $green;
    private int $blue;

    public function __construct(int $red, int $green, int $blue)
    {
        $this->setRed($red);
        $this->setGreen($green);
        $this->setBlue($blue);
    }

    private function setColor(string $color, int $value): void
    {
        if ($value < 0 || $value > 255) {
            throw new InvalidArgumentException("{$color} value must be between 0 and 255.");
        }
        $this->$color = $value;
    }

    public function setRed(int $value): void
    {
        $this->setColor('red', $value);
    }

    public function setGreen(int $value): void
    {
        $this->setColor('green', $value);
    }

    public function setBlue(int $value): void
    {
        $this->setColor('blue', $value);
    }

    public function getRed(): int
    {
        return $this->red;
    }

    public function getGreen(): int
    {
        return $this->green;
    }

    public function getBlue(): int
    {
        return $this->blue;
    }

    public function equals(Color $color): bool
    {
        return $color->getRed() === $this->red &&
            $color->getGreen() === $this->green &&
            $color->getBlue() === $this->blue;
    }

    public function equalsTwoScreens(Color $color1, Color $color2): bool
    {
        return $this->equals($color1) && $this->equals($color2);
    }

    public static function random(): void
    {
        self::$red = random_int(0, 255);
        self::$green = random_int(0, 255);
        self::$blue = random_int(0, 255);
    }


    public function mix(Color $color): Color
    {
        $mixedRed = ($this->red + $color->getRed()) / 2;
        $mixedGreen = ($this->green + $color->getGreen()) / 2;
        $mixedBlue = ($this->blue + $color->getBlue()) / 2;

        return new Color((int)$mixedRed, (int)$mixedGreen, (int)$mixedBlue);
    }
}

$color1 = new Color(250, 250, 250);
$color2 = new Color(100, 100, 100);
$mixedColor = $color1->mix($color2);

echo 'Mixed Color - Red: ' . $mixedColor->getRed() . ', Green: ' . $mixedColor->getGreen() . ', Blue: ' . $mixedColor->getBlue();