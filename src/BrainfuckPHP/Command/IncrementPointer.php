<?php


namespace BrainfuckPHP\Command;


class IncrementPointer extends Command
{
    public function execute()
    {
        $this->memory->incrementPointer();
    }
}
