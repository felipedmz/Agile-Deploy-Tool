<?php
/**
 * @author    Felipe Maziero <flpmaziero@gmail.com>
 * @copyright 2015 Felipe Maziero
 * 
 * Entry point
 */

require_once "Command.php";

$options   = getopt("v");
$method    = (isset($argv[1])) ? $argv[1] : false;
$arguments = (isset($argv[2])) ? $argv[2] : false;

$command = new Command();
if (isset($options['v'])) {
	return $command->version();
}

return $command->$method($arguments);