<?php


namespace BrainfuckPHP\Command;


class DecrementMemory extends Command
{
    public function execute()
    {
        $this->memory->decrementValue();
    }
}
