<?php


namespace BrainfuckPHP\Command;


use BrainfuckPHP\Controller\ArrayContainer;
use BrainfuckPHP\Controller\MemoryContainer;

class FeedOutput extends Command
{
    /**
     * @var ArrayContainer
     */
    private $output;

    /**
     * @param ArrayContainer $output
     * @param MemoryContainer $memory
     */
    public function __construct(
        ArrayContainer $output,
        MemoryContainer $memory
    ) {
        $this->output = $output;
        parent::__construct($memory);
    }

    public function execute()
    {
        $this->output->setValue($this->memory->getValue());
        $this->output->incrementPointer();
    }
}
