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
     *
     * @return void
     */
    public function sort(&$array)
    {
        if (isset($this->callback)) {
            uksort($array, $this->callback);
        } elseif ($this->order === SORT_ASC) {
            ksort($array, $this->mode);
        } elseif ($this->order === SORT_DESC) {
            krsort($array, $this->mode);
        }
    }
}
