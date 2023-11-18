<?php
//* 1 strCountWords
function _str_word_count(string $value): string
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
function _strrev(string $value): string
{
    _throw_null_exception($value);
    if (!_empty($value)) {

        $revers = '';
        for ($i = _strlen($value) - 1; $i >= 0; $i--) {
            $revers .=  @$value[$i];
        }
        return $revers;
    } else throw new Exception('string is empty.');
}
// echo_r(_strrev('hi my name is ali'), strrev('hi my name is ali'));
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

//* 3 _str_split

function _str_split(string $value): array
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
function _explode_by_char(string $separator, string $value): array
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
function _strIndexOfChar(string $char, string $value): int
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

function _str_count_char_appearance(string $toSearch, string $value): int
{
    if (_strlen($toSearch) != 1) throw new Exception("char value to search is grater than one provided \$toSearch:$toSearch");
    $appearanceCount = 0;
    for ($i = 0; $i < _strlen($value); $i++) {

        if ($value[$i] == $toSearch)
            $appearanceCount++;
    }
    return $appearanceCount;
}
// echo_r(strFindCharAppearance('a', 'aa bb bb aa'));

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

//* 8 strToLower 
function _str_to_lower(string $value): string
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
// echo_r(_str_to_lower('TEST'));

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

//* 9 strToUpper
function _str_to_upper(string $value): string
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
// echo_r(_str_to_upper('test'));

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

//* 10 _count 
//count(Countable|array $value, int $mode = COUNT_NORMAL): int

