<?php

namespace lib;

class View
{
    const COLORS = ["#ffadad", "#ffd6a5", "#fdffb6", "#caffbf", "#9bf6ff", "#a0c4ff", "#bdb2ff", "#ffc6ff", "#fffffc"];
    public $currentColor;

    public function __construct()
    {
        $this->currentColor = current(self::COLORS);
        require 'vendor/autoload.php';
    }

    /**
     * Returns a parsed string from a variable
     *
     * @param $property
     * @return string
     */
    public function parseStringFromVariable($variable): string
    {
        if (gettype($variable) === 'boolean') {
            return $variable ? 'Yes' : 'No';
        }
        return $variable;
    }

    /**
     * Changes the value of $currentColor to the next value in COLORS array
     */
    public function setNextColor(): void
    {
        $nextkey = array_search($this->currentColor, self::COLORS) + 1;
        if ($nextkey == count(self::COLORS)) {
            $nextkey = 0;
        }
        $this->currentColor = self::COLORS[$nextkey];
    }
}