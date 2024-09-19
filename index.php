<?php

function is_prime($n)
{
    if ($n < 2) {
        return 'false'; // Числа менші за 2 не є простими
    }

    for ($i = 2; $i < $n; $i++) {
        if ($n % $i == 0) {
            return 'false'; // Знайдено дільник, число не просте
        }
    }

    return 'true'; // Дільників не знайдено, число просте
}

echo is_prime(7) . "\n";  // true
echo is_prime(18) . "\n"; // false
echo is_prime(11) . "\n"; // true
echo is_prime(178) . "\n"; // false