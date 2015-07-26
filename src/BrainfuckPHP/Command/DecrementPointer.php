<?php


namespace BrainfuckPHP\Command;


class DecrementPointer extends Command
{
    public function execute()
    {
        $this->memory->decrementPointer();
    }
}
