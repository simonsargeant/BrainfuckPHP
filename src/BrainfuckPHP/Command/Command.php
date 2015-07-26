<?php


namespace BrainfuckPHP\Command;


use BrainfuckPHP\Controller\ArrayContainer;
use BrainfuckPHP\Controller\LoopStack;
use BrainfuckPHP\Controller\MemoryContainer;

abstract class Command
{

    protected $memory;

    public function __construct(
        MemoryContainer $memory
    )
    {
        $this->memory = $memory;
    }

    public abstract function execute();
}
