<?php
//* 1 strCountWords
function strCountWords(string $value)
{
    $isLastCharIsSpace = false;
    $wordCount = 0;
    for ($i = 0; $i < strlen($value); $i++) {
        if ($value[$i] == ' ') {
            if ($i != 0 && $value[$i - 1] != ' ') {
                if ($i != strlen($value)) {
                    $wordCount++;
                }
            }
        }
        if ($value[strlen($value) - 1] == ' ')
            $isLastCharIsSpace = true;
    }
    return $isLastCharIsSpace ? $wordCount : $wordCount + 1;
}
// echo strCountWords('   ok   is   fine   ');
