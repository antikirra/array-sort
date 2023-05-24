# Human-readable array sorter for PHP

## Install

```console
composer require antikirra/array-sort
```

## Basic usage

```php
<?php

require __DIR__ . '/vendor/autoload.php';

// only if the function has not been defined in the global scope
array_sort($array, SORT_DESC, $byKey = true);

// if the function could not be defined globally
\Antikirra\array_sort($array, SORT_DESC, $byKey = true);

// under the hood
\Antikirra\ArraySort\ArraySort::sort($array, SORT_DESC, $byKey = true);

```

## Demo

```php
<?php

require __DIR__ . '/vendor/autoload.php';

$array = ['b' => 3, 'a' => 8, 'c' => 5];

array_sort($array, SORT_DESC, $byKey = true);

// Array
// (
//     [c] => 5
//     [b] => 3
//     [a] => 8
// )

array_sort($array, SORT_ASC, $byKey = false, $preserveKeys = true);

// Array
// (
//     [b] => 3
//     [c] => 5
//     [a] => 8
// )
```
