<?php

namespace Antikirra\ArraySort;

final class ValueSorter extends AbstractSorter
{
    /**
     * @var bool
     */
    private $preserveKeys = true;

    /**
     * @return ValueSorter
     */
    public static function make()
    {
        return new self();
    }

    /**
     * @return ValueSorter
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
        if ($this->preserveKeys) {
            if (isset($this->callback)) {
                uasort($array, $this->callback);
            } elseif ($this->order === SORT_ASC) {
                asort($array, $this->mode);
            } elseif ($this->order === SORT_DESC) {
                arsort($array, $this->mode);
            }
        } else {
            if (isset($this->callback)) {
                usort($array, $this->callback);
            } elseif ($this->order === SORT_ASC) {
                sort($array, $this->mode);
            } elseif ($this->order === SORT_DESC) {
                rsort($array, $this->mode);
            }
        }
    }
}
