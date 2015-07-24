<?php


namespace BrainfuckPHP\Controller;


class ArrayContainer
{
    protected $array;

    protected $pointer;

    public function __construct(array $array)
    {
        $this->array = $array;
        $this->pointer = 0;
    }

    public function getValue()
    {
        if (!isset($this->array[$this->pointer])) {
            return null;
        }

        return $this->array[$this->pointer];
    }

    public function getPointer()
    {
        return $this->pointer;
    }


    public function setPointer($pointer)
    {
        $this->pointer = $pointer;
    }
}
