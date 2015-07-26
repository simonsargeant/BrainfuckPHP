<?php


namespace BrainfuckPHP\Command;


use BrainfuckPHP\Controller\ArrayContainer;
use BrainfuckPHP\Controller\MemoryContainer;

class FeedOutput extends Command
{

    private $output;

    public function __construct(
        ArrayContainer $output,
        MemoryContainer $memory
    )
    {
        $this->output = $output;
        parent::__construct($memory);
    }

    public function execute()
    {
        $this->output->setValue($this->memory->getValue());
        $this->output->incrementPointer();
    }
}
