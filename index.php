<?php

$arr = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'e', 'x', 'y', 'z'];
$word = strtolower('CODEWARS');
$shift = 5;
$encryptedWord = '';


for ($i = 0; $i < strlen($word); $i++) {
    $char = $word[$i];
    if (in_array($char, $arr)) {
        $index = array_search($char, $arr);
        $newIndex = ($index + $shift) % count($arr);
        $encryptedWord .= $arr[$newIndex];
    }
}

echo $encryptedWord;