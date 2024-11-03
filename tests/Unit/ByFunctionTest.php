<?php

namespace Antikirra\ArraySort\tests\Unit;

use Antikirra\ArraySort\Sorter;
use PHPUnit\Framework\TestCase;

class ByFunctionTest extends TestCase
{
    private $array1 = [
        'user1' => ['age' => 18],
        'user2' => ['age' => 21],
        'user3' => ['age' => 42]
    ];

    private $array2 = [
        'user3' => ['age' => 42],
        'user2' => ['age' => 21],
        'user1' => ['age' => 18]
    ];

    public function testAsc()
    {
        $expected = $this->array1;
        $array = $this->array2;

        Sorter::byFunction(function ($a, $b) {
            return Sorter::asc($a['age'], $b['age']);
        })->sort($array);

        $this->assertSame($expected, $array);
    }

    public function testDesc()
    {
        $expected = $this->array2;
        $array = $this->array1;

        Sorter::byFunction(function ($a, $b) {
            return Sorter::desc($a['age'], $b['age']);
        })->sort($array);

        $this->assertSame($expected, $array);
    }
}
