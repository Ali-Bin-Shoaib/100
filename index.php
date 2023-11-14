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

//* 4 strSplit
function strSplit(string $separator, string $value)
{
    if (strlen($separator) != 1) {
        throw new Exception("Separator must be one character. provided separator: {$separator} with length = " . strlen($separator));
    }
    $arrayIndex = 0;
    $array = [];
    $temp = '';
    for ($i = 0; $i < strlen($value); $i++) {
        if ($value[$i] == $separator) {
            if ($temp != '') {
                // array_push($array, $temp);
                $array[$arrayIndex++] = $temp;
                $temp = '';
            }
        } else {
            $temp .= $value[$i];
        }
    }
    if (count($array) == 0)
        throw new Exception("provided separator does not exist on the provided string value.");

    return $array;
}
// print_r(strSplit('/', '/this/is/a/test/for/split/function'));

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

//* 5 strIndexOfChar
function strIndexOfChar(string $char, string $value)
{
    if ($char == "" || $char == null)
        throw new Exception("\$char parameter is not set.");
    for ($i = 0; $i < strlen($value); $i++) {
        if ($char == $value[$i])
            return $i;
    }
    return -1;
}
// echo strIndexOfChar(' ', 'bba');

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

//* 6 arrayPush
function arrayPush($array, $value)
{
    $array[count($array)] = $value;
    return $array;
}
// $testArray = array(0, 1);
// print_r(arrayPush(arrayPush($testArray, ['test', 'is', 'ok']), '😁'));

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

//* 7 strFindCharAppearance
function strFindCharAppearance(string $toSearch, string $value)
{
    if (strlen($toSearch) != 1) throw new Exception("char value to search is grater than one provided \$toSearch:$toSearch");
    $appearanceCount = 0;
    for ($i = 0; $i < strlen($value); $i++) {

        if ($value[$i] == $toSearch)
            $appearanceCount++;
    }
    return $appearanceCount;
}
// echo strFindCharAppearance('a', 'aabbbbaa');

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

//* 8 strToLower 
function _strToLower(string $value)
{
    $lowerLetters = 'abcdefghijklmnopqrstuvwxyz';
    $upperLetters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    for ($i = 0; $i < strlen($value); $i++) {
        $upperLetterIndex = strIndexOfChar($value[$i], $upperLetters);
        if ($upperLetterIndex != -1)
            $value[$i] = $lowerLetters[$upperLetterIndex];
    }
    return $value;
}
// echo _strToLower('TEST');

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

//* 9 strToUpper
function _strToUpper(string $value)
{
    $lowerLetters = 'abcdefghijklmnopqrstuvwxyz';
    $upperLetters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    for ($i = 0; $i < strlen($value); $i++) {
        $lowerLetterIndex = strIndexOfChar($value[$i], $lowerLetters);
        if ($lowerLetterIndex != -1)
            $value[$i] = $upperLetters[$lowerLetterIndex];
    }
    return $value;
}
// echo strToUpper('test');



//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

//* 10 _count 
function _count($value)
{
    $counter = 0;
    $isValue = $value[$counter] ?? null;
    if ($isValue == null && $value ?? null == null)
        throw new Exception("provided value is null. value must be an array.");
    while ($isValue != null) {
        $counter++;
        $isValue = $value[$counter] ?? null;
    }
    return $counter;
}
// $testArray = [1, 2, 3];
// echo '<br>';
// echo (_count($testArray));
// echo '<br>';

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

//* 11 _strlen 


//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//* 12 _isSet
function _isSet($value)
{
    if ($value == false || $value == [] || $value == '') {
        if($value!=null)
        return true;
    }
    return false;
}
$test =null;
echo _isSet($test);
echo '<br>';
echo isset($test);
echo '<br>';
echo ' <hr > ';
echo '<br>';
