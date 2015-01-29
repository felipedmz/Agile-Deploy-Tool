<?php
/**
 * @author    Felipe Maziero <flpmaziero@gmail.com>
 * @copyright 2015 Felipe Maziero
 */

require_once "Command.php";

class Info
{
	public function version()
	{
		$this->println("\nAgile Deploy Tool {$this->version}\n");
	}

	public function help()
	{
		$this->warning("\nNOT IMPLEMENTED\n");	
	}
}
	