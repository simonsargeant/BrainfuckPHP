<?php


namespace BrainfuckPHP\Controller;


use BrainfuckPHP\Command\Command;
use BrainfuckPHP\Command\CommandFactory;
use BrainfuckPHP\Request\Request;
use BrainfuckPHP\Request\Response;


class Controller
{
    private $memory;

    private $program;

    private $input;

    private $output;

    private $request;

    private $response;

    private $loop;

    public function __construct()
    {
        $this->memory = new MemoryContainer();
        $this->program = new ArrayContainer([]);
        $this->input = new ArrayContainer([]);
        $this->output = new ArrayContainer([]);
        $this->loop = new LoopStack();
        $this->request = new Request();
        $this->response = new Response();
    }

    public function initialise()
    {
        $this->input = new ArrayContainer(str_split($this->request->getParameter('input')));
        $this->program = new ArrayContainer(str_split($this->request->getParameter('program')));
    }

    public function run()
    {
        $commandFactory = new CommandFactory(
            $this->input,
            $this->output,
            $this->memory,
            $this->program,
            $this->loop
        );

        while ($command = $this->program->getValue()) {
            if ($command === 0) {
                break;
            }
            /*
            echo '<pre>';
            echo $this->memory->getPointer();
            print_r($this->memory);
            echo '</pre>';*/
            $commandClass = $commandFactory->getCommand($command);
            if ($commandClass instanceof Command) {
                $commandClass->execute();
            }
            $this->program->incrementPointer();
        }

        $this->response->processResponse(
            $this->input,
            $this->output,
            $this->memory,
            $this->program
        );
    }
}
