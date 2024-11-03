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

    /**
     * @var callable
     */
    protected $callback;

    protected function __construct()
    {
    }

    public abstract function sort(&$array);

    /**
     * @return $this
     */
    public function numeric()
    {
        $this->mode = SORT_NUMERIC;

        return $this;
    }

    /**
     * @return $this
     */
    public function regular()
    {
        $this->mode = SORT_REGULAR;

        return $this;
    }

    /**
     * @return $this
     */
    public function string()
    {
        $this->mode = SORT_STRING;

        return $this;
    }

    /**
     * @return $this
     */
    public function localeString()
    {
        $this->mode = SORT_LOCALE_STRING;

        return $this;
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
     * @return array
     */
    public function sortCopy($array)
    {
        $this->sort($array);

        return $array;
    }
}
