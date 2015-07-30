<?php


namespace BrainfuckPHP\Command;

use BrainfuckPHP\Controller\MemoryContainer;

abstract class Command
{

    /**
     * @var MemoryContainer
     */
    protected $memory;

    /**
     * @param MemoryContainer $memory
     */
    public function __construct(
        MemoryContainer $memory
    ) {
        $this->memory = $memory;
    }

    public abstract function execute();
}
