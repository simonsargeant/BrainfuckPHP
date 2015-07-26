<?php


namespace BrainfuckPHP\Command;


use BrainfuckPHP\Controller\ArrayContainer;
use BrainfuckPHP\Controller\MemoryContainer;

class ReadInput extends Command
{
    private $input;

    public function __construct(
        ArrayContainer $input,
        MemoryContainer $memory
    )
    {
        $this->input = $input;
        parent::__construct($memory);
    }

    public function execute()
    {
        $this->memory->setValue($this->input->getValue());
    }
}
