<?php

namespace BrainfuckPHP\Controller;

class LoopStack {

    private $stack;

    public function __construct()
    {
        $this->stack = [];
    }

    public function setLoopStart($pointer)
    {
        $this->stack[] = $pointer;
    }

    public function getLoopStart()
    {
        return array_pop($this->stack);
    }
}
