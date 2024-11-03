<?php

namespace Antikirra\ArraySort;

final class KeySorter extends AbstractSorter
{
    /**
     * @return KeySorter
     */
    public static function make()
    {
        return new self();
    }

    /**
     * @param array $array
     * @param int $mode
     *
     * @return void
     */
    public function sort(&$array, $mode = SORT_REGULAR)
    {
        $mode = $this->normalizeMode($mode);

        if ($this->order === SORT_ASC) {
            ksort($array, $mode);
        } elseif ($this->order === SORT_DESC) {
            krsort($array, $mode);
        }
    }
}
