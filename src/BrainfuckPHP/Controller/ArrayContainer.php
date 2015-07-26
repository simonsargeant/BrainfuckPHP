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
        $value = null;

        if (isset($this->array[$this->pointer])) {
            $value = $this->array[$this->pointer];
        }

        return $value;
    }

    public function setValue($value)
    {
        $this->array[$this->pointer] = $value;
    }

    public function getPointer()
    {
        return $this->pointer;
    }

    public function setPointer($pointer)
    {
        $this->pointer = $pointer;
    }

    public function getArray()
    {
        return $this->array;
    }

    // Sugar
    public function incrementValue()
    {
        $this->setValue($this->getValue() + 1);
    }

    public function decrementValue()
    {
        $this->setValue($this->getValue() - 1);
    }

    public function incrementPointer()
    {
        $this->setPointer($this->getPointer() + 1);
    }

    public function decrementPointer()
    {
        $this->setPointer($this->getPointer() - 1);
    }
}
