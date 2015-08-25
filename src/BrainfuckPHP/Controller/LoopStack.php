<?php

namespace BrainfuckPHP\Controller;

class LoopStack
{

    /**
     * @var array
     */
    private $stack;

    public function __construct()
    {
        $this->stack = [];
    }

    /**
     * @param int $pointer
     */
    public function setLoopStart($pointer)
    {
        $this->stack[] = $pointer;
    }

    /**
     * @return int
     */
    public function getLoopStart()
    {
        return array_pop($this->stack);
    }
}
