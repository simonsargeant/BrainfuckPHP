<?php


namespace BrainfuckPHP\Request;


class Request
{
    const INPUT = 'input';
    const PROGRAM = 'program';

    private $parameters = [];

    public function __construct()
    {
        if (isset($_POST[self::INPUT])) {
            $this->parameters[self::INPUT] = $_POST[self::INPUT];
        }

        if (isset($_POST[self::PROGRAM])) {
            $this->parameters[self::PROGRAM] = $_POST[self::PROGRAM];
        }
    }

    public function getParameter($value)
    {
        if (isset($this->parameters[$value])) {
            return $this->parameters[$value];
        }

        return '';
    }
}
