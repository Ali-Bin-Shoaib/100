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
function _explode_by_char(string $separator, string $value)
{
    if (_strlen($separator) != 1) {
        throw new Exception("Separator must be one character. provided separator: \${$separator} with length = " . _strlen($separator));
    }
    $array = [];
    $temp = '';
    for ($i = 0; $i < _strlen($value); $i++) {
        if ($value[$i] == $separator || $i == _strlen($value) - 1) {
            if ($temp != '') {
                if ($i == _strlen($value) - 1)
                    $temp .= $value[$i];
                _array_push($array, $temp);
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
// print_r(_explode_by_char('/', '/this/is/a/test/for/split/function'));
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
    // echo_r('before', _count($array));
    foreach ($values as $item) {
        // if (_is_int($item))  $array[_count($array)] = (int)$item;
        // elseif (_is_float($item))  $array[_count($array)] = (float)$item;
        // else
        $array[_count($array)] = $item;
    }
    // echo_r('after', _count($array));
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
    if (_isset($isValue)) {
        while (_isset($isValue)) {
            $counter++;
            $isValue = $value[$counter] ?? null;
        }
    }
    return $counter;
}
// $testArray = [0];
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
//* 13 _is_array
function _is_array(array &$array)
{
    return _isset($array) ? true : false;
}
// $test = [1, 2, 5];
// echo is_array($test);
// echo '<br>';
// echo _is_array($test);
// echo '<br>';
//* 14 _str_replace
function _str_replace(string $search, string $replace, string $subject)
{
    echo '<h1>' . _strlen($subject) . '</h1>';

    return '';
    // for ($i = 0; $i < _strlen($subject); $i++) {
    //     for ($j = $i; $j < _strlen($subject); $j++) {
    //         if($subject[$j]==$search[$j]){
    //             $temp .= $
    //         }
    //     }
    // }
}
// echo $test = 'test';
// echo '<br>';
// $test = str_replace('test', 'ok', $test);
// echo '<br>';
// echo $test;
// echo '<br>';
// echo $test = 'test';
// echo '<br>';
// $test = _str_replace('test', 'ok', $test);
// echo '<br>';
// echo $test;

//* 15 _is_numeric
function _is_numeric(mixed $value)
{
    _throw_null_exception($value);
    if ((int)$value == $value || (float)$value == $value || $value === 0)
        return true;
    return false;
}

// $test = '55';
// echo _is_numeric($test);
// echo '<br>';
// echo is_numeric($test);
// echo '<br>';
//*16 _is_string
function _is_string(mixed $value)
{
    _throw_null_exception($value);
    return (string)$value === $value ? true : false;
}
// $test = 55;
// echo _is_string($test);
// echo '<br>';
// echo is_string($test);
//* 17 _throw_null_exception
function _throw_null_exception(...$value)
{
    foreach ($value as $v) {
        return _isset($value) ? true : throw new Exception("null value");
    }
}
//* 18 _is_null
function _is_null(mixed $value): bool
{
    return !_isset($value);
}
// $test = null;
// echo _is_null($test);
// echo '<br>';
// echo is_null($test);
//* 19 _pow
function _pow($number, $exponent)
{
    _throw_null_exception($number);
    _throw_null_exception($exponent);
    return $number ** $exponent;
}

// echo_r(pow(2, 3), _pow(2, 3));
//* 20 _mod
function _mod($num1, $num2)
{
    _throw_null_exception($num1);
    _throw_null_exception($num2);
    return $num1 % $num2;
}
// echo_r(_mod(10, 2));
//* 21 echo_r
function echo_r(...$values)
{
    $array = [...$values];
    foreach ($array as $value) {
        echo '<h1 style="color:red;font-size:40px">' . $value . '</h1>';
    }
    echo "<hr>";
}
// echo_r(1, 2, ...['ok', 'it', 'is', 'working']);
//* 22 range
function _range(float |int $start, float |int $end, float |int|null $step = 1)
{
    $array = [];
    for ($i = $start; $i <= $end; $i += $step) {
        _array_push($array, $i);
    }
    return $array;
}
// echo_r(...range(0, 20, 5), ..._range(0, 20, 5));

//* 23 _is_int
function _is_int($value)
{
    _throw_null_exception($value);
    return (int)$value === $value ? true : false;
}
// echo_r(_is_int(0), is_int(0));
//* 24 float
function _is_float($value)
{
    _throw_null_exception($value);
    return (float)$value === $value;
}
// echo_r(_is_float(5.5), is_float(5.1));
//* 25
function _str_ends_with(string $value, string $end)
{
    $flag = false;
    _throw_null_exception($value, $end);
    if (_str_contains($value, $end)) {
        if (_strlen($end) > 1) {
            for ($i = _strlen($value) - 1; $i >= 0; $i--) {
                for ($j = _strlen($end) - 1; $j >= 0; $j--) {
                    if ($end[$j] === $value[$i]) {
                        $flag = true;
                        $i--;
                    } else {
                        $flag = false;
                        break;
                    }
                }
                return $flag;
            }
        } elseif (_strlen($end) === 1) {
            $index = _strIndexOfChar($end, _strrev($value));
            if ($index === 0) return true;
            else return false;
            // echo_r($index);
        }
    } else {
        throw new Exception('invalid end with value.');
    }
    return false;
}
// echo_r(str_ends_with('a string ends with ok', 'ok'), _str_ends_with('a string ends with ok', 'ok'));
//* 26
// strStartWith(){}
//* 27
function _str_contains($value, $toSearch)
{
    $temp = '';
    _throw_null_exception($value);
    _throw_null_exception($toSearch);
    for ($i = 0; $i < _strlen($value); $i++) {
        for ($j = 0; $j < _strlen($toSearch); $j++) {
            if ($value[$i] === $toSearch[$j]) {
                $temp .= $value[$i];
                $i++;
                if ($temp === $toSearch) {
                    return true;
                }
            } else {
                $temp = '';
                break;
            }
        }
    }
    return $temp === $toSearch ? true : false;
}
// echo_r(
//     _str_contains('my name is ali', 'ali'),
//     str_contains('my name is ali', 'ali')
// );
// _arrMaxValue(){}

// _arrMinValue(){}

// strRepeat(){}

// strSubString(){}

// arrShuffle(){}

// strShuffle(){}




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
