<?php

namespace Antikirra\ArraySort;

abstract class AbstractSorter
{
    /**
     * @var int
     */
    protected $order = SORT_ASC;

    /**
     * @var int
     */
    protected $mode = SORT_REGULAR;

    protected function __construct()
    {
    }

    /**
     * @param array $array
     * @param int $mode
     *
     * @return array
     */
    public abstract function sort(&$array, $mode = SORT_REGULAR);

    /**
     * @param int $mode
     *
     * @return int
     */
    protected function normalizeMode($mode)
    {
        return in_array($mode, [SORT_REGULAR, SORT_NUMERIC, SORT_STRING, SORT_LOCALE_STRING, SORT_NATURAL], true) ? $mode : SORT_REGULAR;
    }

    /**
     * @return $this
     */
    public function asc()
    {
        $this->order = SORT_ASC;

        return $this;
    }

    /**
     * @return $this
     */
    public function desc()
    {
        $this->order = SORT_DESC;

        return $this;
    }

    /**
     * @param array $array
     * @param int $mode
     *
     * @return array
     */
    public function sortCopy($array, $mode = SORT_REGULAR)
    {
        $this->sort($array, $mode);

        return $array;
    }
}
