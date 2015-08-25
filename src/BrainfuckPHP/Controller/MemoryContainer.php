<?php


namespace BrainfuckPHP\Controller;


class MemoryContainer extends ArrayContainer
{
    public function __construct()
    {
        parent::__construct([0 => 0]);
    }

    /**
     * @inheritdoc
     */
    public function getValue()
    {
        $this->ensureValuePresent();

        return parent::getValue();
    }

    /**
     * @inheritdoc
     */
    public function setPointer($pointer)
    {
        parent::setPointer($pointer);

        $this->ensureValuePresent();
    }

    private function ensureValuePresent()
    {
        if (!isset($this->array[$this->pointer])) {
            $this->array[$this->pointer] = 0;
        }
    }

    public function incrementValue()
    {
        parent::incrementValue();
        if ($this->getValue() > 255) {
            $this->setValue(0);
        }
    }

    public function decrementValue()
    {
        parent::decrementValue();
        if ($this->getValue() < 0) {
            $this->setValue(255);
        }
    }
}
