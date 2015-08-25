<?php

namespace BrainfuckPHP\Request;

use BrainfuckPHP\Controller\ArrayContainer;
use BrainfuckPHP\Controller\MemoryContainer;

class Response
{
    const TEMPLATE = '\..\Template\Main.php';

    /**
     * @var string
     */
    private $view;

    /**
     * @var array
     */
    private $variables = [];

    public function __construct()
    {
        $this->view = __DIR__ . self::TEMPLATE;
    }

    /**
     * @param ArrayContainer $input
     * @param ArrayContainer $output
     * @param MemoryContainer $memory
     * @param ArrayContainer $program
     */
    public function prepareResponse(
        ArrayContainer $input,
        ArrayContainer $output,
        MemoryContainer $memory,
        ArrayContainer $program
    ) {
        $this->variables['input'] = implode(array_map([$this, "formatCharacter"], $input->getArray()));

        $this->variables['output'] = implode(array_map([$this, "formatCharacter"], $output->getArray()));

        $this->variables['memory'] = $memory->getArray();

        $this->variables['program'] = implode($program->getArray());
    }

    public function processResponse()
    {
        foreach ($this->variables as $name => $variable) {
            $$name = $variable;
        }

        include($this->view);
    }

    /**
     * @param int $character
     * @return string
     */
    private function formatCharacter($character)
    {
        if ($character > 0) {
            return chr($character);
        }

        return '';
    }
}
