<?php


namespace BrainfuckPHP\Command;


use BrainfuckPHP\Controller\ArrayContainer;
use BrainfuckPHP\Controller\MemoryContainer;

class ReadInput extends Command
{
    /**
     * @var ArrayContainer
     */
    private $input;

    /**
     * @param ArrayContainer $input
     * @param MemoryContainer $memory
     */
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
