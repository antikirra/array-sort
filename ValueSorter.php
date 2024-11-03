<?php

namespace Antikirra\ArraySort;

use InvalidArgumentException;

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
     * @param int $mode
     *
     * @return void
     */
    public function sort(&$array, $mode = SORT_REGULAR)
    {
        if (!is_array($array)) {
            throw new InvalidArgumentException();
        }

        $mode = $this->normalizeMode($mode);

        if ($this->preserveKeys) {
            if ($this->order === SORT_ASC) {
                asort($array, $mode);
            } elseif ($this->order === SORT_DESC) {
                arsort($array, $mode);
            }
        } else {
            if ($this->order === SORT_ASC) {
                sort($array, $mode);
            } elseif ($this->order === SORT_DESC) {
                rsort($array, $mode);
            }
        }
    }
}
