<?php
/**
 * @author    Felipe Maziero <flpmaziero@gmail.com>
 * @copyright 2015 Felipe Maziero
 */

class CommandException extends Exception
{
    public function getPrettyMessage()
    {
        echo "\n\033[31m{$this->getMessage()}\n\n";
        exit;
    }
}
