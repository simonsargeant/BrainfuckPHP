<?php


namespace BrainfuckPHP\Command;


class IncrementMemory extends Command
{
    public function execute()
    {
        $this->memory->incrementValue();
    }
}
