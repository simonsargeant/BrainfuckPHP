<?php


namespace BrainfuckPHP\Request;

use BrainfuckPHP\Controller\ArrayContainer;
use BrainfuckPHP\Controller\MemoryContainer;

class Response
{
    private $view;

    public function processResponse(
        ArrayContainer $input,
        ArrayContainer $output,
        MemoryContainer $memory,
        ArrayContainer $program
    )
    {
        echo '<pre>';
        $outputArray = $output->getArray();
        foreach ($outputArray as $char) {
            echo chr($char);
        }
        echo '<br>';
        //echo $input->getArray();
        print_r($memory->getArray());
        echo '<br>';
        echo implode($program->getArray());
        echo '</pre>';
    }
}
