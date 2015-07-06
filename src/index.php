<?php
/**
 * @author    Felipe Maziero <flpmaziero@gmail.com>
 * @copyright 2015 Felipe Maziero
 * 
 * Entry point
 */

require_once "CommandManager.php";
require_once "Info.php";

try {

    $info    = new Info();
	$manager = new CommandManager();
	$manager->captureCommandLine($argv, getopt("vh"));

    if (in_array('v', $manager->getOptions())) $info->version();
    elseif (in_array('h', $manager->getOptions())) $info->help();

} catch (Exception $e) {
    echo "\n";
	echo "\033[31m";
	echo $e->getMessage();
	echo "\n";
	debug_print_backtrace();
	exit;
}