<?php
/**
 * @author    Felipe Maziero <flpmaziero@gmail.com>
 * @copyright 2015 Felipe Maziero
 */

require_once "Command.php";

class Info extends Command
{
	public function version()
	{
		$this->println("Agile Deploy Tool® {$this->getVersion()}");
	}

	public function help()
	{
		$this->warning("NOT IMPLEMENTED");
	}
}
