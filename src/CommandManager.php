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
		$this->setCommandName($arguments);
		$this->setArguments($arguments);
		$this->setOptions($options);
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
    	if (!isset($arguments[1])) {
    		throw new Exception("I don't know what are you talking about.");
    	}
    	var_dump($arguments);
    	die();

        $this->commandName = $commandName;
    }

    public function getArguments()
    {
        return $this->arguments;
    }

    private function setArguments($arguments)
    {
        $this->arguments = $arguments;
    }

    public function getOptions()
    {
        return $this->options;
    }

    private function setOptions($options)
    {
        $this->options = $options;
    }
}