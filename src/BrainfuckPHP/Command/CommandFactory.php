<?php

namespace BrainfuckPHP\Command;


class CommandFactory
{
    const ADD =        '+';
    const SUBTRACT =   '-';
    const MOVE_UP =    '>';
    const MOVE_DOWN =  '<';
    const START_LOOP = '[';
    const END_LOOP =   ']';

    public function getCommand($command)
    {
        switch($command) {
            case (self::ADD):
                return new IncrementMemory();
            case (self::SUBTRACT):
                return new DecrementMemory();
            case (self::MOVE_UP) :
                return new IncrementPointer();
            case (self::MOVE_DOWN) :
                return new DecrementPointer();
            case (self::START_LOOP) :
                return new StartLoop();
            case (self::END_LOOP) :
                return new EndLoop();
            default:
                return null;
        }
    }
}
