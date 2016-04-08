<?php
/**
 * @author    Felipe Maziero <flpmaziero@gmail.com>
 * @copyright 2015 Felipe Maziero
 *
 * Entry point
 */

require_once "Info.php";
require_once "CommandManager.php";

try {
	$manager = new CommandManager();
	$manager->captureCommandLine($argv, getopt("vh"));

    $info = new Info();
    if ($manager->hasOption('v'))
        $info->version();
    elseif ($manager->hasOption('h'))
        $info->help();

} catch (CommandException $e) {
    $e->getPrettyMessage();
}
