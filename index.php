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

    public static function compareColors(Color $color1, Color $color2): bool
    {
        return $color1->getRed() === $color2->getRed() &&
            $color1->getGreen() === $color2->getGreen() &&
            $color1->getBlue() === $color2->getBlue();
    }

    public function isEqual(Color $otherColor): bool
    {
        return $this->getRed() === $otherColor->getRed() &&
            $this->getGreen() === $otherColor->getGreen() &&
            $this->getBlue() === $otherColor->getBlue();
    }


    public static function random(): Color
    {
        $red = random_int(0, 255);
        $green = random_int(0, 255);
        $blue = random_int(0, 255);

        return new Color($red, $green, $blue);
    }

    public function mix(Color $color): Color
    {
        $mixedRed = ($this->red + $color->getRed()) / 2;
        $mixedGreen = ($this->green + $color->getGreen()) / 2;
        $mixedBlue = ($this->blue + $color->getBlue()) / 2;

        return new Color((int)$mixedRed, (int)$mixedGreen, (int)$mixedBlue);
    }
}

$color1 = new Color(255, 255, 255);
$color2 = new Color(100, 100, 100);
$color3 = new Color(255, 255, 255);

if (Color::compareColors($color1, $color3)) {
    echo "\n The colors are the same.";
} else {
    echo "\n The colors are different.";
}


if ($color1->isEqual($color2)) {
    echo "\n The colors are the same.";
}else{
    echo "\n The colors are different.";

}
var_dump(Color::compareColors($color1, $color3));
