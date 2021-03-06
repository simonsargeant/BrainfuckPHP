<?php


namespace BrainfuckPHP\Command;


use BrainfuckPHP\Controller\ArrayContainer;
use BrainfuckPHP\Controller\LoopStack;
use BrainfuckPHP\Controller\MemoryContainer;

class CommandFactory
{
    const ADD = '+';
    const SUBTRACT = '-';
    const MOVE_UP = '>';
    const MOVE_DOWN = '<';
    const START_LOOP = '[';
    const END_LOOP = ']';
    const INPUT = ',';
    const OUTPUT = '.';

    /**
     * @var ArrayContainer
     */
    private $input;

    /**
     * @var ArrayContainer
     */
    private $output;

    /**
     * @var MemoryContainer
     */
    private $memory;

    /**
     * @var ArrayContainer
     */
    private $program;

    /**
     * @var LoopStack
     */
    private $loop;

    /**
     * @param ArrayContainer $input
     * @param ArrayContainer $output
     * @param MemoryContainer $memory
     * @param ArrayContainer $program
     * @param LoopStack $loop
     */
    public function __construct(
        ArrayContainer $input,
        ArrayContainer $output,
        MemoryContainer $memory,
        ArrayContainer $program,
        LoopStack $loop
    ) {
        $this->input = $input;
        $this->output = $output;
        $this->memory = $memory;
        $this->program = $program;
        $this->loop = $loop;
    }

    /**
     * @param string $command
     *
     * @return Command
     */
    public function getCommand($command)
    {
        switch ($command) {
            case (self::ADD):
                return new IncrementMemory(
                    $this->memory
                );
            case (self::SUBTRACT):
                return new DecrementMemory(
                    $this->memory
                );
            case (self::MOVE_UP) :
                return new IncrementPointer(
                    $this->memory
                );
            case (self::MOVE_DOWN) :
                return new DecrementPointer(
                    $this->memory
                );
            case (self::START_LOOP) :
                return new StartLoop(
                    $this->program,
                    $this->memory,
                    $this->loop
                );
            case (self::END_LOOP) :
                return new EndLoop(
                    $this->program,
                    $this->memory,
                    $this->loop
                );
            case (self::INPUT) :
                return new ReadInput(
                    $this->input,
                    $this->memory
                );
            case (self::OUTPUT) :
                return new FeedOutput(
                    $this->output,
                    $this->memory
                );
            default:
                return null;
        }
    }
}
