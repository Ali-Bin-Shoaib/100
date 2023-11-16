<?php
//* 1 strCountWords
function _str_word_count(string $value)
{
    $isLastCharIsSpace = false;
    $wordCount = 0;
    for ($i = 0; $i < _strlen($value); $i++) {
        if ($value[$i] == ' ') {
            if ($i != 0 && $value[$i - 1] != ' ') {
                if ($i != _strlen($value)) {
                    $wordCount++;
                }
            }
        }
        if ($value[strlen($value) - 1] == ' ')
            $isLastCharIsSpace = true;
    }
    return $isLastCharIsSpace ? $wordCount : $wordCount + 1;
}
// echo _str_word_count('   count these words   ');
// echo '<br>';
// echo str_word_count('   count these words   ');

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

//* 2 _strrev
function _strrev(string $value)
{
    $revers = '';
    for ($i = _strlen($value) - 1; $i >= 0; $i--) {
        $revers .=  $value[$i];
    }
    return $revers;
}
// echo strRevers('hi my name is ali');
// echo '<br>';
// echo strrev('hi my name is ali');

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

//* 3 _str_split

function _str_split(string $value)
{
    $array = [];
    for ($i = 0; $i < _strlen($value); $i++) {
        $array[$i] = $value[$i];
    }
    return $array;
};
// print_r(_str_split('do ok'));
// echo '<br>';
// print_r(str_split('do ok'));

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//none issues : don't split last char if separator is before the last char.
//* 4 strSplit
function _explode(string $separator, string $value)
{
    if (_strlen($separator) != 1) {
        throw new Exception("Separator must be one character. provided separator: {$separator} with length = " . strlen($separator));
    }
    $arrayIndex = 0;
    $array = [];
    $temp = '';
    for ($i = 0; $i < strlen($value); $i++) {
        if ($value[$i] == $separator || $i == _strlen($value) - 1) {
            if ($temp != '') {
                if ($i == _strlen($value) - 1)
                    $temp .= $value[$i];
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
// print_r(_explode('/', '/this/is/a/test/for/split/function'));
// echo '<br>';
// print_r(explode('/', '/this/is/a/test/for/split/function'));

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

//* 5 strIndexOfChar
function _strIndexOfChar(string $char, string $value)
{
    if ($char == "" || $char == null)
        throw new Exception("\$char parameter is not set.");
    for ($i = 0; $i < _strlen($value); $i++) {
        if ($char == $value[$i])
            return $i;
    }
    return -1;
}
// echo _strIndexOfChar('a', 'bba');

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

//* 6 arrayPush
function _array_push(array &$array, mixed ...$values)
{
    foreach ($values as $item) {
        $array[_count($array)] = $item;
    }
}
// $testArray = [0, 1];
// $testArray1 = [0, 1];
// _array_push($testArray, [2, 3, 4]);
// print_r($testArray);
// echo '<br>';
// array_push($testArray1, [2, 3, 4]);
// print_r($testArray1);
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

//* 7 strFindCharAppearance

function strFindCharAppearance(string $toSearch, string $value)
{
    if (_strlen($toSearch) != 1) throw new Exception("char value to search is grater than one provided \$toSearch:$toSearch");
    $appearanceCount = 0;
    for ($i = 0; $i < _strlen($value); $i++) {

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
    for ($i = 0; $i < _strlen($value); $i++) {
        $upperLetterIndex = _strIndexOfChar($value[$i], $upperLetters);
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
    for ($i = 0; $i < _strlen($value); $i++) {
        $lowerLetterIndex = _strIndexOfChar($value[$i], $lowerLetters);
        if ($lowerLetterIndex != -1)
            $value[$i] = $upperLetters[$lowerLetterIndex];
    }
    return $value;
}
// echo strToUpper('test');



//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

//* 10 _count 
function _count(array $value)
{
    if (!_isset($value))
        throw new Exception("provided value is null. value must be an array.");
    $counter = 0;
    $isValue = @$value[$counter];
    if ($isValue) {
        while (_isset($isValue)) {
            $counter++;
            $isValue = $value[$counter] ?? null;
        }
    }
    return $counter;
}
// $testArray = [1];
// echo '<br>';
// echo (_count($testArray));
// echo '<br>';
// echo (count($testArray));

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

//* 11 _strlen 
function _strlen(string $value)
{
$counter = 0;
    if (_isset($value)) {
        $isValue = @$value[$counter];
        if (_isset($isValue)) {
            while (_isset($isValue)) {
                $counter++;
                $isValue = $value[$counter] ?? null;
            }
        }
        return $counter;
    } else {
        throw new Exception('provide null value.');
    }
}
// $test = 'it is working';
// echo _strlen($test);
// echo '<br>';
// echo strlen($test);
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//* 12 _isSet
//check casting (int)$value to convert zero to int and differentiate it from null

function _isset($value)
{
    return $value === null ? null : true;
}
// $test = '000';
// echo _isSet($test);
// echo '<br>';
// echo isset($test);
// echo '<br>';
// echo ' <hr > ';
// echo '<br>';

// strReplace(){}

// _isANumber(){}

// _range(){}

// _arrMaxValue(){}

// _arrMinValue(){}

// strRepeat(){}

// isString(){}

// strSubString(){}

// arrShuffle(){}

// strShuffle(){}

// strEndWith(){}

// strStartWith(){}

// strIncludes(){}

// isNull(){}

// power(){}

// mod(){}

// _trim(){}

// _lTrim(){}

// _rTrim($value){}

// _join(){$value1,$value2}

// _str_ireplace($toReplace,$value){}

// _strCapitalize($value){}

// _strComparison($value1,$value2){}

// _implode($array,$separator){}

// _substr_count($value,$substring){}

// _substr_replace($value,$toSearch,$toReplace){}

// function _wordWrap( string $string, int $width = 75, string $break = "\n",bool $cut_long_words = false):string{}

// _arrayFill($array,$value,int $times){}

//* _is_array
function _is_array(array &$array)
{
    if (_isset($array))
        if (_count($array))
            return true;
}

// echo is_array();
