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

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

//* 2 strRevers
function strRevers(string $value)
{
    $revers = '';
    for ($i = strlen($value) - 1; $i >= 0; $i--) {
        $revers = $revers . $value[$i];
    }
    return $revers;
}
// echo strRevers('ok');

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

//* 3 strToArray
function strToArray(string $value)
{
    $array = [];
    for ($i = 0; $i < strlen($value); $i++) {
        $array[$i] = $value[$i];
    }
    return $array;
};
// print_r(strToArray('do ok'));

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
