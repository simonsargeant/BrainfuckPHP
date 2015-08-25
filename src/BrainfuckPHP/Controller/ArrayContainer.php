<?php


namespace BrainfuckPHP\Controller;


class ArrayContainer
{
    /**
     * @var array
     */
    protected $array;

    /**
     * @var int
     */
    protected $pointer;

    /**
     * @param array $array
     */
    public function __construct(array $array)
    {
        $this->array = $array;
        $this->pointer = 0;
    }

    /**
     * @return null|int
     */
    public function getValue()
    {
        $value = null;

        if (isset($this->array[$this->pointer])) {
            $value = $this->array[$this->pointer];
        }

        return $value;
    }

    /**
     * @param string $value
     */
    public function setValue($value)
    {
        $this->array[$this->pointer] = $value;
    }

    /**
     * @return int
     */
    public function getPointer()
    {
        return $this->pointer;
    }

    /**
     * @param int $pointer
     */
    public function setPointer($pointer)
    {
        $this->pointer = $pointer;
    }

    /**
     * @return array
     */
    public function getArray()
    {
        return $this->array;
    }

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
