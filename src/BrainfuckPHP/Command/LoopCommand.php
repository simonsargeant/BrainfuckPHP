<?php

namespace BrainfuckPHP\Command;

use BrainfuckPHP\Controller\ArrayContainer;
use BrainfuckPHP\Controller\LoopStack;
use BrainfuckPHP\Controller\MemoryContainer;

abstract class LoopCommand extends Command
{
    protected $loop;

    protected $program;

    public function __construct(
        ArrayContainer $program,
        MemoryContainer $memory,
        LoopStack $loop
    )
    {
        $this->program = $program;
        $this->loop = $loop;
        parent::__construct($memory);
    }
}
