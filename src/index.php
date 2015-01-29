<?php
/**
 * @author    Felipe Maziero <flpmaziero@gmail.com>
 * @copyright 2015 Felipe Maziero
 * 
 * Entry point
 */

require_once "CommandManager.php";

try {
	$manager = new CommandManager();
	$manager->captureCommandLine($argv, getopt("vh"));

	if (isset($options['v'])) {
		echo 'Version';
	} elseif (isset($options['h'])) {
		echo 'Help';
	}
} catch (Exception $e) {
	echo "\033[31m";
	echo $e->getMessage();
	echo "\n";
	debug_print_backtrace();
	exit;
}