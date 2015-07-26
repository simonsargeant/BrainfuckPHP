<?php


namespace BrainfuckPHP\Command;


class EndLoop extends LoopCommand
{
    public function execute()
    {
        if ($this->memory->getValue() === 0) {
            $this->loop->getLoopStart();
        } else {
            $this->program->setPointer($this->loop->getLoopStart() - 1);
        }
    }
}
