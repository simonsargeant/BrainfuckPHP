<?php


namespace BrainfuckPHP\Controller;


class MemoryContainer extends ArrayContainer
{
    public function __construct()
    {
        parent::__construct([0 => 0]);
    }

    public function getValue()
    {
        if (!isset($this->array[$this->pointer])) {
            $this->array[$this->pointer] = 0;
        }

        parent::getValue();
    }

}
