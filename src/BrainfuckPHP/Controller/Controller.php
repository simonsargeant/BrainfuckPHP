<?php


namespace BrainfuckPHP\Controller;


use BrainfuckPHP\Command\Command;
use BrainfuckPHP\Command\CommandFactory;
use BrainfuckPHP\Request\Request;
use BrainfuckPHP\Request\Response;


class Controller
{
    /**
     * @var MemoryContainer
     */
    private $memory;

    /**
     * @var ArrayContainer
     */
    private $program;

    /**
     * @var ArrayContainer
     */
    private $input;

    /**
     * @var ArrayContainer
     */
    private $output;

    /**
     * @var Request
     */
    private $request;

    /**
     * @var Response
     */
    private $response;

    /**
     * @var LoopStack
     */
    private $loop;

    public function __construct()
    {
        $this->memory = new MemoryContainer();
        $this->output = new ArrayContainer([]);
        $this->loop = new LoopStack();
        $this->request = new Request();
        $this->response = new Response();
    }

    public function initialise()
    {
        $this->input = new ArrayContainer(array_map("ord", str_split($this->request->getParameter('input'))));
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

            $commandClass = $commandFactory->getCommand($command);

            if ($commandClass instanceof Command) {
                $commandClass->execute();
            }

            $this->program->incrementPointer();
        }

        $this->response->prepareResponse(
            $this->input,
            $this->output,
            $this->memory,
            $this->program
        );

        $this->response->processResponse();
    }
}
