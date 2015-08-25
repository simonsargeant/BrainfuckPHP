<?php


namespace BrainfuckPHP\Command;


class StartLoop extends LoopCommand
{
    public function execute()
    {
        if ($this->memory->getValue() === 0) {
            $this->jumpAhead();
        } else {
            $this->loop->setLoopStart($this->program->getPointer());
        }
    }

    private function jumpAhead()
    {
        do {
            $this->program->incrementPointer();
            if ($this->program->getValue() === '[') {
                $this->jumpAhead();
                $this->program->incrementPointer();
            }
        } while ($this->program->getValue() !== ']');
    }
}
