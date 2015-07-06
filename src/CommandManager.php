<?php
/**
 * @author    Felipe Maziero <flpmaziero@gmail.com>
 * @copyright 2015 Felipe Maziero
 */

require_once "ManagerInterface.php";

class CommandManager implements ManagerInterface
{
	private $commandName = false;
	private $arguments   = false;
	private $options     = false;

	public function captureCommandLine($arguments, $options)
	{
        unset($arguments[0]); // own file
        $this->setOptions($options);
        $this->setArguments($arguments);
        $this->setCommandName($arguments);
	}

	public function factory($className)
	{

	}

    public function getCommandName()
    {
        return $this->commandName;
    }

    private function setCommandName($arguments)
    {
        foreach($arguments as $key => $arg) {
            if (strpos($arg, '-') !== false) unset($arguments[$key]);
        }
        $arguments = array_values($arguments);
        if (!isset($arguments[0]) && !$this->hasOptions()) {
            throw new Exception("I don't know what are you talking about boy, try to use: \n\n\tagile -h\n");
        } elseif (isset($arguments[0])) {
            $this->commandName = $arguments[0];
    	}
    }

    public function getArguments()
    {
        return $this->arguments;
    }

    private function setArguments($arguments)
    {
        unset($arguments[1]);
        $this->arguments = array_values($arguments);
    }

    public function getOptions()
    {
        return array_keys($this->options);
    }

    private function setOptions($options)
    {
        $this->options = $options;
    }

    public function hasOptions()
    {
        return count($this->getOptions()) > 0;
    }

    public function hasCommand()
    {
        $command = $this->getCommandName();
        return !empty($command);
    }
}