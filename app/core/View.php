<?php

class View
{
    /**
     * View file
     *
     * @var string
     */
    private $file;

    /**
     * The data of the view
     *
     * @var array
     */
    private $data;

    /**
     * The actual templater
     *
     * @var Twig_Environment
     */
    private $twig;

    /**
     * Initialize a new View
     *
     * @param $file
     */
    public function __construct($file, $data = null)
    {
        $this->file = $file;
        $this->data = $data;

        $twigLoader = new Twig_Loader_Filesystem(INC_ROOT . '/app/views', '__main__');
        $this->twig = new Twig_Environment($twigLoader,
            [
                'cache' => INC_ROOT . '/app/cache',
            ]);
        $this->twig->addGlobal('ASSET_ROOT', ASSET_ROOT);
        $this->twig->addGlobal('HTTP_ROOT', HTTP_ROOT);
    }

    /**
     * Return the parsed view
     *
     * @return string
     */
    public function __toString()
    {
        return $this->parseView();
    }

    /**
     * Parse the view into a string using Twig
     *
     * @return string
     */
    public function parseView()
    {
        $file = $this->file . '.php';

        if(is_null($this->data))
        {
            return $this->twig->render($file);
        }

        return $this->twig->render($file, $this->data);
    }

    private function getErrorMessage($errorType, $errorMessage)
    {
        return sprintf("A %s error occured: %s", $errorType, $errorMessage);
    }
} 