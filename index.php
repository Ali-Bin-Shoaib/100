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
// $test= '   count these words   ';
// echo_r(_str_word_count($test),str_word_count($test));
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

//* 2 _strrev
function _strrev(string $value)
{
    $revers = '';
    for ($i = _strlen($value) - 1; $i >= 0; $i--) {
        $revers .=  @$value[$i];
    }
    return $revers;
}
// echo_r(_strrev('hi my name is ali'), strrev('hi my name is ali'));
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
// print_r(_explode_by_char('/', 'the/name/is/ali'));
// echo '<br>';
// print_r(explode('/', 'the/name/is/ali'));

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
// echo_r(_strIndexOfChar('a', 'bba'));

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
// $toPush = [2, 3, 4];
// _array_push($testArray, 2);
// array_push($testArray1, 2);
// echo_r(...$testArray, ...$testArray1);
// array_push($testArray1, $toPush);
// _array_push($testArray, $toPush);
// print_r($testArray);
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
// echo_r(strFindCharAppearance('a', 'aabbbbaa'));

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
// echo_r(_strToLower('TEST'));

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
// echo_r(strToUpper('test'));



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
// $testArray = [1,2,3,4];
// echo_r(_count($testArray), count($testArray));

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
// echo_r(_strlen($test),strlen($test));
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//* 12 _isSet
//check casting (int)$value to convert zero to int and differentiate it from null

function _isset($value)
{
    return $value === null ? null : true;
}
// $test = 'ok';
// echo_r(_isset($test), isset($test));

//* 13 _is_array
function _is_array(array $array)
{
    return _isset($array) ? true : false;
}
// echo_r(_is_array([1,2,3]), is_array([1, 2, 3]));
//* 14 _str_replace
function _str_replace(string $search, string $replace, string $subject)
{
    _throw_null_exception($search, $replace, $subject);
    if (_str_contains($subject, $search)) {
    }
}
// echo_r(_str_replace('ali', 'ahmed', 'my name is ali'), str_replace('ali', 'ahmed', 'my name is ali'));
//* 15 _is_numeric
function _is_numeric(mixed $value)
{
    _throw_null_exception($value);
    if ((int)$value == $value || (float)$value == $value || $value === 0)
        return true;
    return false;
}
// echo_r(_is_numeric('55'),is_numeric('55'));

//*16 _is_string
function _is_string(mixed $value)
{
    _throw_null_exception($value);
    return (string)$value === $value ? true : false;
}
// echo_r(_is_string('test'),is_string('test'));
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
// echo_r(_is_null(null), is_null(null));
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
//* 22 _range
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
//* 24 _is_float
function _is_float($value)
{
    _throw_null_exception($value);
    return (float)$value === $value;
}
// echo_r(_is_float(5.5), is_float(5.1));
//* 25 _str_ends_with
function _str_ends_with(string $value, string $endWith)
{
    $flag = false;
    _throw_null_exception($value, $endWith);
    if ($value === '' || $endWith === '') throw new Exception('invalid value');
    if (_str_contains($value, $endWith)) {
        if (_strlen($endWith) > 1) {
            $i = _strlen($value) - 1;
            for ($j = _strlen($endWith) - 1; $j >= 0; $j--) {
                if ($endWith[$j] === $value[$i]) {
                    $flag = true;
                    $i--;
                } else {
                    return false;
                }
            }
            return $flag;
        } elseif (_strlen($endWith) === 1) {
            $index = _strIndexOfChar($endWith, _strrev($value));
            if ($index === 0) return true;
            else return false;
        }
    }
    return false;
}
// echo_r(str_ends_with('a string ends with ok', 'ok'), _str_ends_with('a string ends with ok', 'ok'));
//* 26 _str_starts_with
function _str_starts_with($value, $startWith)
{
    return _str_ends_with(_strrev($value), _strrev($startWith));
}
// echo_r(_str_starts_with('test if this works', 'test'), str_starts_with('test if this works', 'test'));
//* 27 _str_contains
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
//* 28 _max
function _max(array $array)
{
    _throw_null_exception($array);
    if (_empty($array))
        throw new Exception("Array can not be empty");
    $maxValue = NULL;
    foreach ($array as  $value) {
        if (!is_numeric($value)) continue;
        $maxValue = $maxValue < $value ? $value : $maxValue;
    }
    return $maxValue;
}
echo_r(_max([]), max([1, 2, 3]));
//* 29 _min
// _min(){}

//* 30 _empty
function _empty($value)
{
    _throw_null_exception($value);
    if ($value !== '' || $value !== [])
        return true;
    return false;
}
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
