<?php
//? 101 functions
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

function _str_split(string $value, int $length = 1): array
{
    $array = [];
    $currentIndex = 0;
    for ($i = 0; $i < _strlen($value); $i += $length) {
        for ($j = 0; $j < $length; $j++) {
            if ($i + $j < _strlen($value))
                @$array[$currentIndex] .= $value[$i + $j];
            else
                return $array;
        }
        $currentIndex++;
    }
    return $array;
};
print_r(_str_split('abcdefghijklmnopqrstuvwxyz', 3));
echo '<br>';
print_r(str_split('abcdefghijklmnopqrstuvwxyz', 3));

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
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
    $arr = [...$values];
    foreach ($arr as $item) {
        $array[_count($array)] = $item;
    }
}
// $testArray = [];
// $testArray1 = [];
// $toPush = [2, 3, 4];
// _array_push($testArray, 0,1,2);
// array_push($testArray1, 0,1,2);
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
// echo_r(_str_count_char_appearance('a', 'aa bb dd aa'));

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

function _count(array $array): int
{
    if (!_isset($array))
        throw new Exception("provided value is null. value must be an array.");
    if (_empty($array)) return 0;
    $counter = 0;
    foreach ($array as $key => $value) {
        _isset($array[$key]) ? $counter++ : '';
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
//* 14  _str_replace
function _str_replace(string $search, string $replace, string $subject): string
{
    $temp = '';
    for ($i = 0; $i < strlen($subject); $i++) {
        $isMatch = true;
        for ($j = 0; $j < strlen($search); $j++) {
            if ($subject[$i + $j] !== $search[$j]) {
                $isMatch = false;
                break;
            }
        }
        if ($isMatch) {
            $temp .= $replace;
            $i += strlen($search) - 1;
        } else {
            $temp .= $subject[$i];
        }
    }
    return $temp;
}

// echo_r(_str_replace('ali', 'ahmed', 'ali\'s friend name is ali'), str_replace('ali', 'ahmed', 'ali\'s friend name is ali'));
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
// echo_r(join(' ', ['test', 'this', ]), _join(' ', ['test', 'this', '']));

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
    _throw_null_exception($keys, $values);
    $array = [];
    $arrLength = _count($keys);
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
        while (count($shuffledIndexes) < _strlen($string)) {
            $randomIndex = rand(0, _strlen($string) - 1);
            // $randomIndex = _rand( _strlen($string) - 1);

            if (!_in_array($randomIndex, $shuffledIndexes))
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
        $appearAt = _strpos($value, $toSearch);
    if ($appearAt != -1) {
        $temp = '';
        for ($i = $appearAt; $i < _strlen($value); $i++) {
            $temp .= $value[$i];
        }
    }
    return $temp;
}
// echo_r(_strstr('check if ali is ok.', 'if'), strstr('check if ali is ok.', 'if'));
//* 46 substr_count
//substr_count — Count the number of substring occurrences
function  _substr_count(string $value, string $toSearch, int $offset = 0, ?int $length = null): int
{
    $appearanceCount = 0;
    $temp = '';
    for ($i = 0; $i < _strlen($value); $i++) {
        for ($j = 0; $j < _strlen($toSearch); $j++) {
            if ($toSearch[$j] == $value[$i]) {
                $temp .= $value[$i];
                $i++;
                if ($i >= _strlen($value))
                    break;
                if ($temp === $toSearch) {
                    $appearanceCount++;
                    $temp = '';
                }
            } else {
                $temp = '';
                continue;
            }
        }
    }
    return $appearanceCount;
}
// echo _substr_count('ali ali ali is my name ', 'ali');
//* 49 _abs
//Returns the absolute value of num.
function _abs(int|float $num): int|float
{
    return $num < 0 ? $num * -1 : $num;
}
// echo_r(_abs(-54));
//* 50 ceil 
//ceil — Round fractions up
function _ceil(int|float $num): float
{

    $fraction = (float)$num - (int)$num;
    $isNegative = $fraction < 0 ? true : false;

    return $isNegative ? ($fraction !== 0 ? (int)$num  : $num) : ($fraction !== 0 ? (int)$num + 1 : $num);
}
// echo_r(_ceil(6.1), ceil(6.1));
//* 51 floor
//floor — Round fractions down
function _floor(int|float $num): float
{
    $fraction = (float)$num - (int)$num;
    $isNegative = $fraction < 0 ? true : false;
    return $isNegative ? ((int)$fraction !== 0 ? ((int)$num - 1) : ((int)$num - 1)) : ((int)$fraction !== 0 ? ((int)$num + 1) : ((int)$num));
}
// echo_r(_floor(10.5), floor(10.5));

//* 52 round
//round — Rounds a float
function _round(int|float $num, int $precision = 0, int $mode = PHP_ROUND_HALF_UP): float
{
    $fraction = (float) $num - (int)$num;
    if ($fraction > 0)
        return $fraction >= 0.5 ? _ceil($num) : (int)$num;
    return $fraction >= -0.5 ? _floor($num) : (int)$num;
}
// echo_r(round(5.5), _round(5.5));
// 53 is_infinite
//is_infinite — Checks whether a float is infinite
function _is_infinite(float $num): bool
{
    return ($num == INF || $num == -INF) ? true : false;
}
// echo_r(is_infinite(INF), _is_infinite(INF));
//* 54 is_nan
//is_nan — Checks whether a float is NAN
function _is_nan(float $num): bool
{
    // return (string)$num === 'NAN' ? true : false;
    return $num !== $num;
}
// echo_r(is_nan(sqrt(-1)), _is_nan(sqrt(-1)));
//* 55 is_finite
//is_finite — Checks whether a float is finite - A finite float is neither NAN (is_nan()), nor infinite (is_infinite()).
function _is_finite(float $num): bool
{
    return !_is_infinite($num) && !_is_nan($num);
}
// echo_r(is_finite(sqrt(50)),_is_finite(sqrt(50)));
//* 56 sqrt
//sqrt — Square root
function _sqrt(float $num): float
{
    return _pow($num, 1 / 2);
}
// echo_r(_sqrt(9), sqrt(9));
// 57 array_chunk
//array_chunk — Split an array into chunks - Chunks an array into arrays with length elements. The last chunk may contain less than length elements.
function _array_chunk(array $array, int $length): array
{
    $result = [];
    if (!_empty($array)) {
        for ($i = 0; $i < _count($array);) {
            $chunks = [];
            for ($j = 0; $j < $length && $i < _count($array); $j++) {
                $chunks[$j] = $array[$i];
                $i++;
            }
            _array_push($result, $chunks);
        }
        return $result;
    }
    return [[]];
}
// $array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
// print_r(array_chunk($array, 3));
// echo '<br>';
// print_r(_array_chunk($array, 3));
//* 58 array_count_values
//array_count_values — Counts the occurrences of each distinct value in an array
//array_count_values() returns an array using the values of array (which must be ints or strings) as keys and their 
//frequency in array as values.
function _array_count_values(array $array): array
{
    //[0,1,2,3,4,5,6,7,8,9]
    //[1,2,2,3,3,3,4,4,4,4]
    $result = [];
    $indexes = [];
    if (!_empty($array)) {
        for ($i = 0; $i < _count($array); $i++) {
            if (!_in_array($array[$i], $indexes)) {
                $indexes[] = $array[$i];
            }
        }
        // print_r($indexes);
        for ($i = 0; $i < _count($indexes); $i++) {
            for ($j = 0; $j < _count($array); $j++) {
                if ($indexes[$i] === $array[$j]) {
                    @$result[$indexes[$i]]++;
                }
            }
        }
    }
    return $result;
}
// print_r(array_count_values([1, 2, 2, 3, 3, 3, 4, 4, 4, 4]));
// echo '<hr>';
// echo "<br>";
// print_r(_array_count_values([1, 2, 2, 3, 3, 3, 4, 4, 4, 4]));
//* 59 array_diff_key
//array_diff_key — Computes the difference of arrays using keys for comparison
//Returns an array containing all the entries from array whose keys are absent from all of the other arrays.
function _array_diff_key(array $array, array ...$arrays): array
{
    $allArrays = _array_merge(...$arrays);
    $result = [];

    foreach ($array as $k => $v) {
        if (!_array_key_exists($k, $allArrays))
            $result[$k] = $v;
    }
    return $result;
}
// print_r(array_diff_key(['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4], ['d' => 4], ['c' => 3]));
// echo "<br>";
// print_r(_array_diff_key(['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4], ['d' => 4], ['c' => 3]));
//* 60 array_diff
//array_diff — Computes the difference of arrays
//Returns an array containing all the entries from array that are not present in any of the other arrays. 
//Keys in the array array are preserved.
function _array_diff(array $array, array ...$arrays): array
{
    $allArrays = array_merge(...$arrays);
    $result = [];
    foreach ($array as $key => $value) {
        // echo_r (!_in_array($value, $array));
        if (!_in_array($value, $allArrays))
            $result[$key] = $value;
    }
    return $result;
}
// print_r(array_diff(['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4], ['d' => 5], ['c' => 3]));
// echo "<hr>";
// print_r(_array_diff(['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4], ['d' => 5], ['c' => 3]));

//* 61 array_fill_keys
//array_fill_keys — Fill an array with values, specifying keys
function _array_fill_keys(array $keys, mixed $value): array
{
    $result = [];
    for ($i = 0; $i < _count($keys); $i++) {
        $result[$keys[$i]] = $value;
    }
    return $result;
}
// print_r(array_fill_keys([1,2,3],5));
// echo '<br>';
// print_r( _array_fill_keys([1, 2, 3], 5));
//* 62 array_filter 
//array_filter — Filters elements of an array using a callback function
function _array_filter(array $array, ?callable $callback = null): array
{

    $result = [];
    foreach ($array as $item) {
        $callback($item) ? array_push($result, $callback($item)) : '';
    }
    return $result;
}

// function getEvenNumbers($num)
// {
//     return $num % 2 == 0 ? $num : null;
// }
// print_r(_array_filter([1, 2, 3], 'getEvenNumbers'));
//* 63 array_flip
//array_flip — Exchanges all keys with their associated values in an array
function _array_flip(array $array): array
{
    return _array_combine(_array_keys($array), _array_values($array));
}
// print_r(_array_flip([5, 4, 3, 2, 1]));
//* 64 array_is_list
//array_is_list — Checks whether a given array is a list
//Determines if the given array is a list. An array is considered a list if its keys consist of consecutive numbers from 0 to count($array)-1.
function _array_is_list(array $array): bool
{
    $i = 0;
    foreach ($array as $key => $value) {
        $key === $i ? $i++ : '';
    }
    return (_count($array)) === $i ? true : false;
}
// echo_r(_array_is_list([1, 2, 3, 4, 5]));
//* 65 array_key_exists
//array_key_exists — Checks if the given key or index exists in the array
function _array_key_exists(string|int $key, array $array): bool
{
    return (isset($array[$key]) && !empty($array[$key])) ? true : false;
}
// echo_r(_array_key_exists('b',['a' => 1, 'b' => 2, 'c' => 3]));

//* 66 array_key_first
//array_key_first — Gets the first key of an array
function _array_key_first(array $array): int|string|null
{
    foreach ($array as $key => $value)
        return $key;
    return null;
}
// echo_r(_array_key_first(['a' => 1, 'b' => 2, 'c' => 3]));

//* 67 array_key_last
//array_key_last — Gets the last key of an array
function _array_key_last(array $array): int|string|null
{
    return _array_keys($array)[count($array) - 1];
}
// echo_r(_array_key_last(['a'=>1,'b'=>2,'c'=>3]));
//* 68 array_keys
function _array_keys(array $array, mixed $filter_value = null, bool $strict = false): array
{
    $result = [];
    if (!_empty($array)) {
        foreach ($array as $key => $value) {

            if (!empty($filter_value)) {
                if ($strict ? $filter_value === $value : $filter_value == $value)
                    _array_push($result, $key);
            } else
                _array_push($result, $key);
        }
    }
    return $result;
}
// print_r(_array_keys(['a' => 1, 'b' => 2, 'c' => 3], 2));
//* 69 array_map
//array_map — Applies the callback to the elements of the given arrays
function _array_map(?callable $callback, array $array, array ...$arrays): array
{
    $result = [];
    if (_empty($arrays)) {
        foreach ($array as $item) {
            $temp = $callback($item);
            array_push($result, $temp);
        }
        return $result;
    }
    foreach ($array as $item) {
        if (!empty($arrays)) {
            foreach ($arrays as $arr) {
                if (!empty($arr)) {
                    foreach ($arr as $val)
                        $temp = $callback($item, $val);
                    array_push($result, $temp);
                } else {
                    $temp = $callback($item, $arr);
                    array_push($result, $temp);
                }
            }
        }
    }
    return $result;
}
// $arr = [3, 2, 2, 2, 2, 2, 2, 2, 2];
// $arr3 = [2, 3, 4, 5, 6, 7, 8, 9, 10];
// print_r(_array_map('_pow', $arr3,$arr));
//* 70 array_merge_recursive
//array_merge_recursive — Merge one or more arrays recursively
function _array_merge_recursive(array ...$arrays): array
{
    $result = [];



    foreach ($arrays as  $array) {
        foreach ($array as $key => $value) {
            if (is_array($value))
                $result[$key] = _array_merge_recursive($value);
            else
                $result[$key] = $value;
        }
    }

    return $result;
}
// print_r(_array_merge_recursive(['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => [9, 99, 999]], ['d' => 4], ['c' => 5]));

//* 71 array_merge
//array_merge — Merge one or more arrays
//Merges the elements of one or more arrays together so that the values of one are appended to the end of the previous one. 
function _array_merge(array ...$arrays): array
{
    $result = [];
    foreach ($arrays as $arr) {
        if (_is_array($arr))
            foreach ($arr as $key => $val) {
                $result[$key] = $val;
            }
    }
    return $result;
}
// echo "<br>";
// print_r(_array_merge(['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4], ['d' => 4], ['c' => 3]));

//* 72 array_pop
//array_pop — Pop the element off the end of array
function _array_pop(array &$array): mixed
{
    if (_isset($array) && !_empty($array)) {
        $result = [];
        $popIndex = _count($array) - 1;
        $i = 0;
        foreach ($array as $key => $value) {
            if ($i < $popIndex) {
                $result[$key] = $value;
                $i++;
            } else $popVal = $value;
        }
        $array = $result;
        return $popVal;
    }
    throw new Exception('array is empty');
}
// $test = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5];
// print_r(_array_pop($test));
// echo "<hr>";
// print_r($test);

//* 73 array_product
//array_product — Calculate the product of values in an array-array_product() returns the product of values in an array.

function _array_product(array $array): int|float
{
    $product = 1;
    if (!_empty($array)) {
        foreach ($array as $value) {
            $product *= $value;
        }
    }
    return $product;
    // throw new Exception('array must not be empty.');
}
// echo _array_product([1,2,3,4]);

//* 74 array_rand
//array_rand — Pick one or more random keys out of an array


function _array_rand(array $array, int $num = 1): int|string|array
{
    $randomIndexes = array();
    $result = [];
    while (_count($randomIndexes)  != $num) {
        $randomIndex = rand(0, _count($array) - 1);
        if (!in_array($randomIndex, $randomIndexes, true))
            array_push($randomIndexes, $randomIndex);
    }
    for ($i = 0; $i < $num; $i++) {
        $result[] = @$randomIndexes[$i];
    }
    return $result;
}
// print_r(array_rand([1, 2, 3], 2));
// echo "<hr>";
// print_r(_array_rand([1, 2, 3], 2));
//* 75 array_reduce
//array_reduce — Iteratively reduce the array to a single value using a callback function
//array_reduce() applies iteratively the callback function to the elements of the array, so as to reduce the array to a single value.

function _array_reduce(array $array, callable $callback, mixed $initial = null): mixed
{
    $temp = $initial;
    foreach ($array as $item)
        $temp = $callback($temp, $item);
    return $temp;
}

// $arr = [1, 2, 3, 4, 5];
// echo _array_reduce($arr, 'sum');
// function sum($sum, $item)
// {
//     $sum += $item;
//     return $sum;
// }
//* 77 _uc_first
function _uc_first(string $string): string
{
    _throw_null_exception($string);
    if (!_empty($string)) {
        for ($i = 0; $i < _strlen($string); $i++) {
            if (_str_contains('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', $string[$i])) {
                $string[$i] = _str_to_upper($string[$i]);
                break;
            }
        }
        return $string;
    }
    throw new Exception('String must be not empty');
}
//* 78 _array_reverse
//array_reverse — Return an array with elements in reverse order

function _array_reverse(array $array, bool $preserve_keys = false): array
{
    $temp = [];
    for ($i = _count($array) - 1, $j = 0; $i >= 0; $i--, $j++) {
        $temp[$preserve_keys ? $i : $j] = $array[$i];
    }
    return $temp;
}
// print_r(_array_reverse([1, 2, 3, 4, 5]));

//* 79 array_search
//array_search — Searches the array for a given value and returns the first corresponding key if successful


function _array_search(mixed $toSearch, array $values, bool $strict = false): int|string|false
{
    foreach ($values as $key => $value) {
        if (($strict && $value === $toSearch) || (!$strict && $value == $toSearch)) {
            return $key;
        }
    }
    return false;
}
// echo_r(array_search(2, [1, 2, 3]), _array_search(2, [1, 2, 3]));
//* 80 _array_shift
//array_shift — Shift an element off the beginning of array
function _array_shift(array &$array): mixed
{
    $temp = [];
    for ($i = 1; $i < _count($array); $i++) {
        $temp[$i - 1] = $array[$i];
    }
    $array = $temp;
    return true;
}
// $test = [1, 2, 3];
// _array_shift($test);
// print_r($test);
//* 81 _array_slice
//array_slice() returns the sequence of elements from the array array as specified by the offset and length parameters.

// function _array_slice(array $array,int $offset,?int $length = null,bool $preserve_keys = false): array{
function _array_slice(array $array, int $offset, ?int $length = null): array
{

    $result = [];
    $i = 0;
    $start = $offset;
    while ($length !== null ? $i < $length : $i < _count($array) - $offset) {
        _array_push($result, $array[$start]);
        $start++;
        $i++;
    }
    return $result;
}
// $input = array("a", "b", "c", "d", "e");

// print_r(_array_slice($input, 2));


//* 83 array_sum
//array_sum — Calculate the sum of values in an array
function _array_sum(array $array): int|float
{
    $sum = 0;
    for ($i = 0; $i < _count($array); $i++) {
        $sum += $array[$i];
    }
    return $sum;
}

// echo _array_sum([1,2,3,4]);
//* 84 array_unique
//array_unique — Removes duplicate values from an array
function _array_unique(array $array): array
{
    $result = [];
    foreach ($array as $value) {
        _in_array($value, $result) ? '' : array_push($result, $value);
    }
    return $result;
}
// print_r(_array_unique([1, 2, 3, 1, 2, 3, 4]));
//* 85 array_values
//array_values — Return all the values of an array
function _array_values(array $array): array
{
    $result = [];
    if (!_empty($array)) {
        foreach ($array as $key => $value) {
            _array_push($result, $value);
        }
    }
    return $result;
}
// echo_r(...(array_values(['a' => 1, 'b' => 2])));

//* 86 array
//array — Create an array
function _array(mixed ...$values): array
{
    $result = [];
    foreach ($values as $value) {
        _array_push($result, $value);
    }
    return $result;
}
// echo_r(..._array(1, 2, 3,'uuu'));




//* 89 compact
//compact — Create array containing variables and their values

function _compact(array|string $var_name): array
{
    $result = [];
    foreach ($var_name as $key => $val) {
        $result[$val] = $GLOBALS[$val];
    }
    return $result;
}
// $a = 1;
// $b = 2;
// $c = 3;
// print_r(_compact(['a', 'b', 'c']));

//* 90 in_array
//in_array — Checks if a value exists in an array
function _in_array(mixed $toSearch, array $array, bool $strict = false): bool
{
    if (!_empty($array)) {
        foreach ($array as $value) {
            if ($strict  ? ($value === $toSearch) : ($value == $toSearch)) {
                return true;
            }
        }
        return false;
    }
    return false;
}
// echo_r(in_array(1,[5,4,3,2,1]), _in_array(1, [5, 4, 3, 2, 1]));

//* 91 krsort
//krsort — Sort an array by key in descending order d -> c -> b -> a
function _krsort(array &$array, int $flags = SORT_REGULAR): true
{
    $result = [];
    $keys = _array_keys($array);
    for ($i = 0; $i < count($keys); $i++) {
        for ($j = 0; $j < count($keys); $j++) {
            if ($keys[$j] < $keys[$i]) {
                $temp = $keys[$i];
                $keys[$i] = $keys[$j];
                $keys[$j] = $temp;
            }
        }
    }
    for ($i = 0; $i < count($array); $i++) {
        $result[$keys[$i]] = $array[$keys[$i]];
    }
    $array = $result;
    return true;
}

// $arr = [5 => 1, 3 => 2, 1 => 8, 0 => 5];
// _krsort($arr);
// print_r($arr);

//* 92 ksort
//ksort — Sort an array by key in ascending order
function _ksort(array &$array, int $flags = SORT_REGULAR): true
{
    $result = [];
    $keys = _array_keys($array);
    for ($i = 0; $i < count($keys); $i++) {
        for ($j = 0; $j < count($keys); $j++) {
            if ($keys[$j] > $keys[$i]) {
                $temp = $keys[$i];
                $keys[$i] = $keys[$j];
                $keys[$j] = $temp;
            }
        }
    }
    for ($i = 0; $i < count($array); $i++) {
        $result[$keys[$i]] = $array[$keys[$i]];
    }
    $array = $result;
    return true;
}
// $arr = [5 => 1, 3 => 2, 1 => 8, 0 => 5];
// _ksort($arr);
// print_r($arr);




//* 93 rsort
//rsort — Sort an array in descending order z -> a
function _rsort(array &$array, int $flags = SORT_REGULAR): true
{
    for ($i = 0; $i < count($array); $i++) {
        for ($j = 0; $j < count($array); $j++) {
            if ($array[$j] < $array[$i]) {
                $temp = $array[$i];
                $array[$i] = $array[$j];
                $array[$j] = $temp;
            }
        }
    }

    return true;
}
// $arr = [1, 5, 6, 2, 3, 4];
// _rsort($arr);
// print_r($arr);


//* 94 shuffle
//shuffle — Shuffle an array - This function shuffles (randomizes the order of the elements in) an array.
function _shuffle(array &$array): true
{
    if (!_empty($array)) {
        $arrayLength = _count($array);
        $shuffledIndexes = [];
        $temp = false;
        $result = [];
        while (_count($shuffledIndexes) < _count($array)) {
            $randomIndex = rand(0, _count($array) - 1);
            if (!_in_array($randomIndex, $shuffledIndexes))
                _array_push($shuffledIndexes, $randomIndex);
        }
        for ($i = 0; $i < $arrayLength; $i++) {
            _array_push($result, $array[$shuffledIndexes[$i]]);
        }
        $array = $result;
        return true;
    }
    throw new Exception('array is empty');
}
// $test = [1, 2, 3];
// _shuffle($test);
// echo_r(...$test);
//* 95 sort
//sort — Sort an array in ascending order
//sort(array &$array): true
// $test = [1, 2, 3];
// sort($test);


//* 99 _strpos
// return the index of the first occurrence of a string.
function _strpos(string $value, string $toSearch): int
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
//* 100 _year
function _year($date): string
{
    return date("Y", strtotime($date));
}
// echo _year('2021/05/06');

//* 101 _month
function _month($date): int
{
    return (int)date("m", strtotime($date));
}
// echo _month('2021/05/06');
//* 102 _day
function _day($date): int
{
    return (int)date("d", strtotime($date));
}
// echo _day('2021/05/06');
//* 103 _hour
function _hour($time, $h = true)
{
    return (int)date($h ? 'h' : 'H', strtotime($time));
}
// echo _hour('2023-11-20 14:30:45');
//* 104 _minute
function _minute($time)
{
    return (int)date('i', strtotime($time));
}
// echo _minute('2023-11-20 14:30:45');
//* 105 _second
function _second($time)
{
    return (int)date("s", strtotime($time));
}
// echo _second('2023-11-20 14:30:45');
//* 106 _is_morning
function _is_morning($time)
{
    return date('a', strtotime($time)) === 'am' ? true : false;
}
// echo _is_morning('2023-11-20 1:30:45');
//* 107 _rand
function _rand(int $min, int $max): int
{
    return (int)((int)(microtime(true)) % $max);
}
// echo _rand(0, 5);
//* 108 sort
function _sort(array &$array, int|null $flags = SORT_REGULAR): bool
{
    for ($i = 0; $i < count($array); $i++) {
        for ($j = 0; $j < count($array); $j++) {
            if ($array[$j] > $array[$i]) {
                $temp = $array[$i];
                $array[$i] = $array[$j];
                $array[$j] = $temp;
            }
        }
    }
    return true;
}
// $arr = [5, 4, 7, 8, 9, 1, 0, 4, 5, 2, 5, 7];
// _sort($arr);
// print_r($arr);
//* 109 intval(): Converts a string to an integer.
function _intval(mixed $value): int
{
    return (int)$value;
}
// echo _intval('55') + 5;
//* 110 floatval(): Converts a string to a float.
function _floatval(mixed $value): float
{
    return (float)$value;
}

//* 111 boolval(): Converts a string to a boolean.
function _boolval(mixed $value): float
{
    return (bool)$value;
}
echo _boolval(false);
