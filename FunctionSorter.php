<?php

namespace Antikirra\ArraySort;

final class FunctionSorter
{
    /**
     * @var bool
     */
    private $preserveKeys = true;

    /**
     * @var bool
     */
    private $byValue = true;

    /**
     * @var callable
     */
    private $callback;

    protected function __construct(callable $callback)
    {
        $this->callback = $callback;
    }

    /**
     * @return FunctionSorter
     */
    public static function make(callable $callback)
    {
        return new self($callback);
    }

    /**
     * @return FunctionSorter
     */
    public function byKey()
    {
        $this->byValue = false;

        return $this;
    }

    /**
     * @return FunctionSorter
     */
    public function byValue()
    {
        $this->byValue = false;

        return $this;
    }

    /**
     * @return FunctionSorter
     */
    public function resetKeys()
    {
        $this->preserveKeys = false;

        return $this;
    }

    /**
     * @param array $array
     *
     * @return void
     */
    public function sort(&$array)
    {
        if ($this->byValue) {
            if ($this->preserveKeys) {
                uasort($array, $this->callback);
            } else {
                usort($array, $this->callback);
            }
        } else {
            uksort($array, $this->callback);
        }
    }
}
