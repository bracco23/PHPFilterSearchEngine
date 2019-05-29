<?php

namespace bracco23\Support;

use Iterator;

/**
 * Taken from https://stackoverflow.com/a/40848207/6397798
 * Used to iterate over characters of a multi-byte string
 */
class MbStrIterator implements Iterator
{
    private $iPos = 0;
    private $iSize = 0;
    private $sStr = null;

    // Constructor
    public function __construct(string $str)
    {
        // Save the string
        $this->sStr = $str;

        // Calculate the size of the current character
        $this->calculateSize();
    }

    // Calculate size
    private function calculateSize()
    {

        // If we're done already
        if (!isset($this->sStr[$this->iPos])) {
            return;
        }

        // Get the character at the current position
        $iChar = ord($this->sStr[$this->iPos]);

        // If it's a single byte, set it to one
        if ($iChar < 128) {
            $this->iSize = 1;
        } else {
            // Else, it's multi-byte
            // Figure out how long it is
            if ($iChar < 224) {
                $this->iSize = 2;
            } else if ($iChar < 240) {
                $this->iSize = 3;
            } else if ($iChar < 248) {
                $this->iSize = 4;
            } else if ($iChar == 252) {
                $this->iSize = 5;
            } else {
                $this->iSize = 6;
            }
        }
    }

    // Current
    public function current()
    {

        // If we're done
        if (!isset($this->sStr[$this->iPos])) {
            return false;
        }

        // Else if we have one byte
        else if ($this->iSize == 1) {
            return $this->sStr[$this->iPos];
        }

        // Else, it's multi-byte
        else {
            return substr($this->sStr, $this->iPos, $this->iSize);
        }
    }

    // Key
    public function key()
    {
        // Return the current position
        return $this->iPos;
    }

    // Next
    public function next()
    {
        // Increment the position by the current size and then recalculate
        $this->iPos += $this->iSize;
        $this->calculateSize();
    }

    // Rewind
    public function rewind()
    {
        // Reset the position and size
        $this->iPos = 0;
        $this->calculateSize();
    }

    // Valid
    public function valid()
    {
        // Return if the current position is valid
        return isset($this->sStr[$this->iPos]);
    }
}
