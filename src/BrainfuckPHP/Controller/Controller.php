<?php


namespace BrainfuckPHP\Controller;


class Controller
{
    private $memory;

    private $program;

    private $input;

    private $output;

    public function __construct()
    {
        $this->memory = new MemoryContainer();
        $this->program = new ArrayContainer([]);
        $this->input = new ArrayContainer([]);
        $this->output = new ArrayContainer([]);
    }

    public function run()
    {

    }
}
