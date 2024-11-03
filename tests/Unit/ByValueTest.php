<?php

namespace Antikirra\ArraySort\tests\Unit;

use Antikirra\ArraySort\Sorter;
use PHPUnit\Framework\TestCase;

class ByValueTest extends TestCase
{
    private $array1 = [
        'a' => 1,
        'b' => 2,
        'c' => 3
    ];

    private $array2 = [
        'c' => 3,
        'b' => 2,
        'a' => 1
    ];

    public function testAsc()
    {
        $expected = $this->array1;
        $array = $this->array2;

        Sorter::byValue()->asc()->sort($array);

        $this->assertSame($expected, $array);
    }

    public function testDesc()
    {
        $expected = $this->array2;
        $array = $this->array1;

        Sorter::byValue()->desc()->sort($array);

        $this->assertSame($expected, $array);
    }

    public function testAscWithResetKeys()
    {
        $expected = array_values($this->array1);
        $array = array_values($this->array2);

        Sorter::byValue()->resetKeys()->asc()->sort($array);

        $this->assertSame($expected, $array);
    }

    public function testDescWithResetKeys()
    {
        $expected = array_values($this->array2);
        $array = array_values($this->array1);

        Sorter::byValue()->resetKeys()->desc()->sort($array);

        $this->assertSame($expected, $array);
    }
}
