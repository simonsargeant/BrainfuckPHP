<?php

class Autoloader
{
    /**
     * @var string
     */
    private $baseDir = __DIR__;

    public function register()
    {
        spl_autoload_register(array($this, 'load'));
    }

    /**
     * @param string $class
     */
    private function load($class)
    {
        try {
            $sep = DIRECTORY_SEPARATOR;
            $location = $this->baseDir . '\\' . $class . '.php';
            $file = str_replace('\\', $sep, $location);
            require($file);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
