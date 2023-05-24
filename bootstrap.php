<?php

if (!function_exists('array_sort')) {
    /**
     * @param array $array
     * @param int $order
     * @param bool $preserveKeys
     * @param bool $byKey
     * @return bool
     */
    function array_sort(&$array, $order = SORT_ASC, $byKey = false, $preserveKeys = false)
    {
        return \Antikirra\ArraySort\ArraySort::sort($array, $order, $byKey, $preserveKeys);
    }
}