function _count(array $value): int
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
function _strlen(string $value): int
{
    // echo_r(__FUNCTION__, $value);
    $counter = 0;
    if (_isset($value)) {
        $isValue = @$value[$counter];
        if (_isset($isValue) && !_empty($isValue)) {
            while (_isset($isValue) && !_empty($isValue)) {
                $counter++;
                $isValue = $value[$counter] ?? null;
            }
        }
        // echo_r(__FUNCTION__,$counter);
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

function _isset($value): bool
{
    return $value === null ? false : true;
}
// $test = 'ok';
// echo_r(_isset($test), isset($test));

//* 13 _is_array
function _is_array(array $array): bool
{
    return _isset($array) ? true : false;
}
// echo_r(_is_array([1,2,3]), is_array([1, 2, 3]));
//TODO 14  _str_replace
function _str_replace(string $search, string $replace, string $subject): string
{
    _throw_null_exception($search, $replace, $subject);
    if (_str_contains($subject, $search)) {
    }
    return "";
}
// echo_r(_str_replace('ali', 'ahmed', 'my name is ali'), str_replace('ali', 'ahmed', 'my name is ali'));
//* 15 _is_numeric
function _is_numeric(mixed $value): bool
{
    _throw_null_exception($value);
    if ((int)$value == $value || (float)$value == $value || $value === 0)
        return true;
    return false;
}
// echo_r(_is_numeric('55'),is_numeric('55'));

//*16 _is_string
function _is_string(mixed $value): bool
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
function _mod($num1, $num2): int
{
    _throw_null_exception($num1);
    _throw_null_exception($num2);
    return $num1 % $num2;
}
// echo_r(_mod(10, 2));
//* 21 echo_r
function echo_r(...$values): void
{
    $array = [...$values];
    foreach ($array as $value) {
        echo '<h1 style="color:red;font-size:40px;">' . $value . '</h1>';
    }
    echo "<hr>";
}
// echo_r(1, 2, ...['ok', 'it', 'is', 'working']);
//* 22 _range
function _range(float |int $start, float |int $end, float |int|null $step = 1): array
{
    $array = [];
    for ($i = $start; $i <= $end; $i += $step) {
        _array_push($array, $i);
    }
    return $array;
}
// echo_r(...range(1, 5, 1), ..._range(1, 5, 1));

//* 23 _is_int
function _is_int($value): bool
{
    _throw_null_exception($value);
    return (int)$value === $value ? true : false;
}
// echo_r(_is_int(0), is_int(0));
//* 24 _is_float
function _is_float($value): bool
{
    _throw_null_exception($value);
    return (float)$value === $value;
}
// echo_r(_is_float(5.5), is_float(5.1));
//* 25 _str_ends_with
function _str_ends_with(string $value, string $endWith): bool
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
function _str_starts_with($value, $startWith): bool
{
    return _str_ends_with(_strrev($value), _strrev($startWith));
}
// echo_r(_str_starts_with('test if this works', 'test'), str_starts_with('test if this works', 'test'));
//* 27 _str_contains
function _str_contains($value, $toSearch): bool
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
    $maxValue = 0;
    foreach ($array as  $value) {
        if (!_is_numeric($value)) continue;
        $maxValue = ($value > $maxValue || $value === 0)  ? $value : $maxValue;
    }
    return $maxValue;
}
// echo_r(_max([1, 2, 3, 4, 5]), max([1, 2, 3, 4, 5]));
//* 29 _min
function _min(array $array)
{
    _throw_null_exception($array);
    if (_empty($array))  throw new Exception("Array can not be empty");
    $minValue = 0;
    foreach ($array as $value) {
        $minValue = $minValue > $value ? $value : $minValue;
        // echo_r($minValue);
    }
    return $minValue;
}
// echo_r(_min([ 0, 5]), min([ 0, 5]));

//* 30 _empty
function _empty($value): bool
{
    _throw_null_exception($value);
    if ($value === '' || $value === [])
        return true;
    return false;
}
//* 31 _ltrim

function _ltrim(string $value): string
{
    $firstCharacter = 0;
    // echo_r(__FUNCTION__, $value);

    $temp = '';
    _throw_null_exception($value);
    if (!_empty($value) && _str_starts_with($value, ' ')) {
        for ($i = 0; $i < _strlen($value); $i++) {
            if ($value[$i] !== ' ') {
                $firstCharacter = $i;
                break;
            }
        }
        for ($i = $firstCharacter; $i < _strlen($value); $i++) {
            $temp .= $value[$i];
        }
        return $temp;
    } else {
        return $value;
    }
}
// $test = '|test this|     ';
// echo_r(_strlen(ltrim($test)), ltrim($test), _strlen(_ltrim($test)), _ltrim($test));
//* 32 _rtrim
function _rtrim(string $value): string
{
    return _strrev(_ltrim(_strrev($value)));
}
// echo_r(_strlen(rtrim($test)), rtrim($test), _strlen(_rtrim($test)), _rtrim($test));

//* 33 _trim
function _trim(string $value): string
{
    return _rtrim(_ltrim($value));
}
// echo_r(_strlen(_trim($test)), $test, _strlen(_trim($test)), $test);
//*34 _str_repeat
function _str_repeat(string $value, int $times): string
{
    _throw_null_exception($value, $times);
    if (!is_numeric($times)) throw new Exception('times must be an int value');
    if ($times < 0) throw new Exception('times must be an int value');
    $temp = '';
    for ($i = 0; $i < $times; $i++) {
        $temp .= $value;
    }
    return $temp;
}
// echo_r(str_repeat('ok ', 4), _str_repeat('ok ', 4));
//* 35 _join
function _join(string $separator, array $values): string
{
    $temp = '';
    _throw_null_exception($separator, $values);
    if (!_empty($values)) {
        foreach ($values as $value) {
            $temp .= $value . $separator;
        }
        return $temp;
    }
    throw new Exception('array is empty');
}
// echo_r(join(' ', ['test', 'this', 'function']), _join(' ', ['test', 'this', 'function']));

//* 36 _str_capitalize 
function _str_capitalize(string $value): string
{
    _throw_null_exception($value);
    $temp = _trim($value);
    $temp[0] = _str_to_upper($temp[0]);
    for ($i = 1; $i < _strlen($temp); $i++) {
        if ($temp[$i] === ' ' && $i < _strlen($temp) - 1)
            $temp[$i + 1] = _str_to_upper($temp[$i + 1]);
    }
    return $temp;
}
// echo_r(_str_capitalize('capitalization is working'));

//* 37 _is_bool
function _is_bool($value): bool
{
    _throw_null_exception($value);
    return (bool)$value === $value ? true : false;
}
// echo_r(is_bool(true), _is_bool(true));

//* 38 _array_fill
function _array_fill(int $start_index, int $count, mixed $value): array
{
    $array = [];
    for ($i = $start_index; $i < $count; $i++) {
        _array_push($array, $value);
    }

    return $array;
}
// print_r(array_fill(0, 5, 'ok'));
// echo '<br>';
// print_r(_array_fill(0, 5, 'ok'));
//* 39 _array_combine
function _array_combine(array $keys, array $values): array
{
    $array = [];
    $arrLength = _count($keys);
    _throw_null_exception($keys, $values);
    if (_count($keys) == _count($values) && $arrLength > 0) {
        for ($i = 0; $i < $arrLength; $i++) {
            $array[$keys[$i]] = $values[$i];
        }
        return $array;
    } else
        throw new Exception('passed arrays must have the same length.');
}
// print_r(array_combine(['a', 's', 'h'], ['ali', 'salem', 'haddar']));
// echo '<br>';
// print_r(_array_combine(['a', 's', 'h'], ['ali', 'salem', 'haddar']));
//* 40 _chunk_split
//chunk_split — Split a string into smaller chunks
function _chunk_split(string $string, int $length = 76, string $separator = "\r\n"): string
{
    _throw_null_exception($string);
    $length = $length > _strlen($string) ? _strlen($string) : $length;
    $temp = '';
    if (!_empty($string)) {
        for ($i = 0; $i < _strlen($string);) {
            for ($j = 0; $j < $length; $j++) {
                $temp .= $string[$i++];
                if ($i >= _strlen($string)) {
                    break;
                }
            }
            $temp .= $separator;
        }
        return $temp;
    }
    throw new Exception('string must be not empty');
}

// echo_r(chunk_split('test this string', 3, '+'), _chunk_split('test this string', 3, '+'));
//* 41 _count_chars
//count_chars — Return information about characters used in a string
function _count_chars(string $string): array|string
{
    $result = [];
    _throw_null_exception($string);
    if (!_empty($string)) {
        for ($i = 0; $i < _strlen($string); $i++) {
            $result[$string[$i]] = _str_count_char_appearance($string[$i], $string);
        }
        return $result;
    }
    throw new Exception('string must be not empty');
}
// print_r(_count_chars('count chars in this string.'));
//* 42 _implode
//implode — Join array elements with a string
function _implode(array $array, string $separator = ' '): string
{
    _throw_null_exception($array);
    $temp = '';
    if (!_empty($array)) {
        foreach ($array as $value) {
            $temp .= $value . $separator;
        }
        return $temp;
    }
    throw new Exception('Array must be not empty');
}
// echo _implode(_explode_by_char(' ', 'hello my name is ali')); 
//* 43 _lcfirst
//lcfirst — Make a string's first character lowercase
function _lcfirst(string $string): string
{
    _throw_null_exception($string);
    if (!_empty($string)) {
        for ($i = 0; $i < _strlen($string); $i++) {
            if (_str_contains('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', $string[$i])) {
                $string[$i] = _str_to_lower($string[$i]);
                break;
            }
        }
        return $string;
    }
    throw new Exception('String must be not empty');
}
// echo _lcfirst('ALI');
//* 44 _str_shuffle
//str_shuffle — Randomly shuffles a string
function _str_shuffle(string $string): string
{
    _throw_null_exception($string);
    if (!_empty($string)) {
        $stringLength = _strlen($string);
        $shuffledIndexes = [];
        $temp = '';
        while (_count($shuffledIndexes) < _strlen($string)) {
            $randomIndex = rand(0, _strlen($string) - 1);
            if (!in_array($randomIndex, $shuffledIndexes))
                _array_push($shuffledIndexes, $randomIndex);
        }
        for ($i = 0; $i < $stringLength; $i++) {
            $temp .= $string[$shuffledIndexes[$i]];
        }
        return $temp;
    }
    throw new Exception('string value must be not empty');
}
// echo_r(_str_shuffle('test this string'));
//* 45 _strstr
//strstr — Find the first occurrence of a string
function _strstr(string $value, string $toSearch): string|false
{
    _throw_null_exception($value, $toSearch);
    if (!_empty($value) && !_empty($toSearch))
        $appearAt = _strstr_index($value, $toSearch);
    if ($appearAt != -1) {
        $temp = '';
        for ($i = $appearAt; $i < _strlen($value); $i++) {
            $temp .= $value[$i];
        }
    }
    return $temp;
}
// echo_r(_strstr('check if ali is ok.', 'if'), strstr('check if ali is ok.', 'if'));
//TODO 46 substr_count
//substr_count — Count the number of substring occurrences
// substr_count( string $haystack, string $needle,int $offset = 0,?int $length = null): int
//TODO 47 substr_replace
//substr_replace — Replace text within a portion of a string
//substr_replace(array|string $string,array|string $replace,array|int $offset,array|int|null $length = null): string|array
//TODO 48 substr
//substr — Return part of a string -Returns the portion of string specified by the offset and length parameters.
//substr(string $string, int $offset, ?int $length = null): string
//* 49 _abs
//Returns the absolute value of num.
function _abs(int|float $num): int|float
{
    return $num < 0 ? $num * -1 : $num;
}
// echo_r(_abs(-54));
//TODO 50 ceil 
//ceil — Round fractions up
function _ceil(int|float $num): float
{

    $fraction = (float)$num - (int)$num;
    $isNegative = $fraction < 0 ? true : false;

    return $isNegative ? ($fraction !== 0 ? (int)$num  : '') : ($fraction !== 0 ? (int)$num + 1 : $num);
}
echo_r(_ceil(6.9), ceil(6.9));
//TODO 51 floor
//floor — Round fractions down
//floor(int|float $num): float
//TODO 52 round
//round — Rounds a float
//round(int|float $num, int $precision = 0, int $mode = PHP_ROUND_HALF_UP): float
//TODO 53 is_infinite
//is_infinite — Checks whether a float is infinite
//is_infinite(float $num): bool
//TODO 54 is_nan
//is_nan — Checks whether a float is NAN
//is_nan(float $num): bool
//TODO 55 is_finite
//is_finite — Checks whether a float is finite - A finite float is neither NAN (is_nan()), nor infinite (is_infinite()).
//is_finite(float $num): bool
//TODO 56 sqrt
//sqrt — Square root
//sqrt(float $num): float
//TODO 57 array_chunk
//array_chunk — Split an array into chunks - Chunks an array into arrays with length elements. The last chunk may contain less than length elements.
//array_chunk(array $array, int $length, bool $preserve_keys = false): array
//TODO 58 array_count_values
//array_count_values — Counts the occurrences of each distinct value in an array
//array_count_values() returns an array using the values of array (which must be ints or strings) as keys and their frequency in array as values.
//array_count_values(array $array): array
//TODO 59 array_diff_key
//array_diff_key — Computes the difference of arrays using keys for comparison
//Returns an array containing all the entries from array whose keys are absent from all of the other arrays.
//array_diff_key(array $array, array ...$arrays): array
//TODO 60 array_diff
//array_diff — Computes the difference of arrays
//Returns an array containing all the entries from array that are not present in any of the other arrays. Keys in the array array are preserved.
//array_diff(array $array, array ...$arrays): array
//TODO 61 array_fill_keys
//array_fill_keys — Fill an array with values, specifying keys
//array_fill_keys(array $keys, mixed $value): array
//TODO 62 array_filter 
//array_filter — Filters elements of an array using a callback function
//array_filter(array $array, ?callable $callback = null): array
//TODO 63 array_flip
//array_flip — Exchanges all keys with their associated values in an array
//array_flip() returns an array in flip order, i.e. keys from array become values and values from array become keys.
//array_flip(array $array): array
//TODO 64 array_is_list
//array_is_list — Checks whether a given array is a list
//Determines if the given array is a list. An array is considered a list if its keys consist of consecutive numbers from 0 to count($array)-1.
//array_is_list(array $array): bool
//TODO 65 array_key_exists
//array_key_exists — Checks if the given key or index exists in the array
//array_key_exists(string|int $key, array $array): bool
//TODO 66 array_key_first
//array_key_first — Gets the first key of an array
//array_key_first(array $array): int|string|null

//TODO 67 array_key_last
//array_key_last — Gets the last key of an array
//array_key_last(array $array): int|string|null
//TODO68 array_keys
//array_keys — array_keys Return all the keys or a subset of the keys of an array
//array_keys() returns the keys, numeric and string, from the array.
//If a filter_value is specified, then only the keys for that value are returned. Otherwise, all the keys from the array are returned.
// array_keys(array $array): array
//array_keys(array $array, mixed $filter_value, bool $strict = false): array

//TODO 69 array_map
//array_map — Applies the callback to the elements of the given arrays
//array_map() returns an array containing the results of applying the callback to the corresponding value of array 
//(and arrays if more arrays are provided) used as arguments for the callback. 
//The number of parameters that the callback function accepts should match the number of arrays passed to array_map(). 
//Excess input arrays are ignored. An ArgumentCountError is thrown if an insufficient number of arguments is provided.
//array_map(?callable $callback, array $array, array ...$arrays): array
//TODO 70 array_merge_recursive
//array_merge_recursive — Merge one or more arrays recursively
//It returns the resulting array.
//If the input arrays have the same string keys, then the values for these keys are merged together into an array, and this is done recursively, 
//so that if one of the values is an array itself, the function will merge it with a corresponding entry in another array too. If, however, 
//the arrays have the same numeric key, the later value will not overwrite the original value, but will be appended.
//array_merge_recursive() merges the elements of one or more arrays together so that the values of one are appended to the end of the previous one. 


//array_merge_recursive(array ...$arrays): array

//TODO 71 array_merge
//array_merge — Merge one or more arrays
//Merges the elements of one or more arrays together so that the values of one are appended to the end of the previous one. 
//It returns the resulting array.
//If the input arrays have the same string keys, then the later value for that key will overwrite the previous one. If, however, 
//the arrays contain numeric keys, the later value will not overwrite the original value, but will be appended.
//Values in the input arrays with numeric keys will be renumbered with incrementing keys starting from zero in the result array.

//array_merge(array ...$arrays): array


//TODO 72 array_pop
//array_pop — Pop the element off the end of array
//array_pop() pops and returns the value of the last element of array, shortening the array by one element.

//array_pop(array &$array): mixed

//TODO 73 array_product
//array_product — Calculate the product of values in an array-array_product() returns the product of values in an array.

//array_product(array $array): int|float

//TODO 74 array_rand
//array_rand — Pick one or more random keys out of an array


//array_rand(array $array, int $num = 1): int|string|array

//TODO 75 array_reduce
//array_reduce — Iteratively reduce the array to a single value using a callback function
//array_reduce() applies iteratively the callback function to the elements of the array, so as to reduce the array to a single value.

//array_reduce(array $array, callable $callback, mixed $initial = null): mixed

//TODO 76 array_replace_recursive
//array_replace_recursive — Replaces elements from passed arrays into the first array recursively
//array_replace_recursive() replaces the values of array with the same values from all the following arrays. 
//If a key from the first array exists in the second array, its value will be replaced by the value from the second array. 
//If the key exists in the second array, and not the first, it will be created in the first array. If a key only exists in the first array, 
//it will be left as is. If several arrays are passed for replacement, they will be processed in order, the later array overwriting the previous values.
//array_replace_recursive() is recursive : it will recurse into arrays and apply the same process to the inner value.
//When the value in the first array is scalar, it will be replaced by the value in the second array, may it be scalar or array. 
//When the value in the first array and the second array are both arrays, array_replace_recursive() will replace their respective value recursively.
/**
 * $base = array('citrus' => array( "orange") , 'berries' => array("blackberry", "raspberry"), );
 * $replacements = array('citrus' => array('pineapple'), 'berries' => array('blueberry')); 
 * $basket = array_replace_recursive($base, $replacements);
 * print_r($basket);
 * $basket = array_replace($base, $replacements);
 * print_r($basket);
 */
/*
Array
(
    [citrus] => Array
        (
            [0] => pineapple
        )

    [berries] => Array
        (
            [0] => blueberry
            [1] => raspberry
        )

)
Array
(
    [citrus] => Array
        (
            [0] => pineapple
        )

    [berries] => Array
        (
            [0] => blueberry
        )

)

*/


//array_replace_recursive(array $array, array ...$replacements): array

//TODO 77 array_replace
//array_replace — Replaces elements from passed arrays into the first array


//array_replace(array $array, array ...$replacements): array
/*
array_replace() replaces the values of array with values having the same keys in each of the following arrays. 
If a key from the first array exists in the second array, its value will be replaced by the value from the second array. 
If the key exists in the second array, and not the first, it will be created in the first array. If a key only exists in the first array, 
it will be left as is. If several arrays are passed for replacement, they will be processed in order, the later arrays overwriting the previous values.

array_replace() is not recursive : it will replace values in the first array by whatever type is in the second array.

$base = array("orange", "banana", "apple", "raspberry");
$replacements = array(0 => "pineapple", 4 => "cherry");
$replacements2 = array(0 => "grape");

$basket = array_replace($base, $replacements, $replacements2);
print_r($basket);
Array
(
    [0] => grape
    [1] => banana
    [2] => apple
    [3] => raspberry
    [4] => cherry
)

*/
//TODO 78 array_reverse
//array_reverse — Return an array with elements in reverse order

//array_reverse(array $array, bool $preserve_keys = false): array
/*
$input  = array("php", 4.0, array("green", "red"));
$reversed = array_reverse($input);
$preserved = array_reverse($input, true);

print_r($input);
print_r($reversed);
print_r($preserved);
Array
(
    [0] => php
    [1] => 4
    [2] => Array
        (
            [0] => green
            [1] => red
        )

)
Array
(
    [0] => Array
        (
            [0] => green
            [1] => red
        )

    [1] => 4
    [2] => php
)
Array
(
    [2] => Array
        (
            [0] => green
            [1] => red
        )

    [1] => 4
    [0] => php
)

*/
//TODO 79 array_search
//array_search — Searches the array for a given value and returns the first corresponding key if successful


//array_search(mixed $toSearch, array $values, bool $strict = false): int|string|false

//TODO 80 array_shift
//array_shift — Shift an element off the beginning of array


//array_shift(array &$array): mixed

//TODO 81 array_slice
//array_slice() returns the sequence of elements from the array array as specified by the offset and length parameters.
/*
$input = array("a", "b", "c", "d", "e");

$output = array_slice($input, 2);      // returns "c", "d", and "e"
$output = array_slice($input, -2, 1);  // returns "d"
$output = array_slice($input, 0, 3);   // returns "a", "b", and "c"

*/
//array_slice(array $array,int $offset,?int $length = null,bool $preserve_keys = false): array

//TODO 82 array_splice
//array_splice — Remove a portion of the array and replace it with something else
//Removes the elements designated by offset and length from the array array, and replaces them with the elements of the replacement array, if supplied.
/*
 $input = array("red", "green", "blue", "yellow");
array_splice($input, 2);
var_dump($input);

$input = array("red", "green", "blue", "yellow");
array_splice($input, 1, -1);
var_dump($input);

$input = array("red", "green", "blue", "yellow");
array_splice($input, 1, count($input), "orange");
var_dump($input);

$input = array("red", "green", "blue", "yellow");
array_splice($input, -1, 1, array("black", "maroon"));
var_dump($input);

array(2) {
  [0]=>
  string(3) "red"
  [1]=>
  string(5) "green"
}
array(2) {
  [0]=>
  string(3) "red"
  [1]=>
  string(6) "yellow"
}
array(2) {
  [0]=>
  string(3) "red"
  [1]=>
  string(6) "orange"
}
array(5) {
  [0]=>
  string(3) "red"
  [1]=>
  string(5) "green"
  [2]=>
  string(4) "blue"
  [3]=>
  string(5) "black"
  [4]=>
  string(6) "maroon"
}

 */


//array_splice(array &$array,int $offset,?int $length = null,mixed $replacement = []): array

//TODO 83 array_sum
//array_sum — Calculate the sum of values in an array
//array_sum(array $array): int|float


//TODO 84 array_unique
//array_unique — Removes duplicate values from an array
/*
Takes an input array and returns a new array without duplicate values.
Note that keys are preserved. If multiple elements compare equal under the given flags, 
then the key and value of the first equal element will be retained.
*/


//array_unique(array $array, int $flags = SORT_STRING): array

//TODO 85 array_values
//array_values — Return all the values of an array


//array_values(array $array): array


//TODO 86 array
//array — Create an array
//array(mixed ...$values): array


//TODO 87 arsort
//arsort — Sort an array in descending order and maintain index association
/*
Sorts array in place in descending order, such that its keys maintain their correlation with the values they are associated with.

This is used mainly when sorting associative arrays where the actual element order is significant.
*/
//arsort(array &$array, int $flags = SORT_REGULAR): true


//TODO 88 asort
//asort — Sort an array in ascending order and maintain index association
/*
Sorts array in place in ascending order, such that its keys maintain their correlation with the values they are associated with.

This is used mainly when sorting associative arrays where the actual element order is significant.


*/

//asort(array &$array, int $flags = SORT_REGULAR): true


//TODO 89 compact
//compact — Create array containing variables and their values
/*
Creates an array containing variables and their values.

For each of these, compact() looks for a variable with that name in the current symbol table and adds it to the output array such that the variable name becomes 
the key and the contents of the variable become the value for that key. In short, it does the opposite of extract().


*/
//compact(array|string $var_name, array|string ...$var_names): array


//TODO 90 in_array
//in_array — Checks if a value exists in an array
//in_array(mixed $toSearch, array $values, bool $strict = false): bool


//TODO 91 krsort
//krsort — Sort an array by key in descending order d -> c -> b -> a
//krsort(array &$array, int $flags = SORT_REGULAR): true


//TODO 92 ksort
//ksort — Sort an array by key in ascending order
//ksort(array &$array, int $flags = SORT_REGULAR): true



//TODO 93 rsort
//rsort — Sort an array in descending order z -> a
//rsort(array &$array, int $flags = SORT_REGULAR): true


//TODO 94 shuffle
//shuffle — Shuffle an array - This function shuffles (randomizes the order of the elements in) an array.
//shuffle(array &$array): true

//TODO 95 sort
//sort — Sort an array in ascending order
//sort(array &$array, int $flags = SORT_REGULAR): true


//TODO 96 uasort
//uasort — Sort an array with a user-defined comparison function and maintain index association -5 -> 5 sort array by value

//Sorts array in place such that its keys maintain their correlation with the values they are associated with, using a user-defined comparison function.
//This is used mainly when sorting associative arrays where the actual element order is significant.


//uasort(array &$array, callable $callback): true

//TODO 97 uksort
//uksort — Sort an array by keys using a user-defined comparison function - Sorts array in place by keys using a user-supplied comparison function to determine the order.


//uksort(array &$array, callable $callback): true


//TODO 98 usort
//usort — Sort an array by values using a user-defined comparison function
//usort(array &$array, callable $callback): true



//* 99 _strstr_index
// return the index of the first occurrence of a string.
function _strstr_index(string $value, string $toSearch): int
{
    $temp = '';
    $appearAt = -1;
    _throw_null_exception($value);
    _throw_null_exception($toSearch);
    for ($i = 0; $i < _strlen($value); $i++) {
        for ($j = 0; $j < _strlen($toSearch); $j++) {
            if ($value[$i] === $toSearch[$j]) {
                $temp .= $value[$i];
                $i++;
                if ($temp === $toSearch) {
                    return   $appearAt = $i - _strlen($toSearch);
                }
            } else {
                $temp = '';
                break;
            }
        }
    }
    return $appearAt;
}
// echo_r(_strstr_index('0123ali', 'ali'));
//* 100
