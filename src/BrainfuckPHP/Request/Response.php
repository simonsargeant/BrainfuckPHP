<?php

namespace BrainfuckPHP\Request;

use BrainfuckPHP\Controller\ArrayContainer;
use BrainfuckPHP\Controller\MemoryContainer;

class Response
{
    private $view;

    private $variables = [];

    public function __construct()
    {
        $this->view = __DIR__ . '\..\Template\Main.php';
    }

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

    private function formatCharacter($character)
    {
        if ($character > 0) {
            return chr($character);
        }

        return '';
    }
}
