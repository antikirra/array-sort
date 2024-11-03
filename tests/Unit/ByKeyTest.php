<?php

use Antikirra\ArraySort\Sorter;
use PHPUnit\Framework\TestCase;

class ByKeyTest extends TestCase
{
    private $array1 = [
        'a' => true,
        'b' => true,
        'c' => true
    ];

    private $array2 = [
        'c' => true,
        'b' => true,
        'a' => true
    ];

    public function testAsc()
    {
        $expected = $this->array1;
        $array = $this->array2;

        Sorter::byKey()->asc()->sort($array);

        $this->assertSame($expected, $array);
    }

    public function testDesc()
    {
        $expected = $this->array2;
        $array = $this->array1;

        Sorter::byKey()->desc()->sort($array);

        $this->assertSame($expected, $array);
    }
}
