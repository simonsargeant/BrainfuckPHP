<?php


namespace BrainfuckPHP\Command;


class StartLoop extends LoopCommand
{
    public function execute()
    {
        $this->loop->setLoopStart($this->program->getPointer());
    }
}
