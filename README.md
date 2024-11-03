# Human-readable array sorter for PHP

![Packagist Dependency Version](https://img.shields.io/packagist/dependency-v/antikirra/array-sort/php)
![Packagist Version](https://img.shields.io/packagist/v/antikirra/array-sort)

## Install

```console
composer require antikirra/array-sort:^2
```

## Sorting Order Options

This library provides three primary sorting methods for arrays: by key, by value, and by a custom user-defined function.
To apply your preferred sorting method, simply use the appropriate static method from the base facade - `::byKey()`,
`::byValue()` or `::byFunction(callable)`.

```php
Sorter::byKey()->sort($array); // {"a":8,"b":3,"c":5,"d":11}
Sorter::byValue()->sort($array); // {"b":3,"c":5,"a":8,"d":11}
```

## Default Key Association

By default, array values are sorted while preserving their original keys. This behavior aligns with typical expectations
when using sorting functions. If you prefer to reindex keys without making additional `array_values()` calls, simply use
the `->resetKeys()` method.

## Custom Sorting for Multidimensional Arrays

Custom function-based sorting is available for those rare cases involving multidimensional arrays. Unfortunately, the
standard interface for interacting with such arrays is quite limiting and lacks elegance, making it challenging to
implement a facade that remains backward-compatible with earlier PHP versions. However, you can use the `::asc` and
`::desc` helpers to specify elements at any desired depth within nested arrays.

**Be extremely cautious!** Changing the order of parameters can reverse the sorting result. Always ensure that the
argument order in the outer function matches that in the inner function to maintain the expected sorting behavior.

```php
Sorter::byFunction(function ($a, $b) {
    return Sorter::desc($a['age'], $b['age']);
})->sort($users);
```

## Default Sorting Behavior

When sorting by key or by value, you can specify the sorting order: either ascending or descending - `->asc()` or
`->desc()`.
By default, sorting is performed in ascending order. Explicitly calling the `->asc()` method is optional and recommended
only when it improves code readability.

## Performance and Array Integrity

Native PHP array-sorting functions are designed for maximum performance and minimal memory usage. However, in everyday
use, you might often need to keep the original array intact. You can use the `->sortCopy($array)` method to create a
copy of the original array and then apply sorting. Alternatively, the `->sort(&$array)` method performs sorting directly
on the array as expected.

## Basic usage

```php
<?php

require __DIR__ . '/vendor/autoload.php';

$array = ['b' => 3, 'a' => 8, 'd' => 11, 'c' => 5];

Sorter::byKey()->sort($array); // {"a":8,"b":3,"c":5,"d":11}

Sorter::byValue()->desc()->sort($array); // {"d":11,"a":8,"c":5,"b":3}

Sorter::byValue()->resetKeys()->desc()->sort($array); // [11,8,5,3]

$copy = Sorter::byValue()->desc()->sortCopy($array);
```
